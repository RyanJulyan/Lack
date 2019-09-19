<div class="modal fade" id="AddRole" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{action('Admin\AdminRoleController@store')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Role Name</label>
						<div class="col-sm-12">
							<input name="name" type="text" class="form-control"  placeholder="Role Name" required>
							@error('name')
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