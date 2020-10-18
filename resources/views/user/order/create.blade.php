@extends('layouts.dashboard')

@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">{{__('Create New')}} {{__('Order')}}</div>
                    <div class="card-body">
                        <a href="{{ url('/user/order') }}" title="{{__('Back')}}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{__('Back')}}</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/user/order', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('user.order.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
    </div>
@endsection
