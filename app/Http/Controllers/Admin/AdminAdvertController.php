<?php

namespace App\Http\Controllers\Admin;

use App\Advert;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use Validator;

class AdminAdvertController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$data = collect([]);

        $data->Adverts=DB::table('adverts')
        ->get();
		
        //
		return view('admin.adverts.index', ['data' => $data]);
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
            'name' => 'required',
            'description' => 'required',
            'view_price_cents' => 'required',
            'click_price_cents' => 'required',
        ])->validate();

        $user_id = Auth::user()->id;
		
		$data = collect([]);

        $data->Advert = Advert::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'view_price_cents'=>$request->view_price_cents,
            'click_price_cents'=>$request->click_price_cents,
            'created_user_id' => $user_id,
            'updated_by_user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
        //
		return redirect()->action(
            'Admin\AdminAdvertController@index'
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
            'name' => 'required',
            'description' => 'required',
            'view_price_cents' => 'required',
            'click_price_cents' => 'required',
        ])->validate();

        $user_id = Auth::user()->id;

        DB::table('adverts')
        ->where('id', $request->id)
        ->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'view_price_cents'=>$request->view_price_cents,
            'click_price_cents'=>$request->click_price_cents,
            'updated_by_user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->action(
            'Admin\AdminAdvertController@index'
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
