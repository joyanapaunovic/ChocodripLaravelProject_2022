@extends('layouts.layout')
@section('title') Contact @endsection
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
    <!-- contact section -->

    <section class="contact_section layout_padding">
        <div class="container-fluid">
            <div class="row d-flex flex-row align-items-center">
                <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
                    <div class="form_container">
                        <div class="heading_container">
                            <h2>
                                Contact Us
                            </h2>
                        </div>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" name='firstNameContact' placeholder="First name..." value="{{old("firstNameContact")}}" />
                                @if($errors->has('firstNameContact'))
                                    <span class="error mb-2">* {{$errors->first("firstNameContact")}}</span>
                                @endif
                            </div>
                            <div>
                                <input type="text" name='lastNameContact' placeholder="Last name..." value="{{old("lastNameContact")}}"/>
                                @if($errors->has('lastNameContact'))
                                    <span class="error mb-2">* {{$errors->first("lastNameContact")}}</span>
                                @endif
                            </div>
                            <div>
                                <input type="email" name='emailContact' placeholder="Email..." value="{{old("emailContact")}}"/>
                                @if($errors->has('emailContact'))
                                    <span class="error mb-2">* {{$errors->first("emailContact")}}</span>
                                @endif
                            </div>
                            <div>
                                <input type="text" class="message-box" name='message' placeholder="Leave us a message..." value="{{old('message')}}"/>
                                @if($errors->has('message'))
                                    <span class="error mb-2">* {{$errors->first("message")}}</span>
                                @endif
                            </div>
                            <div class="">
                                <input type="submit" value="SEND NOW" id="contactBtn"/>
                            </div>
                        </form>
                        @if(session('success-msg'))
                            <p class="success my-2">{{ session('success-msg') }}</p>
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
{{--                <div class="col-md-3  px-0">--}}
{{--                    <div class="map_container">--}}
{{--                        <div class="map">--}}
{{--                            <div id="googleMap"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <!-- end contact section -->
@endsection
