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
                                    <a class="nav-link" data-bs-toggle="tab" href="#education"
                                        style="width: 150px">Experience & Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#account">Account Settings</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">


                                <div id="basic" class="container tab-pane active"><br>


                                    <form method="post" action="{{ route('basic-info') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row form-contact">

                                            <div class="row">
                                                <div class="col-md-4">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <x-image-preview :source='$candidate?->image' style="height: 100px;" />
                                                            <label for="avatar"
                                                                class="font-sm color-text-mutted mb-10">Profile
                                                                Picture*</label>
                                                            <input class="form-control" id="avatar" type="file"
                                                                name="profile_picture" placeholder="Enter Your Picture">
                                                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label for="cv"
                                                                class="font-sm color-text-mutted mb-10">CV*</label>
                                                            <input id="cv" class="form-control" type="file"
                                                                name="cv" placeholder="Browse">
                                                            <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label class="font-sm color-text-mutted mb-10"
                                                                    for="full_name">Full Name*</label>
                                                                <input class="form-control" type="text" id="full_name"
                                                                    name="full_name" value="{{ $candidate?->full_name }}"
                                                                    placeholder="Your Full Name">
                                                                <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="title"
                                                                    class="font-sm color-text-mutted mb-10">Title/Tag
                                                                    Line*</label>
                                                                <input class="form-control" type="text" id="title"
                                                                    name="title" value="{{ $candidate?->title }}"
                                                                    placeholder="Enter Your Title">
                                                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                                            </div>
                                                        </div>

                                                    </div>




                                                    <div class="col-md-12">

                                                        <div class="form-group select-style">
                                                            <label class="font-sm color-text-mutted mb-10">Experience
                                                                Level*</label>
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
                                                                <label for="website"
                                                                    class="font-sm color-text-mutted mb-10">Website*</label>
                                                                <input id="website" class="form-control" type="text"
                                                                    name="website" value="{{ $candidate?->website }}"
                                                                    placeholder="Put Your Website Address">
                                                                <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="date"
                                                                    class="font-sm color-text-mutted mb-10">Birth
                                                                    Date*</label>
                                                                <input id="birth_date" class="form-control"
                                                                    value="{{ $candidate?->birth_date }}" type="date"
                                                                    name="date_of_birth">
                                                                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                                                            </div>
                                                        </div>

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


                                <div id="profile" class="container tab-pane"><br>

                                    <form method="post" action="{{ route('profile-info') }}">
                                        @csrf

                                        <div class="row form-contact">

                                            <div class="row">



                                                <div class="col-md-6">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Gender*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="gender">
                                                            <option selected disabled>Select One</option>
                                                            <option value="male"
                                                                {{ $candidate?->gender == 'male' ? 'selected' : '' }}>Male
                                                            </option>
                                                            <option value="female"
                                                                {{ $candidate?->gender == 'female' ? 'selected' : '' }}>
                                                                Female</option>



                                                        </select>
                                                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Maritial
                                                            Status*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="maritial_status">
                                                            <option selected disabled>Select One</option>
                                                            <option value="married"
                                                                {{ $candidate?->maritial_status == 'married' ? 'selected' : '' }}>
                                                                Married</option>
                                                            <option value="single"
                                                                {{ $candidate?->maritial_status == 'single' ? 'selected' : '' }}>
                                                                Single</option>


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
                                                            @foreach ($profession as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $candidate?->profession_id ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach


                                                        </select>
                                                        <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Your
                                                            Availablity*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="status">
                                                            <option selected disabled>Select One</option>
                                                            <option value="available"
                                                                {{ $candidate?->status == 'available' ? 'selected' : '' }}>
                                                                Available</option>
                                                            <option value="not_available"
                                                                {{ $candidate?->status == 'not_available' ? 'selected' : '' }}>
                                                                Not-Available</option>


                                                        </select>
                                                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                                    </div>

                                                </div>

                                                <div class="col-md-12">

                                                    <div class="select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Skill You
                                                            Have*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="skill[]" multiple="multiple">
                                                            @foreach ($skill as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ in_array($item->id, $candidate_skill) ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <x-input-error :messages="$errors->get('skill')" class="mt-2" />
                                                    </div>

                                                </div>

                                                <div class="col-md-12">

                                                    <div class="form-group select-style">
                                                        <label class="font-sm color-text-mutted mb-10">Language You
                                                            Know*</label>
                                                        <select class="form-control form-icons select-active"
                                                            name="language[]" multiple='multiple'>

                                                            @foreach ($language as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ in_array($item->id, $candidate_language) ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach



                                                        </select>
                                                        <x-input-error :messages="$errors->get('language')" class="mt-2" />
                                                    </div>

                                                </div>



                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Biography*</label>
                                                        <textarea class="form-control" name="bio" id="content">{!! $candidate->bio !!}</textarea>
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

                                <div id="education" class="container tab-pane "><br>

                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary addExperience" data-bs-toggle="modal"
                                            data-bs-target="#experience">Add
                                            Experience</button>
                                    </div>



                                    <!-- Experience Modal -->
                                    <div class="modal" id="experience">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <form method="post" id="candidate-experience">
                                                    @csrf
                                                    <input type="hidden" id="experience-id" name="id">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Experience</h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">

                                                                    <label for="company"
                                                                        class="font-sm color-text-mutted mb-10">Company*</label>
                                                                    <input class="form-control" id="company"
                                                                        type="text" name="company"
                                                                        placeholder="Enter Your Company" required>
                                                                    <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="department"
                                                                        class="font-sm color-text-mutted mb-10">Department*</label>
                                                                    <input class="form-control" id="department"
                                                                        type="text" name="department"
                                                                        placeholder="Enter Your Department" required>
                                                                    <x-input-error :messages="$errors->get('department')" class="mt-2" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="designation"
                                                                        class="font-sm color-text-mutted mb-10">Designation*</label>
                                                                    <input class="form-control" id="designation"
                                                                        type="text" name="designation"
                                                                        placeholder="Enter Your Designation" required>
                                                                    <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="start"
                                                                        class="font-sm color-text-mutted mb-10">Start
                                                                        Date*</label>
                                                                    <input class="form-control" id="start"
                                                                        type="date" name="start" required>
                                                                    <x-input-error :messages="$errors->get('start')" class="mt-2" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="end"
                                                                        class="font-sm color-text-mutted mb-10">End
                                                                        Date*</label>
                                                                    <input class="form-control" id="end"
                                                                        type="date" name="end" required>
                                                                    <x-input-error :messages="$errors->get('end')" class="mt-2" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="currently_working" name="currently_working"
                                                                        value="1">
                                                                    <label class="form-check-label">I am currently
                                                                        working</label>
                                                                </div>

                                                            </div>



                                                            <div class="col-md-12">
                                                                <div class="form-group">

                                                                    <label for="responsiblities"
                                                                        class="font-sm color-text-mutted mb-10">Responsiblity*</label>

                                                                    <textarea class="form-control" id="responsiblities" name="responsiblities" style="height: 120px"></textarea>
                                                                    <x-input-error :messages="$errors->get('responsiblities')" class="mt-2" />
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>

                                                        <button type="submit" class="btn btn-primary add-submit">Save
                                                            Experience</button>


                                                    </div>

                                                </form>



                                            </div>
                                        </div>
                                    </div>
                                    <!---End ---->





                                    <table class="table table-striped" id="experienceTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Company</th>
                                                <th scope="col">Department</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Period</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>


                                </div>



                            </div>





                        </div>
                    </div>


                </div>
            </div>


        </section>



    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            loadExperienceData();
            $('.update-submit').hide();

            $('#candidate-experience').on('submit', function(event) {
                event.preventDefault();


                // Load the experience data when the page is read

                const formData = $(this).serialize();
                const experienceId = $('#experience-id').val();
                const url = experienceId ? `{{url('/candidate/experience') }}/${experienceId}` : "{{ route('experience.store') }}";
                const method = experienceId ? 'PUT' : 'POST';


                $.ajax({
                    method: method,
                    url: url,
                    data: formData,
                    success: function(response) {
                        console.log(response.message);
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });

                        // Close the modal
                        $('#experience').modal('hide');

                        // Optionally, you can also clear the form or reset its fields
                        $('#candidate-experience')[0].reset();

                        // Optionally, reload the table data
                        loadExperienceData(); // Assuming you have a function to reload the table
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'An error occurred',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                });
            });
        });





        // Edit experience
        $(document).on('click', '.edit', function() {

            let experience = $(this).data('experience');
            console.log(experience);
            $('#experience-id').val(experience.id);
            $('#experienceId').val(experience.id);
            $('#company').val(experience.company);
            $('#department').val(experience.department);
            $('#designation').val(experience.designation);
            $('#start').val(experience.start);
            $('#end').val(experience.end);
            $('#responsiblities').val(experience.responsiblities); // Ensure this is correct
            $('#currently_working').prop('checked', experience.current_working == 1);

            $('#experience').modal('show');
        });

        //Add Experience

        $(document).on('click', '.addExperience', function() {

            $('#company').val('');
            $('#department').val('');
            $('#designation').val('');
            $('#responsiblities').val('');
            $('#start').val('');
            $('#end').val('');
            //$('#currently-working').val('');
            $('#currently_working').prop('checked', false);
        })




        //Delete Data

        $(document).on('click', '.delete', function() {
            const id = $(this).data('id');
            const url = "{{ url('/candidate/experience') }}/" + id;

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data deleted successfully',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            // Reload the table data
                            loadExperienceData();
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'An error occurred',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    })
                }
            })

        })

        // Optional: Function to load or reload the experience table data
        function loadExperienceData() {
            $.ajax({
                method: 'GET',
                url: "{{ route('experience.index') }}",
                success: function(response) {
                    const tbody = $('#experienceTable tbody');
                    tbody.empty(); // Clear any existing rows

                    response.forEach(function(experience) {
                        const row = `
                        <tr>
                            <th scope="row">${experience.company}</th>
                            <td>${experience.department}</td>
                            <td>${experience.designation}</td>
                            <td>${experience.start} to ${experience.end}</td>
                            <td>
                                <a
                                  class="btn btn-primary edit"
                                  data-experience='${JSON.stringify(experience)}'

                                >
                                  <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger delete ml-5" data-id="${experience.id}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    `;
                        tbody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status + ", Error: " + error);
                }
            });
        }
    </script>
@endpush
