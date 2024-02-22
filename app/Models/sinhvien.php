<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
    use HasFactory;

    protected $fillable = [
        'tensinhvien', 'gioitinh', 'ngaysinh', 'trangthai', 'FK_ma_khoahoc'
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
}
