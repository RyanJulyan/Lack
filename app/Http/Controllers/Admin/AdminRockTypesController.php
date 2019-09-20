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

class AdminRockTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$data = collect([]);
		
        $data->RockTypes = DB::table('rock_types AS T')
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
