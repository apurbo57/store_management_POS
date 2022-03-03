@extends('backend.components.layout');
@section('title')
   Edit Sold Product
@endsection

@section('content')
    <!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Forms</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-clipboard'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Sell Product</li>
								</ol>
							</nav>
						</div>
					</div>
					<x-showMessage></x-showMessage>
					<!--end breadcrumb-->
					<div class="row">
						<div class="col-12 col-lg-12">
							<div class="card border-lg-top-primary">
								<div class="card-body p-5">
									<div class="card-title d-flex align-items-center">
										<h4 class="mb-0 text-primary">Product Sell Form</h4>
									</div>
									<hr>
									<form class="product-create" action="{{route('staff.sell.update',$sell->id)}}" method="post" enctype="multipart/form-data">
										@csrf
										{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
										<div class="form-body">
											<div class="form-row">
												<div class="form-group col-md-4">
													<label>Name :</label>
													<div class="input-group">
														<input type="text" name="name" class="form-control border-left-0" value="{{$sell->name}}">
													</div>
												</div>
												<div class="form-group col-md-4">
													<label>Phone :</label>
													<div class="input-group">
														<input type="number" name="phone" class="form-control border-left-0" value="{{$sell->phone}}">
													</div>
												</div>
												<div class="form-group col-md-4">
													<label>Address :</label>
													<div class="input-group">
														<input type="text" name="address" class="form-control border-left-0" value="{{$sell->address}}">
													</div>
												</div>
											</div>
											<hr>
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered" style="width:100%">
													<div id="test"></div>
													<thead>
														<tr>
															<th>Product Name</th>
															<th>Quantity</th>
															<th>Buying Price</th>
															<th>Selling Price</th>
															<th>Profit</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>{{$sell->productName}}</td>
															<td><input name="quantity" type="number" value="{{$sell->quantity}}"></td>
															<td>{{$sell->bPrice}}</td>
															<td><input name="sPrice" type="number" value="{{$sell->sPrice}}"></td>
															<td>{{($sell->sPrice*$sell->quantity)-($sell->bPrice*$sell->quantity)}}</td>
														</tr>
													</tbody>
												</table>
											</div>
											{{-- <input type="submit" value="Submit"> --}}
											<button type="submit" class="btn btn-primary float-right">Update Now</button>
										</div>
									</form>
									</div>
								</div>
							</div>
						</div>
					<!--end row-->
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper--> 
@endsection