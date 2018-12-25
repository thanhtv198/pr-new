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
        for($i=1; $i< 20; $i ++) {
            DB::table('responds')->insert([
                'user_id' => $i,
                'title' => $faker->sentence(10),
                'content' =>  $faker->sentence(50),
            ]);
        }
    }
}
