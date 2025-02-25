@extends('layouts.layout')
@section('title') Log in to your account @endsection
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
            <div class="row">
                <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
                    <div class="form_container">
                        <div class="heading_container">
                            <h2>
                                Log In
                            </h2>
                        </div>
                        <form action="{{ route('doLogin') }}" method="POST">
                            @csrf
                            <div>
                                <input type="email" name="emailLogin" placeholder="Email..." value="{{old('emailLogin')}}" />
                                @if($errors->has('emailLogin'))
                                    <span class="error">* {{$errors->first("emailLogin")}}</span>
                                @endif
                            </div>
                            <div>
                                <input type="password" name='passwordLogin' placeholder="Password..." value="{{old('passwordLogin')}}" />
                                @if($errors->has('passwordLogin'))
                                    <span class="error">* {{$errors->first("passwordLogin")}}</span>
                                @endif
                            </div>
                            <div class="">
                                <input type="submit" value="LOG IN" name="loginBtn" id="loginBtn"/>
                            </div>
                        </form>
                        @if(session('error-msg'))
                            <p class="success my-2">{{ session('error-msg') }}</p>
                        @endif
                        @if(session('success-msg'))
                            <p class="success my-2">{{ session('success-msg') }}</p>
                        @endif
                    </div>
                </div>
{{--                <div class="col-md-5 mt-5">--}}
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
