<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registraion_no')->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->date('dob')->nullable();
            $table->boolean('gender')->comment('1=Male, 2=Female')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->tinyInteger('category')->nullable();
            $table->tinyInteger('course')->nullable();
            $table->string('photo')->nullable();
            $table->string('sign')->nullable();
            $table->tinyInteger('present_address_id')->nullable();
            $table->tinyInteger('permanent_address_id')->nullable();
            $table->tinyInteger('status')->comment('1=Enable, 2=Disable')->default(1);
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
        Schema::dropIfExists('students');
    }
}
