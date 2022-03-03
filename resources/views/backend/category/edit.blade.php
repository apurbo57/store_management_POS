@extends('backend.components.layout');
@section('title')
    Edit Category
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
									<li class="breadcrumb-item active" aria-current="page">Edit Category</li>
								</ol>
							</nav>
						</div>
					</div>
					<x-showMessage></x-showMessage>
					<!--end breadcrumb-->
					<div class="row">
						<div class="col-12 col-lg-9 mx-auto">
							<div class="card radius-15">
								<div class="card-body">
									<div class="card-title">
										<h4 class="mb-0">Category Update</h4>
									</div>
									<hr/>
									<form action="{{route('staff.category.update', $cat->id)}}" method="post">
										@csrf
										@method('PUT')
									<div class="form-body">
										<div class="form-group row">
											<label class="col-sm-2 col-form-label" for="select_cat">Category Root</label>
											<div class="col-sm-10">
												<select name="root" class="form-control" id="select_cat">
													<option value="0">-- Root --</option>
													@foreach ($categories as $category)
														<option value="{{ $category->id }}" {{ $category->id === $cat->root ? "selected" : "" }}>{{ $category->name }}</option>
														@if (count($category->subCategory))
															@foreach($category->subcategory as $sub)
																<option value="{{ $sub->id }}" {{ $sub->id === $cat->root ? "selected" : "" }}>{{ $category->name }} > {{ $sub->name }}</option>
															@endforeach
														@endif
													@endforeach
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Category Name</label>
											<div class="col-sm-10">
												<input id="brand" name="name" value="{{ $cat->name }}" class="form-control form-control-lg" type="text" placeholder="Add Your New Category...">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Status</label>
											<div class="col-sm-10">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="acive" name="status" value="active" {{ ($cat->status=="active")? "checked" : "" }} class="custom-control-input">
													<label class="custom-control-label" for="acive">Active</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="inacive" name="status" value="inactive" {{ ($cat->status=="inactive")? "checked" : "" }} class="custom-control-input">
													<label class="custom-control-label" for="inacive">Inactive</label>
												</div>
											</div>
										</div>
										<button type="submit" class="btn btn-primary float-right">Update Category</button>
									</form>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
@endsection