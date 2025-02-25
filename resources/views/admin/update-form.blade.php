@extends('layouts.layout')
@section('title')
    @foreach($chocolate as $ch)
        Update - {{$ch->name}}
    @endforeach
@endsection
@section('admin-head')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP STYLES-->
    {{--    <link href="assets/css/bootstrap.css" rel="stylesheet" />--}}
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
@endsection
@section('regular-head')
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset("css/bootstrap.css")}}" />
    <!--slick slider stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
    <!-- slick slider -->

    <link rel="stylesheet" href="{{asset("css/slick-theme.css")}}" />
    <!-- font awesome style -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset("css/style.css")}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset("css/responsive.css")}}" rel="stylesheet" />
    <!-- MY CSS -->
    <link href="{{asset("css/my-css.css")}}" rel="stylesheet" />
@endsection


@section('content')
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="{{asset('assets/img/find_user.png')}}" class="user-image img-responsive"/>
                    </li>
                    <li>
                        <a  href="{{ route('admin-panel') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
{{--                    <li>--}}
{{--                        <a  href="{{ route('user-activities') }}"><i class="fa fa-bar-chart-o fa-3x"></i> User activities</a>--}}
{{--                    </li>--}}
                    <li>
                        <a  href="{{ route('tables') }}"><i class="fa fa-table fa-3x"></i> Tables </a>
                    </li>
                    <li  >
                        <a  href="{{ route('forms') }}"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>
                </ul>

            </div>

        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach($chocolate as $ch)
                                        <h3 class="my-3 mb-3 add">UPDATE - {{$ch->name}}</h3>

                                        <form action="{{ route('admin.update', ['id' => $ch->id]) }}"  method="POST" enctype="multipart/form-data" class="d-flex flex-column mx-auto">
                                            @csrf
                                            {{-- product name --}}
                                            <div class="form-group">
                                                <p class="title-filtering m-0 p-0 mb-2 ml-2">Product name</p>
                                                <input type="text" class="form-control" name='name' placeholder="Product name..." value="{{ $ch->name }}" />
                                                @if($errors->has('name'))
                                                    <span class="error">* {{$errors->first("name")}}</span>
                                                @endif
                                            </div>
                                            {{-- description --}}
                                            <div class="form-group">
                                                <p class="title-filtering m-0 p-0 mb-2 ml-2">DESCRIPTION</p>
                                                <textarea class="form-control" name='desc' rows="8" placeholder="Description...">{{ $ch->description }}</textarea>
                                                @if($errors->has('desc'))
                                                    <span class="error">* {{$errors->first('desc')}}</span>
                                                @endif
                                            </div>
                                            {{-- ingredients --}}
                                            <div class="form-group">
                                                <p class="title-filtering m-0 p-0 mb-2 ml-2">INGREDIENTS</p>
                                                <textarea class="form-control" name='ingredients' rows="5" placeholder="Ingredients...">{{ $ch->ingredients }}</textarea>
                                                @if($errors->has('ingredients'))
                                                    <span class="error">* {{$errors->first("ingredients")}}</span>
                                                @endif
                                            </div>
                                            {{-- nutrition values --}}
                                            <div class="form-group">
                                                <p class="title-filtering m-0 p-0 mb-2 ml-2">NUTRITION VALUES</p>
                                                <textarea class="form-control" name='nutritionValues' rows="5" placeholder="Nutrition values...">{{ $ch->nutrition_values }}</textarea>
                                                @if($errors->has('nutritionValues'))
                                                    <span class="error">* {{$errors->first("nutritionValues")}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <p class="title-filtering m-0 p-0 mb-2 ml-2">CHOOSE A CATEGORY</p>
                                                <select class="form-control" name='category' id="exampleFormControlSelect1">
                                                    <option value="0">Choose category...</option>
                                                    {{-- CATEGORIES --}}
                                                    @foreach($categories as $category)
                                                        @if($ch->catId == $category->id)
                                                            <option value="{{ $category->id }}" selected>
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @if($errors->has('category'))
                                                    <span class="error">* {{$errors->first("category")}}</span>
                                                @endif
                                            </div>
                                            {{-- previous price --}}
                                            <p class="title-filtering m-0 p-0 mb-2 ml-2">PREVIOUS PRICE</p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="previousPrice" placeholder="Previous price..." value="{{ $ch->previous_price }}"/>
                                                @if($errors->has('previousPrice'))
                                                    <span class="error">* {{$errors->first("previousPrice")}}</span>
                                                @endif
                                            </div>
                                            {{-- current price --}}
                                            <div class="form-group">
                                                <p class="title-filtering m-0 p-0 mb-2 ml-2">CURRENT PRICE</p>
                                                <input type="text" class="form-control" name='currentPrice' placeholder="Current price..." value="{{ $ch->current_price }}"/>
                                                @if($errors->has('currentPrice'))
                                                    <span class="error">* {{$errors->first("currentPrice")}}</span>
                                                @endif
                                            </div>
                                            {{-- picture --}}
                                            <div class="form-group">
                                                <div class="pic">
                                                    <img src="{{ asset('images/' . $ch->src_picture) }}" alt="{{ $ch->name }}" class="img-fluid" />
                                                </div>
                                                <label for="exampleFormControlFile1" class="availability">Choose a picture</label>
                                                <input type="file" class="form-control-file" name="photo" id="exampleFormControlFile1" />
                                                @if($errors->has('photo'))
                                                    <span class="error">* {{$errors->first("photo")}}</span>
                                                @endif
                                            </div>
                                            {{-- availability --}}
                                            <label class="availability">AVAILABILITY</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="availability" id="flexRadioDefault1" value="1" @if($ch->available) checked @endif>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Available
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="availability" id="flexRadioDefault2" value="0" @if(!$ch->available) checked @endif>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Unavailable
                                                </label>
                                            </div>
                                            @if($errors->has('availability'))
                                                <span class="error">* {{$errors->first("availability")}}</span>
                                            @endif
                                            <div>
                                                <input type="submit" value="Update" class="mt-3 btn btn-warning px-4 py-2" />
                                            </div>
                                            @endforeach
                                        </form>
                                            @if(session('success-msg'))
                                                <p class="success my-2">{{ session('success-msg') }}</p>
                                            @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
@endsection

{{--@section('admin-scripts')--}}
{{--    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->--}}
{{--    <!-- JQUERY SCRIPTS -->--}}
{{--    <script src="assets/js/jquery-1.10.2.js"></script>--}}
{{--    <!-- BOOTSTRAP SCRIPTS -->--}}
{{--    <script src="assets/js/bootstrap.min.js"></script>--}}
{{--    <!-- METISMENU SCRIPTS -->--}}
{{--    <script src="assets/js/jquery.metisMenu.js"></script>--}}
{{--    <!-- CUSTOM SCRIPTS -->--}}
{{--    <script src="assets/js/custom.js"></script>--}}
{{--@endsection--}}
