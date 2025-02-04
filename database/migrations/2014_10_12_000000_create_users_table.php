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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum("role", ["admin", "customer"]);
            $table->string('koordinat', 100);
            $table->string("alamat", 120);
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->rememberToken();
            $table->timestamps();

            // $table->foreignId("kategoriId")->constrained(
            //     table: "kategori",
            //     indexName: "user_to_kategori"
            // );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
