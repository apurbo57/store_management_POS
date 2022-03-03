@extends('backend.components.layout');
@section('title')
    Manage Brand
@endsection

@section('content')
    <!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Brand Table</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-clipboard'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Manage Brand</li>
								</ol>
							</nav>
						</div>
					</div>
					<x-showMessage></x-showMessage>
					<!--end breadcrumb-->
                    <div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Manage Brand</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<div id="test"></div>
                                    <thead>
										<tr>
											<th>Name</th>
											<th>Slug</th>
											<th>Status</th>
											<th>Create By</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($brands as $brand)
                                        <tr>
											<td>{{$brand->name}}</td>
											<td>{{$brand->slug}}</td>
											<td>{{ucfirst($brand->status)}}</td>
											<td>{{$brand->user->name}}</td>
											<td>
												<form action="{{route('staff.brand.destroy',$brand->id)}}" method="post">
													@csrf 
													@method('DELETE')
													<a href="{{route('staff.brand.edit',$brand->id)}}"><i class="fadeIn icon-color-3 animated bx bx-edit-alt"></i></a> | 
													<a onclick="event.preventDefault();this.closest('form').submit();" href="{{route('staff.brand.destroy',$brand->id)}}"><i class="fadeIn icon-color-1 animated bx bx-trash"></i></a>
												</form>
											</td>
										</tr>
                                        @endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>Name</th>
											<th>Slug</th>
											<th>Status</th>
											<th>Create By</th>
											<th>Action</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
@endsection

@section('js')
<script>
    $(document).ready(function () {
        //Default data table
        $('#example').DataTable();
    });
</script>
@endsection