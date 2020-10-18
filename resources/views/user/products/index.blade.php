@extends('layouts.dashboard')

@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">{{__('Products')}}</div>
                    <div class="card-body">
                        <a href="{{ url('/user/products/create') }}" class="btn btn-success btn-sm" title="{{__('Add New')}} {{__('Product')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i> {{__('Add New')}}
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/user/products', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>{{__('Name')}}</th><th>{{__('Description')}}</th><th>{{__('Price')}}</th><th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item['id'] }}</td>
                                        <td>{{ $item['name'] }}</td><td>{{$item['description']}}</td><td>{{ $item['price'] }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/user/products/' . $item['id'] . '/edit') }}" title="{{__('Edit')}} {{__('Product')}}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/user/products', $item['id']],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => __('Delete'),
                                                        'onclick'=>'return confirm("'.__('Confirm delete?').'")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
    </div>
@endsection
