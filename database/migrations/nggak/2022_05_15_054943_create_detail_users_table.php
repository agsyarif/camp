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
        Schema::create('detail_users', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('contact_number')->nullable();
            $table->bigInteger('skill_id')->unsigned()->nullable();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->foreignId('user_role_id')->constrained()->default(2);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::table('detail_users', function (Blueprint $table) {
        //     $table->foreign('skill_id')
        //         ->references('id')
        //         ->on('skills')
        //         ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_users');
    }
};
