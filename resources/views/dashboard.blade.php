@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{__('Dashboard')}}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <a href="{{ url('user/order') }}">
                        <img src="https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/v291-batch2-nunoon-23-coffee_2.jpg?w=800&dpr=1&fit=default&crop=default&q=65&vib=3&con=3&usm=15&bg=F4F4F3&ixlib=js-2.2.1&s=d37ae74609192d10a0c28fad57184565" style="
                                width: 101%;
                                height: 101%;
                                border-radius: 145px;
                            ">
                        </div>
                        </a>
                    </div>
                </div> 
                 <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body performane-indicator-card">
                        <a href="{{ url('user/products') }}">
                        <img src="https://e7.pngegg.com/pngimages/608/9/png-clipart-orange-house-logo-warehouse-computer-icons-logistics-factory-free-warehouse-inventory-miscellaneous-angle.png" style="
                                width: 101%;
                                height: 101%;
                                border-radius: 145px;
                            ">
                        </div>
                        </a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
@stop