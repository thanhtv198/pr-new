<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
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
        for ($i = 0; $i <= $limit; $i++) {
            DB::table('topics')->insert([
                'name' =>  $faker->unique()->sentence($nbWords = 4),
                'slug' => str_slug($faker->unique()->sentence($nbWords = 4)),
                'parent_id' => null,
                'status' => config('model.topic.status.active')
            ]);
        }
    }
}
