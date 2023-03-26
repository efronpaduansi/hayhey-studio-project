@extends('layouts.app')

@section('content')
  <!--::banner part start::-->
  <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-5">
                    <div class="banner_text text-center">
                        <div class="banner_text_iner">
                            <h5>Welcome</h5>
                            <h1>Hay<span>Dey</span> Moment</h1>
                            <p style="color: #000">Create your favorite moment with us</p>
                            <a href="#services" class="btn_1" style="color: #000">Booking Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::banner part start::-->

    <!--::about_us part start::-->
    <section class="about_us padding_top" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8">
                    <div class="about_us_text text-center">
                        <h5>About Us</h5>
                        <h2>HayDey Moment</h2>
                        <p> Berawal di tahun 2014, kemudian kami sudah 2 kali berganti nama dan akhirnya terbentuklah <i>HayDey</i>.<br><br>
                            <i>" Create Your Moment With Us" </i><br> Motto kami yang terbantuk karena kepuasan customer dengan hasil foto dan service kami yang merupakan aset terpenting.
                             Karna memiliki jiwa seni yg tinggi, kami selalu berusaha untuk selalu kreatif dan berinovasi, agar bisa menciptakan moment terbaik.
                         <br><br> HayDey Moment berdomisili pada daerah Kabupaten Tangerang Pasar Kemis <br> Jl. Pasar kemis-Cikupa, Suka Asih Rt.01/03 Kecamatan Pasar Kemis.</br></p>
                         {{-- <a href="https://www.instagram.com/haydey_moment/" class="btn btn-dark rounded-pill mt-3">View Work</a> --}}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--::about_us part end::-->

    <!-- gallery_part part start-->
    <section class="gallery_part section_padding" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_tittle text-center">
                        <p>Gallery</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                   <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('img/img-01.jpg') }}" alt="">
                        </div>
                   </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="card">
                         <div class="card-body">
                             <img src="{{ asset('img/img-02.jpg') }}" alt="">
                         </div>
                    </div>
                 </div>
                 <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="card">
                         <div class="card-body">
                             <img src="{{ asset('img/img-03.jpg') }}" alt="">
                         </div>
                    </div>
                 </div>
                 <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="card">
                         <div class="card-body">
                             <img src="{{ asset('img/img-04.jpg') }}" alt="">
                         </div>
                    </div>
                 </div>
                 <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="card">
                         <div class="card-body">
                             <img src="{{ asset('img/img-05.jpg') }}" alt="">
                         </div>
                    </div>
                 </div>
                 <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="card">
                         <div class="card-body">
                             <img src="{{ asset('img/img-06.jpg') }}" alt="">
                         </div>
                    </div>
                 </div>
            </div>
            <div class="section_tittle text-center" data-aos="zoom-in" data-aos-duration="1000">

                <a href="/gallery" class="btn_2 mt-3">Show more</a>
            </div>
        </div>
    </section>
    <!-- gallery_part part end-->

    <!--::pricing part start::-->
    <section class="pricing_part section_padding home_page_pricing" id="services">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="section_tittle text-center">
                        <p>Start Price Packagae</p>
                        <h2>Services</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($packages as $p)
                <div class="col-lg-4 col-sm-6">
                    <div class="single_pricing_part">
                        <div class="pricing_tittle">
                            <img src="{{ asset('pages/img/icon/feature_icon_3.svg') }}" alt="">
                            <p>{{ $p->package_name }}</p>
                        </div>
                        <div class="pricing_content">
                            <p>Start from</p>
                            <h3>IDR {{ $p->starting_price }}</h3>
                            <p>{!! nl2br($p->description)  !!}</p>
                            <a href="/package-details/{{ $p->id }}" class="btn_2">Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--::pricing part end::-->

    <!--::blog part start::-->
    <!-- <section class="catagory_post padding_bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="section_tittle">
                        <p>our blog</p>
                        <h2>Latest story</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="single_catagory_post post_2">
                        <div class="category_post_img">
                            <img src="img/blog/blog_1.png" alt="">
                        </div>
                        <div class="post_text_1 pr_30">
                            <h5><span> By Michal</span> / March 30 , 2019</h5>
                            <a href="blog.html">
                                <h3>Mad whales gathering open can't</h3>
                            </a>
                            <p>Is life form dominion under very seasons together
                                them divide so, she'd bearing sixth </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_catagory_post post_2">
                        <div class="category_post_img">
                            <img src="img/blog/blog_2.png" alt="">
                        </div>
                        <div class="post_text_1 pr_30">
                            <h5><span> By Michal</span> / March 30 , 2019</h5>
                            <a href="blog.html">
                                <h3>Creepeth grass brought over man</h3>
                            </a>
                            <p>Is life form dominion under very seasons together
                                them divide so, she'd bearing sixth </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_catagory_post post_2">
                        <div class="category_post_img">
                            <img src="img/blog/blog_3.png" alt="">
                        </div>
                        <div class="post_text_1 pr_30">
                            <h5><span> By Michal</span> / March 30 , 2019</h5>
                            <a href="blog.html">
                                <h3>Mad whales gathering open Evening</h3>
                            </a>
                            <p>Is life form dominion under very seasons together
                                them divide so, she'd bearing sixth </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--::blog part end::-->
@endsection