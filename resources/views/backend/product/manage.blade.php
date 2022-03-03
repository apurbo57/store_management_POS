@extends('backend.components.layout');
@section('title')
    Manage Posts
@endsection

@section('content')
    <!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Posts Table</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-clipboard'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Manage Posts</li>
								</ol>
							</nav>
						</div>
					</div>
					<x-showMessage></x-showMessage>
					<!--end breadcrumb-->
                    <div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Manage Posts</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<div id="test"></div>
                                    <thead>
										<tr>
											<td><input type="checkbox" id="checkall"></td>
											<th>Name</th>
											<th>Quantity</th>
											<th>Brand</th>
											<th>Buying Price</th>
											<th>Total</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($products as $product)
                                        <tr>
											<td><input type="checkbox" class="checkbox-item"></td>
											<td>{{$product->name}}</td>
											<td>{{$product->quantity}}</td>
											<td>
												@if (!empty($product->brand->name))
												{{$product->brand->name}}
												@else
													No Brand
												@endif
											</td>
											<td>{{$product->buing_price}}</td>
											<td>{{$product->quantity * $product->buing_price}}</td>
											<td>
												<form action="{{route('staff.product.destroy',$product->id)}}" method="post">
													@csrf 
													@method('DELETE')
													<a href="{{route('staff.product.edit',$product->id)}}"><i class="fadeIn icon-color-3 animated bx bx-edit-alt"></i></a> | 
													<a onclick="event.preventDefault();this.closest('form').submit();" href="{{route('staff.product.destroy',$product->id)}}"><i class="fadeIn icon-color-1 animated bx bx-trash"></i></a>
												</form>
											</td>
										</tr>
										@endforeach
									</tbody>
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