@extends('frontend.master')

<style>
    a.nav-link {
        color: black !important;

    }

    .nav-tabs li a:hover,
    .nav-tabs li a.active {
        color: white !important;
        border-color: #1ca774;
        background: #1ca774 !important;
        width: 120px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .content-single p {

        color: #1ca774 !important;

    }


    .select-style .select2 {
        border: 1px solid #1ca77459 !important;
    }
</style>


@section('main')
    <main class="main">


        @include('frontend.body.breadcrumb')

        <section class="section-box mt-120">
            <div class="container">
                <div class="row">



                    @include('frontend.candidate-dashboard.sidebar')


                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="content-single">
                            <h3 class="mt-0 mb-15 color-brand-1 text-center">Profile Info</h3>



                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#basic">Basic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#experienceTab"
                                        style="width: 150px">Experience & Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#account">Account Settings</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">


                                @include('frontend.candidate-dashboard.profile.section.basic')
                                @include('frontend.candidate-dashboard.profile.section.profile')
                                @include('frontend.candidate-dashboard.profile.section.experience')
                                @include('frontend.candidate-dashboard.profile.section.account')





                            </div>





                        </div>
                    </div>


                </div>
            </div>


        </section>



    </main>
@endsection
