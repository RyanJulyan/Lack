<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlastGridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_blastgrid_plans', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('plan_mine')->index();
            $table->string('plan_location')->index();
            $table->string('plan_name')->index();
            $table->string('plan_mine_loc_name')->unique()->index();
            $table->double('plan_width', 38, 19)->nullable();
            $table->double('plan_height', 38, 19)->nullable();
            $table->string('plan_profile')->nullable();
            $table->string('plan_rock_type')->nullable();
            $table->double('plan_rock_density', 38, 19)->nullable();
            $table->string('plan_rock_hardness')->nullable();
            $table->double('plan_hole_diameter', 38, 19)->nullable();
            $table->double('plan_hole_depth', 38, 19)->nullable();
            $table->double('plan_rows', 38, 19)->nullable();
            $table->double('plan_columns', 38, 19)->nullable();
            $table->double('plan_v_spacing', 38, 19)->nullable();
            $table->double('plan_b_burden', 38, 19)->nullable();
            $table->double('plan_perimeter_offset', 38, 19)->nullable();
            $table->string('plan_cutface_type')->nullable();
            $table->string('plan_explosive_type')->nullable();
            $table->double('plan_hole_mass', 38, 19)->nullable();
            $table->double('plan_fill_perc', 38, 19)->nullable();
            $table->string('plan_detonator_series')->nullable();
            $table->double('plan_total_holes', 38, 19)->nullable();
            $table->double('plan_charged_holes', 38, 19)->nullable();
            $table->double('plan_uncharged_holes', 38, 19)->nullable();
            $table->double('plan_total_mass_explosives', 38, 19)->nullable();
            $table->double('plan_powder_factor', 38, 19)->nullable();
            $table->double('plan_cubes_of_the_round', 38, 19)->nullable();
            $table->double('plan_tonnes_of_rock', 38, 19)->nullable();
            $table->double('plan_total_explosive_cost', 38, 19)->nullable();
            $table->double('plan_total_detonator_cost', 38, 19)->nullable();
            $table->double('plan_total_accessories_cost', 38, 19)->nullable();
            $table->double('plan_total_cost', 38, 19)->nullable();
            $table->double('plan_cost_m', 38, 19)->nullable();
            $table->double('plan_cost_m3', 38, 19)->nullable();
            $table->double('plan_cost_tons', 38, 19)->nullable();
            $table->text('plan_face_json')->nullable();
            $table->text('plan_cutface_json')->nullable();
            $table->text('plan_blastpack_json')->nullable();
            $table->text('plan_report_json')->nullable();
            $table->text('plan_accessories_json')->nullable();
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
        Schema::dropIfExists('contact_company_links');
    }
}

