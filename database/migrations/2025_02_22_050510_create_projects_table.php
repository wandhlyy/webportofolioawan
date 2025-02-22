<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Judul proyek
        $table->text('description'); // Deskripsi proyek
        $table->string('author'); // Nama pembuat proyek
        $table->date('project_date'); // Kolom untuk input tanggal manual
        $table->string('image')->nullable(); // Gambar proyek
        $table->timestamps(); // created_at & updated_at otomatis dari Laravel
    });
}


    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
