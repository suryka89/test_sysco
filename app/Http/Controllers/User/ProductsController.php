<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Sysco\CoffeeshopApi;
use Auth;
use Storage;    
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $api = new CoffeeshopApi();
        $products =$api->getProducts()["items"];
        return view('user.products.index', compact('products'));
    }

    public function create()
    {
        return view('user.products.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'blob_file' => 'required',
            'price'=> 'required',
            'description'=> 'required'
		]);
        $requestData = $request->all();
        if(isset($requestData["blob_file"]))
        {
            $id_user = \Auth::user()->id;
            $name = str_replace(' ','_', strtolower(trim(\Auth::user()->name)));
            $file_name = $name."-".time().".png"; 
            Storage::disk('public')->put('images/products/'.$file_name, file_get_contents($requestData['blob_file']));
            unset($requestData['blob_file']);
            $path = '/images/products/'.$file_name;
            $requestData['image'] = asset(Storage::url($path));
        }
        unset($requestData['_token']);
        $api = new CoffeeshopApi();
        $res = $api->createProduct($requestData);
        if($res['status'] == 200)
        {
            return redirect('user/products')->with('flash_message', 'Product added!');
        }else{
            return redirect('user/products')->with('flash_message', 'Product error!');
        }
    }

    public function show($id)
    {
        $api = new CoffeeshopApi();
        $products =$api->getProducts()["items"];
        foreach($products as $item)
        {
            if($item['id'] == $id)
            {
                $product= $item;
            }
        }
        return view('user.products.show', compact('product'));
    }

 
    public function edit($id)
    {
        $api = new CoffeeshopApi();
        $products =$api->getProducts()["items"];
        foreach($products as $item)
        {
            if($item['id'] == $id)
            {
                $product= $item;
            }
        }
        return view('user.products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
            'price'=> 'required',
            'description'=> 'required'
		]);
        $requestData = $request->all();
        // dd($requestData);
        $api = new CoffeeshopApi();
        $products =$api->getProducts()["items"];
        foreach($products as $item)
        {
            if($item['id'] == $id)
            {
                $product= $item;
            }
        }
        if(isset($requestData["blob_file"]))
        {
            $id_user = \Auth::user()->id;
            $name = str_replace(' ','_', strtolower(trim(\Auth::user()->name)));
            $file_name = $name."-".time().".png"; 
            Storage::disk('public')->put('images/products/'.$file_name, file_get_contents($requestData['blob_file']));
            $path = '/images/products/'.$file_name;
            $requestData['image'] = asset(Storage::url($path));
            $path =str_replace(asset(Storage::url("")),"",$product['image']);
            $exists = Storage::disk('public')->exists($path);
            if($exists)
            {
                Storage::disk('local')->delete($path);
                Storage::disk('public')->delete($path);
            }
        }else
        {
            $requestData['image'] =  $product['image'];
        }
        unset($requestData['_token']);
        unset($requestData['_method']);
        unset($requestData['blob_file']);
        $requestData['id'] = $id;
        $res = $api->updateProduct($requestData);
        if($res['status'] == 200)
        {
            return redirect('user/products')->with('flash_message', 'Product updated!');
        }else{
            return redirect('user/products')->with('flash_message', 'Product error!');
        }
    }


    public function destroy($id)
    {
        $api = new CoffeeshopApi();
        $products =$api->getProducts()["items"];
        foreach($products as $item)
        {
            if($item['id'] == $id)
            {
                $product= $item;
            }
        }
        $path =str_replace(asset(Storage::url("")),"",$product['image']);
        $exists = Storage::disk('public')->exists($path);
        if($exists)
        {
            Storage::disk('local')->delete($path);
            Storage::disk('public')->delete($path);
        }
        $requestData['id'] = $id;
        $api->deleteProduct($requestData);

        return redirect('user/products')->with('flash_message', 'Product deleted!');
    }

}
