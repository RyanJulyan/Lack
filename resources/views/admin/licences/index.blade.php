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
										<td style="max-width:300px; word-wrap: break-word;">
											<button class="btn btn-default" style="width:100%; max-width:300px; word-wrap: break-word;" onclick="copy_licence_key('licence_key_{{$Licence->id}}')">Copy Licence Key
											</button>
											<textarea style="width:100%; max-width:300px; word-wrap: break-word;" id="licence_key_{{$Licence->id}}">{{$Licence->licence_key}}</textarea>
										</td>
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
	
	<script>
	function copy_licence_key(licence_key_id) {
		/* Get the text field */
		var copyText = document.getElementById(licence_key_id);

		/* Select the text field */
		copyText.focus();
		copyText.select();
		copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		/* Copy the text inside the text field */
		document.execCommand("copy");

		/* Alert the copied text */
		alert("Licence Key Copied to Clipboard");
	} 
	</script>

@endsection