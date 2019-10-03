<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignAdvertLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_advert_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('ideal_client');
            $table->string('achieve');
            $table->string('methodology');
			$table->bigInteger('advert_id')->unsigned()->index();
            $table->foreign('advert_id')->references('id')->on('adverts')->onDelete('cascade');
			$table->bigInteger('campaign_id')->unsigned()->index();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
			$table->bigInteger('media_id')->unsigned()->index()->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
			$table->decimal('total_budget_cents', 38, 2);
			$table->decimal('view_price_cents', 38, 2);
			$table->decimal('click_price_cents', 38, 2);
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
        Schema::dropIfExists('campaign_advert_links');
    }
}
