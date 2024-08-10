<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000);
            $table->string('slug')->uniqie();
            $table->text('content')->nullable();
            $table->boolean('is_published')->default(false);
            $table->unsignedBigInteger('post_owner_id'); // Set up foreign key constraint
            $table->timestamps();

            // Set up foreign key constraint
            $table->foreign('post_owner_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }

};
