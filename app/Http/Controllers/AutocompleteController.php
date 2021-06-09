<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
    //for create controller - php artisan make:controller AutocompleteController

    function index()
    {
        return view('search');
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('cross')
                //->join('descriptions','descriptions.excoPartNo','LIKE','cross.excoPartNo')
                ->select('cross.*')
                ->where('cross.excoPartNo','LIKE', '%'.$query.'%')
                ->orWhere('cross.replacePartNumber','LIKE', '%'.$query.'%')
                ->orWhere('cross.replaceBrand','LIKE', '%'.$query.'%')
                ->get()
                ->unique('excoPartNo');

//                ->pluck("excoPartNo");
            $output = '<ul class="dropdown-menu" style="display:block; overflow-y: scroll; height:200px; width:50%; position:absolute">';
            foreach($data as $row)
            {
                $output .= '
       <li><a href="#">'.$row->excoPartNo.'</a></li>
       ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

}
