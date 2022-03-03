@extends('backend.components.layout');
@section('title')
    Add Brand
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
									<li class="breadcrumb-item active" aria-current="page">Add Brand</li>
								</ol>
							</nav>
						</div>
					</div>
					<x-showMessage></x-showMessage>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Brand Inputs</h4>
							</div>
							<hr/>
                            <form action="{{route('staff.brand.store')}}" method="post">
                                @csrf
							<div class="form-group">
                                <label for="brand" class="text-md">Brand Name</label>
								<input id="brand" name="name" class="form-control form-control-lg" type="text" placeholder="Add Your New Brand...">
							</div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="acive" name="status" value="active" class="custom-control-input">
                                <label class="custom-control-label" for="acive">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="inacive" name="status" value="inactive" class="custom-control-input">
                                <label class="custom-control-label" for="inacive">Inactive</label>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Add Brand</button>
                        </form>
						</div>
					</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
@endsection