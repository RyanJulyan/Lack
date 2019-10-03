@extends('layouts.app')

@section('content')

	@include('admin.users.edit')
	@include('admin.users.add')
	<div class="container">
		<div class="card">
			<div class="card-header">Users</div>

			<div class="card-body">
				<div class="row col-sm-12"> 
					<div class="col-sm-12" style="margin-top:20px">
						<div class="table-responsive">
						<table class="table table-hover DataTable">
							<thead>
							  <tr>
								<th>Name</th>
								<th>Email</th>
								<th>Company</th>
								<th>Industry</th>
								<th>Team</th>
								<th>Role</th>
								<th>Email Verified At</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($data->Users as $User)
									<tr>
										<td>{{$User->name}}</td>
										<td>{{$User->email}}</td>
										<td>{{$User->companyName}}</td>
										<td>{{$User->industry}}</td>
										<td>{{$User->team_name}}</td>
										<td>{{$User->role_name}}</td>
										<td>{{$User->email_verified_at}}</td>
										<td>
											<button 
												data-id="{{$User->id}}"
												data-company_id="{{$User->company_id}}"
												data-team_id="{{$User->team_id}}"
												data-name="{{$User->name}}"
												data-email="{{$User->email}}"
												
												class="btn btn-default" data-toggle="modal" data-target="#EditUser">
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#AddUser">Add User</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

@endsection