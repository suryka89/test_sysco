<?php

namespace App\Sysco;

class CoffeeshopApi 
{
    private $class, $method;

    public function __construct()
    {

    }

    public function getProducts()
    {
        $this->service = "https://iitd7euw75.execute-api.us-east-1.amazonaws.com/services/products/getProducts";
        return $this->syscoRequest();
    }
    
    public function createProduct($data)
    {
        $this->service = "https://iitd7euw75.execute-api.us-east-1.amazonaws.com/services/products/createProduct";
        return $this->syscoRequest($data,"create");
    }
    
    public function updateProduct($data)
    {
        $this->service = "https://iitd7euw75.execute-api.us-east-1.amazonaws.com/services/products/updateProduct";
        return $this->syscoRequest($data,"update");
    }

    public function deleteProduct($data)
    {
        $this->service ="https://iitd7euw75.execute-api.us-east-1.amazonaws.com/services/products/deleteProduct";
        return $this->syscoRequest($data,"delete");
    }
    public function getOrders()
    {
        $this->service = "https://iitd7euw75.execute-api.us-east-1.amazonaws.com/services/orders/getOrders";
        return $this->syscoRequest();
    }
    public function createOrder($data)
    {
        $this->service ="https://iitd7euw75.execute-api.us-east-1.amazonaws.com/services/orders/createOrder";
        return $this->syscoRequest($data,"create");
    }

    public function updateOrder($data)
    {
        $this->service ="https://iitd7euw75.execute-api.us-east-1.amazonaws.com/services/orders/updateOrder";
        return $this->syscoRequest($data,"update");
    }

    private function syscoRequest($data = null, $method="create")
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->service);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));
        if($data)
        {     
            $httpquery = json_encode($data);
            if($method == "create")
            {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $httpquery);
            }elseif($method == "update")
            {
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $httpquery);
            }
            elseif($method == "delete")
            {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $httpquery);
            }
        }

        try {
            $response2 = curl_exec($ch);
            curl_close($ch);
        } catch (\Exception $e) {
            return false;
        }
        return json_decode($response2,true);
    }
    

}