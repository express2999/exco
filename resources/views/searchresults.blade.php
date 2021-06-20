@include('navbar')
<html>
<head>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
        }

        @keyframes shrink {
            0% {
                background-size: 130% 130%;
            }
            100% {
                background-size: 95% 95%;
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
            color: grey;
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
@if (\Session::has('noitems'))
    <div class="text-center">
        <div class="alert alert-success">
            <span style="color:red;font-size: 30px;"><i class="fa fa-warning" style="font-size:48px;"></i>&nbsp;&nbsp;{!! \Session::get('noitems') !!}</span>
        </div>
    </div>
@endif
<center>
    <a href="{{Route('mainpage')}}"><p style="color:white; "><u><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                To Main Search</u></p></a></center>

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
<div style="width: 50%">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Replace Part No.</th>
            <th scope="col">Replace Brand</th>
            <th scope="col">Exco Part No.</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exco as $first)
            <tr>

                <td>{{$first->replacePartNumber}}</td>
                <td>{{$first->replaceBrand}}</td>
                <td><a href="{{Route('description',$first->excoPartNo)}}">{{$first->excoPartNo}}</a></td>

            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</center>
</body>

</html>
