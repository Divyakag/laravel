<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class filecontroller extends Controller
{
    function upload(Request $request){ 
        //  $file = $request->file('file')->store('images');
        //  return ["result"=>$file];
        if ($request->file('file') == null) {
            $file = "";          
        }else{       
            $file = $request->file('file')->store('apiDocs'); 
        }
        return ["result"=>$file];
    }
}
