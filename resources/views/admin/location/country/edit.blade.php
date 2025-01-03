@extends('admin.master')


@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Country</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Location</a></div>
                    <div class="breadcrumb-item">Country</div>
                </div>
            </div>

            <div class="section-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>Update Country</h4>

                            </div>

                            <div class="card-body">
                               <form method="POST" action="{{route('admin.countries.update', $countries->id)}}">
                                  @csrf
                                  @method('PUT')
                                  <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control {{hasError($errors, 'name')}}" name="name" value="{{old('name', $countries->name)}}"/>
                                    <x-input-error style="color: blue" :messages="$errors->get('name')" class="mt-2" />

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
