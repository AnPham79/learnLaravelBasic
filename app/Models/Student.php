<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $dates = ['ngaysinh'];

    public function getFullNameAttribute()
    {
        return "{$this->hosinhvien} {$this->tensinhvien}";
    }

    public function getAgeAttribute()
    {
        return $this->ngaysinh->age;
    }
}

