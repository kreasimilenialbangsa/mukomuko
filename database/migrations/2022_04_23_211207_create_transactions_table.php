<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('type'); // Program atau Ziswaf
            $table->integer('type_id'); // ID Program atau ID Ziswaf
            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('message')->nullable(); // Keterangan atau DOA
            $table->integer('total_donate');
            $table->integer('is_anonim');
            $table->integer('is_confirm')->default(0); // 0 = Pending 1 = Success 2 = Fail
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
        Schema::dropIfExists('transactions');
    }
}
