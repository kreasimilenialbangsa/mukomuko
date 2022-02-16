<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->id('id');
            $table->integer('user_id');
            $table->string('type');
            $table->integer('type_id');
            $table->integer('location_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('message');
            $table->integer('total_donate');
            $table->integer('is_anonim');
            $table->integer('is_confirm');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donates');
    }
}
