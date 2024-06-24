<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaiveBayesRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naive_bayes_rules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('rules_name', 50);
            $table->enum('turnover_opt', ['<','>','<=','>='])->default('>');
            $table->enum('business_age_opt', ['<','>','<=','>='])->default('>');
            $table->enum('total_manpower_opt', ['<','>','<=','>='])->default('>');
            $table->double('turnover_value')->default(1);
            $table->double('business_age_value')->default(1);
            $table->integer('total_manpower_value')->default(1);
            
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
        Schema::dropIfExists('naive_bayes_rules');
    }
}
