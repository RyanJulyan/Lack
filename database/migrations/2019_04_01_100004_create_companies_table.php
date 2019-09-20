<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('companyName')->index();
            $table->text('companyDescription');
            $table->string('industry')->index();
            $table->string('companyVatNumber')->nullable();
            $table->string('companyRegNumber')->nullable();
			$table->double('companyVatRate', 38, 19)->nullable();
			$table->double('delivery_Arrival_LeadTime_Days', 38, 19)->nullable()->default(7);
            $table->longText('companyBankDetails')->nullable();
            $table->longText('companyTermsOfPayment')->nullable();
			$table->enum('company_status', ['Active', 'Inactive']);
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
        Schema::dropIfExists('companies');
    }
}
