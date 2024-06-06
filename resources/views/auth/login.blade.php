
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

    <section class="pt-120 login-register">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
            <div class="login-register-cover">
              <div class="text-center">
                <h2 class="mb-5 text-brand-1">Login</h2>
                <p class="font-sm text-muted mb-30">Please Provide your valid credentials</p>
              </div>
               <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

              <form class="login-register text-start mt-20" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row">
                  <div class="col-xl-12">
                    <div class="form-group">
                      <label class="form-label" for="email" :value="__('Email')">Username *</label>
                      <input class="form-control" id="email" type="email"  name="email"
                        placeholder="test@example.com" :value="old('email')" required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="form-group">
                      <label class="form-label" for="password" :value="__('Password')">Password *</label>
                      <input class="form-control" id="password" 
                        placeholder="************"  type="password"
                        name="password"
                        required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                  </div>
                </div>

                 <!-- Remember Me -->
        <div class="form-check">
            <label for="remember_me" class="">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <span class="form-check-label" style="margin-left: 10px">{{ __('Remember me') }}</span>
            </label>
        </div>

                <div class="form-group">
                  <button class="btn btn-default hover-up w-100" type="submit" name="login">Login</button>
                </div>
                <div class="text-muted text-center">Don't have an account?
                  <a href="page-register.html">Registration</a>
                </div>
              </form>

             

            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
  <br>
  <br>
  <br>

@endsection

 

 
 








{{--<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
