<?php

namespace App\Service;

use App\Entity\Account\Account;
use App\Entity\Account\Email;
use App\Entity\Account\Login;
use App\Entity\Forgot\Forgot;
use App\Entity\Post\Link;
use App\Helper\Feedback;
use App\Repository\ForgotRepository;
use App\Infra\Mail\Mailer;
use UnexpectedValueException;

class ForgotService
{
    public function __construct(
        private AccountService $accountService,
        private ForgotRepository $forgotRepository,
        private Mailer $mailer,
        private TemplateService $templateService
    ){}

    public function forgotLogin(array $dataFromRequest): void
    {
        $email = new Email($dataFromRequest['email']);
        $account = $this->accountService->getUserDataByEmail($email);

        $this->countEmailsSent($account);
        $forgot = $this->createForgot('FORGOT_LOGIN', $account);
        
        $this->mailer
             ->buildEmail($account->getEmail(), 'Recuperar Login')
             ->setBody($this->templateService->buildEmailBody('forgot-login', ['name' => $account->getLogin()]))
             ->send();

        $this->forgotRepository->save($forgot);
    }

    public function forgotPassword(array $dataFromRequest): void
    {
        $login = new Login($dataFromRequest['login']);
        $account = $this->getUserDataByLogin($login);

        $this->countEmailsSent($account);
        $forgot = $this->createForgot('FORGOT_PASSWORD', $account);

        $this->mailer
             ->buildEmail($account->getEmail(), 'Recuperar Senha')
             ->setBody($this->templateService->buildEmailBody('forgot-password', ['code' => $forgot->getCode(), 'name' => $account->getLogin()]))
             ->send();

        $this->forgotRepository->save($forgot);
    }

    public function changePassword(array $dataFromRequest): void
    {
        $code = $this->validateCode($dataFromRequest['code']);
        $forgot = $this->getForgotDataByCode($code);

        $this->checkForgotCodeIsAvailable($forgot);
        $forgot->setAvailable(Forgot::UNNAVAILABLE);

        $this->accountService->changePassword($dataFromRequest, $forgot->getWho());
        $this->forgotRepository->update($forgot);
    }

    public function checkForgotCodeIsAvailable(Forgot $forgot): void
    {
        //Não é necessário verificar data do código pois a query já faz essa verificação.
        if ($forgot->getAvailable() == Forgot::UNNAVAILABLE) {
            throw new UnexpectedValueException();
        }
    }

    public function validateCode(string|null $code): Link
    {
        $code = new Link($code);
        Link::validate($code);

        return $code;
    }

    public function getForgotDataByCode(Link $code): Forgot
    {
        $dataFromDatabase = $this->forgotRepository->getForgotDataByCode($code);
        
        if (empty($dataFromDatabase)) {
            throw new \InvalidArgumentException();
        }

        return Forgot::createFromArray($dataFromDatabase);
    }

    private function getUserDataByLogin(Login $login): Account
    {
        $account = $this->accountService->getUserDataByLogin($login);

        if (is_null($account)) {
            throw new UnexpectedValueException(Feedback::ACCOUNT_NOT_FOUND->value);
        }

        return $account;
    }

    private function createForgot(string $hint, Account $account): Forgot
    {
        $date = new \DateTime("now +" . EMAIL_TIME_WAIT ."minutes");
        $key = md5($account->getId() . $date->format('Y-m-d H:i:s') . rand(1, 100));
        
        return new Forgot(
            null,
            $hint,
            $key,
            $date,
            Forgot::AVAILABLE,
            $account->getLogin()
        );
    }

    private function countEmailsSent(Account $account): void
    {
        $total = (int) $this->forgotRepository->countEmailsSentByLogin($account->getLogin());

        if ($total >= EMAIL_LIMIT) {
            throw new UnexpectedValueException(Feedback::EMAIL_LIMIT_WAIT->value);
        }
    }
}