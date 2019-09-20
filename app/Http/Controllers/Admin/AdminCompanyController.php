<?php

namespace App\Http\Controllers\Admin;

use App\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use Validator;

class AdminCompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$data = collect([]);

        $data->Companies =DB::table('companies')
							->get();
		
        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //
		return view('admin.companies.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//

        $validator = Validator::make($request->all(), [
            'companyName' => 'required',
            'companyDescription' => 'required',
            'industry' => 'required',
            'company_status' => 'required',
        ])->validate();

        $user_id = Auth::user()->id;
		
		$data = collect([]);

        $data->Company = Company::create([
            'companyName'=>$request->companyName,
            'companyDescription'=>$request->companyDescription,
            'industry'=>$request->industry,
            'companyVatNumber'=>$request->companyVatNumber,
            'companyRegNumber'=>$request->companyRegNumber,
            'companyVatRate'=>$request->companyVatRate,
            'delivery_Arrival_LeadTime_Days'=>$request->delivery_Arrival_LeadTime_Days,
            'companyBankDetails'=>$request->companyBankDetails,
            'companyTermsOfPayment'=>$request->companyTermsOfPayment,
            'company_status'=>$request->company_status,
            'created_user_id' => $user_id,
            'updated_by_user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
        //
		return redirect()->action(
            'Admin\AdminCompanyController@index'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'companyName' => 'required',
            'companyDescription' => 'required',
            'industry' => 'required',
            'company_status' => 'required',
        ])->validate();

        $user_id = Auth::user()->id;
		
        DB::table('companies')
        ->where('id', $request->id)
        ->update([
            'companyName'=>$request->companyName,
            'companyDescription'=>$request->companyDescription,
            'industry'=>$request->industry,
            'companyVatNumber'=>$request->companyVatNumber,
            'companyRegNumber'=>$request->companyRegNumber,
            'companyVatRate'=>$request->companyVatRate,
            'delivery_Arrival_LeadTime_Days'=>$request->delivery_Arrival_LeadTime_Days,
            'companyBankDetails'=>$request->companyBankDetails,
            'companyTermsOfPayment'=>$request->companyTermsOfPayment,
            'company_status'=>$request->company_status,
            'updated_by_user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);
		
		// dd($request->all());

        return redirect()->action(
            'Admin\AdminCompanyController@index'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
