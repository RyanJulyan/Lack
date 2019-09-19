<div class="modal fade" id="AddUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Licence</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{action('Admin\AdminLicenceController@store')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Licence Expiary Date</label>
						<div class="col-sm-12">
							<input onChange="GenerateLicenceKey()" name="licence_key_expiary_date" id="licence_key_expiary_date_add" type="date" class="form-control"  placeholder="Licence Expiary Date" required>
							@error('licence_key_expiary_date')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Number Of Users</label>
						<div class="col-sm-12">
							<input onChange="GenerateLicenceKey()" name="numberOfUsers" id="numberOfUsers_add" type="number" class="form-control"  placeholder="Number Of Users" required>
							@error('numberOfUsers')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Company</label>
						<div class="col-sm-12">
							<select onChange="GenerateLicenceKey()" style="width:100%" name="company_id" id="company_id_add" class="form-control Select2AddUser"  placeholder="Company" required>
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
						<!--label class="col-sm-12 col-form-label">Licence Key</label-->
						<div class="col-sm-12">
							<input name="licence_key" id="licence_key_add" type="hidden" class="form-control"  placeholder="Licence Key" required readonly>
							@error('licence_key')
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
function GenerateLicenceKey(){
	
	var d = new Date(document.getElementById('licence_key_expiary_date_add').value);
	var n = d.getTime();
	
	var p = document.getElementById('numberOfUsers_add').value;
	
	var c = document.getElementById('company_id_add').value;
	
	document.getElementById('licence_key_add').value =  c + "_" + n + "_" + p
	
}
</script>