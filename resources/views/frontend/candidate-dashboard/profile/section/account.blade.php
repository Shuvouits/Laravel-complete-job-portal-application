<div id="account" class="container tab-pane"><br>


    <form method="post" action="/candidate/account-info-update">
        @csrf

        <div class="form-contact">
            <h3>Locations</h3>
            <br>

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10" for="country">Country*</label>
                        <select class="form-control form-select select-active country" name="country" required>
                            <option selected disabled value="">--Select--</option>
                            @foreach ($country as $country)
                                <option value="{{ $country->id }}"
                                    {{ $candidate?->country == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}</option>
                            @endforeach

                        </select>
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10" for='state'>State*</label>
                        <select class="form-control form-select select-active" id="state" name="state">

                            @foreach ($state as $data)
                                <option value="{{ $data->id }}"
                                    {{ $data->id == $candidate->state ? 'selected' : '' }}>{{ $data->name }}</option>
                            @endforeach




                        </select>
                        <x-input-error :messages="$errors->get('state')" class="mt-2" />

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10" for="city">City*</label>
                        <select class="form-control form-select select-active" id="city" name="city">

                            @foreach ($city as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $candidate->city ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach


                        </select>
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />

                    </div>
                </div>

            </div>

            <h3>Your Contact Information</h3>
            <br>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10" for="phone">Phone*</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                            placeholder="Your Phone Number" value="{{ $candidate?->phone_one }}" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10" for="secondary_phone">Secondary Phone*</label>
                        <input type="text" class="form-control" name="secondary_phone" id="secondary_phone"
                            placeholder="Secondary Number" value="{{ $candidate?->phone_two }}" />
                        <x-input-error :messages="$errors->get('secondary_phone')" class="mt-2" />

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10" for="email">Email*</label>
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="Enter Your Email" value="{{ $candidate?->email }}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

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

    <hr>
    <h3>Change Account Email Address</h3>
    <form method="post" action="/candidate/email-changed">
        @csrf

        <div class="col-md-12">
            <div class="form-group select-style">
                <label class="font-sm color-text-mutted mb-10" for="email">Account Email*</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Mail "
                    value="{{ auth()->user()->email }}" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

        </div>

        <div class="box-button mt-15">
            <button type="submit" class="btn btn-apply-big font-md font-bold">Save Changes</button>
        </div>

    </form>

    <hr>
    <h3>Change Password Address</h3>
    <form method="post" action="/candidate/password-changed"  id=change-password-form>
        @csrf

        <div class="row">

            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10" for="password">Password*</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter Your Password " />
                        <div class="alert alert-danger mt-2" id="password-error" style="display: none;"></div>

                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10" for="password_confirmation">Confirmed
                        Password*</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                        placeholder="Enter Your Confirmed Password " />

                        <div class="alert alert-danger mt-2" id="password-confirmation-error" style="display: none;"></div>

                </div>

            </div>

        </div>



        <div class="box-button mt-15">
            <button type="submit" class="btn btn-apply-big font-md font-bold">Save Changes</button>
        </div>

    </form>





</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.country').on('change', function() {

                var countryId = this.value;
                $('#state').html('');
                $.ajax({
                    url: '/candidate/get-state/' + countryId,
                    type: 'get',
                    success: function(res) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(res, function(key, value) {
                            $('#state').append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });

            $('#state').on('change', function() {
                var stateId = this.value;
                $('#city').html('');
                $.ajax({
                    url: '/candidate/get-cities/' + stateId,
                    type: 'get',
                    success: function(res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res, function(key, value) {
                            $('#city').append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

<script>
    $(document).ready(function() {
        $('#change-password-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/candidate/password-changed',
                method: 'post',
                data: $(this).serialize(),
                success: function(response) {
                    // Handle success response
                    $('#password-error').hide();
                    $('#password-confirmation-error').hide();
                    Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                },
                error: function(response) {
                    // Handle validation errors
                    var errors = response.responseJSON.errors;
                    if (errors.password) {
                        $('#password-error').text(errors.password[0]).show();
                    } else {
                        $('#password-error').hide();
                    }

                    if (errors.password_confirmation) {
                        $('#password-confirmation-error').text(errors.password_confirmation[0]).show();
                    } else {
                        $('#password-confirmation-error').hide();
                    }
                }
            });
        });
    });
    </script>


@endpush
