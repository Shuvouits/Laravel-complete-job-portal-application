 <!-- Button Education -->
 <div class="d-flex justify-content-end" style="margin-top: 50px">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#educationModal">
        Add Education
    </button>

</div>


<!-- Education Modal -->
<div class="modal" id="educationModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" id="candidate-education">
                    @csrf
                    <input type="hidden" id="education-id" name="id">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add or Update Education</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="company" class="font-sm color-text-mutted mb-10">Lavel*</label>
                                    <input class="form-control" id="level" type="text" name="level"
                                        placeholder="Enter Your Lavel" required>
                                    <x-input-error :messages="$errors->get('level')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="degree" class="font-sm color-text-mutted mb-10">Degree*</label>
                                    <input class="form-control" id="degree" type="text" name="degree"
                                        placeholder="Enter Your Degree" required>
                                    <x-input-error :messages="$errors->get('degree')" class="mt-2" />
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="startDate" class="font-sm color-text-mutted mb-10">Start
                                        Date*</label>
                                    <input class="form-control" id="startDate" type="date" name="start" required>
                                    <x-input-error :messages="$errors->get('start')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="endDate" class="font-sm color-text-mutted mb-10">End
                                        Date*</label>
                                    <input class="form-control" id="endDate" type="date" name="end" required>
                                    <x-input-error :messages="$errors->get('end')" class="mt-2" />
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="note"
                                        class="font-sm color-text-mutted mb-10">Note*</label>

                                    <textarea class="form-control" id="note" name="note" style="height: 120px" placeholder="Enter your Note"></textarea>
                                    <x-input-error :messages="$errors->get('note')" class="mt-2" />
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary add-submit">Save
                            Education</button>


                    </div>

                </form>

            </div>



        </div>
    </div>
</div>
<!--End-->

 <!---Education Table--->
 <table class="table table-striped" id="educationTable">
    <thead>
        <tr>
            <th scope="col">Level</th>
            <th scope="col">Degree</th>
            <th scope="col">Year</th>
            <th scope="col">Note</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>


    </tbody>
</table>
<!--End-->

@push('scripts')
    <script>

        //InsertData
        $(document).ready(function() {

            loadEducationData();

            $('#candidate-education').on('submit', function(event) {
                event.preventDefault();


                // Load the experience data when the page is read

                const formData = $(this).serialize();
                const educationId = $('#education-id').val();
                const url = educationId ? `{{ url('/candidate/education') }}/${educationId}` :
                    "{{ route('candidate.education.store') }}";
                const method = educationId ? 'PUT' : 'POST';


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
                        $('#educationModal').modal('hide');

                        // Optionally, you can also clear the form or reset its fields
                        $('#candidate-education')[0].reset();

                        // Optionally, reload the table data
                        loadEducationData(); // Assuming you have a function to reload the table
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
        $(document).on('click', '.editeducation', function() {

            let education = $(this).data('education');
            console.log(education);
            $('#education-id').val(education.id);
            $('#educationId').val(education.id);
            $('#level').val(education.level);
            $('#degree').val(education.degree);
            $('#startDate').val(education.start);
            $('#endDate').val(education.end);
            $('#note').val(education.note); // Ensure this is correct

            $('#educationModal').modal('show');
        });

        //Add Experience

        $(document).on('click', '.addEdu', function() {

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

        $(document).on('click', '.educationDelete', function() {
            const id = $(this).data('id');
            const url = "{{ url('/candidate/education') }}/" + id;

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
                            loadEducationData();
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
        function loadEducationData() {
    $.ajax({
        method: 'GET',
        url: "{{ route('candidate.education.index') }}",
        success: function(response) {
            const tbody = $('#educationTable tbody');
            tbody.empty(); // Clear any existing rows

            if (response.length === 0) {
                const noDataRow = `
                    <tr>
                        <td colspan="5" class="text-center">No data found</td>
                    </tr>
                `;
                tbody.append(noDataRow);
            } else {
                response.forEach(function(education) {
                    const row = `
                        <tr>
                            <th scope="row">${education.level}</th>
                            <td>${education.degree}</td>
                            <td>${education.start} to ${education.end}</td>
                            <td>${education.note}</td>
                            <td>
                                <a
                                  class="btn btn-primary editeducation"
                                  data-education='${JSON.stringify(education)}'
                                >
                                  <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger educationDelete ml-5" data-id="${education.id}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    `;
                    tbody.append(row);
                });
            }
        },
        error: function(xhr, status, error) {
            console.log("Status: " + status + ", Error: " + error);
        }
    });
}

    </script>
@endpush
