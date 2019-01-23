<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->string('purpose');
            $table->integer('stock_no');
            $table->date('date');
            $table->unsignedInteger('unit_of_issue_id');
            $table->unsignedInteger('supply_id');
            $table->timestamps();


            $table->foreign('unit_of_issue_id')->references('id')->on('unit_of_issues');
            $table->foreign('supply_id')->references('id')->on('supplies');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_items');
    }
}
