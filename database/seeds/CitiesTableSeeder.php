<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = array(
            'An Giang',
            'Bà Rịa - Vũng Tàu',
            'Bắc Giang',
            'Bắc Kạn',
            'Bạc Liêu',
            'Bắc Ninh',
            'Bến Tre',
            'Bình Định',
            'Bình Dương',
            'Bình Phước',
            'Bình Thuận',
            'Cà Mau',
            'Cao Bằng',
            'Đắk Lắk',
            'Đắk Nông',
            'Điện Biên',
            'Đồng Nai',
            'Đồng Tháp',
            'Gia Lai',
            'Hà Giang',
            'Hà Nam',
            'Hà Tĩnh',
            'Hải Dương',
            'Hậu Giang',
            'Hòa Bình',
            'Hưng Yên',
            'Khánh Hòa',
            'Kiên Giang',
            'Kon Tum',
            'Lai Châu',
            'Lâm Đồng',
            'Lạng Sơn',
            'Lào Cai',
            'Long An',
            'Nam Định',
            'Nghệ An',
            'Ninh Bình',
            'Ninh Thuận',
            'Phú Thọ',
            'Quảng Bình',
            'Quảng Nam',
            'Quảng Ngãi',
            'Quảng Ninh',
            'Quảng Trị',
            'Sóc Trăng',
            'Sơn La',
            'Tây Ninh',
            'Thái Bình',
            'Thái Nguyên',
            'Thanh Hóa',
            'Thừa Thiên Huế',
            'Tiền Giang',
            'Trà Vinh',
            'Tuyên Quang',
            'Vĩnh Long',
            'Vĩnh Phúc',
            'Yên Bái',
            'Phú Yên',
            'Cần Thơ',
            'Đà Nẵng',
            'Hải Phòng',
            'Hà Nội',
            'TP HCM',
            'Khác'
        );
        for ($i = 0; $i < count($list); $i++) {
            $address = [
                'name' => $list[$i],
            ];

            DB::table('cities')->insert($address);
        }
    }
}
