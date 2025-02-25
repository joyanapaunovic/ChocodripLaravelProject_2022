@extends('layouts.layout')
@section('title') Make an account @endsection
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
@section("content")

    <section class="contact_section layout_padding">
        <div class="container-fluid">
            <div class="row d-flex flex-row align-items-center">
                <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
                    <div class="form_container">
                        <div class="heading_container">
                            <h2>
                                Register
                            </h2>
                        </div>
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" name="firstName" placeholder="First name..." />
                                @if($errors->has('firstName'))
                                    <span class="error">* {{$errors->first("firstName")}}</span>
                                @endif
                            </div>
                            <div>
                                <input type="text" name="lastName" placeholder="Last name..." />
                                @if($errors->has('lastName'))
                                    <span class="error">* {{$errors->first("lastName")}}</span>
                                @endif
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Email..." />
                                @if($errors->has('email'))
                                    <span class="error">* {{$errors->first("email")}}</span>
                                @endif
                            </div>
                            <div>
                                <input type="password" name="password" placeholder="Password..." />
                                @if($errors->has('password'))
                                    <span class="error">* {{$errors->first("password")}}</span>
                                @endif
                            </div>
                            <div class="">
                                <input type="submit" value="REGISTER" id="registerBtn"/>
                            </div>
                        </form>
                        @if(session("success-msg"))
                            <p class="success my-2">{{session('success-msg')}}</p>
                        @endif
                    </div>
                </div>
{{--                <div class="col-md-5">--}}
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                <label class="font-family">Please check all your data and try again</label>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection
