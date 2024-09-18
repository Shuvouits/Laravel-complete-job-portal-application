@extends('frontend.master')

@section('main')
<main class="main">



    <section class="section-box mt-120">
      <div class="container">
        <div class="row">

         @include('frontend.company-dashboard.sidebar')


          <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
            <div class="content-single">
              <h3 class="mt-0 mb-0 color-brand-1">Company Dashboard</h3>
              <div class="dashboard_overview">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="dash_overview_item bg-info-subtle">
                            <h2>{{ $jobPosts }} <span>Pending Jobs</span></h2>
                            <span class="icon"><i class="fas fa-briefcase"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="dash_overview_item bg-danger-subtle">
                            <h2>{{ $totalJobs }} <span>Total Jobs</span></h2>
                            <span class="icon"><i class="fas fa-briefcase"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="dash_overview_item bg-warning-subtle">
                            <h2>{{ $totalOrders }} <span>Total Orders</span></h2>
                            <span class="icon"><i class="fas fa-cart-plus"></i></span>
                        </div>
                    </div>



                </div>

                @if(!isCompanyProfileComplete())

                <div class="row">
                  <div class="col-12 mt-30">
                    <div class="dash_alert_box p-30 bg-danger rounded-4 d-flex flex-wrap">
                      <span class="img">
                        <img src="{{asset('frontend/assets/imgs/avatar/ava_17.png')}}" alt="alert">
                      </span>
                      <div class="text">
                        <h4>Warning: You have to complete your company profile first!</h4>
                        <p>Please complete your company profile to use all the features</p>
                      </div>
                      <a href="/company/profile" class="btn btn-default rounded-1">Edit Profile</a>
                    </div>
                  </div>
                </div>

                @endif

                <br>

                <div class="card"  style="border: 1px solid #1ca77459">
                    <div class="card-body">
                        <table class="table">

                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td><b>Current Package</b></td>
                                <td>{{ $userPlan?->plan?->label }} Package</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Job Post Available</td>
                                <td>{{ $userPlan?->job_limit }}</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Featured Post Available</td>
                                <td>{{ $userPlan?->featured_job_limit }}</td>
                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td>Highlight Post Available</td>
                                <td>{{ $userPlan?->highlight_job_limit }}</td>
                              </tr>
                            </tbody>
                          </table>

                    </div>
                </div>




              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <br>
  <br>

  </main>

  @endsection



{{--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>--}}

