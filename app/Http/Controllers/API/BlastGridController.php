<?php

namespace App\Http\Controllers\API;

use App\CompanyBlastgridPlan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use Validator;

class BlastGridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                                         'productID' => 'required',
                                         'name' => 'required|min:1',
                                         'weight' => 'required|min:2',
                                         'headCircumference' => 'required|min:1',
                                        ]);
        // dd($request->all()); 
		$User_id = 1;
		
		if($validator->fails()){
			$errors = $validator->errors();

			return $errors->toJson();
		} else{
			
			$data = collect([]);
			
			$data->Product = Product::create([
								'name'=>$request->name,
								'style'=>$request->style,
								'created_User_id' => $User_id,
								'updated_By_User_id' => $User_id,
								'created_at' => Carbon::now(),
								'updated_at' => Carbon::now(),
							]);
			
			return  response()->json($data->Product, 200)
					->header('Content-Type', 'application/json');
		}
		
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
			
		$data = collect([]);
		
        $data->Products = DB::table('products')
						->where('id', $id)
						->get();
		
		// dd($id);
		
		if(count($data->Products) <= 0){
			return  response()->json(['Response' => 'No Data Returned'], 200)
					->header('Content-Type', 'application/json');
		}
		
		return  response()->json($data->Products, 200)
				->header('Content-Type', 'application/json');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
