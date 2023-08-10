<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitylogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitylogs', function (Blueprint $table) {
            $table->id();
            $table->string('file_id')->nullable();
            $table->string('client_name')->nullable();
            $table->string('agent_log')->nullable();
            $table->string('sales_log')->nullable();
            $table->string('agent_id')->nullable();
            $table->string('sales_id')->nullable();
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
        Schema::dropIfExists('activitylogs');
    }
}
