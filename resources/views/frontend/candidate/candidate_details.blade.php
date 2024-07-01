@extends('frontend.master')

@section('main')

<style>
    .content-single p {
        color: black !important;
    }


</style>


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
            <br>
            <br>
           <img src="{{asset($candidate_data->image)}}" style="height: 120px; object-fit:cover; border-radius: 60px; border: 5px solid #1ca774" />
            <div class="box-company-profile">
                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <h5 class="f-18">{{$candidate_data->user->name}} <span class="card-location font-regular ml-20">{{$candidate_data->states->name}},
                                {{$candidate_data->countries->name}}</span></h5>
                        <p class="mt-0 font-md color-text-paragraph-2 mb-15">{{$candidate_data->title}}
                        </p>
                        <div class="mt-0 mb-15 d-flex flex-wrap align-items-center">
                            <img src="{{asset('frontend/assets/imgs/template/icons/star.svg')}}" alt="joblist">
                            <img src="{{asset('frontend/assets/imgs/template/icons/star.svg')}}" alt="joblist">
                            <img src="{{asset('frontend/assets/imgs/template/icons/star.svg')}}" alt="joblist">
                            <img src="{{asset('frontend/assets/imgs/template/icons/star.svg')}}" alt="joblist">
                            <img src="{{asset('frontend/assets/imgs/template/icons/star.svg')}}" alt="joblist">

                            <span class="font-xs color-text-mutted ml-10">(66)</span>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end"><a
                            class="btn btn-download-icon btn-apply btn-apply-big"
                            href="{{asset($candidate_data->cv)}}">Download CV</a></div>
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

                            <div class="tab-pane fade show active" id="tab-short-bio" role="tabpanel"
                                aria-labelledby="tab-short-bio">
                                <h4>About Me</h4>
                                {!! $candidate_data->bio !!}

                                <p></p>
                                <h4>Work Experience</h4>

                                <ul class="timeline">
                                    @foreach ($candidate_data->candidateExperiences as $experience)
                                    <li>
                                        <a href="#" class="float-right">{{ formatDate($experience->start) }} - {{ $experience->currently_working ? 'Current' :  formatDate($experience->end)}}</a>
                                        <a href="javascript:;">{{ $experience->designation }}</a> | <span>{{ $experience->department }}</span>

                                        <p>{{ $experience->company }}</p>
                                        <p>{{ $experience->responsibilities }}</p>
                                    </li>
                                    @endforeach

                                </ul>



                                <h4>Education</h4>

                                <ul class="timeline">
                                    @foreach ($candidate_education as $item)
                                    <li>
                                        <a href="#" class="float-right">{{ formatDate($item->start) }} - {{ $item->currently_working ? 'Current' :  formatDate($item->end)}}</a>
                                        <a href="javascript:;">{{ $item->level }}</a> | <span>{{ $item->degree }}</span>


                                        <p>{{ $item->note }}</p>
                                    </li>
                                    @endforeach

                                </ul>


                            </div>

                        </div>
                    </div>
                    <div class="box-related-job content-page   cadidate_details_list">
                        <h3 class="mb-30">Work History</h3>
                        <div class="box-list-jobs display-list">
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"><span
                                        class="flash"></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box"><img src="assets/imgs/brands/brand-6.png"
                                                        alt="joblist"></div>
                                                <div class="right-info"><a class="name-job" href="">Quora
                                                        JSC</a><span class="location-small">New York, US</span>
                                                </div>
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
                                                class="card-time"><span>5</span><span> days ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span
                                                        class="card-text-price">Status:<span
                                                            class="text-success">Done</span></span></div>
                                                <div class="col-lg-5 col-5 text-end"><a class="btn btn-apply-now"
                                                        href="job-details.html">View
                                                        Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"><span
                                        class="flash"></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box"><img src="assets/imgs/brands/brand-7.png"
                                                        alt="joblist"></div>
                                                <div class="right-info"><a class="name-job"
                                                        href="">Nintendo</a><span
                                                        class="location-small">New York, US</span></div>
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
                                                class="card-time"><span>6</span><span> days ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span
                                                        class="card-text-price">Status:<span
                                                            class="text-success">Done</span></span></div>
                                                <div class="col-lg-5 col-5 text-end"><a class="btn btn-apply-now"
                                                        href="job-details.html">View
                                                        Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"><span
                                        class="flash"></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box"><img src="assets/imgs/brands/brand-8.png"
                                                        alt="joblist"></div>
                                                <div class="right-info"><a class="name-job"
                                                        href="">Periscope</a><span
                                                        class="location-small">New York, US</span></div>
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
                                                class="card-time"><span>6</span><span> days ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span
                                                        class="card-text-price">Status:<span
                                                            class="text-success">Done</span></span></div>
                                                <div class="col-lg-5 col-5 text-end"><a class="btn btn-apply-now"
                                                        href="job-details.html">View
                                                        Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paginations mt-60">
                            <ul class="pager">
                                <li><a class="pager-prev" href="#"><i class="fas fa-arrow-left"></i></a>
                                </li>
                                <li><a class="pager-number" href="#">1</a></li>
                                <li><a class="pager-number" href="#">2</a></li>
                                <li><a class="pager-number active" href="#">3</a></li>
                                <li><a class="pager-number" href="#">4</a></li>
                                <li><a class="pager-next" href="#"><i class="fas fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                      <h5 class="f-18">Overview</h5>
                      <div class="sidebar-list-job">
                        <ul>
                          <li>
                            <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                            <div class="sidebar-text-info"><span class="text-description">Experience</span><strong
                                class="small-heading">{{$candidate_data->experience->name}}</strong></div>
                          </li>
                          <li>
                              <div class="sidebar-icon-item"><i class="fi fi-rr-settings-sliders"></i></div>
                              <div class="sidebar-text-info"><span class="text-description">Skills</span>
                              <strong>
                                @forelse ($candidate_data->skills as $item)
                                <p class="badge bg-info text-light">{{ $item->skill->name }}</p>
                                @empty
                                <p>No skills found</p>
                                @endforelse

                              </strong>
                              </div>
                            </li>
                          <li>
                            <div class="sidebar-icon-item"><i class="fi fi-rr-settings-sliders"></i></div>
                            <div class="sidebar-text-info"><span class="text-description">Languages</span><strong
                                class="small-heading">

                                @foreach ($candidate_data->languages as $item)
                                <p class="badge bg-info text-light">{{ $item->language->name }}</p>
                            @endforeach

                              </strong></div>
                          </li>

                          <li>
                              <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                              <div class="sidebar-text-info"><span class="text-description">Profession</span><strong
                                  class="small-heading">{{ $candidate_data->profession->name }}</strong></div>
                          </li>

                          <li>
                            <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                            <div class="sidebar-text-info"><span class="text-description">Date of Birth</span><strong
                                class="small-heading">{{ formatDate($candidate_data->birth_date) }}</strong></div>
                          </li>
                          <li>
                            <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                            <div class="sidebar-text-info"><span class="text-description">Gender</span><strong
                                class="small-heading">{{ $candidate_data->gender }}</strong></div>
                          </li>
                          <li>
                              <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                              <div class="sidebar-text-info"><span class="text-description">Marital Status </span><strong
                                  class="small-heading">{{ $candidate_data->maritial_status }}</strong></div>
                            </li>
                            <li>
                              <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                              <div class="sidebar-text-info"><span class="text-description">Website </span><strong
                                  class="small-heading"><a href="{{ $candidate_data->website }}">{{ $candidate_data->website }}</a></strong></div>
                            </li>
                        </ul>
                      </div>
                      <div class="sidebar-list-job">
                        <ul class="ul-disc">
                          <li>{{$candidate_data->address}} {{$candidate_data->cities->name}}, {{$candidate_data->states->name}}, {{$candidate_data->countries->name}}</li>
                          <li>Phone: {{ $candidate_data->phone_one }}</li>
                          <li>Phone: {{ $candidate_data->phone_two }}</li>

                          <li>Email: {{ $candidate_data->email }}</li>
                        </ul>
                        <div class="mt-30"><a class="btn btn-send-message" href="mailto:{{ $candidate_data->email }}">Send Message</a></div>
                      </div>
                    </div>
                  </div>


            </div>
        </div>
    </section>

</main>
<br>
<br>

@endsection
