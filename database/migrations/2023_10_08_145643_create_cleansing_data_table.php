<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleansingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleansing_data', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_umkm');
            $table->uuid('id_rules');
            $table->enum('source', ['training', 'real'])->default('real');
            $table->enum('yearly_turnover', ['Yes', 'No'])->default('No');
            $table->enum('business_age', ['Yes', 'No'])->default('No');
            $table->enum('total_manpower', ['Yes', 'No'])->default('No');
            $table->enum('status', ['Layak', 'Tidak Layak','Not Include'])->default('Tidak Layak');

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
        Schema::dropIfExists('cleansing_data');
    }
}
