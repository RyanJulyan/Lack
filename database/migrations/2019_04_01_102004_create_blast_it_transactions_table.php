<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlastItTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_bastit_transactions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('plan_mine_loc_name')->nullable();
            $table->foreign('plan_mine_loc_name')->references('plan_mine_loc_name')->on('company_blastgrid_plans')->onDelete('cascade');
            $table->string('job_sublocation')->index();
            $table->string('transaction_type')->index();
            $table->string('transaction_unit_id')->nullable();
            $table->date('transaction_date')->nullable();
            $table->time('transaction_time')->nullable();
            $table->string('transaction_user_id')->nullable();
            $table->string('transaction_event')->nullable();
            $table->string('transaction_flag')->nullable();
            $table->string('transaction_location')->nullable();
            $table->string('transaction_sublocation')->nullable();
            $table->double('transaction_temp', 38, 19)->nullable();
            $table->double('transaction_sensitizer_presure', 38, 19)->nullable();
            $table->double('transaction_jackpot_presure', 38, 19)->nullable();
            $table->double('transaction_emulsion_presure', 38, 19)->nullable();
            $table->double('transaction_hole_mass', 38, 19)->nullable();
            $table->double('transaction_fill_perc', 38, 19)->nullable();
            $table->double('transaction_face_mass', 38, 19)->nullable();
            $table->double('transaction_no_holes', 38, 19)->nullable();
            $table->double('transaction_lat', 38, 19)->nullable();
            $table->double('transaction_lon', 38, 19)->nullable();
            $table->double('transaction_battery', 38, 19)->nullable();
            $table->text('job_pump_json')->nullable();
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
        Schema::dropIfExists('company_bastit_transactions');
    }
}

