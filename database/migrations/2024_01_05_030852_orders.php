<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('order_code', 30);
            $table->string('produce_name');
            $table->integer('produce_id')->unsigned();
            $table->integer('produce_qty');
            $table->foreign('order_code')->references('invoice_id')->on('Invoices')->onDelete('cascade');
            $table->foreign('produce_id')->references('product_id')->on('Products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Orders');
    }
};
