<?php

namespace App\Http\Controllers\Admin;

use App\Team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use Validator;

class AdminTeamController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$data = collect([]);
		
        $data->Teams = DB::table('teams AS T')
						->get();
		
        //
		return view('admin.teams.index', ['data' => $data]);
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
            'team_name' => ['required', 'string', 'max:255'],
        ])->validate();

        $user_id = Auth::user()->id;
		
		$data = collect([]);

        $data->Team = Team::create([
            'team_name'=>$request->team_name,
            'created_user_id' => $user_id,
            'updated_by_user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
        //
		return redirect()->action(
            'Admin\AdminTeamController@index'
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
            'team_name' => ['required', 'string', 'max:255'],
        ])->validate();

        $user_id = Auth::user()->id;

        DB::table('teams')
        ->where('id', $request->id)
        ->update([
            'team_name'=>$request->team_name,
            'updated_by_user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->action(
            'Admin\AdminTeamController@index'
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
