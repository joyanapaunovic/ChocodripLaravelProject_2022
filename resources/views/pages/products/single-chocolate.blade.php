@extends('layouts.layout')
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
@section('title')
    @foreach($oneChocolate as $product)
        {{ $product->name }}
    @endforeach
@endsection

@section('content')
    @foreach($oneChocolate as $product)
        {{--dd($product)--}}
        <div class="container-fluid">
            <div class="row" height="1700px;">
                {{-- PRODUCT IMAGE  --}}
                {{--dd($product->id)--}}
                <div class="col-lg-4">
                    <div class="image">
                        <img class="img-fluid" src="{{asset("images/$product->src_picture")}}" alt="{{ $product->name }}" />
                    </div>
                </div>
                <div class="col-lg-8">
                    <h5 class="mt-5 productName">{{ $product->name }}</h5>
                    {{-- PRICE, AVAILABILITY--}}
                    <div class="d-flex flex-row align-items-center p-1 px-3 info-single-product">
                        <div class="currentPrice pr-4"><span>${{$product->current_price}}</span></div>
                        @if($product->previous_price != NULL)
                            <div class="ml-3 previousPrice pr-4"><s>${{$product->previous_price}}</s></div>
                        @endif
                        @if($product->available)
                            <p class="ml-3 in-stock pt-1"><i class="fa-sharp fa-solid fa-circle"></i> IN STOCK</p>
                        @else
                            <p class="ml-3 out-of-stock mt-3"><i class="fa-sharp fa-solid fa-circle"></i> OUT OF STOCK</p>
                        @endif
                    </div>
                    {{-- ADD TO CART --}}
                    @if($product->available)
                    <div class="d-flex flex-row align-items-center form-add-to-cart">
{{--                        <form method="" action="" class="d-flex flex-row align-items-center">--}}
                            @if(session()->has('user'))
                                @if(session()->get('user')->id_role == 2)
                                <div class="form-group mt-3">
                                    <input type="number" id='quantity' class="form-control" name="quantity" min="1" max="50" value="1" />
                                </div>
                                <div class="form-group ml-3 mt-3">
                                    <button type="submit" name="addToCartBtn" id="addToCartBtn">ADD TO CART</button>
                                </div>
                                @endif
                            @else
                                <div class="form-group mt-3">
                                    <input type="number" id='quantity' id='addTo' class="form-control" name="quantity" min="1" max="50" value="1" />
                                </div>
                                <div class="form-group ml-3 mt-3">
                                    <button type="button" name="addToCartBtn" data-toggle="modal" data-target="#exampleModal1">
                                        ADD TO CART
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLongTitle">Note for online shopping</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    If you have decided to shop online, all you need to do is <a class='link' href="{{route('register')}}">register</a> or <a class='link' href="{{route('login')}}">log in</a> to your account.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
{{--                        </form>--}}
                    </div>
                    @else
                        <div class="d-flex flex-row align-items-center form-add-to-cart">
                            <p class="unavailable mt-3">The product is currently unavailable for online shopping</p>
                        </div>
                    @endif
                    {{-- COLLAPSE --}}
                    <div id="accordion" class="mt-4 mb-5">
                        {{-- DESCRIPTION --}}
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn link_design_single_product" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        DESCRIPTION
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    {{ $product->description }}
                                </div>
                            </div>
                        </div>
                        {{-- INGREDIENTS --}}
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn collapsed link_design_single_product" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        INGREDIENTS
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    {{ $product->ingredients }}
                                </div>
                            </div>
                        </div>
                        {{-- NUTRITION VALUES --}}
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn collapsed link_design_single_product" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        NUTRITION VALUES
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    {{ $product->nutrition_values }}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  ../COLLAPSE --}}
                </div>
            </div>
        </div>
    @endforeach
@endsection
