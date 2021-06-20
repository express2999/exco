@include('navbar')
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Catalogue</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



    <style>
        body {

            background_color: white;
        }

        a {
            color: #00387b;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
        }
        .nav>li>a {
            position: relative;
            color: #00387b;
            display: block;
            padding: 10px 15px;
        }
        .nav>li>a:focus, .nav>li>a:hover {
            text-decoration: none;
            background-color: rgba(255,255,255,0.1);
            color:#00387b;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: middle;
            border-top: 1px solid #ddd;
        }
        .my-custom-scrollbar {
            position: relative;
            height: 700px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }

        .trr:nth-child(n+2){
            display:none;
        }

        form.example input[type=text] {
            height: 100px;
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            border-radius: 5px 0 0px 5px;
            border-right: none;
            float: left;
            width: 80%;
            background: white;
            box-shadow: 25px 25px 25px #888888;
        }

        form.example button {
            height: 100px;
            float: left;
            width: 20%;
            padding: 10px;
            background: white;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-radius: 0px 5px 5px 0px;
            border-left: none;
            cursor: pointer;
            box-shadow: 25px 25px 25px #888888;
        }


        form.example::after {
            content: "";
            clear: both;
            display: table;
        }

    </style>
</head>
<body>

<div class="container">
    @if (\Session::has('noitems'))
        <div class="text-center">
            <div class="alert alert-success">
                <span style="color:red;font-size: 30px;"><i class="fa fa-warning" style="font-size:48px;"></i>&nbsp;&nbsp;{!! \Session::get('noitems') !!}</span>
            </div>
        </div>
    @endif


        <a href="{{Route('mainpage')}}"><p style="color:#00387b; "><u><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                    To Main Search</u></p></a>

        <div class="">
            <h2 class="" style="text-align: left;font-weight: 700;font-size: 20px;color: white;">EXCO FILTERS
                CATALOGUE</h2>
        </div>
        <form autocomplete="off" method="GET" class="example" action="{{Route('mego')}}">

            <div class="autocomplete" style="width:100%;text-align: center;">
                <input id="myid" type="text" name="myid" placeholder="Search Catalogue ..." required>
                <button type="submit" id="#submitme"><i class="fa fa-search fa-2x" style="color: gray;"></i>
                </button>
                <div id="countryList" class="countryList"></div>
                <div class="loader" id="loader" style="display: none;"></div>

                {{--               {{ csrf_field() }}--}}
            </div>


        </form><br><br>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#cross">CROSS REFERENCE</a></li>
        <li><a data-toggle="tab" href="#application">APPLICATIONS</a></li>
        <li><a data-toggle="tab" href="#exco">EXCO FILTERS</a></li>
    </ul>

    <div class="tab-content">
        <div id="exco" class="tab-pane fade">
            <center><div class="table-wrapper-scroll-y my-custom-scrollbar" style="width: 100%;background-color: white;">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                        <tr>
                            <th scope="col">Product Image</th>
                            <th scope="col">Exco Part No.</th>
                            <th scope="col">Availability</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($moga) && $moga -> count() > 0)
                            @foreach($moga as $first)

                                <tr class="trr">
                                    <td><img src="http://exco.rocketsweb.net/wp-content/uploads/newfilter-removebg-preview.png" width="70"/></td>
                                    <td><a href="{{Route('description',$first->excoPartNo)}}">{{$first->excoPartNo}}</a></td>
                                    <td><i class="fa fa-check" aria-hidden="true"></i> Available</td>

                                </tr>

                            @endforeach
                        @else
                            <div style="color: #00387b;font-weight: bold;text-align: center;font-size: 25px;"><u>Sorry No Data Available For Exco Filters</u></div>
                        @endif

                        </tbody>
                    </table>
                </div>
            </center>
        </div>
        <div id="application" class="tab-pane fade">
            <center><div class="table-wrapper-scroll-y my-custom-scrollbar" style="width: 100%;background-color: white;">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>

                        <th>Id</th>
                        <th>Manufacturer</th>
                        <th>Equipment Type</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Model Serial Number</th>
                        <th>Engine Manufacturer</th>
                        <th>Engine</th>
                        <th>Engine Serial Number</th>
                        <th>Year</th>
                        </thead>
                        <tbody>
                        @if(isset($myid) && $myid ->count() > 0)
                            @foreach($myid as $data)

                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->manufacturer}}</td>
                                    <td>{{$data->equipmentType}}</td>
                                    <td>{{$data->make}}</td>
                                    <td>{{$data->model}}</td>
                                    <td>{{$data->modelsn}}</td>
                                    <td>{{$data->enginemanufacturer}}</td>
                                    <td>{{$data->engine}}</td>
                                    <td>{{$data->enginesn}}</td>
                                    <td>{{$data->year}}</td>


                                </tr>


                            @endforeach
                        @else
                            <div style="color: #00387b;font-weight: bold;text-align: center;font-size: 25px;"><u>Sorry No Data Available For Application</u></div>
                        @endif
                        <!--                               --><?php //echo $myid->links(); ?>
                        </tbody>
                    </table>

                </div></center>

        </div>
        <div id="cross" class="tab-pane fade in active">
            <center><div class="table-wrapper-scroll-y my-custom-scrollbar" style="width: 100%;background-color: white;">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                        <tr>

                            <th scope="col">Replace Part No.</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Exco Part No.</th>
                            <th scope="col">Availability</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($moga) && $moga -> count() > 0)
                            @foreach($moga as $first)

                                <tr>

                                    <td>{{$first->replacePartNumber}}</td>
                                    <td>{{$first->replaceBrand}}</td>
                                    <td><a href="{{Route('description',$first->excoPartNo)}}">{{$first->excoPartNo}}</a></td>
                                    <td><i class="fa fa-check" aria-hidden="true"></i> Available</td>

                                </tr>

                            @endforeach
                        @else
                            <div style="color: #00387b;font-weight: bold;text-align: center;font-size: 25px;"><u>Sorry There Is No Cross Reference</u></div>
                        @endif
                        </tbody>
                    </table>
                </div>
            </center>
        </div>
    </div>
</div>

</body>
</html>
