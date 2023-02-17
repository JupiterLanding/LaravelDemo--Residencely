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
            $table->string("company")->nullable();
            $table->boolean('profile_visibility')->default('1')->after("company")->nullable();
            $table->string('city')->after('profile_visibility')->nullable();
            $table->string('state')->after('city')->nullable();
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
            $table->dropColumn("company");
            $table->dropColumn("profile_visibility");
            $table->dropColumn("city");
            $table->dropColumn("state");
        });
    }
};
