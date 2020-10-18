@extends('layouts.dashboard')

@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">Banner {{ $banner->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/banner') }}" title="{{ __('Back') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __('Back') }}</button></a>
                        <a href="{{ url('/admin/banner/' . $banner->id . '/edit') }}" title="Edit Banner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ __('Edit') }}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['banner', $banner->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => __('Delete'),
                                    'onclick'=>'return confirm("'.__('Confirm delete?').'")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $banner->id }}</td>
                                    </tr>
                                    <tr><th> {{ __('Name') }} </th><td> {{ $banner->name }} </td></tr><tr><th> {{ __('Link') }} </th><td> {{ $banner->link }} </td></tr><tr><th> {{ __('Description') }} </th><td> {{ $banner->description }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
    </div>
@endsection
