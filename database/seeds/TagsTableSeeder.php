<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tags')->insert([
                'name' => $faker->unique()->sentence($nbWords = 1),
                'slug' => $faker->unique()->slug(1),
                'view' => config('model.tag.view')
            ]);
        }
    }
}
