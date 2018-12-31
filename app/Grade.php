<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * books relation   [^_^]
     * Each Grade Have Many Books
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany(Book::class, 'grade_id','id');
    }
}
