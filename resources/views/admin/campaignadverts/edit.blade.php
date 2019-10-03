<div class="modal fade" id="EditCampaignAdvert" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Campaign Advert</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{action('Admin\CampaignAdvertsController@update')}}" method="POST"  enctype="multipart/form-data">
					{{csrf_field()}}
					{!! method_field('patch') !!}

					<input class="form-control" type="hidden" placeholder="responsibility"  name="id" id="id">

					

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Name</label>
						<div class="col-sm-12">
							<input required name="campaign_name" id="campaign_name_edit" type="text" class="form-control"  placeholder="Name" required>
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
							<input required name="campaign_description" id="campaign_description_edit" type="text" class="form-control"  placeholder="Description" required>
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
							<input required name="ideal_client" id="ideal_client_edit" type="text" class="form-control"  placeholder="Ideal Client" required>
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
							<input required name="achieve" id="achieve_edit" type="text" class="form-control"  placeholder="Help Client Achieve" required>
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
							<input required name="methodology" id="methodology_edit" type="text" class="form-control"  placeholder="How Will You Help Client" required>
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
							<input required name="start_date_time" id="start_date_time_edit" type="date" class="form-control"  placeholder="Start Date" required>
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
							<input required name="end_date_time" id="end_date_time_edit" type="date" class="form-control"  placeholder="End Date" required>
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
							<input required name="total_budget_cents" id="total_budget_cents_edit" type="number" class="form-control"  placeholder="Total Budget in Cents" required>
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
$(document).ready(function(){
	$('#EditCampaign').on('show.bs.modal', function (event) {
		
		var button = $(event.relatedTarget) // Button that triggered the modal
		var id = button.data('id') // Extract info from data-* attributes
		var campaign_name = button.data('campaign_name') // Extract info from data-* attributes
		var campaign_description = button.data('campaign_description') // Extract info from data-* attributes
		var ideal_client = button.data('ideal_client') // Extract info from data-* attributes
		var achieve = button.data('achieve') // Extract info from data-* attributes
		var methodology = button.data('methodology') // Extract info from data-* attributes
		var start_date_time = button.data('start_date_time') // Extract info from data-* attributes
		var end_date_time = button.data('end_date_time') // Extract info from data-* attributes
		var total_budget_cents = button.data('total_budget_cents') // Extract info from data-* attributes
		
		var modal = $(this);
		modal.find('#id').val(id);
		modal.find('#campaign_name').val(campaign_name);
		modal.find('#campaign_description').val(campaign_description);
		modal.find('#ideal_client').val(ideal_client);
		modal.find('#achieve').val(achieve);
		modal.find('#methodology').val(methodology);
		modal.find('#start_date_time').val(start_date_time.substring(0, 10));
		modal.find('#end_date_time').val(end_date_time.substring(0, 10));
		modal.find('#total_budget_cents').val(total_budget_cents);
		
	})
});
</script>