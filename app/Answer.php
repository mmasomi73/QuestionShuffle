<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'option',
        'answer',
        'question_id',
        'option_id'
    ];

    /**
     * option relation    [^_^]
     * Each Answer Belongs To Exactly One Option Of Questions
     * Note: Can Nullable
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo(Option::class,'option_id','id');
    }


    /**
     * question relation    [^_^]
     * Each Answer Belongs To Exactly One Question
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }
}
