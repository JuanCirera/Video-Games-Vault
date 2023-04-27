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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->text("body");
            $table->boolean("rating");
            $table->bigInteger("likes")->default(0);
            $table->bigInteger("dislikes")->default(0);
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->bigInteger("videogame_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');

        // Schema::table('reviews', function (Blueprint $table){
        //     $table->dropForeign('reviews_videogame_id_foreign');
        //     $table->dropIndex('reviews_videogame_id_index');
        //     $table->dropColumn('videogame_id');
        // });

    }
};
