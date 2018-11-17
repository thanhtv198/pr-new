<?php

use Illuminate\Database\Seeder;

class WishlistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('wishlists')->insert([
                'user_id' => $i+1,
                'product_id' => $i+1,
            ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('wishlists')->insert([
                'user_id' => $i+1,
                'product_id' => $i+10,
            ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('wishlists')->insert([
                'user_id' => $i+1,
                'product_id' => $i+2,
            ]);
        }
    }
}
