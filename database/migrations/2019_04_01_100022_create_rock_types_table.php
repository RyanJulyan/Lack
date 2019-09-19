<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRockTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rock_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('density', 38, 19);
			$table->enum('hardness', ['Soft', 'Medium', 'Hard'])->nullable();
			$table->bigInteger('created_user_id')->unsigned()->index();
            $table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');
			$table->bigInteger('updated_by_user_id')->unsigned()->index();
            $table->foreign('updated_by_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('rock_types');
    }
}
