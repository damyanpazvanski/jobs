<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'content'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
