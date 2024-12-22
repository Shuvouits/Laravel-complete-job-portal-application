@extends('frontend.master')

@section('main')
    <main class="main">

        <section class="section-box mt-75">
            <div class="breacrumb-cover">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <h2 class="mb-20">Applications</h2>
                            <ul class="breadcrumbs">
                                <li><a class="home-icon" href="index.html">Home</a></li>
                                <li>Applications</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box mt-120">
            <div class="container">
                <div class="row">
                    @include('frontend.company-dashboard.sidebar')
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="">
                            <div class="">
                                <h4>{{ $jobTitle->title }}</h4>

                            </div>
                            <br>
                            <div class=" p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="border-bottom : 1px solid #1ca77459">
                                                <th>Details</th>
                                                <th>Experience</th>
                                                <th style="width: 20%">Action</th>
                                            </tr>

                                        </thead>

                                        <tbody>
                                            @forelse ($applications as $application)
                                                <tr style="border-bottom : 1px solid #1ca77459">
                                                    <td>
                                                        <div class="d-flex">

                                                            <img style="width: 50px; height: 50px;; object-fit:cover;"
                                                                src="{{ asset($application->candidate?->image) }}"
                                                                alt="">
                                                            <br>
                                                            <div style="margin-left: 10px">
                                                                <span>{{ $application->candidate->full_name }}</span>
                                                                <br>
                                                                <span>{{ $application->candidate->profession->name }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $application->candidate->experience->name }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('candidates.show', $application->candidate->slug) }}"
                                                            class="btn btn-success">View Profile</a>

                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No result found!</td>
                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>
                                </div>
                            </div>

                            <div class="paginations">
                                <ul class="pager">
                                    @if ($applications->hasPages())
                                        {{ $applications->withQueryString()->links() }}
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
