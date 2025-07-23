<?php

namespace App\Service;

use App\Entity\Account\Login;
use App\Helper\Feedback;
use App\Repository\PlayerRepository;

class CharacterService
{
    public function __construct(
        private PlayerRepository $playerRepository,
        private AccountService $accountService
    ){}

    public function listUserCharacters(Login $login): array
    {
        $account = $this->accountService->getUserDataByLogin($login);
        $accountID = $account->getId();

        return $this->playerRepository->listPlayersByAccountID($accountID) ?? [];
    }

    public function unstuckCharacter(array $dataFromRequest): void
    {
        $characterList = $this->listUserCharacters($_SESSION['login']) ?? [];
        
        $this->checkIsCharacterOwner($dataFromRequest, $characterList);
        $this->moveCharacterToTown($dataFromRequest['character'], $characterList[0]['empire']);

        error_log("Personagem Desbugado: ". $dataFromRequest['character']);
    }

    private function checkIsCharacterOwner(array $dataFromRequest, array $characterList): void
    {
        $characterNames = array_column($characterList, 'name');
        $characterIndex = array_search($dataFromRequest['character'], $characterNames, true);

        if ($characterIndex === false) {
            throw new \UnexpectedValueException(Feedback::CHARACTER_NOT_FOUND->value);
        }
    }

    private function moveCharacterToTown(string $character, int $empire): void
    {
        $coords = [
            1 => [
                "map_index" => 1,
                "x" => 468779,
                "y" => 962107
            ],
            2 => [
                "map_index" => 21,
                "x" => 55700,
                "y" => 157900
            ],
            3 => [
                "map_index" => 41,
                "x" => 969066,
                "y" => 278290
            ]
        ];

        $this->playerRepository->moveToTown($character, $coords[$empire]);
    }
}