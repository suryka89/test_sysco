<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Sysco\CoffeeshopApi;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $api = new CoffeeshopApi();
        $orders =$api->getOrders()["items"];
        $products =$api->getProducts()["items"];
        return view('user.order.index', compact('orders','products'));
    }
    public function create()
    {
        return view('user.order.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'user' => 'required',
            'json_producs' => 'required',
        ]);
        $requestData = $request->all();
        $requestData["items"] = json_decode($requestData["json_producs"],true);
        unset($requestData['_token']);
        unset($requestData['json_producs']);
        $api = new CoffeeshopApi();
        $res = $api->createOrder($requestData);
        if($res['status'] == 200)
        {
            return redirect('user/order')->with('flash_message', 'Order added!');
        }else{
            return redirect('user/order')->with('flash_message', 'Order error!');
        }
    }
    public function show($id)
    {
        $api = new CoffeeshopApi();
        $orders =$api->getOrders()["items"];
        foreach($orders as $item)
        {
            if($item['id'] == $id)
            {
                $order= $item;
            }
        }
        return view('user.order.show', compact('order'));
    }


    public function getListProduct(Request $request)
    {
        $api = new CoffeeshopApi();
        $products =$api->getProducts()["items"];
        $fill="";
        $count = 0;
        foreach($products as $item)
        {
            $fill .=  '<tr>'.
                        '<td class="text-center">'.
                            '<div class="form-check" style="margin-top: -5px!important;">'.
                                '<input type="checkbox" value="'.$item['id'].'" class="form-check-input"  name="id_products" id="id_products">'.
                                '<label class="form-check-label" for="materialChecked2"></label>'.
                            '</div>'.
                        '</td>'.
                        '<td>'.$item['name'].'</td>'.
                        '<td><img  src="'.$item['image'].'" alt="'.$item['name'].' width="100" height="100""></td>'.
                        '<td><input type="text" style="display:none" value="'.$item['price'].'" name="price"><p>'.$item['price'].'</p></td>'.
                        '<td><input type="number" onchange="calcularTotal()" onkeyup="calcularTotal()" class="form-control" name="qty['.$count.']"></td>'.
                      '</tr>';
            $count++;
        }
        return $fill;
    }

    public function updateState(Request $request)
    {
        
        $requestData = $request->all();
        // dd($requestData);
        unset($requestData['_token']);
        $api = new CoffeeshopApi();
        $res = $api->updateOrder($requestData);
        if($res['status'] == 200)
        {
            return "Se realizo el cambio exitosamente";
        }else{
            return "Error, por favor intentelo mas tarde.";
        }
    }

}
