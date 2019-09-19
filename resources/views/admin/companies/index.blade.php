@extends('layouts.app')

@section('content')

	@include('admin.companies.edit')
	@include('admin.companies.add')
	<div class="container">
		<div class="card">
			<div class="card-header">Companies</div>

			<div class="card-body">
				<div class="row col-sm-12"> 
					<div class="col-sm-12" style="margin-top:20px">
						<div class="table-responsive">
						<table class="table table-hover DataTable">
							<thead>
							  <tr>
								<th>Name</th>
								<th>Description</th>
								<th>Industry</th>
								<th>Vat Number</th>
								<th>Reg Number</th>
								<th>Vat Rate</th>
								<th>Delivery LeadTime Days</th>
								<th>Bank Details</th>
								<th>Terms Of Payment</th>
								<th>Status</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($data->Companies as $Company)
									<tr>
										<td>{{$Company->companyName}}</td>
										<td>{{$Company->companyDescription}}</td>
										<td>{{$Company->industry}}</td>
										<td>{{$Company->companyVatNumber}}</td>
										<td>{{$Company->companyRegNumber}}</td>
										<td>{{$Company->companyVatRate}}</td>
										<td>{{$Company->delivery_Arrival_LeadTime_Days}}</td>
										<td>{{$Company->companyBankDetails}}</td>
										<td>{{$Company->companyTermsOfPayment}}</td>
										<td>{{$Company->company_status}}</td>
										<td>
											<button 
												data-id="{{$Company->id}}"
												data-companyname="{{$Company->companyName}}"
												data-companydescription="{{$Company->companyDescription}}"
												data-industry="{{$Company->industry}}"
												data-companyvatnumber="{{$Company->companyVatNumber}}"
												data-companyregnumber="{{$Company->companyRegNumber}}"
												data-companyvatrate="{{$Company->companyVatRate}}"
												data-delivery_arrival_leadtime_days="{{$Company->delivery_Arrival_LeadTime_Days}}"
												data-companybankdetails="{{$Company->companyBankDetails}}"
												data-companytermsofpayment="{{$Company->companyTermsOfPayment}}"
												data-company_status="{{$Company->company_status}}"
												
												class="btn btn-default" data-toggle="modal" data-target="#EditCompany">
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#AddCompany">Add Company</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection