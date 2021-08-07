<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tel')->unique();
            $table->smallInteger('is_admin')->default(0);
            $table->smallInteger('is_suspended')->default(0);
            $table->text("lines")->nullable();
            $table->integer("zip_code")->unique()->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('avatar')->default("avatar5.png");
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
        Schema::dropIfExists('users');
    }
}