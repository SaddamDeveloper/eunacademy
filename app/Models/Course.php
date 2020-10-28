<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name', 'status'];
    protected $primaryKey = 'id';

    public function student()
    {
        return $this->hasMany('App\Models\Student', 'student_id', 'id');
    }
}
