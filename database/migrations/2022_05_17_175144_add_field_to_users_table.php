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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_role_id')->default(3)->after('email');
            $table->foreign('user_role_id')->references('id')->on('user_roles');
            $table->unsignedBigInteger('skill_id')->nullable()->after('user_role_id');
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->string('contact_number')->nullable()->after('skill_id');
            $table->text('description')->nullable()->after('contact_number');
            $table->boolean('is_active')->default(false)->after('profile_photo_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropForeign(['user_role_id']);
            // $table->dropForeign(['skill_id']);
            $table->dropColumn('user_role_id');
            $table->dropColumn('skill_id');
            $table->dropColumn('contact_number');
            $table->dropColumn('description');
            $table->dropColumn('is_active');
        });
    }
};
