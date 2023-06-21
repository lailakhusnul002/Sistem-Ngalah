<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violationas', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('student_id')->unique()->constrained('students');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('jeniskelamin',['lelaki','perempuan']);
            $table->string('pelanggaran');
            $table->enum('jenispelanggaran',['ringan','sedang','berat']);
            $table->string('hukuman');
            $table->string('foto');
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
        Schema::dropIfExists('violationas');
    }
}
