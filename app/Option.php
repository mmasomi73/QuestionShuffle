<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';
    protected $primaryKey = 'id';
    protected $fillable = [
        'text',
        'option',
        'question_id'
    ];

    /**
     * question relation    [^_^]
     * Each Option Belongs To Exactly One Question
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }
}
