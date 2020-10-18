@extends('layouts.dashboard')
@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">{{__('Edit')}} {{__('Product')}} #{{ $product['id'] }}</div>
                    <div class="card-body">
                        <a href="{{ url('/user/products') }}" title="{{__('Back')}}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{__('Back')}}</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($product, [
                            'method' => 'PATCH',
                            'url' => ['/user/products', $product['id']],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('user.products.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
    </div>
@endsection
