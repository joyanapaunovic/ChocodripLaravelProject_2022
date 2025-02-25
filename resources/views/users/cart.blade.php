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
    Cart
@endsection

@section('content')
    {{-- dd(session()->get('cartItems')) --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 my-5 py-5 d-flex flex-column align-items-center justify-content-center">

               @if(session()->has('cartItems') && count(session()->get('cartItems')))

                    <table class="table table-responsive-xl">
                        <tr>
                            <th>Product</th>
                            <th>Product name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Delivery</th>
                            <th>Price with delivery</th>
                            <th>First name</th>
                            <th>Last name</th>
                        </tr>
                             {{-- dd(session()->get('cartItems'))  --}}
                            @foreach(session()->get('cartItems') as $cartItem)
                            <tr>
                                <td>
                                    <div class="pic">
                                        <img class="img-fluid" src="{{ asset('images/' . $cartItem->product->src_picture) }}" alt="{{ $cartItem->product->name }}" />
                                    </div>
                                </td>
                                <td>
                                    {{ $cartItem->product->name }}
                                </td>
                                <td>
                                    {{ $cartItem->quantity }}
                                </td>
                                <td>
                                    ${{ $cartItem->product->current_price}}
                                </td>
                                <td>
                                    $2.00
                                </td>
                                <td>
                                    ${{ $cartItem->product->current_price * $cartItem->quantity + 2  }}
                                </td>
                                @if(session()->has('user'))

                                    <td>
                                        {{ session()->get('user')->first_name }}
                                    </td>
                                    <td>
                                        {{ session()->get('user')->last_name }}
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                    </table>
                    <div class="col-5">
                        <form action="{{ route('delivered') }}" method="GET" class="d-flex flex-column">
                            @csrf
                            <input type="text" placeholder="Your address..." name="address"  />
                            @if($errors->has('address'))
                                <span class="error">* {{$errors->first("address")}}</span>
                            @endif
                            <td>
                                <input type="submit" id="deliver" value="Order"/>
                            </td>
                        </form>
{{--                        <td>--}}
{{--                            <button type="button" id="cancel">Cancel</button>--}}
{{--                        </td>--}}

                    </div>

                   @else
                   <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
