@extends('layouts.app')

@section('content')

	@include('admin.campaigns.edit')
	@include('admin.campaigns.add')
	<div class="container">
		<div class="card">
			<div class="card-header">Campaigns</div>

			<div class="card-body">
				<div class="row col-sm-12"> 
					<div class="col-sm-12" style="margin-top:20px">
						<div class="table-responsive">
						<table class="table table-hover DataTable">
							<thead>
							  <tr>
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
								@foreach ($data->Campaigns as $Campaign)
									<tr>
										<td>{{$Campaign->campaign_name}}</td>
										<td>{{$Campaign->campaign_description}}</td>
										<td>{{$Campaign->ideal_client}}</td>
										<td>{{$Campaign->achieve}}</td>
										<td>{{$Campaign->methodology}}</td>
										<td>{{$Campaign->start_date_time}}</td>
										<td>{{$Campaign->end_date_time}}</td>
										<td>{{$Campaign->total_budget_cents}}</td>
										<td>
											<button 
												data-id="{{$Campaign->id}}"
												data-campaign_name="{{$Campaign->campaign_name}}"
												data-campaign_description="{{$Campaign->campaign_description}}"
												data-ideal_client="{{$Campaign->ideal_client}}"
												data-achieve="{{$Campaign->achieve}}"
												data-methodology="{{$Campaign->methodology}}"
												data-start_date_time="{{$Campaign->start_date_time}}"
												data-end_date_time="{{$Campaign->end_date_time}}"
												data-total_budget_cents="{{$Campaign->total_budget_cents}}"
												
												class="btn btn-default" data-toggle="modal" data-target="#EditCampaign">
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#AddCampaign">Add Campaign</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection