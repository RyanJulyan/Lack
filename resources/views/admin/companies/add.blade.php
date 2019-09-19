<div class="modal fade" id="AddCompany" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Companies</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{action('Admin\AdminCompanyController@store')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="form-group">
						<label class="col-sm-12 col-form-label">Company Name</label>
						<div class="col-sm-12">
							<input required name="companyName" id="companyName" type="text" class="form-control"  placeholder="Name" required>
							@error('companyName')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Description</label>
						<div class="col-sm-12">
							<input required name="companyDescription" id="companyDescription" type="text" class="form-control"  placeholder="Description" required>
							@error('companyDescription')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Industry</label>
						<div class="col-sm-12">
							<input required name="industry" id="industry" type="text" class="form-control"  placeholder="Industry" required>
							@error('industry')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Vat Number</label>
						<div class="col-sm-12">
							<input name="companyVatNumber" id="companyVatNumber" type="text" class="form-control"  placeholder="Vat Number">
							@error('companyVatNumber')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Registration Number</label>
						<div class="col-sm-12">
							<input name="companyRegNumber" id="companyRegNumber" type="text" class="form-control"  placeholder="Registration Number">
							@error('companyRegNumber')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Vat Rate</label>
						<div class="col-sm-12">
							<div class="input-group">
								<input name="companyVatRate" id="companyVatRate" type="number" class="form-control"  placeholder="Vat Rate">
								<div class="input-group-append">
									<span class="input-group-text" id="basic-addon2">%</span>
								</div>
							</div>
							@error('companyVatRate')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Delivery LeadTime Days</label>
						<div class="col-sm-12">
							<div class="input-group">
								<input name="delivery_Arrival_LeadTime_Days" id="delivery_Arrival_LeadTime_Days" type="number" class="form-control"  placeholder="Delivery LeadTime Days">
								<div class="input-group-append">
									<span class="input-group-text" id="basic-addon2">Days</span>
								</div>
							</div>
							@error('delivery_Arrival_LeadTime_Days')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Bank Details</label>
						<div class="col-sm-12">
							<textarea name="companyBankDetails" id="companyBankDetails" type="text" class="form-control"  placeholder="Bank Details"></textarea>
							@error('companyBankDetails')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Terms Of Payment</label>
						<div class="col-sm-12">
							<textarea name="companyTermsOfPayment" id="companyTermsOfPayment" type="text" class="form-control"  placeholder="Terms Of Payment"></textarea>
							@error('companyTermsOfPayment')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 col-form-label">Status</label>
						<div class="col-sm-12">
							<select name="company_status" id="company_status" class="form-control"  placeholder="Status">
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
							</select>
							@error('company_status')
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