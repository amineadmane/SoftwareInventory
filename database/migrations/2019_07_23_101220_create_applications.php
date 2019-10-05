<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {

            $table->integer('id');

            $table->string('nom');

            $table->string('description');

            $table->string('Nver');

            $table->string('editeur');

            $table->dateTime('DMP');

            $table->dateTime('DDM');

            $table->string('nomserveur');

            $table ->string('adressIP');

            $table->string('OS');

            $table->string('verOS');

            $table->string('DB');

            $table->string('verDB');

            $table->string('typeapp');

            $table->string('adsys');

            $table->string('adbd');

            $table->string('user_id');

            $table->string('admetier');

            $table->integer('struct_id')->unsigned();

            $table->foreign('struct_id')
                ->references('id')
                ->on('structures')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->primary(array('id', 'DDM'));

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
        Schema::dropIfExists('applications');
    }
}
