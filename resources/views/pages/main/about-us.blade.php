@extends("layouts.layout")
@section('title') About us @endsection
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
    <!-- about section -->

    <section class="about_section layout_padding ">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Us
                            </h2>
                        </div>
                        <p>
                        <p>We, at ‘ChocoDrip’ plan, fabricate, and extraordinarily blessing wrap chocolates, to fit all events and convey delight to your uncommon day.</p>

                        <p>We make chocolates for you, as a token of warmth for different occasions like New Year, Valentine’s Day, Christmas, New Year, Birthdays, Weddings, Anniversaries and some other day you need to make uncommon.</p>
                        <p>You can choose from a wide assortment of chocolates going from plain rich chocolates to nutty focuses, from crunches to seasoned rarities, from rich truffles to delicate caramels, and a lot more to satisfy the chocoholics.</p>
                        <p>                Ideal from sourcing quality cocoa beans from select cultivators in a part of the country to cautious checking of the maturing procedure; we are engaged with at all times.</p>
                        <p>We utilize all-around aged beans and pursue a stringent flavor improvement procedure to guarantee the wealth of our chocolate.</p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{asset("images/choco-drip-brownie.png")}}" alt="Choco drip brownie">
                    </div>
                    <p>Every one of our chocolates is hand wrapped in the light of style and interests keeping your event.</p>
                    <p>We are additionally devoted to making customized bundling and teaching your customized plans to the chocolates bundling to convey delight to your extraordinary day.</p>
                    <p>‘ChocoDrip’ guarantees to leave a ‘Chocolaty Signature’ in your heart.</p>
                </div>
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <p class="add-font mt-4"><b>Unadulterated love, unadulterated chocolate</b></p>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->
@endsection
