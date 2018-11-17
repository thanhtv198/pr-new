<?php

use Illuminate\Database\Seeder;

class RespondsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        DB::table('responds')->insert([
            'user_id' => 2,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' =>  $faker->text(50),
        ]);
        DB::table('responds')->insert([
            'user_id' => 6,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' =>  $faker->text(50),
            'status' => 0,
        ]);
        DB::table('responds')->insert([
            'user_id' => 4,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' =>  $faker->text(50),
            'status' => 0,
        ]);
        DB::table('responds')->insert([
            'user_id' => 5,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' =>  $faker->text(50),
            'status' => 0,
        ]);
        DB::table('responds')->insert([
            'user_id' => 4,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' =>  $faker->text(100),
            'status' => 0,
        ]);
        DB::table('responds')->insert([
            'user_id' => 6,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' =>  $faker->text(100),
            'status' => 0,
        ]);
    }
}
