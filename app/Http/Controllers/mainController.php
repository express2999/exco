<?php

namespace App\Http\Controllers;

use App\Models\crossref;
use Illuminate\Http\Request;

class mainController extends Controller
{

    //go to page
public function enter()
 {
    return view('dataentry');
 }

    //add data
    public function add(Request $request)
    {
     $cross = new crossref();
     $cross->baldwin = $request->input('baldwin');
     $cross->replacePartNumber = $request->input('replacepartnumber');
     $cross->replaceBrand = $request->input('replacebrand');
     $cross->excoPartNo = $request->input('excopartno');
     if($cross->save()){
         return redirect()->back()->with('success', 'Item has been added successfully!');
     }else{
         return redirect()->back()->with('error', 'Something went wrong');
     }



    }
}
