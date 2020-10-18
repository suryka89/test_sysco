@extends('layouts.dashboard')

@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">{{__('Order')}}</div>
                    <div class="card-body">
                        
                        <a href="{{ url('/user/order') }}" title="{{__('Back')}}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{__('Back')}}</button></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    <tr><th>{{__('User')}}  </th><td> {{ $order['user'] }} 
                                    </td>
                                    <tr><th>{{__('Status')}}  </th><td> <select class="form-control" onchange="changeState(this,'{{$order['id'] }}')">
                                    <option value="pending" <?php echo($order['state'] == 'pending'?'selected':'');  ?>>Pendiente</option>
                                    <option value="complete" <?php echo($order['state'] == 'complete'?'selected':'');  ?>>Finalizado</option>
                                    </select>  </td>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
    </div>
@endsection
