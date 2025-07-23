<?php

namespace App\Service;

use App\Helper\Paginator;
use App\Repository\PlayerRepository;

class RankingService
{
    public function __construct(
        private PlayerRepository $playerRepository,
    ){}

    public function levelRanking(int $currentPage): array
    {
        $amountOfRecords = $this->playerRepository->countRankLevel();
        $paginator = new Paginator(totalRecords: $amountOfRecords, currentPage: $currentPage);

        if ($amountOfRecords == 0) {
            return [];
        }

        $rank = $this->playerRepository->getRankLevel($paginator->getOffset(), $paginator->getRecordsPerPage());
        
        return [
            'records' => $rank ?? [],
            'offset'  => $paginator->getOffset()
        ];
    }

    public function guildRanking(int $currentPage): array
    {
        $amountOfRecords = $this->playerRepository->countRankGuild();
        $paginator = new Paginator(totalRecords: $amountOfRecords, currentPage: $currentPage);

        if ($amountOfRecords == 0) {
            return [];
        }

        $rank = $this->playerRepository->getRankGuild($paginator->getOffset(), $paginator->getRecordsPerPage());
        
        return [
            'records' => $rank ?? [],
            'offset'  => $paginator->getOffset()
        ];
    }

    public function topClassWidget(): array
    {
        $data = [
            "warrior" => $this->playerRepository->getTopWarrior(),
            "assassin" => $this->playerRepository->getTopAssassin(),
            "sura" => $this->playerRepository->getTopSura(),
            "shaman" => $this->playerRepository->getTopShaman(),
        ];

        USE_LYCAN ? $data['lycan'] = $this->playerRepository->getTopLycan() : '';

        return $data;
    }
}