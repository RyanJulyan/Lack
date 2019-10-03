<div class="modal fade" id="AddCampaignAdvert" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Campaign Advert</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{action('Admin\CampaignAdvertsController@store')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Name</label>
						<div class="col-sm-12">
							<select required name="advert_id" id="campaign_name" class="form-control CampaignSelect" >
								<option readonly disabled selected>-- Select Advert Type --</option>
								@foreach ($data->Campaigns as $Campaign)
									<option value="{{$Campaign->id}}">{{$Campaign->campaign_name}}: {{$Campaign->start_date_time}} - {{$Campaign->end_date_time}}</option>
								@endforeach
							</select>
							@error('campaign_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Advert Type</label>
						<div class="col-sm-12">
							<select required name="advert_id" id="campaign_name" class="form-control" >
								<option readonly disabled selected>-- Select Advert Type --</option>
								@foreach ($data->Adverts as $Advert)
									<option value="{{$Advert->id}}">{{$Advert->name}}: {{$Advert->description}}</option>
								@endforeach
							</select>
							@error('advert_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Name</label>
						<div class="col-sm-12">
							<input required name="campaign_name" id="campaign_name" type="text" class="form-control"  placeholder="Name" required>
							@error('campaign_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Description</label>
						<div class="col-sm-12">
							<input required name="campaign_description" id="campaign_description" type="text" class="form-control"  placeholder="Description" required>
							@error('campaign_description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Who Is Your Ideal Client</label>
						<div class="col-sm-12">
							<input required name="ideal_client" id="ideal_client" type="text" class="form-control"  placeholder="Ideal Client" required>
							@error('ideal_client')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">What Will You Help Client Achieve</label>
						<div class="col-sm-12">
							<input required name="achieve" id="achieve" type="text" class="form-control"  placeholder="Help Client Achieve" required>
							@error('achieve')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">How Will You Help Client</label>
						<div class="col-sm-12">
							<input required name="methodology" id="methodology" type="text" class="form-control"  placeholder="How Will You Help Client" required>
							@error('methodology')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Start Date</label>
						<div class="col-sm-12">
							<input required name="start_date_time" id="start_date_time" type="date" class="form-control"  placeholder="Start Date" required>
							@error('start_date_time')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">End Date</label>
						<div class="col-sm-12">
							<input required name="end_date_time" id="end_date_time" type="date" class="form-control"  placeholder="End Date" required>
							@error('end_date_time')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Total Budget in Cents</label>
						<div class="col-sm-12">
							<input required name="total_budget_cents" id="total_budget_cents" type="number" class="form-control"  placeholder="Total Budget in Cents" required>
							@error('total_budget_cents')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" >SUBMIT</button>
					</div>
					
				</form>
			</div>
        </div>
    </div>
</div>

<script>

var Campaigns = {!!$data->Campaigns!!}
var Adverts = {!!$data->Adverts!!}

function selectedCampaign(){
	var campaign_id = $('#campaign_name').val();
	for(var obj in Campaigns){
			// console.log("campaign_id",campaign_id);
			// console.log(Campaigns[obj].id);
		if(Campaigns[obj].id == campaign_id){
			// console.log(Campaigns[obj]);
			$('#ideal_client').val(Campaigns[obj].ideal_client);
			$('#achieve').val(Campaigns[obj].achieve);
			$('#methodology').val(Campaigns[obj].methodology);
			$('#start_date_time').val(Campaigns[obj].start_date_time.substring(0, 10));
			$("#start_date_time").attr({
			   "min" : Campaigns[obj].start_date_time.substring(0, 10),
			});
			$('#end_date_time').val(Campaigns[obj].end_date_time.substring(0, 10));
			$("#end_date_time").attr({
			   "max" : Campaigns[obj].end_date_time.substring(0, 10),
			});
			$("#total_budget_cents").attr({
			   "max" : Campaigns[obj].total_budget_cents,
			});
		}
	}
}

$(document).ready(function(){
	$('.CampaignSelect').on('change', function (event) {
		selectedCampaign();
	})
});
</script>