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
        Schema::create('stock_price', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->index();
            $table->dateTime('date');
            $table->integer('open');
            $table->integer('high');
            $table->integer('low');
            $table->integer('close');
            $table->unsignedBigInteger('volume');
            $table->integer('short_moving_average')->nullable();
            $table->integer('middle_moving_average')->nullable();
            $table->integer('long_moving_average')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_price');
    }
};
