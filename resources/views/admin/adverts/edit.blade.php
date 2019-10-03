<div class="modal fade" id="EditAdvert" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Advert Type</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{action('Admin\AdminAdvertController@update')}}" method="POST"  enctype="multipart/form-data">
					{{csrf_field()}}
					{!! method_field('patch') !!}

					<input class="form-control" type="hidden" placeholder="responsibility"  name="id" id="id">

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Name</label>
						<div class="col-sm-12">
							<input required name="name" id="name" type="text" class="form-control"  placeholder="Name" required>
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Description</label>
						<div class="col-sm-12">
							<input required name="description" id="description" type="text" class="form-control"  placeholder="Description">
							@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">View Price Cents</label>
						<div class="col-sm-12">
							<input required name="view_price_cents" id="view_price_cents" type="text" class="form-control"  placeholder="View Price Cents">
							@error('view_price_cents')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Click Price Cents</label>
						<div class="col-sm-12">
							<input required name="click_price_cents" id="click_price_cents" type="text" class="form-control"  placeholder="Click Price Cents">
							@error('click_price_cents')
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
	$('#EditAdvert').on('show.bs.modal', function (event) {
		
		
		var button = $(event.relatedTarget) // Button that triggered the modal
		var id = button.data('id') // Extract info from data-* attributes
		var name = button.data('name') // Extract info from data-* attributes
		var description = button.data('description') // Extract info from data-* attributes
		var view_price_cents = button.data('view_price_cents') // Extract info from data-* attributes
		var click_price_cents = button.data('click_price_cents') // Extract info from data-* attributes
		
		var modal = $(this);
		modal.find('#id').val(id);
		modal.find('#name').val(name);
		modal.find('#description').val(description);
		modal.find('#view_price_cents').val(view_price_cents);
		modal.find('#click_price_cents').val(click_price_cents);
		
	})
});
</script>