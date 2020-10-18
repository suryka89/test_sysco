@extends('layouts.dashboard')

@section('content')

    <div class="container">
                <div class="card">
                    <div class="card-header">{{ __('Activity Logs') }}</div>
                    <div class="card-body">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/activitylogs', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
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
                                        <th>ID</th><th>{{ __('Activity') }}</th><th>{{ __('Actor') }}</th><th>{{ __('Date') }}</th><th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($activitylogs as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            @if ($item->causer)
                                                <a href="{{ url('/admin/users/' . $item->causer->id) }}">{{ $item->causer->name }}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ url('/admin/activitylogs/' . $item->id) }}" title="View Activity"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/activitylogs', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            <button type="submit" class="btn btn-danger btn-sm" title="{{ __('Delete') }}" onclick="return confirm('{{ __('Confirm delete?') }}')">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i></button>

                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $activitylogs->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
    </div>
@endsection
