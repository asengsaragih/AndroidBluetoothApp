<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->unsignedBigInteger('id_matkul');
            $table->unsignedBigInteger('id_dosen');

            $table->foreign('id_matkul')
                ->references('id')
                ->on('matkuls')
                ->onDelete('cascade');

            $table->foreign('id_dosen')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->primary(['id_matkul', 'id_dosen']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosens');
    }
}
