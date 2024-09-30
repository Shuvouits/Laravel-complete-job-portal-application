@extends('frontend.master')

@section('main')

<main class="main">

    <div class="bg-homepage1"></div>

    @include('frontend.home.section.hero-section')

    <div class="mt-100"></div>

    @include('frontend.home.section.category')

    @include('frontend.home.section.featured_job')

    @include('frontend.home.section.why_choose')

    @include('frontend.home.section.learn-more-section')



    @include('frontend.home.section.counter-section')

    @include('frontend.home.section.top_recruiter')

    @include('frontend.home.section.pricing_plan')

    @include('frontend.home.section.job_location')

    @include('frontend.home.section.review-section')

    @include('frontend.home.section.blog-section')

    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
</main>

@endsection
