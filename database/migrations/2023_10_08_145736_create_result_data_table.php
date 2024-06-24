<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_data', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_umkm');
            $table->uuid('id_rules');
            $table->string('td_name', 100);
            $table->double('yearly_turnover')->default(1);
            $table->integer('business_age')->default(1);
            $table->integer('total_manpower')->default(1);
            $table->enum('status', ['Layak', 'Tidak Layak'])->default('Tidak Layak');
            $table->enum('is_include', ['Yes', 'No'])->default('Yes');
            

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
        Schema::dropIfExists('result_data');
    }
}
