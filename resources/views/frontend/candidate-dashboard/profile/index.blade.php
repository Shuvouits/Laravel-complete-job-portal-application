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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#basic">Basic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#account">Experience & Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#account">Account Settings</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">


                                <div id="basic" class="container tab-pane active"><br>


                                    <form method="post" action="{{route('basic-info')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row form-contact">

                                            <div class="row">
                                                <div class="col-md-4">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <x-image-preview :source='$candidate?->image' />
                                                            <label for="avatar" class="font-sm color-text-mutted mb-10">Profile Picture*</label>
                                                            <input class="form-control" id="avatar" type="file" name="profile_picture" placeholder="Enter Your Picture">
                                                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label for="cv" class="font-sm color-text-mutted mb-10">CV*</label>
                                                            <input id="cv" class="form-control" type="file" name="cv" placeholder="Browse">
                                                            <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label class="font-sm color-text-mutted mb-10" for="full_name">Full Name*</label>
                                                                <input class="form-control" type="text" id="full_name" name="full_name" value="{{$candidate?->full_name}}" placeholder="Your Full Name">
                                                                <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="title" class="font-sm color-text-mutted mb-10">Title/Tag Line*</label>
                                                                <input class="form-control" type="text" id="title" name="title" value="{{$candidate?->title}}" placeholder="Enter Your Title">
                                                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                                            </div>
                                                        </div>

                                                    </div>




                                                    <div class="col-md-12">

                                                        <div class="form-group select-style">
                                                            <label class="font-sm color-text-mutted mb-10">Experience Level*</label>
                                                            <select class="form-control form-icons select-active"
                                                                name="experience_level">
                                                                @foreach ($experience as $experience)
                                                                    <option value="{{ $experience->id }}"
                                                                        {{ $experience->id == $candidate?->experience_id ? 'selected' : '' }}>
                                                                        {{ $experience->name }}</option>
                                                                @endforeach

                                                            </select>
                                                            <x-input-error :messages="$errors->get('experience_level')" class="mt-2" />
                                                        </div>

                                                    </div>


                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="website" class="font-sm color-text-mutted mb-10">Website*</label>
                                                                <input id="website" class="form-control" type="text" name="website" value="{{$candidate?->website}}" placeholder="Put Your Website Address">
                                                                <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="date" class="font-sm color-text-mutted mb-10">Birth Date*</label>
                                                                <input id="birth_date" class="form-control" value="{{$candidate?->birth_date}}" type="date" name="date_of_birth">
                                                                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                                                            </div>
                                                        </div>

                                                    </div>





                                                </div>











                                            </div>



                                            <div class="box-button mt-15">
                                                <button type="submit" class="btn btn-apply-big font-md font-bold">Save All
                                                    Changes</button>
                                            </div>








                                        </div>
                                    </form>





                                </div>


                                <div id="profile" class="container tab-pane"><br>

                                    <form method="post" action="{{route('profile-info')}}">
                                        @csrf

                                        <div class="row form-contact">

                                            <div class="row">



                                                <div class="col-md-6">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Gender*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="gender">
                                                            <option selected disabled>Select One</option>
                                                            <option value="male" {{$candidate?->gender =='male' ? 'selected' : ''}}>Male</option>
                                                            <option value="female" {{$candidate?->gender =='female' ? 'selected' : ''}} >Female</option>



                                                        </select>
                                                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Maritial Status*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="maritial_status">
                                                            <option selected disabled>Select One</option>
                                                            <option value="married" {{$candidate?->maritial_status =='married' ? 'selected' : ''}}>Married</option>
                                                            <option value="single" {{$candidate?->maritial_status =='single' ? 'selected' : ''}}>Single</option>


                                                        </select>
                                                        <x-input-error :messages="$errors->get('maritial_status')" class="mt-2" />
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Profession*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="profession_id">
                                                            <option selected disabled>Select One</option>
                                                            @foreach($profession as $item)
                                                            <option value="{{$item->id}}" {{$item->id == $candidate?->profession_id ? 'selected' : ''}}>{{$item->name}}</option>

                                                            @endforeach


                                                        </select>
                                                        <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Your Availablity*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="status">
                                                            <option selected disabled>Select One</option>
                                                            <option value="available" {{$candidate?->status =='available' ? 'selected' : ''}}>Available</option>
                                                            <option value="not_available" {{$candidate?->status =='not_available' ? 'selected' : ''}} >Not-Available</option>


                                                        </select>
                                                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                                    </div>

                                                </div>

                                                <div class="col-md-12">

                                                    <div class="select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Skill You Have*</label>
                                                        <select class="form-control form-icons select-active" name="skill[]" multiple="multiple">
                                                            @foreach($skill as $item)
                                                                <option value="{{ $item->id }}" {{ in_array($item->id, $candidate_skill) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <x-input-error :messages="$errors->get('skill')" class="mt-2" />
                                                    </div>

                                                </div>

                                                <div class="col-md-12">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Language You Know*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="language[]" multiple='multiple'>

                                                            @foreach($language as $item)
                                                            <option value="{{$item->id}}"  {{ in_array($item->id, $candidate_language) ? 'selected' : '' }} >{{$item->name}}</option>
                                                            @endforeach



                                                        </select>
                                                        <x-input-error :messages="$errors->get('language')" class="mt-2" />
                                                    </div>

                                                </div>



                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Biography*</label>
                                                        <textarea class="form-control" name="bio"  id="content">{!! $candidate->bio !!}</textarea>
                                                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />

                                                    </div>

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









                                </div>



                            </div>





                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main>
@endsection


