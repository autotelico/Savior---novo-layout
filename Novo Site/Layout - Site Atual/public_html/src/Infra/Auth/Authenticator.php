<?php

namespace App\Infra\Auth;

use App\Entity\Account\Account;
use App\Entity\Account\Login;
use App\Entity\Account\Password;
use App\Helper\Feedback;
use App\Repository\AccountRepository;

class Authenticator
{
    public function __construct(private AccountRepository $repository){}

    public function auth(array $params): void
    {
        try {
            $login = new Login($params['login']);
            $password = new Password($params['password']);
        } catch (\Throwable $th) {
            throw new \UnexpectedValueException(Feedback::INVALID_LOGIN_OR_PASSWORD->value);
        }

        $account = $this->getAccount($login);
        $this->validatePassword($password, $account);

        $_SESSION['login'] = $account->getLogin();
        $_SESSION['admin'] = $account->getIsAdmin();
    }

    private function getAccount(Login $login): Account
    {
        $dataFromDatabase = $this->repository->getByLogin($login);

        if (empty($dataFromDatabase)) {
            throw new \UnexpectedValueException(Feedback::INVALID_LOGIN_OR_PASSWORD->value);
        }

        return Account::createFromDatabase($dataFromDatabase);
    }

    private function validatePassword(Password $password, Account $account): void
    {
        if ($password != $account->getPassword()) {
            throw new \UnexpectedValueException(Feedback::INVALID_LOGIN_OR_PASSWORD->value);
        }
    }
}