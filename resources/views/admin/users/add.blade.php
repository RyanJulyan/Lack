<div class="modal fade" id="AddUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{action('Admin\AdminUserController@store')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Name</label>
						<div class="col-sm-12">
							<input name="name" type="text" class="form-control"  placeholder="Name" required>
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Email</label>
						<div class="col-sm-12">
							<input name="email" type="email" class="form-control"  placeholder="Email" required>
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Company</label>
						<div class="col-sm-12">
							<select style="width:100%" name="company_id" class="form-control Select2AddUser"  placeholder="Company" required>
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
							<select style="width:100%" name="team_id" class="form-control Select2EditUser"  placeholder="Team" required>
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
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Role</label>
						<div class="col-sm-12">
							<select style="width:100%" name="role_id" id="role_id" class="form-control Select2EditUser"  placeholder="Team" required>
								@foreach ($data->Roles as $Role)
									<option value="{{$Role->id}}">{{$Role->name}}</option>
								@endforeach
							</select>
							@error('role_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Password</label>

						<div class="col-sm-12">
							<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
							<input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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