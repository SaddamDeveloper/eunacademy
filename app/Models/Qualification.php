<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $table = 'qualifications';
    protected $fillable = [
        'student_id',
        'exam_passed',
        'year_of_pass',
        'board',
        'marks'
    ];
    protected $primaryKey = 'id';

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
}
