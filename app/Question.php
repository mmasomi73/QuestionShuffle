<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'question',
        'rate',
        'book_id',
        'session_id'
    ];

    /**
     * session relation    [^_^]
     * Each Question Belongs To Exactly One Session
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo(Session::class,'session_id','id');
    }

    /**
     * book relation    [^_^]
     * Each Question Belongs To Exactly One Book
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class,'book_id','id');
    }

    /**
     * options relation     [^_^]
     * Each Questions Have Several Options
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class, 'question_id', 'id');
    }

    /**
     * answers relation     [^_^]
     * Each Questions Have Several Answers
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
}
