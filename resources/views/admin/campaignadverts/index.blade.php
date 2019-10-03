@extends('layouts.app')

@section('content')

	@include('admin.campaignadverts.edit')
	@include('admin.campaignadverts.add')
	<div class="container">
		<div class="card">
			<div class="card-header">Campaign Adverts</div>

			<div class="card-body">
				<div class="row col-sm-12"> 
					<div class="col-sm-12" style="margin-top:20px">
						<div class="table-responsive">
						<table class="table table-hover DataTable">
							<thead>
							  <tr>
								<th>Campaign Name</th>	
								<th>Name</th>
								<th>Description</th>
								<th>Ideal Client</th>
								<th>Achieve</th>
								<th>Methodology</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Total Budget Cents</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($data->CampaignAdverts as $CampaignAdvert)
									<tr>
										<td>{{$CampaignAdvert->campaign_name}}</td>
										<td>{{$CampaignAdvert->campaign_description}}</td>
										<td>{{$CampaignAdvert->ideal_client}}</td>
										<td>{{$CampaignAdvert->achieve}}</td>
										<td>{{$CampaignAdvert->methodology}}</td>
										<td>{{$CampaignAdvert->start_date_time}}</td>
										<td>{{$CampaignAdvert->end_date_time}}</td>
										<td>{{$CampaignAdvert->total_budget_cents}}</td>
										<td>
											<button 
												data-id="{{$CampaignAdvert->id}}"
												data-campaign_name="{{$CampaignAdvert->campaign_name}}"
												data-campaign_description="{{$CampaignAdvert->campaign_description}}"
												data-ideal_client="{{$CampaignAdvert->ideal_client}}"
												data-achieve="{{$CampaignAdvert->achieve}}"
												data-methodology="{{$CampaignAdvert->methodology}}"
												data-start_date_time="{{$CampaignAdvert->start_date_time}}"
												data-end_date_time="{{$CampaignAdvert->end_date_time}}"
												data-total_budget_cents="{{$CampaignAdvert->total_budget_cents}}"
												
												class="btn btn-default" data-toggle="modal" data-target="#EditCampaignAdvert">
											Edit
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						</div>
						<div class="col-sm-12 m-1"> 
							<div class="modal-footer">
								<button class="btn btn-primary" data-toggle="modal" data-target="#AddCampaignAdvert">Add Campaign Advert</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection