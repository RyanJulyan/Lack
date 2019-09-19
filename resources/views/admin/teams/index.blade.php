@extends('layouts.app')

@section('content')

	@include('admin.teams.edit')
	@include('admin.teams.add')
	<div class="container">
		<div class="card">
			<div class="card-header">Teams</div>

			<div class="card-body">
				<div class="row col-sm-12"> 
					<div class="col-sm-12" style="margin-top:20px">
						<div class="table-responsive">
						<table class="table table-hover DataTable">
							<thead>
							  <tr>
								<th>Team Name</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($data->Teams as $Team)
									<tr>
										<td>{{$Team->team_name}}</td>
										<td>
											<button 
												data-id="{{$Team->id}}"
												data-team_name="{{$Team->team_name}}"
												
												class="btn btn-default" data-toggle="modal" data-target="#EditTeam">
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#AddTeam">Add Team</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

@endsection