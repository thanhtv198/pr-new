<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'supper admin',
        ]);

        DB::table('roles')->insert([
            'role' => 'manager',
        ]);

        DB::table('roles')->insert([
            'role' => 'member',
        ]);
    }
}
