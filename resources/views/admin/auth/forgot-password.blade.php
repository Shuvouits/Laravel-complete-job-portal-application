@extends('admin.auth.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Admin Forgot Password</h4>
        </div>

        <div class="card-body">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email" :value="__('Email')">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required :value="old('email')" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Forgot Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection





{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        <h1> Admin Forgot Password </h1>
        <br>
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>  --}}
