<?php

namespace App\Actions\Download;


class CandidatesCsv
{

    private $candidates;
    private $addFilters;
    private $filters;

    public function __construct($candidates, $addFilters, $filters)
    {
        $this->candidates = $candidates;
        $this->addFilters = $addFilters;
        $this->filters = $filters;
    }

    public function handle()
    {
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="candidates.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $file = fopen('php://output', 'w');

        if ($this->addFilters) {
            $this->addFilters($file);
        }

        fputcsv($file, [
            'ID', 'First Name', 'Last Name', 'Email', 'Phone', 'Sent Emails',
            'Attempts', 'Allowed Attempts', 'Status', 'IQ Result', 'Level'
        ]);

        foreach ($this->candidates as $candidate)
        {
            fputcsv($file, [
                $candidate->id,
                $candidate->first_name ?: '-',
                $candidate->last_name ?: '-',
                $candidate->email,
                $candidate->phone ?: '-',
                $candidate->sentIqTest ? $candidate->sentIqTest->count : '-',
                $candidate->iqResult->attempts  ?: '-',
                $candidate->iqResult->allowed_attempts,
                $candidate->iqResult->status,
                $candidate->iqResult->result ?: '-',
                $candidate->iqResult->level ?: '-'
            ], ',');
        }

        return fpassthru($file);
    }

    private function addFilters($file)
    {
        fputcsv($file, ['Filters:'], ',');
        fputcsv($file, [''], ',');

        foreach ($this->filters as $key => $filter) {
            $filter = $filter ?: '-';

            if ($filter === 'asc') {
                $filter = 'A-Z';
            } else if ($filter === 'desc') {
                $filter = 'Z-A';
            }

            fputcsv($file, [$key, $filter], ',');
        }

        fputcsv($file, [''], ',');
        fputcsv($file, array_fill(0, 11, '-------------------'), ',');
    }
}
