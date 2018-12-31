<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'book_id'
    ];

    /**
     * book relation    [^_^]
     * Each Session Belongs To Exactly One Book
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class,'book_id','id');
    }

    /**
     * questions relation   [^_^]
     * Each Session Have Many Questions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'session_id','id');
    }
}
