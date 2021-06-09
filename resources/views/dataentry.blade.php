<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset("css/snackbar.css")}}" rel="stylesheet">
    <script src="{{ asset("js/snackbar.js")}}" type="text/javascript"></script>
    <!-- Styles -->
    <style>

        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>


@if (\Session::has('success'))
    <div class="text-center">
        <div class="alert alert-success">
            <span>&#10003;&nbsp;&nbsp;{!! \Session::get('success') !!}</span>
        </div>
    </div>
    {{--       <script type="text/javascript">--}}
    {{--           myFunction();--}}
    {{--       </script>--}}
@elseif (\Session::has('error'))
    <div class="text-center">
        <div class="alert alert-dark">
            <span>&#10003;&nbsp;&nbsp;{!! \Session::get('error') !!}</span>
        </div>
    </div>
@endif


<form method="GET" action="{{Route('add')}}">
    <div style="margin: 100px;">
        <h1 class="text-center">Welcome to</h1><br>
        <div style="text-align: center;margin-top: -20px;margin-bottom: 40px;"><img src="{{ asset("/images/mylogo.png")}}" alt="EXCO"/></div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="baldwin">Baldwin</label>
                <input type="text" class="form-control" id="baldwin" name="baldwin" placeholder="Baldwin">
            </div>
            <div class="form-group col-md-6">
                <label for="replacepartnumber">Part number</label>
                <input type="text" class="form-control" id="replacepartnumber" name="replacepartnumber" placeholder="Replace Part number">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="replacebrand">Replace Brand</label>
                <input type="text" class="form-control" id="replacebrand" name="replacebrand" placeholder="Replace Brand">
            </div>
            <div class="form-group col-md-6">
                <label for="excopartno">Exco Part Number</label>
                <input type="text" class="form-control" id="excopartno" name="excopartno" placeholder="Exco Part Number">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" onclick="myFunction();">Add Item</button>
    </div>
</form>
</body>
{{--    <div id="snackbar">Some text some message..</div>--}}


</html>
