<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_data', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_umkm')->nullable();
            $table->string('td_name', 100);
            $table->double('year_turnover')->default(0);
            $table->integer('business')->default(1);
            $table->integer('total_manpower')->default(1);
            $table->enum('status', ['Layak', 'Tidak Layak'])->default('Tidak Layak');
            $table->enum('is_include', ['Yes', 'Not'])->default('Yes');
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
        Schema::dropIfExists('training_data');
    }
}
