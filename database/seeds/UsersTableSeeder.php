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
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Minh Huệ',
            'email' => 'a@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 3,
            'role_id' => 2,
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nam hà',
            'email' => 'b@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 4,
            'role_id' => 2,
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tú linh',
            'email' => 'c@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 6,
            'role_id' => 3,
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nam hà',
            'email' => 'nam@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 2,
            'role_id' => 3,
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tú linh',
            'email' => 'd@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 5,
            'role_id' => 3,
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nam hà',
            'email' => 'f@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 4,
            'role_id' => 3,
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tú linh',
            'email' => 'm@gmail.com',
            'phone_number' => '0982682632',
            'birthday' => '1994-12-12',
            'address' => 'nam ha',
            'city_id' => 5,
            'role_id' => 3,
            'password' => bcrypt('123456'),
        ]);

    }
}
