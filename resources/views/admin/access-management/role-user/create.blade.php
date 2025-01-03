@extends('admin.master')

@section('main')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1>Role Users</h1>
            </div>

            <div class="section-body">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create User</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.role-user.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control {{ hasError($errors, 'name') }}"
                                        name="name" value="{{ old('name') }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control {{ hasError($errors, 'email') }}"
                                        name="email" value="{{ old('email') }}">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control {{ hasError($errors, 'password') }}"
                                        name="password" value="{{ old('password') }}">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="text"
                                        class="form-control {{ hasError($errors, 'password_confirmation') }}"
                                        name="password_confirmation" value="{{ old('password_confirmation') }}">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" id="" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
