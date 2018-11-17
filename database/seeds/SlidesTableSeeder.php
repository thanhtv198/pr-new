<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
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
        for ($i = 1; $i < $limit; $i++) {
            DB::table('slides')->insert([
                'title' => $faker->text(10),
                'image' => 'banner'.$i.'.jpg',
            ]);
        }
    }
}
