<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class trangthaisinhvienEnum extends Enum
{
    public const DI_HOC = 1;
    public const NGHI_HOC = 2;
    public const BAO_LUU = 3;

    // dùng static thì dùng self
    // không dùng static thì dùng $this

    public static function asArray(): array
    {
        return [
            self::DI_HOC => 'Đi học',
            self::NGHI_HOC => 'Nghỉ học',
            self::BAO_LUU => 'Bảo Lưu',
        ];
    }

    public static function getKeyByValue($value)
    {
        // cái true gọi là strict : tương đương với 3 dấu bằng
        return array_search($value, self::asArray(), true);
    }
}
