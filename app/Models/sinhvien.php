<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\trangthaisinhvienEnum;
use App\Models\Course;

class sinhvien extends Model
{
    use HasFactory;

    protected $fillable = [
        'tensinhvien', 
        'gioitinh', 
        'ngaysinh', 
        'trangthai', 
        'anhdaidien',
        'FK_ma_khoahoc'
    ];

    public function getGenderAttribute()
    {
        return ($this->gioitinh === 1) ? 'Nam' : 'Nữ';
    }

    public function getAgeAttribute()
    {
        $ngaySinh = $this->ngaysinh;

        $ngayHienTai = now();

        $tuoi = $ngayHienTai->diff($ngaySinh)->y;

        return $tuoi;
    }

    public function getStatus()
    {
        return trangthaisinhvienEnum::getKeyByValue($this->trangthai);
    }

    public function getKhoahoc()
    {
        return $this->belongsTo(Course::class, 'FK_ma_khoahoc');
    }

    public function getNameCourse()
    {
        if ($this->getKhoahoc) {
            return $this->getKhoahoc->name;
        }
    }
}
