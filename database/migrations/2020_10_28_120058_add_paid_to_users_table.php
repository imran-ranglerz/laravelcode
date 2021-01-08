<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('date_of_birth')->after('email');
            $table->string('cnic')->after('date_of_birth');
            $table->string('phone')->after('cnic');
            $table->string('ucaddress')->after('phone');
            $table->string('number_of_votes')->after('ucaddress');
            $table->string('image')->after('number_of_votes');
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
            //
        });
    }
}
