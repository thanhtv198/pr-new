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
        $faker = Faker\Factory::create();

        $limit = 5;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('topics')->insert([
                'name' => $faker->unique()->sentence($nbWords = 3),
                'slug' => $faker->unique()->slug(4),
                'parent_id' => null,
                'status' => config('model.topic.status.active')
            ]);
        }
    }
}
