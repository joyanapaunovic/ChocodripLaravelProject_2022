@extends("layouts.layout")
@section('title') Home @endsection
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
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail_box title-main">
                                    <h1>
                                        Flavors beyond <br>
                                        <span>
                          your imagination
                        </span>
                                    </h1>
                                    <a href="#">
                                        <!-- <span>
                                          Read More
                                        </span> -->
                                        <!-- <img src="images/white-arrow.png" alt=""> -->
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 ml-auto">
                                <div class="img-box">
                                    <img src="images/slider-img.png" alt="Slider picture" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="carousel-item ">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="detail_box">
                          <h1>
                            Chocolate <br>
                            <span>
                              Yummy
                            </span>
                          </h1>
                          <a href="#">
                            <span>
                              Read More
                            </span>
                            <img src="images/white-arrow.png" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-4 ml-auto">
                        <div class="img-box">
                          <img src="images/slider-img.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="carousel-item ">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="detail_box">
                          <h1>
                            Chocolate <br>
                            <span>
                              Yummy
                            </span>
                          </h1>
                          <a href="#">
                            <span>
                              Read More
                            </span>
                            <img src="images/white-arrow.png" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-4 ml-auto">
                        <div class="img-box">
                          <img src="images/chocolate-slider-3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
            </div>
        </div>
        <div class="carousel_btn-box">
            <!-- <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              <span class="sr-only">Next</span>
            </a> -->
        </div>
    </section>
    <!-- end slider section -->
    </div>

    <!-- about section -->

    <section class="about_section layout_padding mt-5">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h3>
                                What you need to know about us...
                            </h3>
                        </div>
                        <p>
                            Longing for something phenomenal? If it’s not too much trouble attempt our rich drain, dim or white chocolate, outlandish nuts, or experience our stunning focused pralines and truffles.
                            It was properly said that a fair eating regimen implies chocolate in two hands.
                        </p>
                        <p>
                            Everybody has an alternate palette, particularly with regards to chocolate and brownies.
                            Regardless of what kind of chocolate treat you are fantasizing over today,
                            ensure you are getting an eminent portion of a portion of our varied blend of handmade chocolates, only made only for you.
                        </p>
                        <a href="{{ route('about-us') }}">
                <span class="read-more-link">
                  Read More...
                </span>
                            <!-- <img src="images/color-arrow.png" alt=""> -->
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="images/about-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->
    <!-- chocolate section -->

    <section class="chocolate_section ">
        <div class="container">
            <div class="heading_container">
                <h2 class="title">
                    OUR CHOCOLATE PRODUCTS
                </h2>
                <!-- <p>
                  Many desktop publishing packages and web pagend web page editors now use Lorem Ipsum as their
                </p> -->
            </div>
        </div>
        <div class="container">
            <div class="chocolate_container">
                @foreach($data['chocolatesOnDiscount'] as $chocolateItem)
                    @component('components.home-slider-chocolates', [
                    'id' => "$chocolateItem->id",
                    'name' => "$chocolateItem->name",
                    'src_picture' => "$chocolateItem->src_picture",
                    'previous_price' => "$chocolateItem->previous_price",
                    'current_price' => "$chocolateItem->current_price",
                    'available' => "$chocolateItem->available",
                    'category_name' => "$chocolateItem->category_name"
                    ])@endcomponent
                @endforeach

            </div>
        </div>
    </section>


    <!-- end chocolate section -->

    <!-- offer section -->

    <!-- <section class="offer_section layout_padding">
      <div class="container">
        <div class="box">
          <div class="detail-box">
            <h2>
              Offers on chocolates
            </h2>
            <h3>
              Get 5% Offer <br>
              any Chocolate items
            </h3>
            <a href="">
              Buy Now
            </a>
          </div>
          <div class="img-box">
            <img src="images/offer-img.png" alt="">
          </div>
        </div>
        <div class="btn-box">
          <a href="">
            <span>
              See More
            </span>
            <img src="images/color-arrow.png" alt="">
          </a>
        </div>
      </div>
    </section> -->

    <!-- end offer section -->

    <!-- client section -->

    <!-- <section class="client_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <div class="img-box sub_img-box">
              <img src="images/client-chocolate.png" alt="">
            </div>
          </div>
          <div class="col-lg-6 px-0">
            <div class="client_container">
              <div class="heading_container">
                <h2>
                  Testimonial
                </h2>
              </div>
              <div id="customCarousel2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="box">
                      <div class="img-box">
                        <img src="images/client-img.jpg" alt="">
                      </div>
                      <div class="detail-box">
                        <h4>
                          Gero Miliya
                        </h4>
                        <p>
                          long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has
                        </p>
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="box">
                      <div class="img-box">
                        <img src="images/client-img.jpg" alt="">
                      </div>
                      <div class="detail-box">
                        <h4>
                          Gero Miliya
                        </h4>
                        <p>
                          long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has
                        </p>
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="box">
                      <div class="img-box">
                        <img src="images/client-img.jpg" alt="">
                      </div>
                      <div class="detail-box">
                        <h4>
                          Gero Miliya
                        </h4>
                        <p>
                          long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has
                        </p>
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel_btn-box">
                  <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- end client section -->


    <!-- contact section -->

    <!-- <section class="contact_section layout_padding">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
            <div class="form_container">
              <div class="heading_container">
                <h2>
                  Contact Us
                </h2>
              </div>
              <form action="">
                <div>
                  <input type="text" placeholder="Full Name " />
                </div>
                <div>
                  <input type="text" placeholder="Phone number" />
                </div>
                <div>
                  <input type="email" placeholder="Email" />
                </div>
                <div>
                  <input type="text" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex ">
                  <button>
                    SEND NOW
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6  px-0">
            <div class="map_container">
              <div class="map">
                <div id="googleMap"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- end contact section -->


@endsection
