<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyUserTeamLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_user_team_links', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
			$table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
			$table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->bigInteger('team_id')->unsigned()->index();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::dropIfExists('company_user_team_links');
    }
}
