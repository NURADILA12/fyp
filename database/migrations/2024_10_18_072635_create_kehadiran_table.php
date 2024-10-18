<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehadiranTable extends Migration
{
    public function up()
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->date('date');
            $table->string('status');
            $table->timestamps();

            // Foreign key untuk student_id
            $table->foreign('student_id')->references('id')->on('pelajar')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kehadiran');
    }
}
