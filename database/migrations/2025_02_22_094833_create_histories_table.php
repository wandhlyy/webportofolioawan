<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID user yang menambahkan proyek
            $table->string('user_email'); // Email user yang login
            $table->string('author'); // Nama pembuat proyek
            $table->string('project_title'); // Judul proyek
            $table->date('project_date'); // Tanggal proyek yang diinputkan user
            $table->enum('status', ['valid', 'in process', 'tidak valid']); // Status proyek
            $table->timestamps();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('histories');
    }
};
