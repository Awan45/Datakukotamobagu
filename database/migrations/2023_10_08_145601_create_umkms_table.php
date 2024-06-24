<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->uuid('id')->primary;
            $table->string('umkm_name',150);
            $table->string('owner_nik', 50);
            $table->string('district', 50);
            $table->string('subdistrict', 50);
            $table->text('address');
            $table->string('rt_rw', 10)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('business_field', 100);
            $table->string('legal_document', 100)->nullable();
            $table->string('asset', 100)->nullable();
            $table->double('monthly_turnover')->default(0);
            $table->double('year_turnover')->default(0);
            $table->date('date_establish')->nullable();
            $table->integer('total_manpower')->default(1);
            $table->string('business_category', 50);
            $table->string('subsidies_type', 100);
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
        Schema::dropIfExists('umkms');
    }
}
