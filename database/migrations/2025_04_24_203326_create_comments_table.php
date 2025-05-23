<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()//: void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment'); //  Required fro text to be generated within it
          //  $table->text('content'); // Content of the comment.
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Foreign key to the post.
            $table->timestamps();
            $table->string('commenter_name');

                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
