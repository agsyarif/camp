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
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->text('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->default(0);
            $table->integer('kuota');
            $table->dateTime('start_date'); // untuk menyimpan waktu mulai webinar
            $table->dateTime('end_date'); // untuk menyimpan waktu selesai webinar
            $table->text('link_live')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars');
    }
};
