<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_markets', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name')->index();
            $table->text('description')->nullable();
			$table->integer('lower_age')->index();
			$table->integer('upper_age')->index();
			$table->enum('gender', ['Male', 'Female', 'Other'])->index()->nullable();
            $table->string('job_title')->index()->nullable();
            $table->string('education')->index()->nullable();
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
        Schema::dropIfExists('target_markets');
    }
}

