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

    public function getRate()
    {
        switch ($this->rate){
            case 0:return 'خیلی آسان';break;
            case 1:return 'آسان';break;
            case 2:return 'متوسط';break;
            case 3:return 'دشوار';break;
            case 4:return 'خیلی دشوار';break;
            default :return 'خیلی آسان';break;
        }
    }
}
