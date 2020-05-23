<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('avatar')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->string('email')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->string('complement')->nullable();
            $table->string('strict')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('number')->nullable();
            $table->date('register')->default(date('Y-m-d'));
            $table->boolean('agree')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
