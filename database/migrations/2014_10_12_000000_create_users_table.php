<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->string('username')->unique();

            $table->string('password',60);

            $table->boolean('Admin');

            $table->string('nom');

            $table->string('prenom');

            $table->integer('struct_id')->unsigned();

            $table->foreign('struct_id')
                ->references('id')
                ->on('structures')
                ->onDelete('restrict')
                ->onUpdate('restrict');

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
