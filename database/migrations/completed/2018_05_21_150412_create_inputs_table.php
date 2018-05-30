<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkp_inputs', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('input_group_id')->nullable();
			$table->string('input_name')->unique();
			$table->string('input_value')->nullable();
			$table->string('input_label')->nullable();
			$table->text('input_description')->nullable();
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
        Schema::dropIfExists('lkp_inputs');
    }
}
