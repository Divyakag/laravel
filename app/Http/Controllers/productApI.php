<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class productApI extends Controller
{
    //
    function getdata(){
      return Product::all();
    }
    function add(Request $req){
        $product= new Product;
        $product->title=$req->title;
        $product->discription=$req->discription;
        $product->price=$req->price;
        $product->type=$req->type;
        $product->is_active=$req->is_active;
        $result= $product->save();
        if($result)
        {
            return ["Result"=>"Data has been saved"];
        }
        else
        {
            return ["Result"=>"operation failed"];
        }
        
    }
    function update(Request $req){
        $product= Product::find($req->id);
        $product->title=$req->title;
        $product->discription=$req->discription;
        $product->price=$req->price;
        $product->type=$req->type;
        $product->is_active=$req->is_active;
        $result= $product->save();
        if($result)
        {
            return ["Result"=>"Data has been updated"];
        }
        else
        {
            return ["Result"=>"operation has been failed"];
        }
    }
    function delete($id){
        $product= Product::find($id);
        $result=$product->delete();
        if($result){
            return ["Result"=>"Record has been Deleted"];
        }
        else{
            return ["Result"=>"Record is not Deleted"];
        }
        
    }
    function search($name){
        return Product::where("title","like","%".$name."%")->orWhere("discription","like","%".$name."%")->get();
        // $name = DB::table('products')
        //             ->where('votes', 'like', 100)
        //             ->orWhere('name', 'John')
        //             ->get();
    }
     function filter($min,$max){
        $users = DB::table('products')
           ->whereBetween('price', [$min,$max ])
           ->get();
           return $users;
     }
   
}
