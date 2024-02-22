<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\trangthaisinhvienEnum;
use App\Models\Course;

class SinhvienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // định nghĩa 1 thằng gồm những cái gì
        return [
            'tensinhvien' => $this->faker->name(),
            'gioitinh' => $this->faker->boolean(),
            'ngaysinh' => $this->faker->dateTimeBetween($startDate = '-30 years', $endtDate = '-18 years'),
            // ể đảm bảo rằng giá trị được chọn là một giá trị hợp lệ từ enum nên phải gọi trực tiếp như vậy
            'trangthai' => $this->faker->randomElement([
                trangthaisinhvienEnum::DI_HOC,
                trangthaisinhvienEnum::NGHI_HOC,
                trangthaisinhvienEnum::BAO_LUU,
            ]),
            // đối với khóa ngoài thì dùng chính msql để sử lí chứ k cần dùng faker nữa
            // 'FK_ma_khoahoc' => $this->faker->randomElement(Course::get())
            'FK_ma_khoahoc' => Course::query()->inRandomOrder()->value('id')
        ];
    }
}
