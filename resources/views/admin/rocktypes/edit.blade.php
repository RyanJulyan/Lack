<div class="modal fade" id="EditRockType" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{action('Admin\AdminRockTypesController@update')}}" method="POST"  enctype="multipart/form-data">
					{{csrf_field()}}
					{!! method_field('patch') !!}

					<input class="form-control" type="hidden" placeholder="responsibility"  name="id" id="id">
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Email</label>
						<div class="col-sm-12">
							<input required name="email" id="email" type="email" class="form-control"  placeholder="Email" disabled required>
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
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
						<label class="col-sm-12 col-form-label">Company</label>
						<div class="col-sm-12">
							<select style="width:100%" name="company_id" id="company_id" class="form-control Select2EditUser"  placeholder="Company" required>
								@foreach ($data->Companies as $Company)
									<option value="{{$Company->id}}">{{$Company->companyName}}</option>
								@endforeach
							</select>
							@error('company_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Team</label>
						<div class="col-sm-12">
							<select style="width:100%" name="team_id" id="team_id" class="form-control Select2EditUser"  placeholder="Team" required>
								@foreach ($data->Teams as $Team)
									<option value="{{$Team->id}}">{{$Team->team_name}}</option>
								@endforeach
							</select>
							@error('team_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="container">
						<div class="card">
							<div class="card-header">Change Password</div>

							<div class="card-body">
									<div class="form-group">
										<label class="col-sm-12 col-form-label">Password</label>

										<div class="col-sm-12">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-12 col-form-label"> ConfirmPassword</label>

										<div class="col-sm-12">
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
										</div>
									</div>
							</div>
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
	
	$('#EditRockType').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var id = button.data('id') // Extract info from data-* attributes
		var company_id = button.data('company_id') // Extract info from data-* attributes
		var name = button.data('name') // Extract info from data-* attributes
		var email = button.data('email') // Extract info from data-* attributes
		
		var modal = $(this);
		modal.find('#id').val(id);
		modal.find('#company_id').val(company_id);
		modal.find('#name').val(name);
		modal.find('#email').val(email);
		
	})
	
});
</script>