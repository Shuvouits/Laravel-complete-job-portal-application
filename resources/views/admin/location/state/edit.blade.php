@extends('admin.master')


@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>State</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Location</a></div>
                    <div class="breadcrumb-item">State</div>
                </div>
            </div>

            <div class="section-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>Update State</h4>

                            </div>

                            <div class="card-body">
                               <form method="POST" action="{{route('admin.states.update', $states->id)}}">
                                  @csrf
                                  @method('PUT')

                                  <div class="row">

                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <select class="form-control select2" name="country_id">
                                            @foreach($country as $item)
                                          <option value="{{$item->id}}" {{ $item->id == $states->country_id ? 'selected' : '' }}>{{$item->name}}</option>
                                          @endforeach

                                        </select>
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input class="form-control {{hasError($errors, 'name')}}" name="name" value="{{$states->name}}"/>
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
