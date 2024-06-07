@extends('frontend.master')

<style>
    a.nav-link{
        color: black !important;

    }
    .nav-tabs li a:hover, .nav-tabs li a.active {
    color: white !important;
    border-color: #1ca774;
    background: #1ca774 !important;
    width: 120px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    
}
</style>

@section('main')
    <main class="main">


        @include('frontend.body.breadcrumb')

        <section class="section-box mt-120">
            <div class="container">
                <div class="row">



                    @include('frontend.body.sidebar')


                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="content-single">
                            <h3 class="mt-0 mb-15 color-brand-1">My Account</h3><a class="font-md color-text-paragraph-2"
                                href="#">Update your profile</a>
                            <div class="mt-35 mb-40 box-info-profie">
                                <div class="image-profile"><img
                                        src="{{ asset('frontend/assets/imgs/page/candidates/candidate-profile.png') }}"
                                        alt="joblist">
                                </div><a class="btn btn-apply">Upload Avatar</a><a class="btn btn-link">Delete</a>
                            </div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#company">Company Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#founding">Founding Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#account">Account Setting</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="company" class="container tab-pane active"><br>
                                    
                                    <div class="row form-contact">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Logo*</label>
                                                    <input class="form-control" type="file">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Banner*</label>
                                                    <input class="form-control" type="file" value="">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Company Name*</label>
                                                <input class="form-control" type="text" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Company Bio*</label>
                                                <textarea class="form-control" rows="4">We are AliThemes , a creative and dedicated group of individuals who love web development almost as much as we love our customers. We are passionate team with the mission for achieving the perfection in web design.</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Company Vision*</label>
                                                <textarea class="form-control" rows="4">We are AliThemes , a creative and dedicated group of individuals who love web development almost as much as we love our customers. We are passionate team with the mission for achieving the perfection in web design.</textarea>
                                            </div>
                                        </div>



                                        
        
        
        
                                      
                                    </div>

                                </div>
                                <div id="founding" class="container tab-pane fade"><br>
                                    <h3>Menu 1</h3>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                        ea commodo consequat.</p>
                                </div>
                                <div id="account" class="container tab-pane fade"><br>
                                    <h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam.</p>
                                </div>
                            </div>


                           


                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main>
@endsection
