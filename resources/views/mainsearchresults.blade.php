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

    </style>
</head>
<body>

<div class="container">
    <!-- <h2>Dynamic Tabs</h2>
     <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>
 -->

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
