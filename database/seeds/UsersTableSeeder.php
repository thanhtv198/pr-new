<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Thanh Trần',
            'email' => 'thanh@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 2,
            'role_id' => 1,
            'avatar' => '1.jpg',
            'password' => bcrypt('123456'),
            'created_at' => '2018-10-08 01:14:01',
            'updated_at' => '2018-10-08 01:14:01',
        ]);
        DB::table('users')->insert([
            'name' => 'Minh Huệ',
            'email' => 'a@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 3,
            'role_id' => 2,
            'avatar' => '2.jpg',
            'password' => bcrypt('123456'),
            'created_at' => '2018-10-08 01:14:01',
            'updated_at' => '2018-10-08 01:14:01',
        ]);
        DB::table('users')->insert([
            'name' => 'Nam hà',
            'email' => 'b@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 4,
            'avatar' => '3.jpg',
            'role_id' => 2,
            'password' => bcrypt('123456'),
            'created_at' => '2018-11-08 01:14:01',
            'updated_at' => '2018-11-08 01:14:01',
        ]);
        DB::table('users')->insert([
            'name' => 'Tú linh',
            'email' => 'c@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 6,
            'role_id' => 3,
            'avatar' => '4.jpg',
            'password' => bcrypt('123456'),
            'created_at' => '2018-09-08 01:14:01',
            'updated_at' => '2018-09-08 01:14:01',
        ]);
        DB::table('users')->insert([
            'name' => 'Nam hà',
            'email' => 'nam@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 2,
            'role_id' => 3,
            'avatar' => '5.jpg',
            'password' => bcrypt('123456'),
            'created_at' => '2018-09-08 01:14:01',
            'updated_at' => '2018-09-08 01:14:01',
        ]);
        DB::table('users')->insert([
            'name' => 'Tú linh',
            'email' => 'd@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 5,
            'avatar' => '6.jpg',
            'role_id' => 3,
            'password' => bcrypt('123456'),
            'created_at' => '2018-10-08 01:14:01',
            'updated_at' => '2018-10-08 01:14:01',
        ]);
        DB::table('users')->insert([
            'name' => 'Nam hà',
            'email' => 'f@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 4,
            'role_id' => 3,
            'avatar' => '7.jpg',
            'password' => bcrypt('123456'),
            'created_at' => '2018-10-08 01:14:01',
            'updated_at' => '2018-10-08 01:14:01',
        ]);
        DB::table('users')->insert([
            'name' => 'Tú linh',
            'email' => 'm@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 5,
            'avatar' => '8.jpg',
            'role_id' => 3,
            'password' => bcrypt('123456'),
            'created_at' => '2018-12-08 01:14:01',
            'updated_at' => '2018-12-08 01:14:01',
        ]);

        $faker = Faker\Factory::create('vi_VN');
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'birthday' => $faker->date(),
                'address' => $faker->address,
                'city_id' => 7,
                'role_id' => 3,
                'avatar' => 'a.jpg',
                'password' => bcrypt('123456'),
                'created_at' => '2018-06-08 01:14:01',
                'updated_at' => '2018-06-08 01:14:01',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'birthday' => $faker->date(),
                'address' => $faker->address,
                'city_id' => 2,
                'role_id' => 3,
                'avatar' => 'a.jpg',
                'password' => bcrypt('123456'),
                'created_at' => '2018-11-08 01:14:01',
                'updated_at' => '2018-11-08 01:14:01',
            ]);
        }

        for ($i = 0; $i < 15; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'birthday' => $faker->date(),
                'address' => $faker->address,
                'city_id' => 4,
                'role_id' => 3,
                'avatar' => 'a.jpg',
                'password' => bcrypt('123456'),
                'created_at' => '2018-10-08 01:14:01',
                'updated_at' => '2018-10-08 01:14:01',
            ]);
        }

        for ($i = 0; $i < 15; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'birthday' => $faker->date(),
                'address' => $faker->address,
                'city_id' => 5,
                'role_id' => 3,
                'avatar' => 'a.jpg',
                'password' => bcrypt('123456'),
                'created_at' => '2018-12-08 01:14:01',
                'updated_at' => '2018-12-08 01:14:01',
            ]);
        }
    }
}
