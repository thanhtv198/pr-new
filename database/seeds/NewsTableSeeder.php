<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $limit = 20;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('news')->insert([
                'title' =>  $faker->unique()->sentence($nbWords = 12),
                'image' => $i . '.jpg',
                'content' =>  $faker->unique()->sentence($nbWords = 500),
                'view' => $i,
            ]);
        }
    }
}
