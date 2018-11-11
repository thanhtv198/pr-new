<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Edit01UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('status')->after('name')->default(config('model.user.status.active'));
            $table->integer('block_id')->after('name')->nullable();
            $table->integer('city_id')->unsigned()->after('name')->nullable();
            $table->string('address')->after('name')->nullable();
            $table->integer('role_id')->unsigned()->after('name')->nullable();
            $table->string('avatar')->after('name')->nullable();
            $table->date('birthday')->after('name')->nullable();
            $table->string('phone_number')->after('name')->nullable();
            $table->string('provider_id')->nullable()->after('name');
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
//            $table->string('password')->change();
//            $table->string('email')->unique()->change();
//            $table->dropColumn('deleted_at');
//            $table->dropColumn('status');
//            $table->dropColumn('role_id');
//            $table->dropColumn('birthday');
//            $table->dropColumn('provider_id');
//            $table->dropColumn('avatar');
        });
    }
}
