<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Excel;

class EmployeeController extends Controller
{
    public function exportIntoExcel(){
        return Excel::download(new EmployeeExport,'employeelist.xlsx');
    }

    public function exportIntoCSV(){
        return Excel::download(new EmployeeExport,'employeelist.csv');
    }

    public function inputForm(){
         
        return view('import-form');
    }

    public function import(Request $request){
          Excel::import(new EmployeeImport,$request->file);
          return "Records are imported Sucessfully";
    }
}
