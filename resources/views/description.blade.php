@include('navbar')
<html>
<head>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
    <link href='//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css' rel='stylesheet'/>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <title>
        @if(isset($mego))
            @foreach($mego as $product)
                PART-NO: {{$product->excoPartNo}}
            @endforeach

        @elseif(isset($exco))
            @foreach($exco as $product)
                PART-NO: {{$product->excoPartNo}}
            @endforeach
        @endif
    </title>

    <style>
        body {

            background_color: white;
        }

        li{
            font-weight: bold;
        }
        .single {
            padding: 30px 15px;
            margin-top: 5px;
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.3); }
        .single h3.side-title {
            margin: 0;
            margin-bottom: 10px;
            padding: 0;
            font-size: 20px;
            color: #333;
            text-transform: uppercase; }
        .single h3.side-title:after {
            content: '';
            width: 100%;
            height: 1px;
            background: #00387b;
            display: block;
            margin-top: 6px; }

        .single ul {
            margin-bottom: 0; }
        .single li a {
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
            border-bottom: 1px solid #f0f0f0;
            line-height: 40px;
            display: block;
            text-decoration: none; }
        .single li a:hover {
            color: #ff173c; }
        .single li:last-child a {
            border-bottom: 0; }

        .nav-tabs>li>a {
            color: #00387b;
        }

        form.example input[type=text] {
            height: 100px;
            padding: 10px;
            font-size: 17px;
            border: 1px solid #8ef5ec;
            border-radius: 5px 0 0px 5px;
            border-right: none;
            float: left;
            width: 80%;
            background: white;
            box-shadow: 5px 10px 8px #888888;
        }

        form.example button {
            height: 100px;
            float: left;
            width: 20%;
            padding: 10px;
            background: white;
            color: white;
            font-size: 17px;
            border: 1px solid #8ef5ec;
            border-radius: 0px 5px 5px 0px;
            border-left: none;
            cursor: pointer;
            box-shadow: 5px 10px 8px #888888;
        }

        form.example button:hover {
            background: white;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }
        li{
            -webkit-user-select: none; /* Safari */
            -ms-user-select: none; /* IE 10 and IE 11 */
            user-select: none; /* Standard syntax */

        }
        td{
            -webkit-user-select: none; /* Safari */
            -ms-user-select: none; /* IE 10 and IE 11 */
            user-select: none; /* Standard syntax */
        }
    </style>
</head>

<body>


<div class="container" style="background-color: white">
    <center><div class="">
            <h2 class="" style="text-align: left;font-weight: 700;font-size: 20px;color:  #00387b;;">EXCO FILTERS CATALOGUE</h2>
        </div>
        <form autocomplete="off" method="GET" class="example" action="{{Route('mego')}}">

            <div class="autocomplete" style="width:100%;text-align: center;">
                <input id="myid" type="text" name="myid" placeholder="Search Catalogue ..." required>
                <button type="submit" id="#submitme"><i class="fa fa-search fa-2x" style="color: gray;"></i></button>

                {{--               {{ csrf_field() }}--}}
            </div>


        </form></center><br>
    <div class="row">
        <div class="col-sm-6" style="background-color: white">
            <!-- Category -->
            <div class="single category">
                <h3 class="side-title">
                    @if(isset($mego))
                        @foreach($mego as $product)
                            <span style="font-weight: bold;color: black;font-size: 30px;">EXCO PART NO: {{$product->excoPartNo}}</span><br><br>
                            <span style="font-weight: bold;color: gray;text-transform: capitalize;font-size: 30px;">{{$product->filterType}}, {{$product->shape}}</span>
                        @endforeach

                    @elseif(isset($exco))
                        @foreach($exco as $product)
                            <span style="font-weight: bold;color: black;font-size: 30px;">EXCO PART NO: {{$product->excoPartNo}}</span><br><br>
                            <span style="font-weight: 400;color: gray;text-transform: capitalize;font-size: 30px;">{{$product->filterType}}, {{$product->shape}}</span>
                        @endforeach
                    @endif
                </h3><br>

                <ul class="list-unstyled">
                    <h4 style="color: gray;font-weight: bold">Technical Specifications</h4>
                    <br>
                    @if(isset($mego))
                        @foreach($mego as $product)
                            {{--                            @if($product->threadSort == "-")--}}
                            {{--                                <li style="display: none;"><a href="#" title="">Thread Sort <span class="pull-right">{{$product->threadSort}}</span></a></li>--}}
                            {{--                            @else--}}
                            {{--                                <li><a href="#" title=""><span style="color: #00387b;">Thread Sort:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->threadSort}}</span></a></li>--}}
                            {{--                            @endif--}}
                            @if($product->threadMM == "-" || $product->threadMM == " ")
                                <li style="display: none;"><a href="#" title="">Thread (MM) <span class="pull-right">{{$product->threadMM}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Thread (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->threadMM}}</span></a></li>
                            @endif
                            @if($product->threadInch == "-" || $product->threadInch == " ")
                                <li style="display: none;"><a href="#" title="">Thread (Inches) <span class="pull-right">{{$product->threadInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Thread (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->threadInch}}</span></a></li>
                            @endif
                            @if($product->perInch == "-" || $product->perInch == " ")
                                <li style="display: none;"><a href="#" title="">Per Inch <span class="pull-right">{{$product->perInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Per Inch:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->perInch}}</span></a></li>
                            @endif

                            @if($product->upc == "  -" || $product->upc == " ")
                                <li style="display: none;"><a href="#" title="">UPC <span class="pull-right">{{$product->upc}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">UPC:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->upc}}</span></a></li>
                            @endif
                            @if($product->lengthInch == "  -" || $product->lengthInch == " ")
                                <li style="display: none;"><a href="#" title="">Length (Inches) <span class="pull-right">{{$product->lengthInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Length (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->lengthInch}}</span></a></li>
                            @endif
                            @if($product->lengthMm == "  -" || $product->lengthMm == " ")
                                <li style="display: none;"><a href="#" title="">Length (MM) <span class="pull-right">{{$product->lengthMm}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Length (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->lengthMm}}</span></a></li>
                            @endif
                            @if($product->widthMm == "  -" || $product->widthMm == " ")
                                <li style="display: none;"><a href="#" title="">Width (MM) <span class="pull-right">{{$product->widthMm}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Width (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->widthMm}}</span></a></li>
                            @endif
                            @if($product->heightMm == "  -" || $product->heightMm == " ")
                                <li style="display:none;"><a href="#" title="">Height (MM) <span class="pull-right">{{$product->heightMm}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Height (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->heightMm}}</span></a></li>
                            @endif
                            @if($product->widthInch == "  -" || $product->widthInch == " ")
                                <li style="display: none;"><a href="#" title="">Width (Inches) <span class="pull-right">{{$product->widthInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Width (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->widthInch}}</span></a></li>
                            @endif
                            @if($product->heightInch == "  -" || $product->heightInch == " ")
                                <li style="display: none;"><a href="#" title="">Height (Inches) <span class="pull-right">{{$product->heightInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Height (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->heightInch}}</span></a></li>
                            @endif
                            @if($product->outlet == "  -" || $product->outlet == " ")
                                <li style="display: none;"><a href="#" title="">Outlet <span class="pull-right">{{$product->outlet}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Outlet:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->outlet}}</span></a></li>
                            @endif
                            @if($product->odInch == "  -" || $product->odInch == " ")
                                <li style="display: none;"><a href="#" title="">OD (Inches) <span class="pull-right">{{$product->odInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">OD (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->odInch}}</span></a></li>
                            @endif
                            @if($product->odMM == "  -" || $product->odMM == " ")
                                <li style="display: none;"><a href="#" title="">OD (mm) <span class="pull-right">{{$product->odMM}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">OD (mm):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->odMM}}</span></a></li>
                            @endif
                            @if($product->od2Inch == "  -" || $product->od2Inch == " ")
                                <li style="display: none;"><a href="#" title="">OD2 (Inches) <span class="pull-right">{{$product->od2Inch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">OD2 (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->od2Inch}}</span></a></li>
                            @endif
                            @if($product->od2MM == "  -" || $product->od2MM == " ")
                                <li style="display: none;"><a href="#" title="">OD2 (MM) <span class="pull-right">{{$product->od2MM}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">OD2 (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->od2MM}}</span></a></li>
                            @endif
                            @if($product->idINCH == "  -" || $product->idINCH == " ")
                                <li style="display: none;"><a href="#" title="">ID (Inches) <span class="pull-right">{{$product->idINCH}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">ID (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->idINCH}}</span></a></li>
                            @endif
                            @if($product->idMM == "  -" || $product->idMM == " ")
                                <li style="display: none;"><a href="#" title="">ID (MM) <span class="pull-right">{{$product->idMM}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">ID (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->idMM}}</span></a></li>
                            @endif
                            @if($product->packageQty == "  -" || $product->packageQty == " ")
                                <li style="display: none;"><a href="#" title="">Package Quantity: <span class="pull-right">{{$product->packageQty}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Package Quantity:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->packageQty}}</span></a></li>
                            @endif
                            @if($product->fits == "  -" || $product->fits == " ")
                                <li style="display: none;"><a href="#" title="">Fits With: <span class="pull-right">{{$product->fits}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Fits With: </span><span class="pull-right" style="color: black;font-weight: 400;">  <?php
                                            $names = $product->fits;
                                            $parts = explode(",", $names);
                                            $result = implode(',  &nbsp;&nbsp;', $parts);
                                            echo $result
                                            ?></span></a></li>
                            @endif
                            @if($product->replaces == "-" || $product->replaces == " ")
                                <li style="display: none;"><a href="#" title="">Replaces <span class="pull-right">{{$product->replaces}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">To Enter Change:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->replaces}}</span></a></li>
                            @endif
                        @endforeach
                    @elseif(isset($exco) && $exco -> count() > 0)
                        @foreach($exco as $product)
                            {{--                            @if($product->threadSort == "-")--}}
                            {{--                                <li style="display: none;"><a href="#" title="">Thread Sort <span class="pull-right">{{$product->threadSort}}</span></a></li>--}}
                            {{--                            @else--}}
                            {{--                                <li><a href="#" title=""><span style="color: #00387b;">Thread Sort:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->threadSort}}</span></a></li>--}}
                            {{--                            @endif--}}
                            @if($product->threadMM == "  -" || $product->threadMM == " ")
                                <li style="display: none;"><a href="#" title="">Thread (MM) <span class="pull-right">{{$product->threadMM}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Thread (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->threadMM}}</span></a></li>
                            @endif
                            @if($product->threadInch == "  -" || $product->threadInch == " ")
                                <li style="display: none;"><a href="#" title="">Thread (Inches) <span class="pull-right">{{$product->threadInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Thread (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->threadInch}}</span></a></li>
                            @endif
                            @if($product->perInch == "  -" || $product->perInch == " ")
                                <li style="display: none;"><a href="#" title="">Per Inch <span class="pull-right">{{$product->perInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Per Inch:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->perInch}}</span></a></li>
                            @endif

                            @if($product->upc == "  -" || $product->upc == " ")
                                <li style="display: none;"><a href="#" title="">UPC <span class="pull-right">{{$product->upc}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">UPC:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->upc}}</span></a></li>
                            @endif
                            @if($product->lengthInch == "  -" || $product->lengthInch == " ")
                                <li style="display: none;"><a href="#" title="">Length (Inches) <span class="pull-right">{{$product->lengthInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Length (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->lengthInch}}</span></a></li>
                            @endif
                            @if($product->lengthMm == "  -" || $product->lengthMm == " ")
                                <li style="display: none;"><a href="#" title="">Length (MM) <span class="pull-right">{{$product->lengthMm}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Length (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->lengthMm}}</span></a></li>
                            @endif
                            @if($product->widthMm == "  -" || $product->widthMm == " ")
                                <li style="display: none;"><a href="#" title="">Width (MM) <span class="pull-right">{{$product->widthMm}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Width (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->widthMm}}</span></a></li>
                            @endif
                            @if($product->heightMm == "  -" || $product->heightMm == " ")
                                <li style="display:none;"><a href="#" title="">Height (MM) <span class="pull-right">{{$product->heightMm}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Height (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->heightMm}}</span></a></li>
                            @endif
                            @if($product->widthInch == "  -" || $product->widthInch == " ")
                                <li style="display: none;"><a href="#" title="">Width (Inches) <span class="pull-right">{{$product->widthInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Width (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->widthInch}}</span></a></li>
                            @endif
                            @if($product->heightInch == "  -" || $product->heightInch == " ")
                                <li style="display: none;"><a href="#" title="">Height (Inches) <span class="pull-right">{{$product->heightInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Height (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->heightInch}}</span></a></li>
                            @endif
                            @if($product->outlet == "  -" || $product->outlet == " ")
                                <li style="display: none;"><a href="#" title="">Outlet <span class="pull-right">{{$product->outlet}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Outlet:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->outlet}}</span></a></li>
                            @endif
                            @if($product->odInch == "  -" || $product->odInch == " ")
                                <li style="display: none;"><a href="#" title="">OD (Inches) <span class="pull-right">{{$product->odInch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">OD (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->odInch}}</span></a></li>
                            @endif
                            @if($product->odMM == "  -" || $product->odMM == " ")
                                <li style="display: none;"><a href="#" title="">OD (mm) <span class="pull-right">{{$product->odMM}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">OD (mm):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->odMM}}</span></a></li>
                            @endif
                            @if($product->od2Inch == "  -" || $product->od2Inch == " ")
                                <li style="display: none;"><a href="#" title="">OD2 (Inches) <span class="pull-right">{{$product->od2Inch}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">OD2 (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->od2Inch}}</span></a></li>
                            @endif
                            @if($product->od2MM == "  -" || $product->od2MM == " ")
                                <li style="display: none;"><a href="#" title="">OD2 (MM) <span class="pull-right">{{$product->od2MM}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">OD2 (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->od2MM}}</span></a></li>
                            @endif
                            @if($product->idINCH == "  -" || $product->idINCH == " ")
                                <li style="display: none;"><a href="#" title="">ID (Inches) <span class="pull-right">{{$product->idINCH}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">ID (Inches):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->idINCH}}</span></a></li>
                            @endif
                            @if($product->idMM == "  -" || $product->idMM == " ")
                                <li style="display: none;"><a href="#" title="">ID (MM) <span class="pull-right">{{$product->idMM}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">ID (MM):</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->idMM}}</span></a></li>
                            @endif
                            @if($product->packageQty == "  -" || $product->packageQty == " ")
                                <li style="display: none;"><a href="#" title="">Package quantity: <span class="pull-right">{{$product->packageQty}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Package quantity:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->packageQty}}</span></a></li>
                            @endif
                            @if($product->fits == "  -" || $product->fits == " ")
                                <li style="display: none;"><a href="#" title="">Fits With: <span class="pull-right">{{$product->fits}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">Fits With: </span><span class="pull-right" style="color: black;font-weight: 400;">  <?php
                                            $names = $product->fits;
                                            $parts = explode(",", $names);
                                            $result = implode(',  &nbsp;&nbsp;', $parts);
                                            echo $result
                                            ?></span></a></li>
                            @endif
                            @if($product->replaces == "  -" || $product->replaces == " ")
                                <li style="display: none;"><a href="#" title="">Replaces <span class="pull-right">{{$product->replaces}}</span></a></li>
                            @else
                                <li><a href="#" title=""><span style="color: #00387b;">To Enter Change:</span> <span class="pull-right" style="color: black;font-weight: 400;">{{$product->replaces}}</span></a></li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-sm-6">
            <img class="img-fluid" src="http://exco.rocketsweb.net/wp-content/uploads/newfilter.jpg" width="450" alt="images not found" style="margin-top: 120px;">
        </div>
    </div>



    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#cross"><h1 style="font-weight: bold;font-size: 23px;">CROSS REFERENCE</h1></a></li>
        <li><a data-toggle="tab" href="#application"><h1 style="font-weight: bold;font-size: 23px;">APPLICATIONS</h1></a></li>
    </ul>

    <div class="tab-content" style="margin-bottom: 100px;">
        <div id="cross" class="tab-pane fade in active">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">Replace Part No

                    </th>
                    <th class="th-sm">Replace Brand

                    </th>

                </tr>
                </thead>
                <tbody>
                @if(isset($mego))
                    @foreach($mego as $megoz)
                        @foreach(DB::table('cross')
                        ->select('cross.*')
                        ->where('excoPartNo',$megoz->excoPartNo)
                        ->get() as $product)
                            <tr>
                                <td style="font-weight: bold;color: #00387b;">{{$product->replacePartNumber}}</td>
                                <td style="font-weight: bold;color: #00387b;">{{$product->replaceBrand}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @elseif(isset($exco))
                    @foreach($exco as $megoz)
                        @foreach(DB::table('cross')
                        ->select('cross.*')
                        ->where('excoPartNo',$megoz->excoPartNo)
                        ->get() as $product)
                            <tr>
                                <td style="font-weight: bold;color: #00387b;">{{$product->replacePartNumber}}</td>
                                <td style="font-weight: bold;color: #00387b;">{{$product->replaceBrand}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endif

                </tbody>
                <tfoot>
                <tr>
                    <th class="th-sm">Replace Part No

                    </th>
                    <th class="th-sm">Replace Brand

                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div id="application" class="tab-pane fade">
            <center><font style="font-size: 25px;font-weight: bold;">Data will be available soon</font></center>
        </div>
    </div>


</div>

</body>

<script>
    $(document).ready( function () {
        $('#dtBasicExample').DataTable
        (
            {
                "pageLength": 4
            }
        );
    } );
</script>
<script>
    jQuery('#myid').on('click', function () {
        document.getElementById("#submitme").style.background = "#00387b";

    });

    $(document).click((event) => {
        if (!$(event.target).closest('#myid').length) {
            document.getElementById("#submitme").style.background = "white";
        }
    });
</script>
</html>
