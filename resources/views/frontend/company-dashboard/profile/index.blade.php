@extends('frontend.master')

<style>
    a.nav-link {
        color: black !important;

    }

    .nav-tabs li a:hover,
    .nav-tabs li a.active {
        color: white !important;
        border-color: #1ca774;
        background: #1ca774 !important;
        width: 120px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .content-single p {

        color: #1ca774 !important;

    }


    .select-style .select2 {
        border: 1px solid #1ca77459 !important;
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
                            <h3 class="mt-0 mb-15 color-brand-1 text-center">Profile Info</h3>



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


                                    <form method="post" action="{{ route('company-info') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row form-contact">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <x-image-preview style="height: 200px;" :source="$companyInfo->logo" />
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Logo*</label>
                                                        <input class="form-control" type="file" name="logo">
                                                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <x-image-preview style="height: 200px;" :source="$companyInfo->banner" />
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Banner*</label>
                                                        <input class="form-control" type="file" name="banner"
                                                            value="">
                                                        <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Company Name*</label>
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ $companyInfo->name }}">
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Company Bio*</label>
                                                    <textarea class="form-control" rows="4" name="bio">{{ $companyInfo->bio }}</textarea>
                                                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Company Vision*</label>
                                                    <textarea class="form-control" rows="4" name="vision">{{ $companyInfo->vision }}</textarea>
                                                    <x-input-error :messages="$errors->get('vision')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="box-button mt-15">
                                                <button type="submit" class="btn btn-apply-big font-md font-bold">Save All
                                                    Changes</button>
                                            </div>








                                        </div>
                                    </form>





                                </div>


                                <div id="founding" class="container tab-pane"><br>

                                    <form method="post" action="{{ route('founding-info') }}">
                                        @csrf

                                        <div class="row form-contact">

                                            <div class="row">



                                                <div class="col-md-4">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Industry
                                                            Type*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="industry_type">
                                                            <option value="0">New York, US</option>
                                                            <option>London</option>

                                                        </select>
                                                        <x-input-error :messages="$errors->get('industry_type')" class="mt-2" />
                                                    </div>

                                                </div>




                                                <div class="col-md-4">
                                                    <div class="form-group  select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Organization
                                                            Type*</label>
                                                        <select class="form-control  select-active"
                                                            name="organization_type">
                                                            <option value="0">New York, US</option>
                                                            <option>London</option>

                                                        </select>
                                                        <x-input-error :messages="$errors->get('organization_type')" class="mt-2" />

                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10" for="team_size">Team
                                                            Size*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="team_size">
                                                            <option value="0">New York, US</option>
                                                            <option>London</option>

                                                        </select>
                                                        <x-input-error :messages="$errors->get('team_size')" class="mt-2" />

                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Establishment
                                                            Date*</label>
                                                        <input class="form-control" name="establishment_date"
                                                            type="date"
                                                            value="{{ $companyInfo?->establishment_date }}">
                                                        <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Website*</label>
                                                        <input class="form-control" name="website" type="link"
                                                            value="{{ $companyInfo?->website }}">
                                                        <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Email*</label>
                                                        <input class="form-control" name="email" type="email"
                                                            value="{{ $companyInfo?->email }}">
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Phone*</label>
                                                        <input class="form-control" name="phone" type="phone"
                                                            value="{{ $companyInfo?->phone }}">
                                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10"
                                                            for="country">Country*</label>
                                                        <select class="form-control form-select select-active"
                                                            name="country" id="country">
                                                            <option>Bangladesh</option>
                                                            <option>India</option>

                                                        </select>
                                                        <x-input-error :messages="$errors->get('country')" class="mt-2" />

                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10"
                                                            for='state'>State*</label>
                                                        <select class="form-control form-select select-active"
                                                            id="state" name="state">
                                                            <option>Dhaka</option>
                                                            <option>Khulna</option>

                                                        </select>
                                                        <x-input-error :messages="$errors->get('state')" class="mt-2" />

                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10"
                                                            for="city">City*</label>
                                                        <select class="form-control form-select select-active"
                                                            id="city" name="city">
                                                            <option>Kaliganj</option>
                                                            <option>Jheneidah</option>

                                                        </select>
                                                        <x-input-error :messages="$errors->get('city')" class="mt-2" />

                                                    </div>
                                                </div>



                                            </div>



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10"
                                                        for="address">Address</label>
                                                    <input type="text" class="form-control" name="address"
                                                        id="address" value="{{ $companyInfo?->address }}"></input>
                                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10" for="map_link">Map
                                                        Link</label>
                                                    <input type="text" class="form-control" id="map_link"
                                                        name="map_link" value="{{ $companyInfo?->map_link }}"></input>
                                                    <x-input-error :messages="$errors->get('map_link')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="box-button mt-15">
                                                <button type="submit" class="btn btn-apply-big font-md font-bold">Save
                                                    All
                                                    Changes</button>
                                            </div>




                                        </div>

                                    </form>


                                </div>

                                <div id="account" class="container tab-pane "><br>



                                    <div class="row form-contact">
                                        <form method="post" action="{{ route('account-info') }}">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">User Name*</label>
                                                        <input class="form-control" type="text" name="name"
                                                            value="{{ auth()->user()->name }}">
                                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Email*</label>
                                                        <input class="form-control" name="email" type="link"
                                                            value="{{ auth()->user()->email }}">
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="box-button mt-15 mb-15">
                                                <button type="submit" class="btn btn-apply-big font-md font-bold">Save
                                                    Changes</button>
                                            </div>
                                        </form>


                                        <form method="post" action="{{route('password-info')}}">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Password*</label>
                                                        <input class="form-control" type="password" name="password">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Confirm
                                                            Password*</label>
                                                        <input class="form-control" type="password"
                                                            name="password_confirmation">
                                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                    </div>
                                                </div>
    
                                            </div>
                                            <div class="box-button mt-15 mb-15">
                                                <button type="submit" class="btn btn-apply-big font-md font-bold">Password Changes</button>
                                            </div>

                                        </form>
                                        

                                    </div>





                                </div>



                            </div>





                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main>
@endsection
