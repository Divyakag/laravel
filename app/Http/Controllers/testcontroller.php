<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator; 

class testcontroller extends Controller
{
    //
    public function importfile(){
        return view('excel');
    }
    public function importexcel(Request $req){
        $validator= Validator::make($req->all(),[
            'file'=> 'required|max:5000|mimes:xlsx,xls,csv'
        ]);
        if($validator->passes()){
            $dataTime = date('Ymd_His');
            $file = $req->file('file');
            $fileName = $dataTime . '-' . $file->getClientOrignalName();
            $savepath = public_path('/upload/');
            $file->move($savepath,$fileName);


            return redirect()->back()
            ->with(['sucess'=>'File Uploaded Sucessfully']);
        }
        else{
            return redirect()->back()
            ->with(['errors'=>$validator->errors()->all()]);
        }
    }
}
