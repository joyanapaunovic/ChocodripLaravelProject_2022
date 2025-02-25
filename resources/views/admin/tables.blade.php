@extends('layouts.layout')
@section('title') Admin panel @endsection
@section('admin-head')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP STYLES-->
    {{--    <link href="assets/css/bootstrap.css" rel="stylesheet" />--}}
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
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
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
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
                        <h2>Tables</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading d-flex align-items-center justify-content-center my-2">
                                CHOCOLATES
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr class="columns">
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Description</th>
                                            <th>Ingredients</th>
{{--                                            <th>Nutrition values</th>--}}
                                            <th>Category</th>
                                            <th>Previous price</th>
                                            <th>Current price</th>
                                            <th>Availability</th>
                                            <th>UPDATE</th>
                                            <th>DELETE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($chocolates as $c)
                                            <tr class="odd gradeX fields">
                                                <td>{{ $c->id }}</td>
                                                <td>
                                                    <div class="pic">
                                                        <img src="images/{{$c->src_picture}}" alt="{{$c->name}}" class="img-fluid"/>
                                                    </div>
                                                </td>
                                                <td>{{ $c->description }}</td>
                                                <td class="col-lg-12">{{ $c->ingredients }}</td>
{{--                                                <td class="col-lg-12">{{ $c->nutrition_values }}</td>--}}
                                                <td class="center">{{ $c->category_name }}</td>
                                                @if($c->previous_price != NULL)
                                                    <td class="center">{{ $c->previous_price }}</td>
                                                @else
                                                    <td class="text-center"><i class="fas fa-window-close"></i></td>
                                                @endif
                                                <td>{{ $c->current_price }}</td>
                                                @if($c->available)
                                                    <td class="center">IN STOCK</td>
                                                @else
                                                    <td class="center">OUT OF STOCK</td>
                                                @endif
                                                <td>
                                                    <form action="{{ route('admin.edit', ['id' => $c->id]) }}" method="GET">
                                                        <button type='submit' class="btn btn-warning">Update</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.destroy', ['id' => $c->id]) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type='submit' class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-6">
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">
                            <div class="panel-heading d-flex align-items-center justify-content-center my-2">
                                CATEGORIES
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr class="columns">
                                            <th>#</th>
                                            <th>Category name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->category_name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End  Kitchen Sink -->
                    </div>
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading d-flex align-items-center justify-content-center my-2">
                                MESSAGES
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr class="columns">
                                            <th>#</th>
                                            <th>Full name</th>
                                            <th>E-mail</th>
                                            <th>Message content</th>
                                            <th> Date sent </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($messages as $message)
                                            <tr>
                                                <td>{{ $message->id }}</td>
                                                <td>{{ $message->first_name }} {{ $message->last_name }}</td>
                                                <td> {{ $message->email }}</td>
                                                <td>{{ $message->message_content }}</td>
                                                <td>{{ $message->sent_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End  Kitchen Sink -->
                    </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading d-flex align-items-center justify-content-center my-2">
                            USERS
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr class="columns">
                                        <th>#</th>
                                        <th>Full name</th>
                                        <th>E-mail</th>
                                        <th>Password</th>
                                        <th> Role </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->userId }}</td>
                                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                            <td> {{ $user->email }}</td>
                                            <td>{{ $user->password }}</td>
                                            <td>{{ $user->role_name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12 d-flex align-items-center justify-content-center flex-column">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading d-flex align-items-center justify-content-center my-2">
                            ORDERS
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr class="columns">
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Address</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $o)
                                        <tr class="odd gradeX fields">
                                            <td>{{-- $o->userId --}}</td>
                                            <td>
                                                <div class="pic">{{ $o->name }}
                                                    <img src="images/{{$o->src_picture}}" alt="{{$o->name}}" class="img-fluid"/>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $o->first_name_cart }}
                                            </td>
                                            <td>
                                                {{ $o->last_name_cart }}
                                            </td>
                                            <td>
                                                {{ $o->user_address }}
                                            </td>
                                            <td>
                                                {{ $o->quantity }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            </div>

        </div>
        <!-- /. PAGE INNER  -->

    <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
@endsection
