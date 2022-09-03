@extends('frontend.layouts.app')
@section('main_section')
    <div class="main">
        <!-- banner section start  -->
        <section class="mh-500 section-bg d-flex align-items-center" style="background-image: url(assets/frontend/img/banner.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 text-white">
                        <h2 class="fz-50 pb-3">lagbe.co</h2>
                        <p>Simple Job Portal for Bangladeshi People</p>
                        <p>Want job? or, Hire people? Easy solution for all. Register and</p>
                        <a href="{{route('login')}}" class="btn btn-primary mt-3">Get Started</a>
                    </div><!-- col./  -->
                </div><!-- row./  -->
            </div><!-- container./  -->
        </section>

        <!-- banner bottom section start  -->
        <section class="mt-50-2 pb-100">
            <div class="container">
                <div class="row g-0 shadow-1">
                    <div class="col-12 col-lg-3 col-md-6 bdr-right-1">
                        <div class="box bg-white p-4">
                            <h5>Starter</h5>
                            <h2 class="fw-600 fz-24">Easy and quick</h2>
                            <p>Register with only Name and Valid Phone Number.</p>
                        </div>
                    </div><!-- col./  -->

                    <div class="col-12 col-lg-3 col-md-6 bdr-right-1">
                        <div class="box bg-white p-4">
                            <h5>Starter</h5>
                            <h2 class="fw-600 fz-24">Flexible</h2>
                            <p>Delete, upload, rename, rearange. Do wtahever you need. It is flexible and functional.</p>
                        </div>
                    </div><!-- col./  -->

                    <div class="col-12 col-lg-3 col-md-6 bdr-right-1">
                        <div class="box bg-white p-4">
                            <h5>Starter</h5>
                            <h2 class="fw-600 fz-24">Secure & Compliant</h2>
                            <p>Data security and daily backups. There's no way of data leakage.
                            </p>
                        </div>
                    </div><!-- col./  -->

                    <div class="col-12 col-lg-3 col-md-6">
                        <div class="box bg-white p-4">
                            <h5>Starter</h5>
                            <h2 class="fw-600 fz-24">FREE</h2>
                            <p>For the occasional creation of accounts. </p>
                        </div>
                    </div><!-- col./  -->

                </div><!-- row./  -->
            </div><!-- container./  -->
        </section>

        <!-- intro section start  -->
        <section class="mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="text-shadow-1 fz-50 pb-3 fz-30sm">Our Partners</h2>
                    </div><!-- col./  -->
                </div><!-- row./  -->

                <div class="row">
                    <div class="col-3">
                        <a href="{{asset('assets/frontend/img/1.jpg')}}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{asset('assets/frontend/img/1.jpg')}}" alt="" width="256px" height="186px">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{asset('assets/frontend/img/2.png')}}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{asset('assets/frontend/img/2.png')}}" alt="" width="256px" height="186px">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{asset('assets/frontend/img/3.png')}}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{asset('assets/frontend/img/3.png')}}" alt="" width="256px" height="186px">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{asset('assets/frontend/img/4.png')}}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{asset('assets/frontend/img/4.png')}}" alt="" width="256px" height="186px">
                        </a>
                    </div><!-- col./  -->
                </div><!-- row./  -->
                <div class="row mt-3">
                    <div class="col-3">
                        <a href="{{asset('assets/frontend/img/5.png')}}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{asset('assets/frontend/img/5.png')}}" alt="" width="256px" height="186px">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{asset('assets/frontend/img/6.png')}}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{asset('assets/frontend/img/6.png')}}" alt="" width="256px" height="186px">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{asset('assets/frontend/img/7.png')}}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{asset('assets/frontend/img/7.png')}}" alt="" width="256px" height="186px">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{asset('assets/frontend/img/8.png')}}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{asset('assets/frontend/img/8.png')}}" alt="" width="256px" height="186px">
                        </a>
                    </div><!-- col./  -->
                </div><!-- row./  -->
                <div class="row mt-3">
                    <div class="col-3">
                        <a href="{{asset('assets/frontend/img/9.png')}}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{asset('assets/frontend/img/9.png')}}" alt="" width="256px" height="186px">
                        </a>
                    </div><!-- col./  -->
                </div><!-- row./  -->
            </div><!-- container./  -->
        </section>


        <!-- intro section start  -->
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="text-shadow-1 fz-50 pb-3 fz-30sm">What is lagbe.co?</h2>
                        <p>
                            It's a job portal for Bangladeshi people. To search for jobs, apply here or Post an advertise to hire people
                        </p>
                    </div><!-- col./  -->
                </div><!-- row./  -->

                <div class="row">
                    <div class="col-12">
                        <img src="{{asset('assets/frontend/img/web-Banner.webp')}}" alt="process" class="w-100 img-fluid">
                    </div><!-- col./  -->
                </div><!-- row./  -->
            </div><!-- container./  -->
        </section>

        <!-- cta section start  -->
        <section class="bg-color-1 py-5">
            <div class="container">
                <div class="row align-items-center text-center text-md-start">
                    <div class="col-12 col-md-8 mb-4 mb-md-0">
                        <h3 class="fz-40 fz-30sm">Get Started with lagbe.co Today...</h3>
                    </div><!-- col./  -->

                    <div class="col-12 col-md-4">
                        <a href="{{route('register.view')}}" class="btn btn-primary">Try for free</a>
                    </div><!-- col./  -->
                </div><!-- row./  -->
            </div><!-- container./  -->
        </section>
    </div>
@endsection
