<?php

namespace App\Http\Controllers;
Use App\item;

class ServiceController extends Controller
{

    public function query(){
        $items = Item::all();
        $data = [];
        for ($i = 0; $i< sizeof($items); $i = $i+1){
            $keys = array_keys($data);
            if ($keys == null){
                $data[$items[$i]->getProduct_id()] = [$items[$i]->product()->get()[0],$items[$i]->getQuantity()];
            }else{
                if(!in_array($items[$i]->getProduct_id(),$keys)){
                    $data[$items[$i]->getProduct_id()] = [$items[$i]->product()->get()[0],$items[$i]->getQuantity()];
                }else{
                    $product = $data[$items[$i]->getProduct_id()];
                    $quantiy = $product[1] + $items[$i]->getQuantity();
                    $product[1] = $quantiy;
                    $data[$items[$i]->getProduct_id()] = $product;
                }
            }
        }
        $mayor1 = 0;
        $mayor2 = 0;
        $mayor3 = 0;
        $response = [];
        $keys = array_keys($data);
        foreach($keys as $key){
            if($data[$key][1] > $mayor1){
                $response[0] = $data[$key];
                $mayor1 = $data[$key][1];
            }elseif($data[$key][1] > $mayor2){
                $mayor2 = $data[$key][1];
                $response[1] = $data[$key];
            }elseif($data[$key][1] > $mayor3){
                $response[2] = $data[$key];
                $mayor3 = $data[$key][1];
            }
        }
        return response()->json($response);
    }

}
