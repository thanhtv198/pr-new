<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        $limit = 15;

        for ($i = 0; $i < $limit; $i++) {
            \App\Models\Order::create([
                'buyer_id' => $i,
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'phone_number' => '083027923',
                'city_id' => $i +1,
                'address' => $faker->address,
                'total' => $i + 10 .'000000',
                'note' =>$faker->unique()->sentence(10),
                'created_at' => $faker->date(),
                'updated_at' => $faker->date(),
            ]);
        }
    }
}
