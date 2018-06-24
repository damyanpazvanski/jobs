<?php

namespace App\Actions\Tests;

use App\Candidate;
use App\IqResult;
use App\Question;
use Illuminate\Support\Facades\DB;

class Store
{

    private $email = '';

    private $questions = [];

    private $bonus = 0;

    private $level = 'low';

    public function __construct($email, $questions, $bonus)
    {
        $this->email = $email;
        $this->questions = $questions;
        $this->bonus = $bonus;
    }

    public function handle()
    {
        $candidate = Candidate::where('email', $this->email)->first();

        $candidate->iqResult->update([
            'status' => 'complete',
            'result' => $this->calculateResult(),
            'level' => $this->level,
            'attempts' => DB::raw('attempts + 1')
        ]);

        return [];
    }

    private function calculateResult()
    {
        $points = 0;

        foreach ($this->questions as $question) {
            if (empty($question)) {
                continue;
            }

            if (Question::find($question['questionId'])->corectAnswer->id === $question['answerId']) {
                $points++;
            }
        }

        $points += $this->bonus;

        if ($points > 20) {
            $points = 20;
        }

        $this->calculateLevel($points);

        return ($points / 20) * 100;
    }

    private function calculateLevel($points)
    {
        if ($points <= 8) {
            $this->level = 'low';
        } else if ($points <= 11) {
            $this->level = 'below middle';
        } else if ($points <= 14) {
            $this->level = 'middle';
        } else if ($points <= 17) {
            $this->level = 'above middle';
        }

        $this->level = 'high';
    }
}