@extends('layouts.dashboard')

@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">{{__('Order')}}</div>
                    <div class="card-body">
                        <a href="{{ url('/user/order/create') }}" class="btn btn-success btn-sm" title="Add new order">
                            <i class="fa fa-plus" aria-hidden="true"></i> {{__('Add New')}}
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/user/order', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="{{__('Search')}}..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="">
                            <!-- <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>{{__('User')}}</th><th>{{__('Status')}}</th><th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item['id'] }}</td>
                                        <td>{{ isset($item['user'])?$item['user']:'' }}</td><td>{{ $item['state'] }}</td>
                                        <td>
                                            <a href="{{ url('/user/order/' . $item['id']) }}" title="{{__('View')}} {{__('Order')}}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> -->
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <label>COLA</label>
                                    <ul id="sortable1" data-state="pending" class="connectedSortable">
                                    @foreach($orders as $item)
                                    @if($item['state'] == 'pending')
                                    <li class="ui-state-default" data-id="{{$item['id']}}" >
                                    <div class="card">
                                        <div class="card-body">
                                            {{isset($item['user'])?$item['user']:'N/A'}}
                                            @if(isset($item['items']) && is_array($item['items'] ))
                                            @foreach($item['items'] as $art)
                                                @foreach($products as $pro)
                                                    @if($pro['id'] == $art['id'])
                                                    <p>|{{ $pro['name'] }}|</p>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-3" style="text-align: center;">
                                    <label>PREPARACIÓN</label>
                                    <ul id="sortable2" data-state="preparation" class="connectedSortable">
                                    @foreach($orders as $item)
                                    @if($item['state'] == 'preparation')
                                    <li class="ui-state-default" data-id="{{$item['id']}}"  >
                                    <div class="card">
                                        <div class="card-body">
                                            {{isset($item['user'])?$item['user']:'N/A'}}
                                            @if(isset($item['items']) && is_array($item['items'] ))
                                            @foreach($item['items'] as $art)
                                                @foreach($products as $pro)
                                                    @if($pro['id'] == $art['id'])
                                                    <p>|{{ $pro['name'] }}|</p>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-3" style="text-align: center;">
                                    <label>FINALIZADO</label>
                                    <ul id="sortable3" data-state="complete" class="connectedSortable">
                                    @foreach($orders as $item)
                                    @if($item['state'] == 'complete')
                                    <li class="ui-state-default" data-id="{{$item['id']}}"  >
                                    <div class="card">
                                        <div class="card-body">
                                            {{isset($item['user'])?$item['user']:'N/A'}}
                                            @if(isset($item['items']) && is_array($item['items'] ))
                                            @foreach($item['items'] as $art)
                                                @foreach($products as $pro)
                                                    @if($pro['id'] == $art['id'])
                                                    <p>|{{ $pro['name'] }}|</p>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-3" style="text-align: center;">
                                    <label>ENTREGADO</label>
                                    <ul id="sortable4" data-state="delivered" class="connectedSortable">
                                    @foreach($orders as $item)
                                    @if($item['state'] == 'delivered')
                                    <li class="ui-state-default" data-id="{{$item['id']}}"  >
                                    <div class="card">
                                        <div class="card-body">
                                            {{isset($item['user'])?$item['user']:'N/A'}}
                                            @if(isset($item['items']) && is_array($item['items'] ))
                                            @foreach($item['items'] as $art)
                                                @foreach($products as $pro)
                                                    @if($pro['id'] == $art['id'])
                                                    <p>|{{ $pro['name'] }}|</p>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
    </div>
@endsection
