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
        Schema::create('Invoices', function (Blueprint $table) {
            $table->string('invoice_id', 30)->primary();
            $table->integer('invoice_user_id')->unsigned();
            $table->string('invoice_user_phone');
            $table->string('invoice_user_address');
            $table->string('invoice_user_email');
            $table->string('invoice_status');
            $table->bigInteger('invoice_total_money')->unsigned();
            $table->bigInteger('invoice_total_product')->unsigned();
            $table->foreign('invoice_user_id')->references('user_id')->on('Users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Invoices');
    }
};
