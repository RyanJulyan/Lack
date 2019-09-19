@extends('layouts.app')

@section('content')

	@include('admin.roles.edit')
	@include('admin.roles.add')
	<div class="container">
		<div class="card">
			<div class="card-header">Roles</div>

			<div class="card-body">
				<div class="row col-sm-12"> 
					<div class="col-sm-12" style="margin-top:20px">
						<div class="table-responsive">
						<table class="table table-hover DataTable">
							<thead>
							  <tr>
								<th>Role Name</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($data->Roles as $Role)
									<tr>
										<td>{{$Role->name}}</td>
										<td>
											<button 
												data-id="{{$Role->id}}"
												data-name="{{$Role->name}}"
												
												class="btn btn-default" data-toggle="modal" data-target="#EditRole">
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#AddRole">Add Role</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

@endsection