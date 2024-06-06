@extends('frontend.master')

@section('main')
<main class="main">

    <section class="section-box mt-75">
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
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="box-nav-tabs nav-tavs-profile mb-5">
              <ul class="nav" role="tablist">
                <li><a class="btn btn-border mb-20" href="candidate-profile.html">My Profile</a></li>
                <li><a class="btn btn-border mb-20" href="candidate-profile-jobs.html">My Jobs</a></li>
                <li><a class="btn btn-border mb-20" href="candidate-profile-save-jobs.html">Saved Jobs</a></li>
                <li><a class="btn btn-border mb-20 active" href="candidate-profile-dashboard.html">Dashboard</a></li>
                <li>
                    

                     <!-- Authentication -->
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf

                       
                        <a class="btn btn-border mb-20" :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">Logout</a>
                    </form>
                    
                </li>
              </ul>
              <div class="mt-20"><a class="link-red" href="#">Delete Account</a></div>
            </div>
          </div>
          <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
            <div class="content-single">
              <h3 class="mt-0 mb-0 color-brand-1">Company Dashboard</h3>
              <div class="dashboard_overview">
                <div class="row">
                  <div class="col-lg-4 col-md-6">
                    <div class="dash_overview_item bg-info-subtle">
                      <h2>12 <span>job applied</span></h2>
                      <span class="icon"><i class="fas fa-briefcase"></i></span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="dash_overview_item bg-danger-subtle">
                      <h2>12 <span>job applied</span></h2>
                      <span class="icon"><i class="fas fa-briefcase"></i></span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="dash_overview_item bg-warning-subtle">
                      <h2>12 <span>job applied</span></h2>
                      <span class="icon"><i class="fas fa-briefcase"></i></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mt-30">
                    <div class="dash_alert_box p-30 bg-danger rounded-4 d-flex flex-wrap">
                      <span class="img">
                        <img src="assets/imgs/avatar/ava_17.png" alt="alert">
                      </span>
                      <div class="text">
                        <h4>This is demo heading</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem aliquam quasi deleniti nesciunt
                          obcaecati labore, magnam suscipit repudiandae corrupti laborum.</p>
                      </div>
                      <a href="#" class="btn btn-default rounded-1">Edit Profile</a>
                    </div>
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

