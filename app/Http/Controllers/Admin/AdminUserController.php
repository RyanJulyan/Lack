<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\CompanyUserLink;
use App\CompanyUserTeamLink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use Validator;

class AdminUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$data = collect([]);
		
        $data->Users = DB::table('users AS U')
						->leftJoin('company_user_links AS UL', 'UL.user_id', '=', 'U.id')
						->leftJoin('companies AS C', 'C.id', '=', 'UL.company_id')
						->leftJoin('company_user_team_links AS UTL', 'UTL.user_id', '=', 'U.id')
						->leftJoin('teams AS T', 'T.id', '=', 'UTL.team_id')
						->select([
							 'U.id'
							,'U.name'
							,'U.email'
							,'UTL.team_id'
							,'T.team_name'
							,'UL.company_id'
							,'C.companyName'
							,'C.industry'
							,'U.email_verified_at'
						])
						->get();
		
        $data->Companies =DB::table('companies')
						->get();
		
        $data->Teams =DB::table('teams')
						->get();
		
        //
		return view('admin.users.index', ['data' => $data]);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        $user_id = Auth::user()->id;
		
		$data = collect([]);

        $data->User = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $data->CompanyUserLink = CompanyUserLink::create([
            'user_id'=> $data->User->id,
            'company_id'=>$request->company_id,
            'created_user_id' => $user_id,
            'updated_by_user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $data->CompanyUserTeamLink = CompanyUserTeamLink::create([
            'user_id'=> $data->User->id,
            'company_id'=>$request->company_id,
            'team_id'=>$request->team_id,
            'created_user_id' => $user_id,
            'updated_by_user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
        //
		return redirect()->action(
            'Admin\AdminUserController@index'
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
            'name' => ['required', 'string', 'max:255'],
        ])->validate();

        $user_id = Auth::user()->id;

        DB::table('users')
        ->where('id', $request->id)
        ->update([
            'name'=>$request->name,
            'updated_at' => Carbon::now(),
        ]);

        DB::table('company_user_links')
        ->where('user_id', $request->id)
        ->update([
            'company_id'=>$request->company_id,
            'updated_by_user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        DB::table('company_user_team_links')
        ->where('user_id', $request->id)
        ->update([
            'company_id'=>$request->company_id,
            'team_id'=>$request->team_id,
            'updated_by_user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);
		
		// dd("password",(!empty($request->password)));

		if(!empty($request->password)){
			// Update Password if set only
			DB::table('users')
			->where('id', $request->id)
			->update([
				'password'=>Hash::make($request->password),
				'updated_at' => Carbon::now(),
			]);
		}

        return redirect()->action(
            'Admin\AdminUserController@index'
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
