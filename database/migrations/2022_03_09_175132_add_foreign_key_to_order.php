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
        Schema::table('orders', function (Blueprint $table) {
            // $table->foreignId('member_id','fk_order_member_to_users')->constrained('id')->onDelete('cascade');
            $table->foreign('member_id', 'fk_order_member_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mentor_id', 'fk_order_mentor_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('mentor_id','fk_order_mentor_to_users')->constrained('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('fk_order_member_to_users');
            $table->dropForeign('fk_order_mentor_to_users');
        });
    }
};
