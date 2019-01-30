<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->nullable();
            $table->text('description')->nullable();
            $table->integer('total_quantity')->nullable();
            $table->integer('account_code')->nullable();
            $table->unsignedInteger('pap_code_id')->nullable();

            $table->timestamps();
            $table->foreign('pap_code_id')->references('id')->on('pap_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
