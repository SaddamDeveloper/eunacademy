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
        return $this->hasOne('App\Models\Address', 'student_id', 'id')->where('type', 1);
    }
    
    public function permanentAddress(){
        return $this->hasOne('App\Models\Address', 'student_id', 'id')->where('type', 2);
    }

    public function qualifications(){
        return $this->hasMany('App\Models\Qualification', 'student_id', 'id');
    }

    public function branches()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id', 'id');
    }

    /**
     * Get all of the comments for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
