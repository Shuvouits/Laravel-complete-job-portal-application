@extends('admin.master')


@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Plan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Plan</div>
                </div>
            </div>

            <div class="section-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>Update Plan</h4>

                            </div>

                            <div class="card-body">
                                <form method="post" action="{{ route('admin.plans.update', $plan->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Label</label>
                                                <input class="form-control {{ hasError($errors, 'label') }}" name="label"
                                                    value="{{ old('label', $plan->label) }}" />
                                                <x-input-error style="color: blue" :messages="$errors->get('label')" class="mt-2" />

                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input class="form-control {{ hasError($errors, 'price') }}" name="price"
                                                    value="{{ old('price', $plan->price) }}" />
                                                <x-input-error style="color: blue" :messages="$errors->get('price')" class="mt-2" />

                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Job Limit</label>
                                                <input class="form-control {{ hasError($errors, 'job_limit') }}" name="job_limit"
                                                    value="{{ old('job_limit', $plan->job_limit) }}" />
                                                <x-input-error style="color: blue" :messages="$errors->get('job_limit')" class="mt-2" />

                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Featured Job Limit</label>
                                                <input class="form-control {{ hasError($errors, 'featured_job_limit') }}" name="featured_job_limit"
                                                    value="{{ old('featured_job_limit', $plan->featured_job_limit) }}" />
                                                <x-input-error style="color: blue" :messages="$errors->get('featured_job_limit')" class="mt-2" />

                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Highlight Job Limit</label>
                                                <input class="form-control {{ hasError($errors, 'highlight_job_limit') }}" name="highlight_job_limit"
                                                    value="{{ old('highlight_job_limit', $plan->highlight_job_limit) }}" />
                                                <x-input-error style="color: blue" :messages="$errors->get('highlight_job_limit')" class="mt-2" />

                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Profile Verified</label>

                                                <select class="form-control {{ hasError($errors, 'profile_verified') }} " name="profile_verified">
                                                    <option value="1" {{$plan->profile_verified === 1 ? 'selected' : ''}}>Yes</option>
                                                    <option value="0" {{$plan->profile_verified === 0 ? 'selected' : ''}} >No</option>

                                                  </select>

                                                <x-input-error style="color: blue" :messages="$errors->get('profile_verified')" class="mt-2" />

                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Recommended</label>

                                                    <select class="form-control {{ hasError($errors, 'recommended') }} " name="recommended">
                                                        <option value="1" {{$plan->recommended === 1 ? 'selected' : ''}} >Yes</option>
                                                        <option value="0" {{$plan->recommended === 0 ? 'selected' : ''}} >No</option>

                                                      </select>
                                                <x-input-error style="color: blue" :messages="$errors->get('recommend')" class="mt-2" />

                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Show this package in frontend</label>

                                                    <select class="form-control {{ hasError($errors, 'frontend_show') }} " name="frontend_show">
                                                        <option value="1"  {{$plan->frontend_show === 1 ? 'selected' : ''}}>Yes</option>
                                                        <option value="0" {{$plan->frontend_show === 0 ? 'selected' : ''}}>No</option>

                                                      </select>
                                                <x-input-error style="color: blue" :messages="$errors->get('frontend_show')" class="mt-2" />

                                            </div>

                                        </div>



                                    </div>


                                    <button class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
