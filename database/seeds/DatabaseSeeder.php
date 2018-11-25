<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::query()->truncate();
        \App\Models\Question::query()->truncate();
        \App\Models\Post::query()->truncate();
        \App\Models\Role::query()->truncate();
        \App\Models\Topic::query()->truncate();
        \App\Models\Respond::query()->truncate();
        \App\Models\News::query()->truncate();
        \App\Models\OrderDetail::query()->truncate();
        \App\Models\Image::query()->truncate();
        \App\Models\User::query()->truncate();
        \App\Models\Order::query()->truncate();
        \App\Models\City::query()->truncate();
        \App\Models\Slide::query()->truncate();
        \App\Models\Category::query()->truncate();
        \App\Models\Manufacture::query()->truncate();
        \App\Models\Product::query()->truncate();
        \App\Models\CustomizeProduct::query()->truncate();
        \App\Models\Wishlist::query()->truncate();
        \App\Models\Rating::query()->truncate();
        \App\Models\OrderDetail::query()->truncate();
        \App\Models\Order::query()->truncate();
        \App\Models\Comment::query()->truncate();

        $this->call(TopicsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SlidesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ManufacturesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(RespondsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(WishlistsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderDetailTableSeeder::class);
    }
}
