<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookClass extends Model
{
    protected $table = 'book_classes';
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'course_id'
    ];
    protected $primaryKey = 'id';

    public function courses(){
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
}
