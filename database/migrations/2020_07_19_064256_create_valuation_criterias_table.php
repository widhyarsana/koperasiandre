<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuationCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valuation_criterias', function (Blueprint $table) {
            $table->id();

            $table->double('criteria_value');
            $table->double('subcriteria_value');
            $table->double('total');
            $table->unsignedBigInteger('valuation_id');
            $table->unsignedBigInteger('criteria_id');
            $table->unsignedBigInteger('subcriteria_id');

            $table->foreign('valuation_id')->references('id')->on('valuations')->onDelete('cascade');
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->foreign('subcriteria_id')->references('id')->on('sub_criterias')->onDelete('cascade');

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
        Schema::dropIfExists('valuation_criterias');
    }
}
