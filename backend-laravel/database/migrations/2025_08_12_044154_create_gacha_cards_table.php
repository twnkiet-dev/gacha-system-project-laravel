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
        Schema::create('gacha_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gacha_id');
            $table->unsignedInteger('card_id');
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('rate',5,4);
            $table->unsignedInteger('position');
            $table->timestamps();
            $table->foreign('gacha_id')->references('id')->on('gachas')->onDelete('cascade');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gacha_cards');
    }
};
