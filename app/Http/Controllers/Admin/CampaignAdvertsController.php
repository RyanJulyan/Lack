<?php
namespace App\Http\Controllers\Admin;

use App\Campaign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use Validator;

class CampaignAdvertsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$data = collect([]);

        $data->Campaigns=DB::table('campaigns')
        ->get();

        $data->Adverts=DB::table('adverts')
        ->get();

        $data->CampaignAdverts=DB::table('campaigns')
        ->get();
		
        //
		return view('admin.campaignadverts.index', ['data' => $data]);
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
            'campaign_name' => 'required',
            'campaign_description' => 'required',
            'ideal_client' => 'required',
            'achieve' => 'required',
            'methodology' => 'required',
            'start_date_time' => 'required',
            'end_date_time' => 'required',
            'total_budget_cents' => 'required',
        ])->validate();

        $user_id = Auth::user()->id;
		
		$data = collect([]);

        $data->CampaignAdvert = Campaign::create([
            'campaign_name'=>$request->campaign_name,
            'campaign_description'=>$request->campaign_description,
            'ideal_client'=>$request->ideal_client,
            'achieve'=>$request->achieve,
            'methodology'=>$request->methodology,
            'start_date_time'=>$request->start_date_time,
            'end_date_time'=>$request->end_date_time,
            'total_budget_cents'=>$request->total_budget_cents,
            'created_user_id' => $user_id,
            'updated_by_user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
        //
		return redirect()->action(
            'Admin\CampaignAdvertsController@index'
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
            'campaign_name' => 'required',
            'campaign_description' => 'required',
            'ideal_client' => 'required',
            'achieve' => 'required',
            'methodology' => 'required',
            'start_date_time' => 'required',
            'end_date_time' => 'required',
            'total_budget_cents' => 'required',
        ])->validate();

        $user_id = Auth::user()->id;

        DB::table('campaigns')
        ->where('id', $request->id)
        ->update([
            'campaign_name'=>$request->campaign_name,
            'campaign_description'=>$request->campaign_description,
            'ideal_client'=>$request->ideal_client,
            'achieve'=>$request->achieve,
            'methodology'=>$request->methodology,
            'start_date_time'=>$request->start_date_time,
            'end_date_time'=>$request->end_date_time,
            'total_budget_cents'=>$request->total_budget_cents,
            'updated_by_user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->action(
            'Admin\CampaignAdvertsController@index'
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
