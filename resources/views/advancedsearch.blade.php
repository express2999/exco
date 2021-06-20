@include('navbar')
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {

            height: 100%;

            background-image: url(http://exco.rocketsweb.net/wp-content/uploads/image-004-2.jpg);
            background-size: 110% 110%;
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
            box-shadow: inset 0 0 0 2000px rgba(255, 255, 255, 0.0);
            animation: shrink 25s infinite alternate;
            margin_bottom: 150px;
        }

        @keyframes shrink {
            0% {
                background-size: 130% 130%;
            }
            100% {
                background-size: 95% 95%;
            }
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

        /* enable absolute positioning */
        .inner-addon {
            position: relative;
        }

        /* style glyph */
        .inner-addon .glyphicon {
            position: absolute;
            padding: 20px;
            font-size: 30px;
            color: grey;
            pointer-events: none;
        }

        /* align glyph */
        .left-addon .glyphicon {
            left: 0px;
        }

        .right-addon .glyphicon {
            right: 0px;
        }

        /* add padding  */
        .left-addon input {
            padding-left: 30px;
        }

        .right-addon input {
            padding-right: 30px;
        }

        /* Solid border */
        hr.solid {
            border-top: 3px solid white;
            width: 50%;
        }

        .responsive {
            max-width: 100%;
            max-height: 100%;
        }


        @media only screen and (max-width: 1500px) {
            .responsive {
                float: left;
                width: 33.33%;
                padding: 5px;
            }

            .onlyforme {
                margin-top: 0px;
            }
        }

        table {
            border: 1px solid gray;
        }

        tbody {
            border: 1px solid gray;
        }

        tr {
            border: 1px solid gray;
        }

        th {
            border: 1px solid gray;
            color: aliceblue;
        }

        td {
            border: 1px solid gray;
            color: white;
            font-weight: bold;
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
        }

        form.example button:hover {
            background: white;
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
    <center>
        <div class="" style="">
            <a href="https://excofilter.com" target="_blank"><p style="color:white; font-size: 30px; font-weight: bold">
                    <u><i class="fa fa-arrow-left" aria-hidden="true"></i> Back To ExcoFilter</u></p></a>
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


            </form>
            <!-- final table -->
            <center><a href="{{Route('mainpage')}}"><p style="color:white;font-size: 25px; "><u><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Back To Main Search</u></p></a>
            </center>
            <div class="row">
                <div class="col-md-5" style="text-align: left;">
                    <h3 class="" style="font-weight: 700;font-size: 25px;color: white;">Application type</h3>
                    <hr class="solid" style="margin-left: 0px;">
                    <div class="row">
                        <div class="col-md-4 responsive"><img src="{{ asset("/images/car.png")}}" width="100%"></div>
                        <div class="col-md-4 responsive"><img src="{{ asset("/images/truck.png")}}" width="100%"></div>
                        <div class="col-md-4 responsive"><img src="{{ asset("/images/collection.png")}}" width="100%">
                        </div>
                    </div>

                </div>
            </div>
            <center><br><br><br>
                <div class="" style="width: 100%;">

                    <div class="">


                        <div class="loader" id="loader1" style="display: none;"></div>
                        <select class="form-control" name="manufacturer" id="manufacturer" style="height: 50px;">
                            <option selected="false">
                                Manufacturer
                            </option>
                            @foreach(DB::table('manufacturer')
                            ->select('manufacturer.*')
                            ->get() as $dinadata)
                                <option value="{{$dinadata->name}}">{{$dinadata->name}}</option>
                            @endforeach
                        </select>
                        <br>


                        <div class="loader" id="loader2" style="display: none;"></div>
                        <select class="form-control" name="equipmentType" id="equipmentType" style="height: 50px;">
                            <option selected="false">
                                equipmentType
                            </option>
                        </select>
                        <br>


                        <div class="loader" id="loader3" style="display: none;"></div>
                        <select class="form-control" name="make" id="make" style="height: 50px;">
                            <option selected="false">
                                make
                            </option>
                        </select>
                        <br>


                        <div class="loader" id="loader4" style="display: none;"></div>
                        <select class="form-control" name="model" id="model" style="height: 50px;">
                            <option selected="false">
                                model
                            </option>
                        </select>
                        <br>


                        <div class="loader" id="loader5" style="display: none;"></div>
                        <select class="form-control" name="modelsn" id="modelsn" style="height: 50px;">
                            <option selected="false">
                                Model serial number
                            </option>
                        </select>
                        <br>


                        <div class="loader" id="loader6" style="display: none;"></div>
                        <select class="form-control" name="enginemanu" id="enginemanu" style="height: 50px;">
                            <option selected="false">
                                Engine Manufacturer
                            </option>
                        </select>
                        <br>


                        <div class="loader" id="loader7" style="display: none;"></div>
                        <select class="form-control" name="engine" id="engine" style="height: 50px;">
                            <option selected="false">
                                engine
                            </option>
                        </select>
                        <br>


                        <div class="loader" id="loader8" style="display: none;"></div>
                        <select class="form-control" name="enginesn" id="enginesn" style="height: 50px;">
                            <option selected="false">
                                Engine SN
                            </option>
                        </select>
                        <br>


                        <div class="loader" id="loader9" style="display: none;"></div>
                        <select class="form-control" id="year" name="year" style="height: 50px;">
                            <option selected="false">
                                year
                            </option>
                        </select>
                        <br>


                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary btn-lg" style="background-color: #00387b;" id="search"><i
                                    class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                    <br><br><br><br><br><br>

                </div>
            </center>


            @if (\Session::has('noitem'))
                <div class="text-center">
                    <div class="alert alert-success">
                        <span style="color:red;font-size: 30px;"><i class="fa fa-warning" style="font-size:48px;"></i>&nbsp;&nbsp;{!! \Session::get('noitem') !!}</span>
                    </div>
                </div>
            @endif
            @if(isset($alldata) && $alldata -> count() > 0)

                <center>
                    <div class="panel panel-primary"
                         style="width: 100%;height:30%;background-color: rgba(255, 255, 255, 0.2);">
                        <div class="panel-heading" style="background-color:#00387b;border-color: #00387b;">
                            Information <i class="fa fa-info"></i>
                        </div>

                        <div class="panel-body" style="overflow-x:auto;overflow-y:auto;">
                            <table class="table table-bordered">
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
                                @foreach($alldata as $data)
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </center>
                <center><a href="{{Route('advancedsearch')}}">
                        <button class="btn btn-primary" style="background-color: #00387b; id=" clear
                        "><i class="fa fa-trash"></i> Clear Search</button></a></center>
                <br><br><br><br><br><br>


            @endif


        </div>

</body>


<script type="text/javascript">

    /*state*/

    jQuery('select[name="manufacturer"]').on('change', function () {
        document.getElementById("loader2").style.display = "block";
        var manufacturerID = jQuery(this).val();
        if (manufacturerID) {
            jQuery.ajax({
                url: '/equipmentType/' + manufacturerID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="equipmentType"]').empty(); // remove last selected item
                    jQuery('select[name="equipmentType"]').append('<option>equipmentType</option>');
                    jQuery.each(data, function (key, value) {

                        $('select[name="equipmentType"]').append('<option value="' + key + '">' + value + '</option>');
                        document.getElementById("loader2").style.display = "none";
                    });
                }
            });
        } else {
            $('select[name="equipmentType"]').empty();
        }
    });


    /*make*/

    jQuery('select[name="equipmentType"]').on('change', function () {
        document.getElementById("loader3").style.display = "block";
        var manufacturer = document.getElementById("manufacturer").value;
        var equipmentTypeID = jQuery(this).val();
        if (equipmentTypeID) {
            jQuery.ajax({
                url: '/make/' + equipmentTypeID + "/" + manufacturer,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="make"]').empty(); // remove last selected item
                    jQuery('select[name="make"]').append('<option>make</option>');
                    jQuery.each(data, function (key, value) {

                        $('select[name="make"]').append('<option value="' + key + '">' + value + '</option>');
                        document.getElementById("loader3").style.display = "none";
                    });
                }
            });
        } else {
            $('select[name="make"]').empty();
        }
    });


    /*model*/

    jQuery('select[name="make"]').on('change', function () {
        document.getElementById("loader4").style.display = "block";
        var manufacturer = document.getElementById("manufacturer").value;
        var equipmentType = document.getElementById("equipmentType").value;
        var makeID = jQuery(this).val();
        if (makeID) {
            jQuery.ajax({
                url: '/model/' + makeID + "/" + manufacturer + "/" + equipmentType,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="model"]').empty(); // remove last selected item
                    jQuery('select[name="model"]').append('<option>model</option>');
                    jQuery.each(data, function (key, value) {

                        $('select[name="model"]').append('<option value="' + key + '">' + value + '</option>');
                        document.getElementById("loader4").style.display = "none";
                    });
                }
            });
        } else {
            $('select[name="model"]').empty();
        }
    });


    /*model serial number*/

    jQuery('select[name="model"]').on('change', function () {
        document.getElementById("loader5").style.display = "block";
        var manufacturer = document.getElementById("manufacturer").value;
        var equipmentType = document.getElementById("equipmentType").value;
        var makeID = document.getElementById("make").value;
        var modelID = jQuery(this).val();
        if (modelID) {
            jQuery.ajax({
                url: '/modelsn/' + modelID + "/" + makeID + "/" + manufacturer + "/" + equipmentType,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="modelsn"]').empty(); // remove last selected item
                    jQuery('select[name="modelsn"]').append('<option>modelSN</option>');
                    jQuery.each(data, function (key, value) {
                        $('select[name="modelsn"]').append('<option value="' + key + '">' + value + '</option>');
                        document.getElementById("loader5").style.display = "none";
                    });
                }
            });
        } else {
            $('select[name="modelsn"]').empty();
        }
    });


    /*Engine Manufacturer*/

    jQuery('select[name="model"]').on('change', function () {
        document.getElementById("loader6").style.display = "block";
        var manufacturer = document.getElementById("manufacturer").value;
        var equipmentType = document.getElementById("equipmentType").value;
        var makeID = document.getElementById("make").value;
        var modelID = jQuery(this).val();
        if (modelID) {
            jQuery.ajax({
                url: '/enginemanu/' + modelID + "/" + makeID + "/" + manufacturer + "/" + equipmentType,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="enginemanu"]').empty(); // remove last selected item
                    jQuery('select[name="enginemanu"]').append('<option>Engine Manufacturer</option>');
                    jQuery.each(data, function (key, value) {
                        $('select[name="enginemanu"]').append('<option value="' + key + '">' + value + '</option>');
                        document.getElementById("loader6").style.display = "none";
                    });
                }
            });
        } else {
            $('select[name="enginemanu"]').empty();
        }
    });


    /*Engine*/

    jQuery('select[name="enginemanu"]').on('change', function () {
        document.getElementById("loader7").style.display = "block";
        var manufacturer = document.getElementById("manufacturer").value;
        var equipmentType = document.getElementById("equipmentType").value;
        var makeID = document.getElementById("make").value;
        var modelID = document.getElementById("model").value;
        var enginemanuID = jQuery(this).val();
        if (enginemanuID) {
            jQuery.ajax({
                url: '/engine/' + enginemanuID + "/" + modelID + "/" + makeID + "/" + manufacturer + "/" + equipmentType,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="engine"]').empty(); // remove last selected item
                    jQuery('select[name="engine"]').append('<option>Engine</option>');
                    jQuery.each(data, function (key, value) {
                        $('select[name="engine"]').append('<option value="' + key + '">' + value + '</option>');
                        document.getElementById("loader7").style.display = "none";
                    });
                }
            });
        } else {
            $('select[name="engine"]').empty();
        }
    });


    /*Engine Serial number*/

    jQuery('select[name="engine"]').on('change', function () {
        document.getElementById("loader8").style.display = "block";
        var manufacturer = document.getElementById("manufacturer").value;
        var equipmentType = document.getElementById("equipmentType").value;
        var makeID = document.getElementById("make").value;
        var modelID = document.getElementById("model").value;
        var enginemanuID = document.getElementById("enginemanu").value;
        var engineID = jQuery(this).val();
        if (engineID) {
            jQuery.ajax({
                url: '/engineSN/' + engineID + "/" + enginemanuID + "/" + modelID + "/" + makeID + "/" + manufacturer + "/" + equipmentType,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="enginesn"]').empty(); // remove last selected item
                    jQuery('select[name="enginesn"]').append('<option>Engine SN</option>');
                    jQuery.each(data, function (key, value) {
                        $('select[name="enginesn"]').append('<option value="' + key + '">' + value + '</option>');
                        document.getElementById("loader8").style.display = "none";
                    });
                }
            });
        } else {
            $('select[name="enginesn"]').empty();
        }
    });


    /*year*/

    jQuery('select[name="engine"]').on('change', function () {
        document.getElementById("loader9").style.display = "block";
        var manufacturer = document.getElementById("manufacturer").value;
        var equipmentType = document.getElementById("equipmentType").value;
        var makeID = document.getElementById("make").value;
        var modelID = document.getElementById("model").value;
        var enginemanuID = document.getElementById("enginemanu").value;
        var engineID = jQuery(this).val();
        if (engineID) {
            jQuery.ajax({
                url: '/year/' + engineID + "/" + enginemanuID + "/" + modelID + "/" + makeID + "/" + manufacturer + "/" + equipmentType,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="year"]').empty(); // remove last selected item
                    jQuery('select[name="year"]').append('<option>Year</option>');
                    jQuery.each(data, function (key, value) {
                        $('select[name="year"]').append('<option value="' + key + '">' + value + '</option>');
                        document.getElementById("loader9").style.display = "none";
                    });
                }
            });
        } else {
            $('select[name="year"]').empty();
        }


    });
</script>


<!--Button Clicked-->

<script type="text/javascript">

    $("#search").on("click", function () {
        var manufacturer = document.getElementById("manufacturer").value;
        var equipmentType = document.getElementById("equipmentType").value;
        var make = document.getElementById("make").value;
        var model = document.getElementById("model").value;
        var modelSN = document.getElementById("modelsn").value;
        var engineManufacturer = document.getElementById("enginemanu").value;
        var engine = document.getElementById("engine").value;
        var engineSerial = document.getElementById("enginesn").value;
        var year = document.getElementById("year").value;

        $.ajax({
            url: window.location.href = "getData/" + manufacturer + "/" + equipmentType + "/" + make + "/" + model + "/" + modelSN + "/" + engineManufacturer + "/" + engine + "/" + engineSerial + "/" + year,
        });
    });

</script>

<!--Button Clicked-->
</html>
