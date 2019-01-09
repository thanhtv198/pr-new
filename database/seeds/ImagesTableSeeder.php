<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($j = 1; $j <= 50; $j++) {
            for ($i = 0; $i < 4; $i++) {
                DB::table('images')->insert([
                    'product_id' => $j,
                    'image' => $i . '.jpg',
                    'number' => $i,
                ]);
            }
        }
    }
}
