@extends('admin.master')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Job Roles</h1>
            </div>

            <div class="section-body">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Roles</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.job-roles.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control {{ hasError($errors, 'name') }}"
                                        name="name" value="{{ old('name', $role->name) }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection