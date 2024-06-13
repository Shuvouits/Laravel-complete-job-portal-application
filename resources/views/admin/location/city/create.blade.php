@extends('admin.master')

@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>City</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Locations</a></div>
                    <div class="breadcrumb-item">City</div>
                </div>
            </div>

            <div class="section-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>Insert City</h4>

                            </div>

                            <div class="card-body">
                                <form method="post" action="{{ route('admin.cities.store') }}">
                                    @csrf

                                    <div class="row">



                                        <div class="form-group col-md-6">
                                            <label>City</label>
                                            <input class="form-control {{ hasError($errors, 'name') }}" name="name"
                                                value="{{ old('name') }}" />
                                            <x-input-error style="color: blue" :messages="$errors->get('name')" class="mt-2" />

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Country</label>
                                            <select class="form-control select2 country" name="country_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach ($country as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                <x-input-error style="color: blue" :messages="$errors->get('country_id')" class="mt-2" />

                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>State</label>
                                            <select class="form-control select2" name="state_id" id="state">




                                            </select>
                                        </div>

                                    </div>





                                    <button class="btn btn-primary">Create</button>
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
