<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('price');
            $table->text('description')->nullable();
            $table->string('promotion')->nullable();
            $table->date('date_manufacture')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('manufacture_id')->unsigned();
            $table->string('screen')->nullable();
            $table->string('os')->nullable();
            $table->float('back_camera')->nullable();
            $table->float('front_camera')->nullable();
            $table->integer('ram')->nullable();
            $table->string('cpu')->nullable();
            $table->string('sim')->nullable();
            $table->integer('memory')->nullable();
            $table->integer('battery')->nullable();
            $table->integer('status')->default(config('model.product.status.inactive'));
            $table->integer('views')->default(config('model.product.status.view'));
            $table->integer('block_id')->unsigned()->nullable();
            $table->softDeletesTz();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
