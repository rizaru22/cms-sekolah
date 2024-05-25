<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('konten', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_article');
            $table->unsignedBigInteger('id_categori');
            $table->unsignedBigInteger('id_major');
            $table->unsignedBigInteger('id_teacher');
            $table->unsignedBigInteger('id_student');
            $table->unsignedBigInteger('id_slide');
            $table->unsignedBigInteger('id_school_profile');
            $table->unsignedBigInteger('id_sejarah_sekolah');
            $table->unsignedBigInteger('id_visi_misi');
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_page');
            $table->unsignedBigInteger('id_prestasi');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_article')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('id_categori')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('id_major')->references('id')->on('majors')->onDelete('cascade');
            $table->foreign('id_teacher')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('id_student')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('id_slide')->references('id')->on('slides')->onDelete('cascade');
            $table->foreign('id_school_profile')->references('id')->on('school_profiles')->onDelete('cascade');
            $table->foreign('id_sejarah_sekolah')->references('id')->on('sejarah_sekolahs')->onDelete('cascade');
            $table->foreign('id_visi_misi')->references('id')->on('visi_misis')->onDelete('cascade');
            $table->foreign('id_menu')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('id_page')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('id_prestasi')->references('id')->on('prestasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konten', function (Blueprint $table) {
            $table->dropForeign(['id_user', 'id_article', 'id_categori', 'id_major', 'id_teacher', 'id_student', 'id_slide', 'id_school_profile', 'id_sejarah_sekolah', 'id_visi_misi', 'id_menu', 'id_page', 'id_prestasi']);
        });

        Schema::dropIfExists('konten');
    }
};
