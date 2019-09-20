<?php

namespace App\Http\Controllers\Admin;

use App\CompanyLicence;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use Carbon\Carbon;

use Validator;

class AdminLicenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$data = collect([]);
		
        $data->Licences = DB::table('company_licences AS L')
						->join('companies AS C', 'C.id', '=', 'L.company_id')
						->select([
							 'L.id'
							,'L.company_id'
							,'L.licence_key'
							,'L.licence_key_expiary_date'
							,'L.licence_key_last_payment_date'
							,'L.numberOfUsers'
							,'C.companyName'
						])
						->get();
		
        $data->Companies =DB::table('companies')
						->get();
		
		
        //
		return view('admin.licences.index', ['data' => $data]);
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
            'company_id' => ['required'],
            'licence_key' => ['required', 'string', 'max:255', 'unique:company_licences'],
            'licence_key_expiary_date' => ['required', 'string', 'max:255'],
            'numberOfUsers' => ['required', 'min:1'],
        ])->validate();

        $user_id = Auth::user()->id;
		
		$data = collect([]);

        $data->CompanyLicence = CompanyLicence::create([
            'company_id'=>$request->company_id,
            'licence_key'=>Crypt::encrypt($request->licence_key),
            'licence_key_expiary_date'=>$request->licence_key_expiary_date,
            'licence_key_last_payment_date' => Carbon::now(),
            'numberOfUsers'=>$request->numberOfUsers,
            'created_user_id'=>$user_id,
            'updated_by_user_id'=>$user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
        //
		return redirect()->action(
            'Admin\AdminLicenceController@index'
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
            'company_id' => ['required'],
            'licence_key' => ['required', 'string', 'max:255', 'unique:company_licences'],
            'licence_key_expiary_date' => ['required', 'string', 'max:255'],
            'numberOfUsers' => ['required', 'min:1'],
        ])->validate();

        $user_id = Auth::user()->id;

        DB::table('company_licences')
        ->where('id', $request->id)
        ->update([
            'company_id'=>$request->company_id,
            'licence_key'=>Crypt::encrypt($request->licence_key),
            'licence_key_expiary_date'=>$request->licence_key_expiary_date,
            'numberOfUsers'=>$request->numberOfUsers,
            'updated_by_user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);
		
        return redirect()->action(
            'Admin\AdminLicenceController@index'
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
