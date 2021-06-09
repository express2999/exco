@include('navbar')
<html>
<head>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>

<style>
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
        background: #ff173c;
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
</style>
</head>

<body>
<center><a href="{{Route('mainpage')}}"><p style="color:white; "><u><i class="fa fa-arrow-left" aria-hidden="true"></i> Back To Main Search</u></p></a></center>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- Category -->
            <div class="single category">
                <h3 class="side-title">Product Description</h3>
                <ul class="list-unstyled">
                    @if(isset($mego))
                        @foreach($mego as $product)
                            @if($product->baldwinPart == "-")
                    <li style="display: none;"><a href="#" title="">BALDWIN PART NO. <span class="pull-right">{{$product->baldwinPart}}</span></a></li>
                            @else
                                <li><a href="#" title="">BALDWIN PART NO. <span class="pull-right">{{$product->baldwinPart}}</span></a></li>
                            @endif
                                @if($product->excopart == "-")
                    <li style="display: none;"><a href="#" title="">EXCO PARTNO. <span class="pull-right">{{$product->excopart}}</span></a></li>
                                @else
                                    <li><a href="#" title="">EXCO PARTNO. <span class="pull-right">{{$product->excopart}}</span></a></li>
                                @endif
                                @if($product->lengthInch == "-")
                    <li style="display: none;"><a href="#" title="">Length (Inches) <span class="pull-right">{{$product->lengthInch}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Length (Inches) <span class="pull-right">{{$product->lengthInch}}</span></a></li>
                                @endif
                                @if($product->lengthMM == "-")
                    <li style="display: none;"><a href="#" title="">Length (mm) <span class="pull-right">{{$product->lengthMM}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Length (mm) <span class="pull-right">{{$product->lengthMM}}</span></a></li>
                                @endif
                                @if($product->widthMM == "-")
                    <li style="display: none;"><a href="#" title="">Width (mm) <span class="pull-right">{{$product->widthMM}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Width (mm) <span class="pull-right">{{$product->widthMM}}</span></a></li>
                                @endif
                                @if($product->heightMM == "-")
                    <li style="display: none;"><a href="#" title="">Height  (mm) <span class="pull-right">{{$product->heightMM}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Height  (mm) <span class="pull-right">{{$product->heightMM}}</span></a></li>
                                @endif
                                @if($product->widthInches == "-")
                    <li style="display: none;"><a href="#" title="">Width (Inches) <span class="pull-right">{{$product->widthInches}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Width (Inches) <span class="pull-right">{{$product->widthInches}}</span></a></li>
                                @endif
                                @if($product->heightInches == "-")
                    <li style="display: none;"><a href="#" title="">Height (Inches) <span class="pull-right">{{$product->heightInches}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Height (Inches) <span class="pull-right">{{$product->heightInches}}</span></a></li>
                                @endif
                                @if($product->outlet == "-")
                            <li style="display: none;"><a href="#" title="">Outlet <span class="pull-right">{{$product->outlet}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Outlet <span class="pull-right">{{$product->outlet}}</span></a></li>
                                @endif
                                @if($product->odInches == "-")
                            <li style="display:none;"><a href="#" title="">OD (Inches) <span class="pull-right">{{$product->odInches}}</span></a></li>
                                @else
                                    <li><a href="#" title="">OD (Inches) <span class="pull-right">{{$product->odInches}}</span></a></li>
                                @endif
                                @if($product->odMM == "-")
                            <li style="display: none;"><a href="#" title="">OD (mm) <span class="pull-right">{{$product->odMM}}</span></a></li>
                                @else
                                    <li><a href="#" title="">OD (mm) <span class="pull-right">{{$product->odMM}}</span></a></li>
                                @endif
                                @if($product->baldwinPart == "-")
                            <li style="display: none;"><a href="#" title="">OD2 (Inches) <span class="pull-right">{{$product->baldwinPart}}</span></a></li>
                                @else
                                    <li><a href="#" title="">OD2 (Inches) <span class="pull-right">{{$product->baldwinPart}}</span></a></li>
                                @endif
                                @if($product->odMM2 == "-")
                            <li style="display: none;"><a href="#" title="">OD2 (mm) <span class="pull-right">{{$product->odMM2}}</span></a></li>
                                @else
                                    <li><a href="#" title="">OD2 (mm) <span class="pull-right">{{$product->odMM2}}</span></a></li>
                                @endif
                                @if($product->idInches == "-")
                            <li style="display: none;"><a href="#" title="">ID (Inches) <span class="pull-right">{{$product->idInches}}</span></a></li>
                                @else
                                    <li><a href="#" title="">ID (Inches) <span class="pull-right">{{$product->idInches}}</span></a></li>
                                @endif
                                @if($product->idMM == "-")
                            <li style="display: none;"><a href="#" title="">ID (mm) <span class="pull-right">{{$product->idMM}}</span></a></li>
                                @else
                                    <li><a href="#" title="">ID (mm) <span class="pull-right">{{$product->idMM}}</span></a></li>
                                @endif
                                @if($product->threadSort == "-")
                            <li style="display: none;"><a href="#" title="">Thread (Sort) <span class="pull-right">{{$product->threadSort}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Thread (Sort) <span class="pull-right">{{$product->threadSort}}</span></a></li>
                                @endif
                                @if($product->threadMM == "-")
                            <li style="display: none;"><a href="#" title="">Thread (mm) <span class="pull-right">{{$product->threadMM}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Thread (mm) <span class="pull-right">{{$product->threadMM}}</span></a></li>
                                @endif
                                @if($product->threadInches == "-")
                            <li style="display: none;"><a href="#" title="">Thread  (Inches) <span class="pull-right">{{$product->threadInches}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Thread  (Inches) <span class="pull-right">{{$product->threadInches}}</span></a></li>
                                @endif
                                @if($product->perInch == "-")
                            <li style="display: none;"><a href="#" title="">Per Inch <span class="pull-right">{{$product->perInch}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Per Inch <span class="pull-right">{{$product->perInch}}</span></a></li>
                                @endif
                                @if($product->gaskets == "-")
                            <li style="display: none;"><a href="#" title="">Gaskets/ I. Gskt. <span class="pull-right">{{$product->gaskets}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Gaskets/ I. Gskt. <span class="pull-right">{{$product->gaskets}}</span></a></li>
                                @endif
                                @if($product->features == "-")
                            <li style="display: none;"><a href="#" title="">Features / Contains <span class="pull-right">{{$product->features}}</span></a></li>
                                @else
                                    <li><a href="#" title="">Features / Contains <span class="pull-right">{{$product->features}}</span></a></li>
                                @endif
                        @endforeach
                    @elseif(isset($exco) && $exco -> count() > 0)
                        @foreach($exco as $product)
                            @if($product->baldwinPart == "-")
                                <li style="display: none;"><a href="#" title="">BALDWIN PART NO. <span class="pull-right">{{$product->baldwinPart}}</span></a></li>
                            @else
                                <li><a href="#" title="">BALDWIN PART NO. <span class="pull-right">{{$product->baldwinPart}}</span></a></li>
                            @endif
                            @if($product->excopart == "-")
                                <li style="display: none;"><a href="#" title="">EXCO PARTNO. <span class="pull-right">{{$product->excopart}}</span></a></li>
                            @else
                                <li><a href="#" title="">EXCO PARTNO. <span class="pull-right">{{$product->excopart}}</span></a></li>
                            @endif
                            @if($product->lengthInch == "-")
                                <li style="display: none;"><a href="#" title="">Length (Inches) <span class="pull-right">{{$product->lengthInch}}</span></a></li>
                            @else
                                <li><a href="#" title="">Length (Inches) <span class="pull-right">{{$product->lengthInch}}</span></a></li>
                            @endif
                            @if($product->lengthMM == "-")
                                <li style="display: none;"><a href="#" title="">Length (mm) <span class="pull-right">{{$product->lengthMM}}</span></a></li>
                            @else
                                <li><a href="#" title="">Length (mm) <span class="pull-right">{{$product->lengthMM}}</span></a></li>
                            @endif
                            @if($product->widthMM == "-")
                                <li style="display: none;"><a href="#" title="">Width (mm) <span class="pull-right">{{$product->widthMM}}</span></a></li>
                            @else
                                <li><a href="#" title="">Width (mm) <span class="pull-right">{{$product->widthMM}}</span></a></li>
                            @endif
                            @if($product->heightMM == "-")
                                <li style="display: none;"><a href="#" title="">Height  (mm) <span class="pull-right">{{$product->heightMM}}</span></a></li>
                            @else
                                <li><a href="#" title="">Height  (mm) <span class="pull-right">{{$product->heightMM}}</span></a></li>
                            @endif
                            @if($product->widthInches == "-")
                                <li style="display: none;"><a href="#" title="">Width (Inches) <span class="pull-right">{{$product->widthInches}}</span></a></li>
                            @else
                                <li><a href="#" title="">Width (Inches) <span class="pull-right">{{$product->widthInches}}</span></a></li>
                            @endif
                            @if($product->heightInches == "-")
                                <li style="display: none;"><a href="#" title="">Height (Inches) <span class="pull-right">{{$product->heightInches}}</span></a></li>
                            @else
                                <li><a href="#" title="">Height (Inches) <span class="pull-right">{{$product->heightInches}}</span></a></li>
                            @endif
                            @if($product->outlet == "-")
                                <li style="display: none;"><a href="#" title="">Outlet <span class="pull-right">{{$product->outlet}}</span></a></li>
                            @else
                                <li><a href="#" title="">Outlet <span class="pull-right">{{$product->outlet}}</span></a></li>
                            @endif
                            @if($product->odInches == "-")
                                <li style="display:none;"><a href="#" title="">OD (Inches) <span class="pull-right">{{$product->odInches}}</span></a></li>
                            @else
                                <li><a href="#" title="">OD (Inches) <span class="pull-right">{{$product->odInches}}</span></a></li>
                            @endif
                            @if($product->odMM == "-")
                                <li style="display: none;"><a href="#" title="">OD (mm) <span class="pull-right">{{$product->odMM}}</span></a></li>
                            @else
                                <li><a href="#" title="">OD (mm) <span class="pull-right">{{$product->odMM}}</span></a></li>
                            @endif
                            @if($product->baldwinPart == "-")
                                <li style="display: none;"><a href="#" title="">OD2 (Inches) <span class="pull-right">{{$product->baldwinPart}}</span></a></li>
                            @else
                                <li><a href="#" title="">OD2 (Inches) <span class="pull-right">{{$product->baldwinPart}}</span></a></li>
                            @endif
                            @if($product->odMM2 == "-")
                                <li style="display: none;"><a href="#" title="">OD2 (mm) <span class="pull-right">{{$product->odMM2}}</span></a></li>
                            @else
                                <li><a href="#" title="">OD2 (mm) <span class="pull-right">{{$product->odMM2}}</span></a></li>
                            @endif
                            @if($product->idInches == "-")
                                <li style="display: none;"><a href="#" title="">ID (Inches) <span class="pull-right">{{$product->idInches}}</span></a></li>
                            @else
                                <li><a href="#" title="">ID (Inches) <span class="pull-right">{{$product->idInches}}</span></a></li>
                            @endif
                            @if($product->idMM == "-")
                                <li style="display: none;"><a href="#" title="">ID (mm) <span class="pull-right">{{$product->idMM}}</span></a></li>
                            @else
                                <li><a href="#" title="">ID (mm) <span class="pull-right">{{$product->idMM}}</span></a></li>
                            @endif
                            @if($product->threadSort == "-")
                                <li style="display: none;"><a href="#" title="">Thread (Sort) <span class="pull-right">{{$product->threadSort}}</span></a></li>
                            @else
                                <li><a href="#" title="">Thread (Sort) <span class="pull-right">{{$product->threadSort}}</span></a></li>
                            @endif
                            @if($product->threadMM == "-")
                                <li style="display: none;"><a href="#" title="">Thread (mm) <span class="pull-right">{{$product->threadMM}}</span></a></li>
                            @else
                                <li><a href="#" title="">Thread (mm) <span class="pull-right">{{$product->threadMM}}</span></a></li>
                            @endif
                            @if($product->threadInches == "-")
                                <li style="display: none;"><a href="#" title="">Thread  (Inches) <span class="pull-right">{{$product->threadInches}}</span></a></li>
                            @else
                                <li><a href="#" title="">Thread  (Inches) <span class="pull-right">{{$product->threadInches}}</span></a></li>
                            @endif
                            @if($product->perInch == "-")
                                <li style="display: none;"><a href="#" title="">Per Inch <span class="pull-right">{{$product->perInch}}</span></a></li>
                            @else
                                <li><a href="#" title="">Per Inch <span class="pull-right">{{$product->perInch}}</span></a></li>
                            @endif
                            @if($product->gaskets == "-")
                                <li style="display: none;"><a href="#" title="">Gaskets/ I. Gskt. <span class="pull-right">{{$product->gaskets}}</span></a></li>
                            @else
                                <li><a href="#" title="">Gaskets/ I. Gskt. <span class="pull-right">{{$product->gaskets}}</span></a></li>
                            @endif
                            @if($product->features == "-")
                                <li style="display: none;"><a href="#" title="">Features / Contains <span class="pull-right">{{$product->features}}</span></a></li>
                            @else
                                <li><a href="#" title="">Features / Contains <span class="pull-right">{{$product->features}}</span></a></li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
