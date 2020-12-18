<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use PDF;


class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product= new Product;
        $product->title=$request->title;
        $product->discription=$request->discription;
        $product->price=$request->price;
        $product->type=$request->type;
        $product->is_active=$request->is_active;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        return Product::where("title","like","%".$name."%")->orWhere("discription","like","%".$name."%")->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product= Product::find($id);
        $product->title=$request->title;
        $product->discription=$request->discription;
        $product->price=$request->price;
        $product->type=$request->type;
        $product->is_active=$request->is_active;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product= Product::find($id);
        $result=$product->delete();
        if($result){
            return ["Result"=>"Record has been Deleted"];
        }
        else{
            return ["Result"=>"Record is not Deleted"];
        }
        
    }
    public function filter($min,$max){
        $users = DB::table('products')
           ->whereBetween('price', [$min,$max ])
           ->get();
           return $users;
     }
    public function createPDF()
    {
            $data = Product::all();
            view()->share('Product',$data);
            $pdf = PDF::loadView('pdf_view', $data);
            return $pdf->download('pdf_file.pdf');
        
    }
}
