@extends('backend.components.layout');
@section('title')
    Manage Category
@endsection

@section('content')
    <!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Category Table</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-clipboard'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Manage Categories</li>
								</ol>
							</nav>
						</div>
					</div>
					<x-showMessage></x-showMessage>
					<!--end breadcrumb-->
                    <div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Manage Categories</h4>
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
                                        @foreach ($categories as $category)
                                        <tr>
											<td>{{$category->name}}</td>
											<td>{{$category->slug}}</td>
											<td>{{ucfirst($category->status)}}</td>
											<td>{{$category->user->name}}</td>
											<td>
												<form action="{{route('staff.category.destroy',$category->id)}}" method="post">
													@csrf 
													@method('DELETE')
													<a href="{{route('staff.category.edit',$category->id)}}"><i class="fadeIn icon-color-3 animated bx bx-edit-alt"></i></a> | 
													<a onclick="event.preventDefault();this.closest('form').submit();" href="{{route('staff.category.destroy',$category->id)}}"><i class="fadeIn icon-color-1 animated bx bx-trash"></i></a>
												</form>
											</td>
										</tr>
										@if (count($category->subCategory))
											@foreach ($category->subCategory as $sub)
											<tr>
												<td>{{$category->name}} > {{$sub->name}}</td>
												<td>{{$sub->slug}}</td>
												<td>{{ucfirst($sub->status)}}</td>
												<td>{{$sub->user->name}}</td>
												<td>
													<form action="{{route('staff.category.destroy',$sub->id)}}" method="post">
														@csrf 
														@method('DELETE')
														<a href="{{route('staff.category.edit',$sub->id)}}"><i class="fadeIn icon-color-3 animated bx bx-edit-alt"></i></a> | 
														<a onclick="event.preventDefault();this.closest('form').submit();" href="{{route('staff.category.destroy',$sub->id)}}"><i class="fadeIn icon-color-1 animated bx bx-trash"></i></a>
													</form>
												</td>
											</tr>
												@if (count($sub->subCategory))
													@foreach($sub->subCategory as $sub2)
													<tr>
														<td>{{$category->name}} > {{$sub->name}}  > {{$sub2->name}}</td>
														<td>{{$sub2->slug}}</td>
														<td>{{ucfirst($sub2->status)}}</td>
														<td>{{$sub2->user->name}}</td>
														<td>
															<form action="{{route('staff.category.destroy',$sub2->id)}}" method="post">
																@csrf 
																@method('DELETE')
																<a href="{{route('staff.category.edit',$sub2->id)}}"><i class="fadeIn icon-color-3 animated bx bx-edit-alt"></i></a> | 
																<a onclick="event.preventDefault();this.closest('form').submit();" href="{{route('staff.category.destroy',$sub2->id)}}"><i class="fadeIn icon-color-1 animated bx bx-trash"></i></a>
															</form>
														</td>
													</tr>
													@endforeach
												@endif
											@endforeach
										@endif
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