<?php

namespace App\Helper;

class Paginator
{
    public function __construct(
        private int $recordsPerPage = 100,
        private int $totalRecords = 0,
        private int $currentPage = 1
    ){}

    public function getTotalPages(): int
    {
        return ceil($this->totalRecords / $this->recordsPerPage);
    }

    public function getOffset(): int
    {
        $currentPage = $this->currentPage;
        
        if ($this->currentPage > $this->getTotalPages()) {
            $currentPage = $this->getTotalPages();
        }

        return ($currentPage - 1) * $this->recordsPerPage;
    }

    public function getRecordsPerPage(): int
    {
        return $this->recordsPerPage;
    }
}