<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoperasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koperasis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('k_name', 75)->nullable();
            $table->date('legal_entity_date');
            $table->string('legal_entity_number', 75);
            $table->string('district', 50);
            $table->string('subdistrict', 50);
            $table->text('address');
            $table->enum('certificate_status', ['Belum', 'Sudah'])->default('Belum');
            $table->enum('k_type', ['KSU', 'KSP'])->default('KSU');
            $table->string('owner_nik', 50);
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koperasis');
    }
}
