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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()->index('fk_order_member_to_users');
            $table->foreignId('mentor_id')->nullable()->index('fk_order_mentor_to_users');
            // $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->integer('price');
            $table->boolean('is_paid')->default(false);
            $table->string('midtrans_url')->nullable();
            $table->string('midtrans_token')->nullable();
            $table->string('midtrans_status')->nullable();
            // $table->date('expired_at')->nullable(); //
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
        Schema::dropIfExists('orders');
    }
};
