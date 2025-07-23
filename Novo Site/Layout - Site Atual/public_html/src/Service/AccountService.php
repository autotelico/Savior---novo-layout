<?php

namespace App\Service;

use App\Entity\Account\Account;
use App\Entity\Account\Email;
use App\Entity\Account\Login;
use App\Entity\Account\Password;
use App\Helper\Feedback;
use App\Repository\AccountRepository;

class AccountService
{
    public function __construct(
        private AccountRepository $repository,
        private ItemAwardService $itemAwardService
    )
    {}

    public function getUserDataByLogin(?Login $login): ?Account
    {
        if (is_null($login)) {
            return null;
        }

        $dataFromDatabase = $this->repository->getByLogin($login);

        if (empty($dataFromDatabase)) {
            return null;
        }

        return Account::createFromDatabase($dataFromDatabase);
    }

    public function getUserDataByEmail(Email $email): Account
    {
        $dataFromDatabase = $this->repository->getByEmail($email);

        if (empty($dataFromDatabase)) {
            throw new \UnexpectedValueException(Feedback::ACCOUNT_NOT_FOUND->value);
        }

        return Account::createFromDatabase($dataFromDatabase);
    }

    public function create(array $dataFromRequest, array $serverData): void
    {
        $account = Account::createFromRequest($dataFromRequest['login'], $dataFromRequest['email'], $dataFromRequest['password'], $serverData['REMOTE_ADDR'], $dataFromRequest['char-code']);
        
        $this->validatePasswordMatchOnRegister($dataFromRequest);

        $this->checkLoginIsAvailable($account);
        $this->checkEmailIsAvailable($account);

        $this->repository->create($account);
    }

    private function validatePasswordMatchOnRegister(array $dataFromRequest): void
    {
        $password = new Password($dataFromRequest['password']);
        $confirmPassword = new Password($dataFromRequest['confirm-password']);

        $this->validatePasswordMatch($password, $confirmPassword);
    }

    private function checkLoginIsAvailable($account): void
    {
        if ($account->getLogin() == RESERVERD_NAME_SUPORTE) {
            throw new \UnexpectedValueException(Feedback::LOGIN_UNAVAILABLE->value);
        }

        $dataFromDatabase = $this->repository->getByLogin($account->getLogin());

        if (!empty($dataFromDatabase)) {
            throw new \UnexpectedValueException(Feedback::LOGIN_UNAVAILABLE->value);
        }
    }

    private function checkEmailIsAvailable($account): void
    {
        $dataFromDatabase = $this->repository->getByEmail($account->getEmail());

        if (!empty($dataFromDatabase)) {
            throw new \UnexpectedValueException(Feedback::EMAIL_UNAVAILABLE->value);
        }
    }

    public function confirmPassword(array $dataFromRequest): void
    {
        $currentPassword = new Password($dataFromRequest['current-password']);
        $dataFromDatabase = $this->repository->getByLogin($_SESSION['login']);

        $account = Account::createFromDatabase($dataFromDatabase);

        $this->validatePasswordMatch($currentPassword, $account->getPassword());
    }

    public function changePassword(array $dataFromRequest, Login $login = null): void
    {
        $login = $_SESSION['login'] ?? $login;
        
        $password = new Password($dataFromRequest['password']);
        $confirmPassword = new Password($dataFromRequest['confirm-password']);
        
        $this->validatePasswordMatch($password, $confirmPassword);

        $dataFromDatabase = $this->repository->getByLogin($login);

        $account = Account::createFromDatabase($dataFromDatabase);
        $account->setPassword($password);

        $this->update($account);
    }

    //Essa função recebe o __toString do Password para comparação estrista.
    private function validatePasswordMatch(string $newPassword, string $confirmationPassword): void
    {
        if ($newPassword !== $confirmationPassword) {
            throw new \UnexpectedValueException(Feedback::PASSWORDS_NOT_MATCH->value);
        }
    }

    public function changeEmail(array $dataFromRequest): void
    {
        $email = new Email($dataFromRequest['email']);
        $confirmEmail = new Email($dataFromRequest['confirm-email']);

        $this->validateEmailMatch($email, $confirmEmail);
        
        $dataFromDatabase = $this->repository->getByLogin($_SESSION['login']);
        
        $account = Account::createFromDatabase($dataFromDatabase);
        $account->setEmail($email);

        $this->checkEmailIsAvailable($account);

        $this->update($account);
    }

    private function validateEmailMatch(string $newEmail, string $confirmationEmail): void
    {
        if ($newEmail !== $confirmationEmail) {
            throw new \UnexpectedValueException(Feedback::EMAILS_NOT_MATCH->value);
        }
    }

    public function getSocialId(): string
    {
        $dataFromDatabase = $this->repository->getByLogin($_SESSION['login']);
        $account = Account::createFromDatabase($dataFromDatabase);

        return (string) $account->getCharCode();
    }

    public function getWarehousePassword(): string
    {
        $dataFromDatabase = $this->repository->getByLogin($_SESSION['login']);
        $account = Account::createFromDatabase($dataFromDatabase);

        $warehousePassword = $account->getWarehousePassword();

        if (is_null($warehousePassword)) {
            return '000000';
        }
        return $warehousePassword;
    }

    public function update(Account $account): void
    {
        $this->repository->update($account);
    }
}