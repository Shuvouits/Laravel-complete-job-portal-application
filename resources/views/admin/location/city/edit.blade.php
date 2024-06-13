@extends('admin.master')


@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>City</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Location</a></div>
                    <div class="breadcrumb-item">City</div>
                </div>
            </div>

            <div class="section-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>Update City</h4>

                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.cities.update', $city_data->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label>Country</label>
                                            <select class="form-control select2 country" name="country_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach ($country as $item)
                                                    <option value="{{ $item->id }}" {{$item->id == $city_data->country_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                @endforeach
                                                <x-input-error style="color: blue" :messages="$errors->get('country_id')" class="mt-2" />

                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>State</label>
                                            <select class="form-control select2" name="state_id" id="state">
                                                @foreach ($state as $state)
                                                    <option value="{{ $state->id }}" {{$state->id == $city_data->state_id ? 'selected' : ''}}>{{ $state->name }}</option>
                                                @endforeach
                                                <x-input-error style="color: blue" :messages="$errors->get('state_id')" class="mt-2" />


                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>City</label>
                                            <input class="form-control {{ hasError($errors, 'name') }}" name="name"
                                                value="{{ $city_data->name}}" />
                                            <x-input-error style="color: blue" :messages="$errors->get('name')" class="mt-2" />

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

@push('scripts')
<script>
    $(document).ready(function() {
        $('.country').on('change', function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    url: '/admin/get-states/' + countryID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#state').empty();

                        $.each(data, function (key, value) {
                            $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    }
                })
            }else{
                $('#state').empty();
                $('#state').append('<option value="">Select State</option>');
            }
        });
    });
</script>
@endpush
