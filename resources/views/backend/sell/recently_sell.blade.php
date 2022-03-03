@extends('backend.components.layout');
@section('title')
    Recently Sell Product
@endsection
@section('content')
    <!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Sell Table</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-clipboard'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Manage Sold Product</li>
								</ol>
							</nav>
						</div>
					</div>
					<x-showMessage></x-showMessage>
					<!--end breadcrumb-->
                    <div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Manage Sell</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<div id="test"></div>
                                    <thead>
										<tr>
											<td>Date</td>
											<th>Customer Name</th>
											<th>Number</th>
											<th>Product Name</th>
											<th>Quantity</th>
											<th>Selling Price</th>
											<th>Profit</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($sells as $item)
                                            <tr>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->productName }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->sPrice }}</td>
												<td>{{($item->sPrice*$item->quantity)-($item->bPrice*$item->quantity)}}</td>
                                                <td>
                                                    <form action="{{route('staff.sell.destroy',$item->id)}}" method="post">
                                                        @csrf 
                                                        @method('DELETE')
                                                        <a href="{{route('staff.sell.edit',$item->id)}}"><i class="fadeIn icon-color-3 animated bx bx-edit-alt"></i></a> | 
                                                        <a onclick="event.preventDefault();this.closest('form').submit();" href="{{route('staff.product.destroy',$item->id)}}"><i class="fadeIn icon-color-1 animated bx bx-trash"></i></a>
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