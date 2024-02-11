<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $dates = ['ngaysinh'];
    protected $gender = ['gioitinh'];
    protected $fillable = [
        'hosinhvien', 'tensinhvien', 'ngaysinh', 'gioitinh'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->hosinhvien} {$this->tensinhvien}";
    }

    public function getAgeAttribute()
    {
        return $this->ngaysinh->age;
    }

    public function getGender()
    {
        return ($this->gioitinh === 1) ? 'Nam' : 'Nữ';
    }
}

