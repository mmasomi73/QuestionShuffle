<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'grade_id'
    ];

    /**
     * grade relation    [^_^]
     * Each Book Belongs To Exactly One Option Of Grade
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class,'grade_id','id');
    }

    /**
     * session relation   [^_^]
     * Each Book Have Many Sessions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sessions()
    {
        return $this->hasMany(Session::class, 'book_id','id');
    }

}
