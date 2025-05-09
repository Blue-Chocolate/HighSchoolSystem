<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Teacher extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'Department',
        'email',
        'status',
        'phome',
        'gender',
        'birth_date',
        'address',
    ];
}
