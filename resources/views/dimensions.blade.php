@include('navbar')
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {

        }

        /* Solid border */
        hr.solid {
            border-top: 3px solid #00387b;
            width: 100%;
        }

        .loader {
            border: 4px solid #f3f3f3;
            border-radius: 50%;
            border-top: 4px solid #3498db;
            width: 30px;
            height: 30px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
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

        /*the container must be positioned relative:*/
        .autocomplete {
            position: relative;
            display: inline-block;
        }

        .widthcompatability {
            width: 50%;
        }

        @media only screen and (max-width: 1500px) {
            .widthcompatability {
                width: 100%;
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>

</head>


<body>
<!-- final table -->
<center><a href="{{Route('mainpage')}}"><p style="color:#00387b; "><u><i class="fa fa-arrow-left"
                                                                         aria-hidden="true"></i> Back To Main Search</u>
        </p></a>
    <form autocomplete="off" method="GET" class="example" action="{{Route('mego')}}">

        <div class="autocomplete widthcompatability">
            <input id="myid" type="text" name="myid" placeholder="Search Catalogue ..." required>
            <button type="submit" id="#submitme"><i class="fa fa-search fa-2x" style="color: gray;"></i></button>
            <div id="countryList" class="countryList"></div>
            <div class="loader" id="loader" style="display: none;"></div>

            {{--               {{ csrf_field() }}--}}
        </div>


    </form>
    <br><br>

    <br><br>

    <div class="panel panel-primary widthcompatability" style="background-color: rgba(255, 255, 255, 0.5);">
        <div class="panel-heading" style="background-color: #00387b;border-color: #00387b;">
            <div>
                <h2 class="text-center">Search By Dimensions</h2>
            </div>

        </div>
        <div class="panel-body">




                <form autocomplete="off" method="POST" action="{{Route('dimensionsearch')}}">
                    @csrf
                    <div class="col-md-6">
                        <h3 class="" style="float:left;font-weight: 1000;font-size: 20px;color: #00387b;">Filter Type</h3>
                        <hr class="solid" style="margin-left: 0px;">
                        <select class="form-control" name="filterType" id="filterType" style="height: 60px;">
                            <option selected="false">
                                FilterType
                            </option>

                            @foreach(\App\Models\dimensions::distinct()->get(['filterType']) as $dinadata)
                                <option value="{{$dinadata->filterType}}">{{$dinadata->filterType}}</option>
                            @endforeach

                        </select>
                        <br>
                    </div>


                    <div class="col-md-6">
                        <h3 class="" style="float:left;font-weight: 1000;font-size: 20px;color: #00387b;">Filter Shape</h3>
                        <hr class="solid" style="margin-left: 0px;">
                        <div class="loader" id="loader2" style="display: none;"></div>
                        <select class="form-control" name="filterShape" id="filterShape" style="height: 60px;">
                            <option>
                                Shape
                            </option>
                        </select>
                        <br>
                    </div>
                    <br><br>
                    <div class="row" id="specs" style="display: none">
                    <div class="col-md-8">
                        <h3 class="" style="float:left;font-weight: 1000;font-size: 20px;color: #00387b;">
                            Dimensions</h3>
                        <hr class="solid" style="margin-left: 0px;">
                        <ul class="list-group">

                            <li class="list-group-item" id="length">
                                <div class="row">
                                    <h4 class="col-sm-1" style="font-size: 30px;font-weight: bold;margin-top: 0px;">
                                        A</h4>
                                    <h4 class="col-sm-4"
                                        style="font-size: 15px;white-space: nowrap;margin-left: -20px;font-weight: bold">
                                        Length</h4>
                                    <input type="number" class="col-sm-2"
                                           style="height: 30px;border:1px solid lightgray;margin-left: 10px;"
                                           placeholder="inch" name="length"/>
                                    <h4 class="col-sm-3" style="font-size: 15px;font-weight: bold">Tolerance +/-</h4>
                                    <select class="col-sm-2"
                                            style="height: 30px;width: auto;border:1px solid lightgray;"
                                            name="lengthtolerance">
                                        <option>0.1 inch</option>
                                        <option>0.2 inch</option>
                                        <option>0.4 inch</option>
                                        <option>0.5 inch</option>
                                        <option>1.0 inch</option>
                                    </select>
                                </div>
                            </li>

                            <li class="list-group-item" id="width">
                                <div class="row">
                                    <h4 class="col-sm-1" style="font-size: 30px;font-weight: bold;margin-top: 0px;">
                                        B</h4>
                                    <h4 class="col-sm-4"
                                        style="font-size: 15px;white-space: nowrap;margin-left: -20px;font-weight: bold">
                                        Width</h4>
                                    <input type="number" class="col-sm-2"
                                           style="height: 30px;border:1px solid lightgray;margin-left: 10px;"
                                           placeholder="inch" name="width"/>
                                    <h4 class="col-sm-3" style="font-size: 15px;font-weight: bold">Tolerance +/-</h4>
                                    <select class="col-sm-2"
                                            style="height: 30px;width: auto;border:1px solid lightgray;"
                                            name="widthtolerance">
                                        <option>0.1 inch</option>
                                        <option>0.2 inch</option>
                                        <option>0.4 inch</option>
                                        <option>1.0 inch</option>
                                    </select>
                                </div>
                            </li>

                            <li class="list-group-item" id="height">
                                <div class="row">
                                    <h4 class="col-sm-1" style="font-size: 30px;font-weight: bold;margin-top: 0px;">
                                        C</h4>
                                    <h4 class="col-sm-4"
                                        style="font-size: 15px;white-space: nowrap;margin-left: -20px;font-weight: bold">
                                        Height</h4>
                                    <input type="number" class="col-sm-2"
                                           style="height: 30px;border:1px solid lightgray;margin-left: 10px;"
                                           placeholder="inch" name="height"/>
                                    <h4 class="col-sm-3" style="font-size: 15px;font-weight: bold">Tolerance +/-</h4>
                                    <select class="col-sm-2"
                                            style="height: 30px;width: auto;border:1px solid lightgray;"
                                            name="heighttolerance">
                                        <option>0.1 inch</option>
                                        <option>0.2 inch</option>
                                        <option>0.4 inch</option>
                                        <option>1.0 inch</option>
                                    </select>
                                </div>
                            </li>

                            <li class="list-group-item" id="od">
                                <div class="row">
                                    <h4 class="col-sm-1" style="font-size: 30px;font-weight: bold;margin-top: 0px;">
                                        D</h4>
                                    <h4 class="col-sm-4"
                                        style="font-size: 15px;white-space: nowrap;margin-left: -20px;font-weight: bold">
                                        Outer Diameter</h4>
                                    <input type="number" class="col-sm-2"
                                           style="height: 30px;border:1px solid lightgray;margin-left: 10px;"
                                           placeholder="inch" name="od"/>
                                    <h4 class="col-sm-3" style="font-size: 15px;font-weight: bold">Tolerance +/-</h4>
                                    <select class="col-sm-2"
                                            style="height: 30px;width: auto;border:1px solid lightgray;"
                                            name="odtolerance">
                                        <option>0.1 inch</option>
                                        <option>0.2 inch</option>
                                        <option>0.4 inch</option>
                                        <option>1.0 inch</option>
                                    </select>
                                </div>
                            </li>

                            <li class="list-group-item" id="od2">
                                <div class="row">
                                    <h4 class="col-sm-1" style="font-size: 30px;font-weight: bold;margin-top: 0px;">
                                        E</h4>
                                    <h4 class="col-sm-4"
                                        style="font-size: 15px;white-space: nowrap;margin-left: -20px;font-weight: bold">
                                        Outer Diameter-2</h4>
                                    <input type="number" class="col-sm-2"
                                           style="height: 30px;border:1px solid lightgray;margin-left: 10px;"
                                           placeholder="inch" name="od2"/>
                                    <h4 class="col-sm-3" style="font-size: 15px;font-weight: bold">Tolerance +/-</h4>
                                    <select class="col-sm-2"
                                            style="height: 30px;width: auto;border:1px solid lightgray;"
                                            name="od2tolerance">
                                        <option>0.1 inch</option>
                                        <option>0.2 inch</option>
                                        <option>0.4 inch</option>
                                        <option>1.0 inch</option>
                                    </select>
                                </div>
                            </li>

                            <li class="list-group-item" id="thread">
                                <div class="row">
                                    <h4 class="col-sm-1" style="font-size: 30px;font-weight: bold;margin-top: 0px;">
                                        F</h4>
                                    <h4 class="col-sm-4"
                                        style="font-size: 15px;white-space: nowrap;margin-left: -20px;font-weight: bold">
                                        Thread</h4>
                                    <input type="number" class="col-sm-2"
                                           style="height: 30px;border:1px solid lightgray;margin-left: 10px;"
                                           placeholder="inch" name="thread"/>
                                    <h4 class="col-sm-3" style="font-size: 15px;font-weight: bold">Tolerance +/-</h4>
                                    <select class="col-sm-2"
                                            style="height: 30px;width: auto;border:1px solid lightgray;"
                                            name="threadtolerance">
                                        <option>0.1 inch</option>
                                        <option>0.2 inch</option>
                                        <option>0.4 inch</option>
                                        <option>1.0 inch</option>
                                    </select>
                                </div>
                            </li>

                            <li class="list-group-item" id="id1">
                                <div class="row">
                                    <h4 class="col-sm-1" style="font-size: 30px;font-weight: bold;margin-top: 0px;">
                                        G</h4>
                                    <h4 class="col-sm-4"
                                        style="font-size: 15px;white-space: nowrap;margin-left: -20px;font-weight: bold">
                                        Inner Diameter</h4>
                                    <input type="number" class="col-sm-2"
                                           style="height: 30px;border:1px solid lightgray;margin-left: 10px;"
                                           placeholder="inch" name="id1"/>
                                    <h4 class="col-sm-3" style="font-size: 15px;font-weight: bold">Tolerance +/-</h4>
                                    <select class="col-sm-2"
                                            style="height: 30px;width: auto;border:1px solid lightgray;"
                                            name="id1tolerance">
                                        <option>0.1 inch</option>
                                        <option>0.2 inch</option>
                                        <option>0.4 inch</option>
                                        <option>1.0 inch</option>
                                    </select>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <h3 class="col-sm-2"></h3>
                                    <h4 class="col-sm-3">Bypass valve</h4>
                                    <select class="col-sm-4" style="height: 30px;border:1px solid lightgray;">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                    <h4 class="col-sm-2"></h4>
                                    <div class="col-sm-1"></div>
                                </div>
                            </li>

                        </ul>
                        <br><br>
                        <div class="col-md-3 text-center">
                            <button class="btn btn-primary btn-lg" style="background-color: #00387b;" id="search">Search
                                <i class="fa fa-arrow-right"></i></button>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <h3 class="" style="float:left;font-weight: 1000;font-size: 20px;color: #00387b;">Example for
                            dimensions</h3>
                        <hr class="solid" style="margin-left: 0px;">
                        <img class="img-fluid" src="http://exco.rocketsweb.net/wp-content/uploads/newfilter.jpg"
                             width="250" alt="images not found">
                    </div>
            </div>
            </form>
        </div>

    </div>
</center>
@if (\Session::has('noitems'))
    <div class="text-center">
        <div class="alert alert-success">
            <span style="color:red;font-size: 30px;"><i class="fa fa-warning" style="font-size:48px;"></i>&nbsp;&nbsp;{!! \Session::get('noitems') !!}</span>
        </div>
    </div>

@endif

<!-- Modal -->
{{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg" role="document">--}}
{{--        <div class="modal-content">--}}
@if(isset($dimensions) && $dimensions -> count() > 0)
    <center>
        <div class="panel panel-primary"
             style="width: 100%;height:30%;background-color: rgba(255, 255, 255, 0.2);overflow-x:auto;overflow-y:auto;">
            <div class="panel-heading" style="background-color:#00387b;border-color: #00387b;">
                Information <i class="fa fa-info"></i>
            </div>

            <div class="panel-body" style="">
                <table class="table table-bordered">
                    <thead>
                    <th>Exco Part-Number</th>
                    <th>Filter-Type</th>
                    <th>Filter-Description</th>
                    <th>shape</th>
                    <th>Length(Inch)</th>
                    <th>Width(Inch)</th>
                    <th>Height(Inch)</th>
                    <th>Outer Diameter</th>
                    <th>Outer Diameter-2</th>
                    <th>Inner Diameter</th>
                    <th>Thread(Inch)</th>
                    </thead>
                    <tbody>
                    @foreach($dimensions as $dimension)
                        <tr>
                            <td>{{$dimension->excoPartNo}}</td>
                            <td>{{$dimension->filterType}}</td>
                            <td>{{$dimension->filterDescription}}</td>
                            <td>{{$dimension->shape}}</td>
                            <td>{{$dimension->lengthInch}}</td>
                            <td>{{$dimension->widthInch}}</td>
                            <td>{{$dimension->heightInch}}</td>
                            <td>{{$dimension->odInch}}</td>
                            <td>{{$dimension->od2Inch}}</td>
                            <td>{{$dimension->idInch}}</td>
                            <th>{{$dimension->threadInch}}</th>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <a href="{{Route('dimensions')}}">
            <button class="btn btn-primary" style="background-color: #00387b; id=" clear
            "><i class="fa fa-trash"></i> Clear Search</button></a><br><br>
    </center>
@endif

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


</body>


<script type="text/javascript">

    /*filterType*/

    jQuery('select[name="filterType"]').on('change', function () {
        document.getElementById("loader2").style.display = "block";
        document.getElementById("specs").style.display = "none";

        var filterType = jQuery(this).val();
        if (filterType) {
            jQuery.ajax({
                url: '/filterType/' + filterType,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="filterShape"]').empty(); // remove last selected item
                    jQuery('select[name="filterShape"]').append('<option>Filter shape</option>');
                    jQuery.each(data, function (key, value) {

                        $('select[name="filterShape"]').append('<option value="' + key + '">' + value + '</option>');
                        document.getElementById("loader2").style.display = "none";
                    });
                }
            });
        } else {
            $('select[name="filterShape"]').empty();
        }
    });


    jQuery('select[name="filterShape"]').on('change', function () {
        document.getElementById("specs").style.display = "none";
        let filterShape = jQuery(this).val();
        if (filterShape == "Box-Style") {
            console.log(filterShape + " is selected")

            document.getElementById("od").style.display = "none";
            document.getElementById("od2").style.display = "none";
            document.getElementById("thread").style.display = "none";
            document.getElementById("id1").style.display = "none";

            document.getElementById("specs").style.display = "block";


        } else if (filterShape == "Panel") {
            console.log(filterShape + " is selected")

            document.getElementById("od").style.display = "none";
            document.getElementById("od2").style.display = "none";
            document.getElementById("thread").style.display = "none";
            document.getElementById("id1").style.display = "none";

            document.getElementById("specs").style.display = "block";


        } else if (filterShape == "Can-Type") {
            console.log(filterShape + " is selected")

            document.getElementById("width").style.display = "none";
            document.getElementById("height").style.display = "none";
            document.getElementById("thread").style.display = "none";
            document.getElementById("od2").style.display = "none";

            document.getElementById("specs").style.display = "block";


        } else {
            console.log(filterShape + " is selected")
            document.getElementById("specs").style.display = "block";
            document.getElementById("od").style.display = "block";
            document.getElementById("od2").style.display = "block";
            document.getElementById("thread").style.display = "block";
            document.getElementById("id1").style.display = "block";
            document.getElementById("length").style.display = "block";
            document.getElementById("width").style.display = "block";
            document.getElementById("height").style.display = "block";
        }

    });

</script>


<script>
    function showmodal() {
        $('#myModal').modal('show');
    }
</script>

<!--Button Clicked-->
</html>

