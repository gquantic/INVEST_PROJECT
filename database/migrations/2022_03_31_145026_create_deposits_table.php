<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('amount');

            $table->text('comment')->nullable()->comment('Комментарий к депозиту');
            $table->text('deposit_type')->comment('Обычный депозит с возможностью снять средства.');
            $table->timestamp('deposit_until')->default(\Carbon\Carbon::now()->addMonth(1))->comment('До какого числа внесён депозит');

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
        Schema::dropIfExists('deposits');
    }
}
