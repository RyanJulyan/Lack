@extends('layouts.app')

@section('content')

	@include('admin.licences.edit')
	@include('admin.licences.add')
	<div class="container">
		<div class="card">
			<div class="card-header">Licences</div>

			<div class="card-body">
				<div class="row col-sm-12"> 
					<div class="col-sm-12" style="margin-top:20px">
						<div class="table-responsive">
						<table class="table table-hover DataTable">
							<thead>
							  <tr>
								<th>Company Name</th>
								<th style="max-width:300px; word-wrap: break-word;">Licence Key</th>
								<th>Licence Expiary Date</th>
								<th>Last Payment Date</th>
								<th>Number Of Users</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($data->Licences as $Licence)
									<tr>
										<td>{{$Licence->companyName}}</td>
										<td style="max-width:300px; word-wrap: break-word;">{{$Licence->licence_key}}</td>
										<td>{{$Licence->licence_key_expiary_date}}</td>
										<td>{{$Licence->licence_key_last_payment_date}}</td>
										<td>{{$Licence->numberOfUsers}}</td>
										<td>
											<button 
												data-id="{{$Licence->id}}"
												data-company_id="{{$Licence->company_id}}"
												data-licence_key="{{$Licence->licence_key}}"
												data-licence_key_expiary_date="{{$Licence->licence_key_expiary_date}}"
												data-numberofusers="{{$Licence->numberOfUsers}}"
												
												class="btn btn-default" data-toggle="modal" data-target="#EditLicence">
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#AddUser">Add Licence</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

@endsection