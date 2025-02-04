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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->enum("status", ["pengemasan", "dikirim", "selesai", "batal"]);
            $table->integer("total_harga");
            $table->timestamps();

            $table->foreignId("user_id")
                ->constrained(table: "users", column: "id", indexName: "pesanan_to_user");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
