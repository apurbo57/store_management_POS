@extends('backend.components.layout');
@section('title')
    Add Post
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
									<li class="breadcrumb-item active" aria-current="page">Add Post</li>
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
										<h4 class="mb-0 text-primary">Product Add Form</h4>
									</div>
									<hr>
									<form class="product-create" action="{{route('staff.product.store')}}" method="post" enctype="multipart/form-data">
										@csrf
									<div class="form-body">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label>Product Name</label>
												<div class="input-group">
													<input type="text" name="name" onkeyup="convertToSlug(this.value,'#slug')" class="form-control border-left-0" placeholder="Please Insert Your Product Name">
												</div>
											</div>
											<div class="form-group col-md-6">
												<label>Slug</label>
												<div class="input-group">
													<input type="text" name="slug" id="slug" onkeyup="convertToSlug(this.value,'#slug')" class="form-control border-left-0" placeholder="Your Slug">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label>Category Name</label>
												<div class="input-group">
													<select name="category_id" class="form-control" id="select_cat">
														<option value="">-- Select Your Category --</option>
														@foreach ($categories as $category)
															<option value="{{ $category->id }}">{{ $category->name }}</option>
															@if (count($category->subCategory))
																@foreach($category->subcategory as $sub)
																	<option value="{{ $sub->id }}">{{ $category->name }} > {{ $sub->name }}</option>
																	@if (count($sub->subCategory))
																	@foreach($sub->subcategory as $sub2)
																	<option value="{{ $sub2->id }}">{{ $category->name }} > {{ $sub->name }} > {{ $sub2->name }}</option>
																	@endforeach
																	@endif
																@endforeach
															@endif
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Brand Name</label>
												<div class="input-group">
													<select name="brand_id" class="form-control" id="select_cat">
														<option value="">-- Select Your Brand --</option>
														<option value="0">No Brand</option>
														@foreach ($brands as $brand)
															<option value="{{ $brand->id }}">{{ $brand->name }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Model</label>
												<div class="input-group">
													<input type="text" name="model" class="form-control border-left-0" placeholder="Insert Your Model">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label>Buying Price</label>
												<div class="input-group">
													<input type="number" name="buing_price" class="form-control border-left-0" placeholder="Buying Price">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Special Price</label>
												<div class="input-group">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" id="yes_sp" name="warranty" value="1" class="custom-control-input">
														<label class="custom-control-label" for="yes_sp">Yes</label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-row special_details" style="display: none">
											<div class="form-group col-md-4">
												<label>Special Price</label>
												<div class="input-group">
													<input type="number" name="special_price" class="form-control border-left-0" placeholder="Special Price">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Special Price Start</label>
												<div class="input-group">
													<input type="date" name="special_price_from" class="form-control border-left-0">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Special Price End</label>
												<div class="input-group">
													<input type="date" name="special_price_to" class="form-control border-left-0">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label>Quantity</label>
												<div class="input-group">
													<input type="number" name="quantity" class="form-control border-left-0" placeholder="Quantity">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Sku Code</label>
												<div class="input-group">
													<input type="text" name="sku_code" class="form-control border-left-0" placeholder="SKU Code">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Warranty</label>
												<div class="input-group">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" id="yes" name="warranty" value="1" class="custom-control-input">
														<label class="custom-control-label" for="yes">Yes</label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-row wrrantyshow" style="display: none">
											<div class="form-group col-md-12">
												<label>Warranty Duration</label>
												<div class="input-group">
													<input type="text" name="warranty_duration" class="form-control border-left-0" placeholder="Please Enter Your Warranty Duration">
												</div>
											</div>
											<div class="form-group col-md-12">
												<label>Warranty Condition</label>
												<div class="input-group">
													<textarea id="description" name="warranty_condition" class="form-control editor" id="" cols="30" rows="10"></textarea>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control editor" name="description" id="description" placeholder="Please Enter Your Description" rows="3" cols="3"></textarea>
										</div>
										<div class="form-group row">
											<div class="col-md-12 text-center">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="acive" name="status" value="active" class="custom-control-input">
													<label class="custom-control-label" for="acive">Active</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="inacive" name="status" value="inactive" class="custom-control-input">
													<label class="custom-control-label" for="inacive">Inactive</label>
												</div>
											</div>
										</div>
										<button type="submit" class="btn btn-primary float-right">Add Post</button>
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
	<script>
		$('body').on('submit', '.product-create', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/staff/product',
        type: 'POST',
        contentType: false,
        processData: false,
        data: new FormData(this),
        success: function (data) {
            if ($.isEmptyObject(data.error)) {
                if (data.success) {
                    toastr.success(data.success);
                }else{
                    toastr.error(data.unable);
                }
            }else{
                $.each(data.error, function (key, value) {
                    toastr.error(value);
                })
            }
        }
    })
})
	</script>
@endsection