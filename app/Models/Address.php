<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'student_id',
        'state',
        'city',
        'pin',
        'address'
    ];

    protected $primaryKey = 'id';
    
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
}
