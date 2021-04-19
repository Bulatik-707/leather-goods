<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Заказ
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->enum('deliverymethod', ['Самовывоз', 'Почта России', 'CDEK']);
            $table->enum('orderstatus', ['Новый', 'Подтвержден', 'Отменен', 'Выполняется', 'Выполнен']);
            $table->string('city');
            $table->string('address');
            $table->string('index');
            $table->text('note'); //Комент к заказу
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
