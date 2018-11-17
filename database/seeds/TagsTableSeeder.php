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
        $faker = Faker\Factory::create('vi_VN');

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tags')->insert([
                'name' => $faker->unique()->sentence($nbWords = 2),
                'slug' => str_slug($faker->unique()->sentence($nbWords = 2)),
                'view' => config('model.tag.view')
            ]);
        }
    }
}
