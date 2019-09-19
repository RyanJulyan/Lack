<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyExplosiveLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_explosive_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
			$table->bigInteger('explosive_id')->unsigned()->index();
            $table->foreign('explosive_id')->references('id')->on('explosives')->onDelete('cascade');
			$table->double('Price', 38, 19)->nullable();
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
        Schema::dropIfExists('company_explosive_links');
    }
}
