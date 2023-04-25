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
        Schema::create('videogames', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger("id")->primary();
            $table->string("title")->unique();
            // $table->string('slug')->unique();
            $table->timestamp("release_date");
            $table->timestamp("updated_date");
            $table->string("additions");
            // $table->boolean("followed")->default(false);
            $table->string("image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videogames');
    }
};
