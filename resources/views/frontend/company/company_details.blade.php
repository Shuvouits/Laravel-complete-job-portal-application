@extends('frontend.master')

@section('main')
    <main class="main mt-75">

        <section class="section-box">
            <div class="breacrumb-cover">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <h2 class="mb-20">Blog</h2>
                            <ul class="breadcrumbs">
                                <li><a class="home-icon" href="index.html">Home</a></li>
                                <li>Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"><img src="{{asset($company_data->banner)}}" alt="joblist" style="height: 372px; object-fit:cover">
                </div>
                <div class="box-company-profile">
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <img src="{{asset($company_data->logo)}}" style="height: 80px; object-fit: cover" />
                            <h5 class="f-18">{{$company_data->name}} <span class="card-location font-regular ml-20">{{$company_data->countryData->name}}</span>
                            </h5>
                            <p class="mt-5 font-md color-text-paragraph-2 mb-15">Our Mission to make working life simple</p>
                        </div>
                        <div class="col-lg-4 col-md-12 text-lg-end"><a class="btn btn-call-icon btn-apply btn-apply-big"
                                href="#job">Open Position</a></div>
                    </div>
                </div>

                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>

        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content-single">

                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                    aria-labelledby="tab-about">
                                    <h4>About Us</h4>
                                    {{$company_data->bio}}

                                </div>

                                <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                aria-labelledby="tab-about">
                                <h4>Vision</h4>
                                {{$company_data->vision}}

                            </div>


                            </div>
                        </div>
                        <div class="box-related-job content-page" id="job">
                            <h5 class="mb-30">Latest Jobs</h5>
                            <div class="box-list-jobs display-list">
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img src="assets/imgs/brands/brand-6.png"
                                                            alt="joblist"></div>
                                                    <div class="right-info"><a class="name-job" href="">Quora
                                                            JSC</a><span class="location-small">New York, US</span></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                        href="#">Adobe XD</a><a class="btn btn-grey-small mr-5"
                                                        href="#">Figma</a></div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a href="job-details.html">Senior System Engineer</a></h4>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time"><span>5</span><span> mins ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing
                                                elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">$800</span><span
                                                            class="text-muted">/Hour</span></div>
                                                    <div class="col-lg-5 col-5 text-end">
                                                        <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                            data-bs-target="#ModalApplyJobForm">
                                                            Apply now</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img src="assets/imgs/brands/brand-7.png"
                                                            alt="joblist"></div>
                                                    <div class="right-info"><a class="name-job"
                                                            href="">Nintendo</a><span class="location-small">New
                                                            York, US</span></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                        href="#">Adobe XD</a><a class="btn btn-grey-small mr-5"
                                                        href="#">Figma</a></div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a href="job-details.html">Products Manager</a></h4>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time"><span>6</span><span> mins ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing
                                                elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">$250</span><span
                                                            class="text-muted">/Hour</span></div>
                                                    <div class="col-lg-5 col-5 text-end">
                                                        <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                            data-bs-target="#ModalApplyJobForm">
                                                            Apply now</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img src="assets/imgs/brands/brand-8.png"
                                                            alt="joblist"></div>
                                                    <div class="right-info"><a class="name-job"
                                                            href="">Periscope</a><span class="location-small">New
                                                            York, US</span></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                        href="#">Adobe XD</a><a class="btn btn-grey-small mr-5"
                                                        href="#">Figma</a></div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a href="job-details.html">Lead Quality Control QA</a></h4>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time"><span>6</span><span> mins ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing
                                                elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">$250</span><span
                                                            class="text-muted">/Hour</span></div>
                                                    <div class="col-lg-5 col-5 text-end">
                                                        <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                            data-bs-target="#ModalApplyJobForm">
                                                            Apply now</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="paginations mt-60">
                                <ul class="pager">
                                    <li><a class="pager-prev" href="#"><i class="fas fa-arrow-left"></i></a></li>
                                    <li><a class="pager-number" href="#">1</a></li>
                                    <li><a class="pager-number" href="#">2</a></li>
                                    <li><a class="pager-number active" href="#">3</a></li>
                                    <li><a class="pager-number" href="#">4</a></li>
                                    <li><a class="pager-next" href="#"><i class="fas fa-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <div class="sidebar-info pl-0"><span class="sidebar-company">{{$company_data->name}}</span><span
                                            class="card-location">{{$company_data->countryData->name}}</span></div>
                                </div>

                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                   {!! $company_data->map_link !!}
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Industry Type
                                            </span><strong class="small-heading">{{$company_data->industry->name}}</strong>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Organization Type
                                            </span><strong class="small-heading">{{$company_data->organization->name}}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Team Size</span><strong
                                                class="small-heading">{{$company_data->team->name}}</strong></div>
                                    </li>

                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Member
                                                since</span><strong class="small-heading">{{formatDate($company_data->establishment_date)}}</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Last Jobs
                                                Posted</span><strong class="small-heading">4 days</strong></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-list-job">
                                <ul class="ul-disc">
                                    <li>{{$company_data->address}}</li>
                                    <li>Phone: {{$company_data->phone}}</li>
                                    <li>Email: {{$company_data->email}}</li>
                                </ul>
                                <div class="mt-30"><a class="btn btn-send-message" href="page-contact.html">Send
                                        Message</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
