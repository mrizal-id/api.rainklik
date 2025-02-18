<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary key ID
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('cover');
            $table->string('category');
            $table->string('tags')->nullable(); // Kolom untuk tags, bisa null jika tidak ada
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Kolom untuk ID user yang mengirim, foreign key
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
