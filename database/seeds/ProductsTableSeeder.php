<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $limit = 5;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Xiaomi' . ' ' . str_random(7),
                    'price' => ($i + 7) . '000000',
                    'description' => $faker->text(150),
                    'promotion' => 300000,
                    'date_manufacture' => $faker->date(),
                    'user_id' => 1,
                    'manufacture_id' => 1,
                    'category_id' => 9,
                    'back_camera' => $i + 2,
                    'front_camera' => 6,
                    'ram' => 4,
                    'cpu' => 'Apple A11 Bionic 6',
                    'sim' => '1 nano sim',
                    'memory' => 64,
                    'battery' => 4000,
                    'screen' => 'LED-backlit IPS LCD, 5.0, Retina HD',
                    'os' => 'IOS 10',
                    'status' => 1,
                    'is_new' => 0,
                    'views' => $i + 2,
                    'created_at' => '2018-05-08 01:14:0' . $i,
                    'updated_at' => '2018-05-08 01:14:0' . ($i + 15),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Oppo' . ' ' . str_random(7),
                    'price' => ($i + 4) . '000000',
                    'description' => $faker->text(150),
                    'promotion' => 300000,
                    'date_manufacture' => $faker->date(),
                    'user_id' => 2,
                    'manufacture_id' => 2,
                    'category_id' => 14,
                    'back_camera' => $i + 2,
                    'front_camera' => 6,
                    'ram' => 6,
                    'cpu' => 'Oppo A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 64,
                    'battery' => 3000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 7.0',
                    'status' => 1,
                    'is_new' => 1,
                    'views' => $i + 2,
                    'created_at' => '2018-08-08 01:14:0' . $i,
                    'updated_at' => '2018-08-08 01:14:0' . ($i + 15),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Samsung' . ' ' . str_random(7),
                    'price' => ($i + 1) . '000000',
                    'description' => $faker->text(150),
                    'promotion' => 300000,
                    'date_manufacture' => $faker->date(),
                    'user_id' => 3,
                    'manufacture_id' => 3,
                    'category_id' => 11,
                    'back_camera' => $i + 2,
                    'front_camera' => 8,
                    'ram' => 4,
                    'cpu' => 'Apple A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 32,
                    'battery' => 4000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 7.0',
                    'status' => 1,
                    'is_new' => 1,
                    'views' => $i + 5,
                    'created_at' => '2018-10-08 01:14:0' . $i,
                    'updated_at' => '2018-10-08 01:14:0' . ($i + 15),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Iphone' . ' ' . str_random(7),
                    'price' => ($i + 2) . '000000',
                    'description' => $faker->text(150),
                    'promotion' => 300000,
                    'date_manufacture' => $faker->date(),
                    'user_id' => 4,
                    'manufacture_id' => 4,
                    'category_id' => 8,
                    'back_camera' => $i + 2,
                    'front_camera' => 8,
                    'ram' => 3,
                    'cpu' => 'Apple A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 128,
                    'battery' => 4000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 7.0',
                    'status' => 1,
                    'is_new' => 0,
                    'views' => $i + 2,
                    'created_at' => '2018-11-08 01:14:0' . $i,
                    'updated_at' => '2018-11-08 01:14:0' . ($i + 15),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Meizu' . ' ' . str_random(7),
                    'price' => ($i + 5) . '000000',
                    'description' => $faker->text(150),
                    'promotion' => 300000,
                    'date_manufacture' => $faker->date(),
                    'user_id' => $i + 1,
                    'manufacture_id' => 2,
                    'category_id' => 13,
                    'back_camera' => $i + 2,
                    'front_camera' => 8,
                    'ram' => 3,
                    'cpu' => 'Apple A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 128,
                    'battery' => 4000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 7.0',
                    'status' => 0,
                    'is_new' => 1,
                    'views' => 0,
                    'created_at' => '2018-08-08 01:14:0' . $i,
                    'updated_at' => '2018-08-08 01:14:0' . ($i + 15),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Sony' . ' ' . str_random(7),
                    'price' => ($i + 7) . '000000',
                    'description' => $faker->text(150),
                    'promotion' => 300000,
                    'date_manufacture' => $faker->date(),
                    'user_id' => $i + 1,
                    'manufacture_id' => 2,
                    'category_id' => 12,
                    'back_camera' => $i + 4,
                    'front_camera' => 8,
                    'ram' => 4,
                    'cpu' => 'Mediatek A11 Bio',
                    'sim' => '1 nano sim',
                    'memory' => 32,
                    'battery' => 3000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 8.0',
                    'status' => 2,
                    'is_new' => 1,
                    'views' => 0,
                    'created_at' => '2018-10-08 01:14:0' . $i,
                    'updated_at' => '2018-10-08 01:14:0' . ($i + 15),
                ]);
        }
    }
}
