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


                                        <form method="post" action="{{route('company-info')}}" enctype="multipart/form-data">
                                            @csrf

                                        <div class="row form-contact">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <x-image-preview style="height: 200px;" :source="$companyInfo->logo"  />
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Logo*</label>
                                                        <input class="form-control" type="file" name="logo">
                                                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <x-image-preview style="height: 200px;" :source="$companyInfo->banner"  />
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
                                                    <input class="form-control" type="text"
                                                        name="name" value="{{$companyInfo->name}}">
                                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Company Bio*</label>
                                                    <textarea class="form-control" rows="4" name="bio">
                                                        {{$companyInfo->bio}}
                                                      
                                                    </textarea>
                                                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Company Vision*</label>
                                                    <textarea class="form-control" rows="4" name="vision">
                                                        {{$companyInfo->vision}}
                                                    </textarea>
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

                                    <div class="row form-contact">

                                        <div class="row">



                                            <div class="col-md-4">

                                                <div class="form-group select-style">
                                                    <label class="font-sm color-text-mutted mb-10">Industry Type*</label>
                                                    <select class="form-control form-icons select-active">
                                                        <option>New York, US</option>
                                                        <option>London</option>
                                                        <option>Paris</option>
                                                        <option>Berlin</option>
                                                    </select>
                                                </div>

                                            </div>




                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Organization
                                                        Type*</label>
                                                    <select class="form-control form-select" id="sel1" name="sellist1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Team Size*</label>
                                                    <select class="form-control form-select" id="sel1" name="sellist1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>

                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Establishment
                                                        Date*</label>
                                                    <input class="form-control" type="date" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Website*</label>
                                                    <input class="form-control" type="link" value="">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Email*</label>
                                                    <input class="form-control" type="email" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Phone*</label>
                                                    <input class="form-control" type="phone" value="">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Country*</label>
                                                    <select class="form-control form-select" id="sel1"
                                                        name="sellist1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">State*</label>
                                                    <select class="form-control form-select" id="sel1"
                                                        name="sellist1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">City*</label>
                                                    <select class="form-control form-select" id="sel1"
                                                        name="sellist1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>

                                                </div>
                                            </div>


                                        </div>



                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Address</label>
                                                <input type="text" class="form-control"></input>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Map Link</label>
                                                <input type="text" class="form-control"></input>
                                            </div>
                                        </div>



                                    </div>

                                </div>

                                <div id="account" class="container tab-pane "><br>

                                    <div class="row form-contact">



                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">User Name*</label>
                                                    <input class="form-control" type="date" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Email*</label>
                                                    <input class="form-control" type="link" value="">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Password*</label>
                                                    <input class="form-control" type="email" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Confirm
                                                        Password*</label>
                                                    <input class="form-control" type="phone" value="">
                                                </div>
                                            </div>

                                        </div>










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
