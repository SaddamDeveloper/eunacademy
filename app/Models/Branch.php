<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Branch extends Authenticatable
{
    use Notifiable;
    protected $table = 'branches';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function student()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
