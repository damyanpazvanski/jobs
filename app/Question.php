<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'condition'
    ];

    public function corectAnswer()
    {
        return $this->belongsTo(Answer::class, 'correct_answer_id');
    }

    public function answers()
    {
        return collect([
            $this->answer1,
            $this->answer2,
            $this->answer3,
            $this->answer4
        ])->shuffle();
    }

    public function answer1()
    {
        return $this->belongsTo(Answer::class, 'answer_1_id');
    }

    public function answer2()
    {
        return $this->belongsTo(Answer::class, 'answer_2_id');
    }

    public function answer3()
    {
        return $this->belongsTo(Answer::class, 'answer_3_id');
    }

    public function answer4()
    {
        return $this->belongsTo(Answer::class, 'answer_4_id');
    }
}
