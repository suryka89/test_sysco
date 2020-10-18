@extends('layouts.dashboard')

@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">{{ __('Activity') }} {{ $activitylog->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/activitylogs') }}" title="{{ __('Back') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __('Back') }}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/activitylogs', $activitylog->id],
                            'style' => 'display:inline'
                        ]) !!}
                        <button type="submit" class="btn btn-danger btn-sm" title="{{ __('Delete') }}" onclick="return confirm('{{ __('Confirm delete?') }}')">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>{{ __('Delete') }}</button>
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $activitylog->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> {{ __('Activity') }} </th><td> {{ $activitylog->description }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{ __('Actor') }} </th>
                                        <td>
                                            @if ($activitylog->causer)
                                                <a href="{{ url('/admin/users/' . $activitylog->causer->id) }}">{{ $activitylog->causer->name }}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> {{ __('Date') }}  </th><td> {{ $activitylog->created_at }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
    </div>
@endsection
