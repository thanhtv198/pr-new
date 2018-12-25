<?php

use Illuminate\Database\Seeder;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 10; $i++) {
            \App\Models\OrderDetail::create([
                'user_id' => $i +1,
                'order_id' => $faker->randomElement(\App\Models\Order::pluck('id')),
                'product_id' => $faker->numberBetween(1,30),
                'quantity' => 1,
                'price' => $i +1 .'000000',
                'status' => 1,
                'created_at' => '2018-12-08 01:14:01',
                'updated_at' => '2018-12-08 01:14:01',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            \App\Models\OrderDetail::create([
                'user_id' => $i +1,
                'order_id' => $faker->randomElement(\App\Models\Order::pluck('id')),
                'product_id' => $faker->numberBetween(1,30),
                'quantity' => 1,
                'price' => $i +1 .'000000',
                'status' => 0,
                'created_at' => '2018-12-08 01:14:01',
                'updated_at' => '2018-12-08 01:14:01',
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            \App\Models\OrderDetail::create([
                'user_id' => $i +1,
                'order_id' => $faker->randomElement(\App\Models\Order::pluck('id')),
                'product_id' => $faker->numberBetween(1,30),
                'quantity' => 1,
                'price' => $i +1 .'000000',
                'status' => 1,
                'created_at' => '2018-11-08 01:14:01',
                'updated_at' => '2018-11-08 01:14:01',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            \App\Models\OrderDetail::create([
                'user_id' => $i +1,
                'order_id' => $faker->randomElement(\App\Models\Order::pluck('id')),
                'product_id' => $faker->numberBetween(1,30),
                'quantity' => 1,
                'price' => $i + 3 .'000000',
                'status' => 2,
                'created_at' => '2018-10-08 01:14:01',
                'updated_at' => '2018-10-08 01:14:01',
            ]);
        }
    }
}
