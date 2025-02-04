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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('harga');
            $table->integer('stok', false, true);
            $table->string('image', 100);
            $table->timestamps();

            $table->foreignId("kategori_id")->constrained(table: "kategoris", indexName: "item_to_kategori", column: "id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
