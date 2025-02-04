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
        Schema::create('item_dipesans', function (Blueprint $table) {
            $table->id();
            $table->integer("kuantitas");
            $table->integer("harga");
            $table->timestamps();

            $table->foreignId("item_id")
                ->constrained("items", "id", "item_dipesan_to_item");

            $table->foreignId("pesanan_id")
                ->constrained("pesanans", "id", "item_dipesan_to_pesanan");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_dipesans');
    }
};
