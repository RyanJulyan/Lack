<div class="modal fade" id="EditLicence" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Licence</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{action('Admin\AdminLicenceController@update')}}" method="POST"  enctype="multipart/form-data">
					{{csrf_field()}}
					{!! method_field('patch') !!}

					<input class="form-control" type="hidden" placeholder="responsibility"  name="id" id="id">
					

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Licence Expiary Date</label>
						<div class="col-sm-12">
							<input onChange="GenerateLicenceKeyEdit()" name="licence_key_expiary_date" id="licence_key_expiary_date" type="date" class="form-control"  placeholder="Licence Expiary Date" required>
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
							<input onChange="GenerateLicenceKeyEdit()" name="numberOfUsers" id="numberOfUsers" type="number" class="form-control"  placeholder="Number Of Users" required>
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
							<select onChange="GenerateLicenceKeyEdit()" style="width:100%" name="company_id" id="company_id" class="form-control Select2AddUser"  placeholder="Company" required>
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
							<input name="licence_key" id="licence_key" type="hidden" class="form-control"  placeholder="Licence Key" required readonly>
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


function GenerateLicenceKeyEdit(){
	
	var d = new Date(document.getElementById('licence_key_expiary_date').value);
	var n = d.getTime();
	
	var p = document.getElementById('numberOfUsers').value;
	
	var c = document.getElementById('company_id').value;
	
	document.getElementById('licence_key').value =  c + "_" + n + "_" + p
	
}
	
$(document).ready(function(){
	
	$('#EditLicence').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var id = button.data('id') // Extract info from data-* attributes
		var company_id = button.data('company_id') // Extract info from data-* attributes
		var licence_key = button.data('licence_key') // Extract info from data-* attributes
		var numberofusers = button.data('numberofusers') // Extract info from data-* attributes
		var licence_key_expiary_date = button.data('licence_key_expiary_date') // Extract info from data-* attributes
		
		var modal = $(this);
		modal.find('#id').val(id);
		modal.find('#company_id').val(company_id);
		modal.find('#licence_key').val(licence_key);
		modal.find('#numberOfUsers').val(numberofusers);
		modal.find('#licence_key_expiary_date').val(licence_key_expiary_date);
		
	})
	
});
</script>