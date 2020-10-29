<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'city',
        'state',
        'address',
        'status'
    ];

    public function courses(){
        return $this->belongsTo('App\Models\Course', 'course', 'id');
    }

    public function presentAddress(){
        return $this->hasOne('App\Models\Address', 'student_id', 'id');
    }
    
    public function permanentAddress(){
        return $this->hasOne('App\Models\Address', 'student_id', 'id');
    }

    public function qualifications(){
        return $this->hasMany('App\Models\Qualification', 'student_id', 'id');
    }

    public function branches()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id', 'id');
    }
}
