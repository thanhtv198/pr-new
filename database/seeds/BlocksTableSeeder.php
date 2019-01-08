<?php

use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 5; $i++) {
            \App\Models\Block::create([
                'blockable_id' => $i + 25,
                'blockable_type' => 'App\Models\Product',
                'reason' => 'sorry, your image is not right',
            ]);
        }
    }
}
