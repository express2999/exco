<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\crossref;
use App\Models\description;
use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class relations extends Controller
{
    /*
    public function mohamed($id){

        $exco = new crossref();
        $exco->part = ('b99');
        $exco->crossref = ($id);
        $exco->save();
        return 'Dina';

    }
 */
    public function product(Request $request){

        $mego = DB::table('cross')
            ->join('descriptions','descriptions.excoPartNo','=','cross.excoPartNo')
            ->select('descriptions.*', 'cross.*')
            ->where('cross.excoPartNo','=', $request->input('product'))
            ->limit(1)
            ->get();
        if($mego -> count() > 0)
        {
            return view('description',compact('mego'));

        }else{
            return redirect()->back()->with('noitems', 'This item not found in our records');
        }

    }

    public function cross(Request $request){

        $exco = DB::table('cross')
            //->join('descriptions','descriptions.excopart','LIKE','cross.excopart')
            ->select('cross.*')
            ->where('cross.replacePartNumber','LIKE', '%'.$request->input('cross').'%')
            ->get();
        if($exco -> count() > 0)
        {
            return view('searchresults',compact('exco'));

        }else{
            return redirect()->back()->with('noitems', 'This item not found in our records');
        }

    }


    public function relation(Request $request){

        $moga = DB::table('cross')
            //->join('descriptions','descriptions.excopart','LIKE','cross.excopart')
            ->select('cross.*')
            ->where('cross.replacePartNumber','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('cross.excoPartNo','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('cross.replaceBrand','LIKE', '%'.$request->input('myid').'%')
            ->get();
        $myid = DB::table('application')
            ->select('application.*')
            ->where('manufacturer','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('equipmentType','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('make','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('model','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('modelsn','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('enginemanufacturer','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('engine','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('enginesn','LIKE', '%'.$request->input('myid').'%')
            ->orWhere('year','LIKE', '%'.$request->input('myid').'%')
            ->get();

        if($moga -> count() > 0 && $myid -> count() > 0){
            return view('mainsearchresults',compact('moga','myid'));
        }
        elseif ($moga -> count() > 0)
        {
            return view('mainsearchresults',compact('moga'));
        }
        elseif ($myid -> count() > 0)
        {
            return view('mainsearchresults',compact('myid'));
        }
        else
        {
            return redirect()->back()->with('noitems', 'This item not found in our records');
        }

    }


    public function description($part){

        $exco = description::where('excoPartNo',$part)->get();

        return view('description',compact('exco'));

    }

    public function equipmentType($thedata)
    {
        $equipment = DB::table('application')
            ->select('manufacturer', 'equipmentType')
            ->where('manufacturer',$thedata)
            ->distinct("equipmentType")
            ->pluck("equipmentType","equipmentType");
        return json_encode($equipment);
    }

    public function getMake($equipmentTypeID,$manufacturer)
    {
        $make = DB::table('application')
            ->select('make', 'equipmentType')
            ->where('equipmentType','=',$equipmentTypeID)
            ->where('manufacturer','=',$manufacturer)
            //->distinct("equipmentType")
            ->pluck("make","make");
        return json_encode($make);
    }

    public function getmodel($makeID,$manufacturer,$equipmentType)
    {
        $model = DB::table('application')
            ->select('make', 'model')
            ->where('make',$makeID)
            ->where('manufacturer',$manufacturer)
            ->where('equipmentType',$equipmentType)
            ->distinct("make")
            ->pluck("model","model");
        return json_encode($model);
    }

    public function getmodelsn($modelID,$makeID,$manufacturer,$equipmentType)
    {
        $modelsn = DB::table('application')
            ->select('modelsn', 'model')
            ->where('model',$modelID)
            ->where('make',$makeID)
            ->where('manufacturer',$manufacturer)
            ->where('equipmentType',$equipmentType)
            ->distinct("model")
            ->pluck("modelsn","modelsn");
        return json_encode($modelsn);
    }

    public function enginemanu($modelID,$makeID,$manufacturer,$equipmentType)
    {
        $enginemanufacturer = DB::table('application')
            ->select('enginemanufacturer', 'model')
            ->where('model',$modelID)
            ->where('make',$makeID)
            ->where('manufacturer',$manufacturer)
            ->where('equipmentType',$equipmentType)
            ->distinct("model")
            ->pluck("enginemanufacturer","enginemanufacturer");
        return json_encode($enginemanufacturer);
    }

    public function getIngine($enginemanuID,$modelID,$makeID,$manufacturer,$equipmentType)
    {
        $myengine = DB::table('application')
            ->select('enginemanufacturer', 'engine')
            ->where('enginemanufacturer',$enginemanuID)
            ->where('model',$modelID)
            ->where('make',$makeID)
            ->where('manufacturer',$manufacturer)
            ->where('equipmentType',$equipmentType)
            ->distinct("enginemanufacturer")
            ->pluck("engine","engine");
        return json_encode($myengine);
    }

    public function getIngineSN($engineID,$enginemanuID,$modelID,$makeID,$manufacturer,$equipmentType)
    {
        $myengineSN = DB::table('application')
            ->select('engine', 'enginesn')
            ->where('engine',$engineID)
            ->where('enginemanufacturer',$enginemanuID)
            ->where('model',$modelID)
            ->where('make',$makeID)
            ->where('manufacturer',$manufacturer)
            ->where('equipmentType',$equipmentType)
            ->distinct("engine")
            ->pluck("enginesn","enginesn");
        return json_encode($myengineSN);
    }

    public function year($engineID,$enginemanuID,$modelID,$makeID,$manufacturer,$equipmentType)
    {
        $year = DB::table('application')
            ->select('engine', 'year')
            ->where('engine',$engineID)
            ->where('enginemanufacturer',$enginemanuID)
            ->where('model',$modelID)
            ->where('make',$makeID)
            ->where('manufacturer',$manufacturer)
            ->where('equipmentType',$equipmentType)
            ->distinct("engine")
            ->pluck("year","year");
        return json_encode($year);
    }


    public function getData($manufacturer,$equipmentType,$make,$model,$modelSN,$engineManufacturer,$engine,$engineSerial,$year)
    {
        $alldata = DB::table('application')
            ->select('application.*')
            ->where('manufacturer', 'LIKE', '%' . $manufacturer . '%')
            ->where('equipmentType', 'LIKE', '%' . $equipmentType . '%')
            ->where('make', 'LIKE', '%' . $make . '%')
            ->where('model', 'LIKE', '%' . $model . '%')
            ->where('model', 'LIKE', '%' . $model . '%')
            ->where('modelsn', 'LIKE', '%' . $modelSN . '%')
            ->where('enginemanufacturer', 'LIKE', '%' . $engineManufacturer . '%')
            ->where('engine', 'LIKE', '%' . $engine . '%')
            ->where('enginesn', 'LIKE', '%' . $engineSerial . '%')
            ->where('year', 'LIKE', '%' . $year . '%')
            ->get();

        if ($alldata->count() > 0) {
            return view('advancedsearch', compact('alldata'));

        }else{
            return redirect()->back()->with('noitem', 'This item not found in our records');
        }


    }


    public function filterType($filterType)
    {
        $filterShape = DB::table('dimensions')
            ->select('shape')
            ->where('filterType',$filterType)
            //->distinct("shape")
            ->pluck("shape","shape");
        return json_encode($filterShape);
    }


    public function dimensionsearch(Request $request)
    {
        $filterShape = $request->input('filterShape');

        $mylength = floatval($request->input('lengthtolerance'));
        $mywidth = floatval($request->input('widthtolerance'));
        $myheight = floatval($request->input('heighttolerance'));
        $myod = floatval($request->input('odtolerance'));
        $myod2 = floatval($request->input('od2tolerance'));
        $mythread = floatval($request->input('threadtolerance'));
        $myid1 = floatval($request->input('id1tolerance'));


        $length = floatval($request->input('length'));
        $width = floatval($request->input('width'));
        $height = floatval($request->input('height'));
        $od = floatval($request->input('od'));
        $od2 = floatval($request->input('od2'));
        $thread = floatval($request->input('thread'));
        $id1 = floatval($request->input('id1'));


        /******************** The Array ********************/

        $lengthUp = $length + $mylength;
        $lengthDown = $length - $mylength;

        $widthUp = $width + $mywidth;
        $widthDown = $width - $mywidth;

        $heightUp = $height + $myheight;
        $heightDown = $height - $myheight;

        $odUp = $od + $myod;
        $odDown = $od - $myod;

        $od2Up = $od2 + $myod2;
        $od2Down = $od2 - $myod2;

        $threadUp = $thread + $mythread;
        $threadDown = $thread - $mythread;

        $id1Up = $id1 + $myid1;
        $id1Down = $id1 - $myid1;


        /******************** The Array ********************/


        $dimensions = DB::table('dimensions')
            ->select('dimensions.*')
            ->where('dimensions.shape', $filterShape)
            ->where(function($q) use ($lengthUp, $lengthDown, $widthUp, $widthDown, $heightUp, $heightDown, $odUp, $odDown, $od2Up, $od2Down, $threadUp, $threadDown, $id1Up, $id1Down) {
                $q->whereBetween('dimensions.lengthInch', [$lengthDown,$lengthUp])
                    ->orwhereBetween('dimensions.widthInch', [$widthDown, $widthUp])
                    ->orwhereBetween('dimensions.heightInch', [$heightDown, $heightUp])
                    ->orwhereBetween('dimensions.odInch', [$odDown, $odUp])
                    ->orwhereBetween('dimensions.od2Inch', [$od2Down, $od2Up])
                    ->orwhereBetween('dimensions.threadInch', [$threadDown, $threadUp])
                    ->orwhereBetween('dimensions.idInch', [$id1Down, $id1Up]);
            })
            ->get();


        if ($dimensions->count() > 0) {
            return view('dimensions', compact('dimensions'));

        } else {
            return redirect()->back()->with('noitems', 'Sorry, there is not filter with these specs');
        }

    }



}
