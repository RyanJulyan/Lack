<?php

namespace App\Http\Controllers\Admin;

use App\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use Validator;

class AdminProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$data = collect([]);

        $data->Products=DB::table('products')
        ->get();
		
        //
		return view('admin.products.index', ['data' => $data]);
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
        ])->validate();

        $user_id = Auth::user()->id;
		
		$data = collect([]);

        $data->Product = Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'created_user_id' => $user_id,
            'updated_by_user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
        //
		return redirect()->action(
            'Admin\AdminProductController@index'
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
        ])->validate();

        $user_id = Auth::user()->id;

        DB::table('products')
        ->where('id', $request->id)
        ->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'updated_by_user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->action(
            'Admin\AdminProductController@index'
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
