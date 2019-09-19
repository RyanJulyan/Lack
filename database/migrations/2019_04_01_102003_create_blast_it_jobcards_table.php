<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlastItJobcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_bastit_jobcards', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('plan_mine_loc_name')->nullable();
            $table->foreign('plan_mine_loc_name')->references('plan_mine_loc_name')->on('company_blastgrid_plans')->onDelete('cascade');
            $table->string('jobid')->index()->nullable();
            $table->string('job_mine')->index();
            $table->string('job_location')->index();
            $table->string('job_plan')->index();
            $table->string('job_sublocation')->index();
            $table->text('job_json')->nullable();
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
        Schema::dropIfExists('company_bastit_jobcards');
    }
}

