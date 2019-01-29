<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemRequestItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_request_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->nullable();
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('request_item_id');
            $table->unsignedInteger('unit_of_issue_id');
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('request_item_id')->references('id')->on('request_items');
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
        Schema::dropIfExists('item_request_item');
    }
}
