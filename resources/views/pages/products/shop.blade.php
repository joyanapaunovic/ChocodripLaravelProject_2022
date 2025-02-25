@extends('layouts.layout')
@section('title') Shop @endsection
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
    {{--dd($data['search'])--}}
    <div class="container-fluid">
        <div class=" row">
            <div class="col-lg-3">
                <div class="search mt-1">
                    <p class="title-filtering ml-3">Search</p>
{{--                    <form action="" method="POST">--}}
                        <input type="search" id='search' name='keyword' placeholder="Search..." class="form-control" value=""/>
                </div>
                <div class="d-flex flex-column align-items-left product-types-checkboxes mt-3 p-3">
                    <p class="title-filtering">Product type</p>
                    @csrf
                    @foreach($data['categories'] as $categoryItem)
                        {{--var_dump($categoryItem->id)--}}
                        <div class="form-check">
                            <input class="form-check-input" {{--(($checkedCategories != NULL) ? in_array($categoryItem->id, $checkedCategories) : "") ? "checked" : "" --}} name='categoryIds[]' type="checkbox" value="{{$categoryItem->id}}" id="flexCheckDefault{{$categoryItem->id}}" />
                            <label class="form-check-label" for="flexCheckDefault{{$categoryItem->id}}">
                                {{$categoryItem->category_name}}
                            </label>
                        </div>
                    @endforeach

                    {{--                    <div class="form-check">--}}
                    {{--                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}
                    {{--                        <label class="form-check-label" for="flexCheckDefault">--}}
                    {{--                            Vegan--}}
                    {{--                        </label>--}}
                    {{--                    </div>--}}
{{--                    <input type="submit" value="Search by name and categories" class='mt-3' id="searchBtn"/>--}}
                </div>
            </div>

{{--            </form>--}}
        <div id="products" class=" d-flex align-items-center justify-content-center flex-wrap col-lg-9">
           @if($data['chocolates'])
                @foreach($data['chocolates'] as $chocolateItem)
{{--                    {{ dd($chocolateItem->catId) }}--}}
                    @component('components.chocolate', [
                        'id' => "$chocolateItem->id",
                        'name' => "$chocolateItem->name",
                        'src_picture' => "$chocolateItem->src_picture",
                        'previous_price' => "$chocolateItem->previous_price",
                        'current_price' => "$chocolateItem->current_price",
                        'category_name' => "$chocolateItem->category_name"
                        ])@endcomponent
                @endforeach
            @endif
        </div>


        </div>
    </div>
@endsection
