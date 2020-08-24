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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('oid')->primary();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal');
            $table->bigInteger('phone');
            $table->string('email');
            $table->decimal('total', 10, 2);
            $table->decimal('taxes', 10, 2);
            $table->decimal('shipping_fee', 10, 2);
            $table->string('shipping_company')->nullable($value = true);
            $table->string('sid')->unique()->nullable($value = true);
            $table->text('description');
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
        Schema::dropIfExists('orders');
    }
}
