@extends('layouts.app')

@section('content')

	@include('admin.products.edit')
	@include('admin.products.add')
	<div class="container">
		<div class="card">
			<div class="card-header">Products</div>

			<div class="card-body">
				<div class="row col-sm-12"> 
					<div class="col-sm-12" style="margin-top:20px">
						<div class="table-responsive">
						<table class="table table-hover DataTable">
							<thead>
							  <tr>
								<th>Name</th>
								<th>Description</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($data->Products as $product)
									<tr>
										<td>{{$product->name}}</td>
										<td>{{$product->description}}</td>
										<td>
											<button 
												data-id="{{$product->id}}"
												data-name="{{$product->name}}"
												data-description="{{$product->description}}"
												
												class="btn btn-default" data-toggle="modal" data-target="#EditProduct">
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#AddProduct">Add Product</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection