@extends('backend.components.layout');
@section('title')
    Dashboard
@endsection

@section('content')
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-voilet">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{$products->count()}}<i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                </div>
                                <div class="ml-auto font-35 text-white"><i class="bx bx-cart-alt"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Total Product</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-primary-blue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">
                                        {{$totalBuying}}
                                    <i class='bx bxs-down-arrow-alt font-14 text-white'></i> </h2>
                                </div>
                                <div class="ml-auto font-35 text-white"><i class="bx bx-lira"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Total Buying Taka</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-rose">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{$totalSelling}}<i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                </div>
                                <div class="ml-auto font-35 text-white"><i class="bx bx-lira"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Total Selling Taka</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-primary-blue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-green">{{$totalProfit}}<i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                </div>
                                <div class="ml-auto font-35 text-white"><i class="bx bx-lira"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Total Profit</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-sunset">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-denger">{{$totalLoss}} <i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                </div>
                                <div class="ml-auto font-35 text-white"><i class="bx bx-lira"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Total Loss</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <div class="card radius-15">
                <div class="card-header border-bottom-0">
                    <div class="d-lg-flex align-items-center">
                        <div>
                            <h5 class="mb-2 mb-lg-0">Sales Update</h5>
                        </div>
                        <div class="ml-lg-auto mb-2 mb-lg-0">
                            <div class="btn-group-round">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white">Daiiy</button>
                                    <button type="button" class="btn btn-white">Weekly</button>
                                    <button type="button" class="btn btn-white">Monthly</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Total Sale</th>
                                        <th>Total Buying</th>
                                        <th>Total Selling</th>
                                        <th>Total Profit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                       $sale = 0;
                                        $buying = 0;
                                        $selling = 0;
                                        $Profit = 0;
                                        foreach ($todayProfit as $item){
                                            $sa = $item->quantity;
                                            $sale += $sa;
                                            $P = ($item->sPrice*$item->quantity)-($item->bPrice*$item->quantity);
                                            $Profit += $P;
                                            $b = $item->bPrice*$item->quantity;
                                            $buying += $b;
                                            $s = $item->sPrice*$item->quantity;
                                            $selling += $s;
                                        } 
                                    @endphp
                                    <td>{{ $sale }}</td>
                                    <td>{{ $buying }}</td>
                                    <td>{{ $selling }}</td>
                                    <td>{{ $Profit }}</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart1"></div>
                </div>
            </div>
            <!--end row-->
            <div class="card radius-15">
                <div class="card-header border-bottom-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Recent Sell</h5>
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-white radius-15" href="{{route('staff.sell.recently_sell')}}">View More</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Number</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Selling Price</th>
                                    <th>Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soldPro as $item)
                                <tr>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->productName }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->sPrice }}</td>
                                    <td>{{($item->sPrice*$item->quantity)-($item->bPrice*$item->quantity)}}</td>
                                    
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
@endsection