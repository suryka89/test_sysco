@extends('layouts.dashboard')

@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">{{__('Product')}} {{ $product->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/user/products') }}" title="{{__('Back')}}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{__('Back')}}</button></a>
                        <a href="{{ url('/user/products/' . $product->id . '/edit') }}" title="{{__('Edit')}} {{__('Product')}}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{__('Edit')}}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['user/products', $product->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => __('Delete Product'),
                                    'onclick'=>'return confirm("'.__('Confirm delete?').'")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th> {{__('Name')}} </th><td> {{ $product->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{__('Description')}} </th>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <th> {{__('Category')}} </th>
                                        <td> {{ $product->categories_name }} </td>
                                    </tr>
                                    <!-- <tr>
                                        <th> Sub-Category </th>
                                        <td> {{ $product->subcategories_name }} </td>
                                    </tr> -->
                                    <tr>
                                        <th> {{__('Image')}} </th>
                                        <td> <div style="float:left;border:4px solid #303641;padding:5px;margin:5px;"><img height="200" width="200" src="{{ Storage::url($product->image) }}" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
    </div>
@endsection
