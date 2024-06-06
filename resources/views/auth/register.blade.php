
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
          <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
            <div class="login-register-cover">
              <div class="text-center">
                <h2 class="mb-5 text-brand-1">Register</h2>
                <p class="font-sm text-muted mb-30">Lorem ipsum dolor sit amet consectetur.</p>
              </div>
            
              <form class="login-register text-start mt-20" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                  <div class="col-xl-6">
                    <div class="form-group">
                      
                      <label class="form-label" for="name" :value="__('Name')">Full Name *</label>
                      <input class="form-control" id="name" type="text" name="name"
                        placeholder="Steven Job">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group">
                      <label class="form-label" for="email">Email *</label>
                      <input class="form-control" id="email" type="email" required="" name="email"
                        placeholder="stevenjob@gmail.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                  </div>

                
                  <div class="col-xl-6">
                    <div class="form-group">
                      <label class="form-label" for="password">Password *</label>
                      <input class="form-control" id="password" type="password" required="" name="password"
                        placeholder="************">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group">
                      <label class="form-label" for="password_confirmation">Re-Password *</label>
                      <input class="form-control" id="password_confirmation" type="password" required="" name="password_confirmation"
                        placeholder="************">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                  </div>

                  <div class="col-12 mb-3">
                    <hr>
                    <h6 for="" class="mb-2">Create Account For</h6>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input {{$errors->has('account_type') ? 'is-invalid' : '' }}" type="radio" name="account_type" id="typeCandidate" value="candidate" checked>
                      <label class="form-check-label" for="typeCandidate">Candidate</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input {{$errors->has('account_type') ? 'is-invalid' : '' }} " type="radio" name="account_type" id="typeCompany" value="company">
                      <label class="form-check-label" for="typeCompany">Company</label>
                    </div>

                   @if($errors->has('account_type'))
                   <div class="">
                    <span style="font-weight: bold">{{ $errors->first('account_type') }}</span>

                   </div>
                   @endif
                    
                  </div>
                <div class="form-group">
                  <button class="btn btn-default hover-up w-100" type="submit" name="login">Submit &amp;
                    Register</button>
                </div>
                <div class="text-muted text-center">Already have an account?
                  <a href="/login">Sign in</a>
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

  @endsection



{{--

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

--}}
