<!-- info section -->
<section class="info_section layout_padding2">
    <div class="container">
        <div class="row info_form_social_row">
            <!-- FOOTER -> NEWSLETTER -->
{{--            <div class="col-md-6 col-lg-6">--}}
{{--                <div class="info_form">--}}
{{--                    <form>--}}
{{--                        <input type="email" placeholder="Enter your email..." name='email-newsletter'/>--}}
{{--                        <button type="button" onclick="mailto:chocodrip@gmail.com">--}}
{{--                            <i class="fa fa-arrow-right" aria-hidden="true"></i>--}}
{{--                        </button>--}}
{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}
            <!-- ../FOOTER -> NEWSLETTER -->
            <!-- FOOTER -> SOCIAL NETWORKS -->
            <div class="col-md-12">

                <div class="social_box d-flex align-items-center justify-content-center">
                    <a href="https://www.facebook.com/">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="https://twitter.com/">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.instagram.com/">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <!-- ../FOOTER -> SOCIAL NETWORKS -->
        </div>
        <div class="row info_main_row d-flex align-items-center justify-content-around">

            <!-- <div class="col-md-6 col-lg-3">
              <div class="info_insta">
                <h4>
                  Instagram
                </h4>
                <div class="insta_box">
                  <div class="img-box">
                    <img src="images/insta-img.png" alt="">
                  </div>
                  <p>
                    long established fact that a reader
                  </p>
                </div>
                <div class="insta_box">
                  <div class="img-box">
                    <img src="images/insta-img.png" alt="">
                  </div>
                  <p>
                    long established fact that a reader
                  </p>
                </div>
              </div>
            </div> -->
            <!-- FOOTER -> ABOUT OUR COMPANY -->
            <div class="col-md-6 col-lg-4">
                <div class="info_detail">
                    <h4>
                        Company
                    </h4>
                    <p class="mb-0">
                        We are a family endeavor devoted to making premium quality chocolate and cocoa items since 2000.
                        The craft of making chocolate is one that is carefully and affectionately culminated after some time. Furthermore,
                        our image ‘ChocoDrip’ is an impression of our energy and love that goes into making fine chocolate.
                    </p>
                </div>
            </div>
            <!-- /..ABOUT OUR COMPANY -->
            <!-- FOOTER -> MENU -->
            <!-- <div class="col-md-6 col-lg-4">
              <div class="info_links">
                <h4>
                  Menu
                </h4>
                <div class="info_links_menu">
                  <a href="index.html">
                    Home
                  </a>
                  <a href="about.html">
                    About
                  </a>
                  <a href="chocolate.html">
                    Chocolates
                  </a>
                  <a href="testimonial.html">
                    Testimonial
                  </a>
                  <a href="contact.html">
                    Contact us
                  </a>
                </div>
              </div>
            </div> -->
            <!-- ../FOOTER -> MENU -->
            <!-- FOOTER -> INFO - LOCATION; E-MAIL; NUMBER -->
            <div class="col-md-6 col-lg-4 contact_links">
                <h4>
                    Contact Us
                </h4>
                <div class="info_contact">
                    <a target="_blank" href="https://www.google.com/maps/place/6+W+Wilson+St,+Batavia,+IL+60510,+USA/@41.8498941,-88.3104135,17z/data=!3m1!4b1!4m6!3m5!1s0x880efcc0e15f1229:0x2f86ae65ccc93765!8m2!3d41.8498941!4d-88.3078386!16s%2Fg%2F11csfcrrjn?entry=ttu&g_ep=EgoyMDI1MDIyNS4wIKXMDSoJLDEwMjExNDUzSAFQAw%3D%3D">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>
                  6 W Wilson St
                  Batavia, IL 60510
                </span>
                    </a>
                    <a href="tel:+011234567890">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                  +01 1234567890
                </span>
                    </a>
                    <a href="mailto:chocodrip@gmail.com">
                        <i class="fa fa-envelope"></i>
                        <span>
                  chocodrip&#64;gmail&#46;com
                </span>
                    </a>
                </div>
            </div>
            <!-- ../FOOTER -> INFO -->
            <div class="col-lg-4 d-flex justify-content-between align-items-start flex-column other">
                <h4>
                    Other links
                </h4>
                <ul class="other_links">
                    <li>
                        <a href="#" class="text-white" data-toggle="modal" data-target="#exampleModalCenter"> Author </a>
                    </li>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-black-50" >Jovana Paunovic 94/19</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="picture">
                                        <img src="{{ asset('images/author/author.jpg') }}" alt="Author" class="img-fluid"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <li>
                        <a href="documentation.pdf" target="_blank" class="text-white"> Documentation </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- end info_section -->
<div class="picture-choco-drip">
    <img src="{{asset('images/choco-drip.png')}}" alt="chocodrip" class='img-fluid' />
</div>


<!-- footer section -->
<footer class="container-fluid footer_section">
    <div class="container">
        <div class="col-md-11 col-lg-8 mx-auto">
            <p>
                 <img src="{{asset('images/chocolate-heart.png')}}" alt="chocolate heart drip" class="img-fluid mr-2"/> &copy; ChocoDrip - <span id="">2022.</span>
            </p>
        </div>
    </div>
</footer>
<!-- footer section -->
