<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pap_id');
            $table->unsignedInteger('account_code_id');
            $table->string('description');
            $table->timestamps();

            $table->foreign('pap_code_id')->references('id')->on('pap_codes');
            $table->foreign('account_code_id')->references('id')->on('acount_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
