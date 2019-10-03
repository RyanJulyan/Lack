@extends('layouts.app')

@section('content')

	@include('admin.adverts.edit')
	@include('admin.adverts.add')
	<div class="container">
		<div class="card">
			<div class="card-header">Advert Types</div>

			<div class="card-body">
				<div class="row col-sm-12"> 
					<div class="col-sm-12" style="margin-top:20px">
						<div class="table-responsive">
						<table class="table table-hover DataTable">
							<thead>
							  <tr>
								<th>Name</th>
								<th>Description</th>
								<th>View Price Cents</th>
								<th>Click Price Cents</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($data->Adverts as $advert)
									<tr>
										<td>{{$advert->name}}</td>
										<td>{{$advert->description}}</td>
										<td>{{$advert->view_price_cents}}</td>
										<td>{{$advert->click_price_cents}}</td>
										<td>
											<button 
												data-id="{{$advert->id}}"
												data-name="{{$advert->name}}"
												data-description="{{$advert->description}}"
												data-view_price_cents="{{$advert->view_price_cents}}"
												data-click_price_cents="{{$advert->click_price_cents}}"
												
												class="btn btn-default" data-toggle="modal" data-target="#EditAdvert">
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#AddAdvert">Add Advert Type</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection