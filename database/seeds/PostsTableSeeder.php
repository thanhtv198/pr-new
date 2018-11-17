<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
            $post = \App\Models\Post::create([
                'user_id' => $i + 1,
                'title' => $faker->unique()->sentence($nbWords = 15),
                'slug' => str_slug($faker->unique()->sentence($nbWords = 15)),
                'content' => $faker->unique()->sentence($nbWords = 500),
                'status' => config('model.post.status.active'),
                'view' => config('model.post.view'),
            ]);

            $post->tags()->sync($faker->numberBetween(1, 10));
            $post->topics()->sync($faker->numberBetween(1, 5));
        }
    }
}
