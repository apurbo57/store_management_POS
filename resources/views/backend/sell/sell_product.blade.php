@extends('backend.components.layout');
@section('title')
    Sell Product
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
					
					@if (session('qError'))
						
							@php
								$errors = (explode('$',session('qError')));
								foreach ($errors as $key => $error) {
									if($error!=''){
										echo 
										"<div class='alert alert-danger'>
											Insufficient quantity for product:
											".$error."
										</div>";
									}
								}
							@endphp
						
					@endif
					<!--end breadcrumb-->
					<div class="row">
						<div class="col-12 col-lg-12">
							<div class="card border-lg-top-primary">
								<div class="card-body p-5">
									<div class="card-title d-flex align-items-center">
										<h4 class="mb-0 text-primary">Product Sell Form</h4>
									</div>
									<hr>
									<form class="product-create" action="{{ route('productSell') }}" method="post" enctype="multipart/form-data">
										@csrf
										{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
										<div class="form-body">
											<div class="form-row">
												<div class="form-group col-md-4">
													<label>Name :</label>
													<div class="input-group">
														<input type="text" name="name" class="form-control border-left-0" placeholder="Please Insert Your Name">
													</div>
												</div>
												<div class="form-group col-md-4">
													<label>Phone :</label>
													<div class="input-group">
														<input type="number" name="phone" class="form-control border-left-0" placeholder="Please Insert Your Phone">
													</div>
												</div>
												<div class="form-group col-md-4">
													<label>Address :</label>
													<div class="input-group">
														<input type="text" name="address" class="form-control border-left-0" placeholder="Please Inter Your Address">
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-12">
													<label>Search Product</label>
													<div class="input-group">
														{{-- <input type="text" name="search_product" class="form-control border-left-0" placeholder="Please Insert Your Product Name"> --}}
														<select multiple name="" id="selectP" style="width: 600px">
															<option value=""></option>
															@foreach ($products as $product)
																<option value="{{ $product->id }}">{{ $product->name }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<hr>
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered" style="width:100%">
													<div id="test"></div>
													<thead>
														<tr>
															<td><input type="checkbox" id="checkall"></td>
															<th>Product Name</th>
															<th>Quantity</th>
															<th>Selling Price</th>
														</tr>
													</thead>
													<tbody class="product-field">
														<tr class="empty-field">
															<td colspan="4" class="text-center">Empty</td>
														</tr>
													</tbody>
												</table>
											</div>
											{{-- <input type="submit" value="Submit"> --}}
											<button type="submit" class="btn btn-primary float-right">Sell Now</button>
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
	// $('.product-field').hide();
    $('#selectP').select2({
        placeholder: "Please Select A Product",
        allowClear: true
    });
	// if($("#selectP").val(' ')){
	// 	alert('ok');
	// }
	$("#selectP").change(function(){
	 var selectp =	$("#selectP").val();

	 if(selectp !=''){
		$.ajax({
			 type: "GET",
			 url: "{{ url('/get/product')}}/"+selectp,
			 success:function(res){
 
				 if(res){
					
					 $('.product-field').html(res);
					 console.log(res);
				 }
				 
					 
			 }
		 })
	 }else{
		var tr = '<tr class="empty-field"><td colspan="4" class="text-center">Empty</td></tr>';
		$('.product-field').html(tr);
	 }
	})
	
</script>
@endsection