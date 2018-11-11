<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Iphone',
        ]);
        DB::table('categories')->insert([
            'name' => 'Xiaomi',
        ]);
        DB::table('categories')->insert([
            'name' => 'Samsung',
        ]);
        DB::table('categories')->insert([
            'name' => 'Sony ',
        ]);
        DB::table('categories')->insert([
            'name' => 'Meizu ',
        ]);
        DB::table('categories')->insert([
            'name' => 'Oppo ',
        ]);


        DB::table('categories')->insert([
            'name' => 'Iphone 6',
            'parent_id' => 1,
        ]);

        DB::table('categories')->insert([
            'name' => 'Iphone X',
            'parent_id' => 1,
        ]);


        DB::table('categories')->insert([
            'name' => 'Redmi Note',
            'parent_id' => 2,
        ]);
        DB::table('categories')->insert([
            'name' => 'Mi Note',
            'parent_id' => 2,
        ]);

        DB::table('categories')->insert([
            'name' => 'Samsung Galaxy',
            'parent_id' => 3,
        ]);

        DB::table('categories')->insert([
            'name' => 'Sony Experia',
            'parent_id' => 4,
        ]);

        DB::table('categories')->insert([
            'name' => 'Meizu Note',
            'parent_id' => 5,
        ]);

        DB::table('categories')->insert([
            'name' => 'Oppo M',
            'parent_id' => 6,
        ]);
    }
}