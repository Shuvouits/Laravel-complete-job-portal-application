@extends('admin.master')

@section('main')

<!-- Main Content -->
 <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Payment Gateway Setting</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Tab</div>
            </div>
        </div>

        <div class="section-body">


            <div class="row">

                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Gateway Setting</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab4" data-toggle="tab"
                                                href="#paypal" role="tab" aria-controls="home"
                                                aria-selected="true">Paypal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab4" data-toggle="tab"
                                                href="#profile4" role="tab" aria-controls="profile"
                                                aria-selected="false">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab4" data-toggle="tab"
                                                href="#contact4" role="tab" aria-controls="contact"
                                                aria-selected="false">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <div class="tab-pane fade show active" id="paypal"
                                            role="tabpanel" aria-labelledby="paypal">
                                            <div class="card" style="padding: 30px">
                                                <form action="{{ route('admin.paypal-settings.update') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Paypal Status</label>

                                                                <select name="paypal_status" class="form-control {{ hasError($errors, 'paypal_status') }}">
                                                                    <option value="active">Active</option>
                                                                    <option value="inactive">Inactive</option>
                                                                </select>
                                                                <x-input-error :messages="$errors->get('paypal_status')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Paypal Account Mode</label>

                                                                <select name="paypal_account_mode" class="form-control {{ hasError($errors, 'paypal_account_mode') }}">
                                                                    <option  value="sandbox">Sandbox</option>
                                                                    <option value="live">Live</option>
                                                                </select>
                                                                <x-input-error :messages="$errors->get('paypal_account_mode')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Paypal Country Name</label>
                                                                <select name="paypal_country_name" class="form-control select2 {{ hasError($errors, 'paypal_country_name') }}">
                                                                    <option value="">Select</option>

                                                                    @foreach (config('countries') as $key => $country)
                                                                    <option value="{{ $key }}">{{ $country }}</option>
                                                                    @endforeach



                                                                </select>
                                                                <x-input-error :messages="$errors->get('paypal_country_name')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Paypal Currency Name</label>
                                                                <select name="paypal_currency_name" class="form-control select2 {{ hasError($errors, 'paypal_currency_name') }}">
                                                                    <option value="sandbox">Select</option>

                                                                    @foreach (config('currencies.currency_list') as $key => $currency)
                                                                    <option  value="{{ $currency }}">{{ $currency }}</option>
                                                                    @endforeach


                                                                </select>
                                                                <x-input-error :messages="$errors->get('paypal_currency_name')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Paypal Currency Rate</label>
                                                                <input type="text" class="form-control {{ hasError($errors, 'paypal_currency_rate') }}" name="paypal_currency_rate"  value="{{ config('gatewaySettings.paypal_currency_rate') }}">
                                                                <x-input-error :messages="$errors->get('paypal_currency_rate')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Paypal Client Id</label>
                                                                <input type="text" class="form-control {{ hasError($errors, 'paypal_client_id') }}" name="paypal_client_id"  value="{{ config('gatewaySettings.paypal_client_id') }}">
                                                                <x-input-error :messages="$errors->get('paypal_client_id')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Paypal Secret Key</label>
                                                                <input type="text" class="form-control {{ hasError($errors, 'paypal_client_secret') }}" name="paypal_client_secret" value="{{ config('gatewaySettings.paypal_client_secret') }}" >
                                                                <x-input-error :messages="$errors->get('paypal_client_secret')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Paypal App Id</label>
                                                                <input type="text" class="form-control {{ hasError($errors, 'paypal_app_id') }}" name="paypal_app_id" value="{{ config('gatewaySettings.paypal_app_id') }}" >
                                                                <x-input-error :messages="$errors->get('paypal_app_id')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile4" role="tabpanel"
                                            aria-labelledby="profile-tab4">
                                            Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit
                                            tortor, ac efficitur est lobortis quis. Nullam lacinia metus
                                            erat, sed fermentum justo rutrum ultrices. Proin quis iaculis
                                            tellus. Etiam ac vehicula eros, pharetra consectetur dui.
                                            Aliquam convallis neque eget tellus efficitur, eget maximus
                                            massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis
                                            justo, eget scelerisque tellus pharetra a.
                                        </div>
                                        <div class="tab-pane fade" id="contact4" role="tabpanel"
                                            aria-labelledby="contact-tab4">
                                            Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi
                                            maximus. Proin ligula massa, gravida in lacinia efficitur,
                                            hendrerit eget mauris. Pellentesque fermentum, sem interdum
                                            molestie finibus, nulla diam varius leo, nec varius lectus elit
                                            id dolor. Nam malesuada orci non ornare vulputate. Ut ut
                                            sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis
                                            ultrices. Proin bibendum bibendum augue ut luctus.
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
</div>

@endsection
