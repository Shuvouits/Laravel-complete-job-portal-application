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

        <section class="section-box mt-120">
            <div class="container">
                <div class="row flex-row-reverse">

                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page company_page">
                            <div class="box-filters-job">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Showing
                                            <strong>41-60 </strong>of
                                            <strong>944 </strong>jobs</span></div>
                                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                        <div class="display-flex2">
                                            <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        data-bs-display="static"><span>12</span><i
                                                            class="fi-rr-angle-small-down"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort">
                                                        <li><a class="dropdown-item active" href="#">10</a></li>
                                                        <li><a class="dropdown-item" href="#">12</a></li>
                                                        <li><a class="dropdown-item" href="#">20</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box-border"><span class="text-sortby">Sort by:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        data-bs-display="static"><span>Newest
                                                            Post</span><i class="fi-rr-angle-small-down"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort2">
                                                        <li><a class="dropdown-item active" href="#">Newest
                                                                Post</a></li>
                                                        <li><a class="dropdown-item" href="#">Oldest Post</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Rating Post</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                @foreach ($companies as $item)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
                                            <div class="image-box"><a href="/company-details/{{ $item->slug }}"><img
                                                        src="{{ $item->logo }}" alt="joblist"></a></div>
                                            <div class="info-text mt-10">
                                                <h5 class="font-bold"><a
                                                        href="/company-details/{{ $item->slug }}">{{ $item->name }}</a>
                                                </h5>
                                                <div class="mt-5 d-flex align-items-center justify-content-center "><img
                                                        alt="joblist"
                                                        src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><img
                                                        alt="joblist"
                                                        src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><img
                                                        alt="joblist"
                                                        src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><img
                                                        alt="joblist"
                                                        src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><img
                                                        alt="joblist"
                                                        src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><span
                                                        class="font-xs color-text-mutted ml-10"><span>(</span><span>66</span><span>)</span></span>
                                                </div><span class="card-location">{{ $item->countryData->name }}</span>
                                                <div class="mt-30"><a class="btn btn-grey-big"
                                                        href="jobs-grid.html"><span>12</span><span> Jobs
                                                            Open</span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach





                            </div>
                        </div>
                        <div class="paginations">
                            <ul class="pager">
                                @if ($companies->hasPages())
                                    {{ $companies->withQueryString()->links() }}
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block head-border mb-30">
                                    <h5>Advance Filter <a class="link-reset" href="#">Reset</a></h5>
                                </div>

                                <form action="{{ route('jobs.index') }}" method="GET">

                                    <div class="filter-block mb-20">
                                        <div class="form-group ">
                                            <input type="text" value="{{ request()?->search }}" class="form-control"
                                                name="search" placeholder="Search">
                                        </div>
                                    </div>

                                    <div class="filter-block mb-20">
                                        <div class="form-group select-style">
                                            <select name="country" class="form-control country form-icons select-active">

                                                <option value="" selected disabled>Choose Country</option>
                                                @foreach ($countries as $country)
                                                    <option @selected(request()?->country == $country->id) value="{{ $country->id }}">
                                                        {{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="filter-block mb-20">
                                        <div class="form-group select-style">
                                            <select name="state" class="form-control state form-icons select-active">
                                                @if ($selectedStates)
                                                    <option value="">All</option>
                                                    @foreach ($selectedStates as $state)
                                                        <option @selected($state->id == request()->state) value="{{ $state->id }}">
                                                            {{ $state->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">State</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="filter-block mb-20">
                                        <div class="form-group select-style">
                                            <select name="city" class="form-control city form-icons select-active">
                                                @if ($selectedCites)
                                                    <option value="">All</option>

                                                    @foreach ($selectedCites as $city)
                                                        <option @selected($city->id == request()->city) value="{{ $city->id }}">
                                                            {{ $city->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">City</option>
                                                @endif
                                            </select>

                                        </div>
                                    </div>



                                    <div class="filter-block mb-20">
                                        <h5 class="medium-heading mb-25">Salary Range</h5>
                                        <div class="list-checkbox pb-20">
                                            <div class="row position-relative mt-10 mb-20">
                                                <div class="col-sm-12 box-slider-range">
                                                    <div id="slider-range"></div>
                                                </div>
                                                <div class="box-input-money">
                                                    <input class="input-disabled form-control min-value-money" type="text"
                                                        name="min-value-money" disabled="disabled" value="">
                                                    <input class="form-control min-value" type="hidden" name="min_salary"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="box-number-money">
                                                <div class="row mt-30">
                                                    <div class="col-sm-6 col-6"><span class="font-sm color-brand-1">{{ config('settings.site_currency_icon') }}0</span>
                                                    </div>
                                                    <div class="col-sm-6 col-6 text-end"><span
                                                            class="font-sm color-brand-1">{{ config('settings.site_currency_icon') }}100000</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                  

                                    <button class="submit btn btn-default mt-10 rounded-1 w-100"
                                    type="submit">Search</button>




                                </form>





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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.country').on('change', function() {
                let country_id = $(this).val();
                // remove all previous cities
                $('.city').html("");

                $.ajax({
                    mehtod: 'GET',

                    url: `/company/get-states/${country_id}`,
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, value) {
                            html +=
                                `<option value="${value.id}" >${value.name}</option>`
                        });

                        html = `<option value="" >Choose</option>` + html;

                        $('.state').html(html);
                    },
                    error: function(xhr, status, error) {}
                })
            })

            // get cities
            $('.state').on('change', function() {
                let state_id = $(this).val();

                $.ajax({
                    mehtod: 'GET',
                    url: `/company/get-cities/${state_id}`,

                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, value) {
                            html +=
                                `<option value="${value.id}" >${value.name}</option>`
                        });

                        html = `<option value="" >Choose</option>` + html;

                        $('.city').html(html);
                    },
                    error: function(xhr, status, error) {}
                })
            })

            $('.job-bookmark').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    method: 'GET',

                    data: {},
                    success: function(response) {
                        //fas fa-bookmark
                        $('.job-bookmark').each(function() {
                            let elementId = $(this).data('id');

                            if (elementId == response.id) {
                                $(this).find('i').addClass('fas fa-bookmark');
                            }
                        })
                        notyf.success(response.message)
                    },
                    error: function(xhr, status, error) {
                        let erorrs = xhr.responseJSON.errors;
                        $.each(erorrs, function(index, value) {
                            notyf.error(value[index]);
                        });
                    }
                })
            })
        })
    </script>
@endpush
