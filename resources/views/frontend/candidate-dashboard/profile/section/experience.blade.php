<div id="experienceTab" class="container tab-pane "><br>

    <div class="d-flex justify-content-end">
        <button class="btn btn-success addExperience" data-bs-toggle="modal" data-bs-target="#experience">Add
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="company" class="font-sm color-text-mutted mb-10">Company*</label>
                                    <input class="form-control" id="company" type="text" name="company"
                                        placeholder="Enter Your Company" required>
                                    <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="department" class="font-sm color-text-mutted mb-10">Department*</label>
                                    <input class="form-control" id="department" type="text" name="department"
                                        placeholder="Enter Your Department" required>
                                    <x-input-error :messages="$errors->get('department')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="designation"
                                        class="font-sm color-text-mutted mb-10">Designation*</label>
                                    <input class="form-control" id="designation" type="text" name="designation"
                                        placeholder="Enter Your Designation" required>
                                    <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="start" class="font-sm color-text-mutted mb-10">Start
                                        Date*</label>
                                    <input class="form-control" id="start" type="date" name="start" required>
                                    <x-input-error :messages="$errors->get('start')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="end" class="font-sm color-text-mutted mb-10">End
                                        Date*</label>
                                    <input class="form-control" id="end" type="date" name="end" required>
                                    <x-input-error :messages="$errors->get('end')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="currently_working"
                                        name="currently_working" value="1">
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
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary add-submit">Save
                            Experience</button>


                    </div>

                </form>



            </div>
        </div>
    </div>
    <!---End ---->

    <!---Experience Table--->
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
    <!--End-->

    @include('frontend.candidate-dashboard.profile.section.education')



</div>

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
                const url = experienceId ? `{{ url('/candidate/experience') }}/${experienceId}` :
                    "{{ route('candidate.experience.store') }}";
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
                        loadExperienceData
                            (); // Assuming you have a function to reload the table
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
                url: "{{ route('candidate.experience.index') }}",
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
                                  class="btn btn-success edit"
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
