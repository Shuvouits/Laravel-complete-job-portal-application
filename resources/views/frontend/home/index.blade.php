@extends('frontend.master')

@section('main')

<main class="main">

    <div class="bg-homepage1"></div>

    @include('frontend.home.section.hero-section')

    <div class="mt-100"></div>

    @include('frontend.home.section.category')

    @include('frontend.home.section.featured_job')

    @include('frontend.home.section.why_choose')


    <section class="section-box overflow-visible mt-100 mb-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-sm-12">
                    <div class="content-job-inner"><span class="color-text-mutted text-32">Millions Of Jobs.
                        </span>
                        <h2 class="text-52 wow animate__animated animate__fadeInUp">Find The One That&rsquo;s
                            <span class="color-brand-2">Right</span> For You
                        </h2>
                        <div class="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp">Search all
                            the open
                            positions on the web. Get your own personalized salary estimate. Read reviews on over
                            600,000 companies
                            worldwide. The right job is out there.</div>
                        <div class="mt-40">
                            <div class="wow animate__animated animate__fadeInUp"><a class="btn btn-default"
                                    href="jobs-grid.html">Search Jobs</a><a class="btn btn-link"
                                    href="page-about.html">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="box-image-job">
                        <figure class="wow animate__animated animate__fadeIn">
                            <img alt="joblist"
                                src="{{ asset('frontend/assets/imgs/page/homepage1/img1.png') }}">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box overflow-visible mt-15 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="text-center counter_box">
                        <h1 class="color-brand-2"><span class="count">25</span></h1>
                        <h5>Completed Cases</h5>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="text-center counter_box">
                        <h1 class="color-brand-2"><span class="count">17</span></h1>
                        <h5>Our Office</h5>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="text-center counter_box">
                        <h1 class="color-brand-2"><span class="count">86</span></h1>
                        <h5>Skilled People</h5>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="text-center counter_box">
                        <h1 class="color-brand-2"><span class="count">28</span></h1>
                        <h5>CHappy Clients</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.home.section.top_recruiter')

    @include('frontend.home.section.pricing_plan')

    @include('frontend.home.section.job_location')

    @include('frontend.home.section.client')

    @include('frontend.home.section.news_blog')

    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
</main>

@endsection
