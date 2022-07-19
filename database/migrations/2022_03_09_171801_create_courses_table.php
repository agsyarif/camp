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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->string('slug');
            $table->text('image')->nullable();
            $table->integer('price')->default(0);
            $table->text('description')->nullable();
            $table->foreignId('course_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('level_id')->constrained();
            $table->boolean('is_published')->default(false); // untuk menandakan bahwa course ini sudah di publish
            $table->boolean('is_active')->default(false); // untuk menandakan bahwa course ini sudah diaktifkan atau belum oleh member
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
