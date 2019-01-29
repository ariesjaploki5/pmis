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
            $table->integer('request_quantity')->nullable();
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('unit_of_issue_id')->nullable();
            $table->unsignedInteger('purchase_request_id')->nullable();

            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('purchase_request_id')->references('id')->on('purchase_requests');
            $table->foreign('unit_of_issue_id')->references('id')->on('unit_of_issues');
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
