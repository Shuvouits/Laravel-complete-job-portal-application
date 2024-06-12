@extends('admin.master')


@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>State</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Locations</a></div>
                    <div class="breadcrumb-item">State</div>
                </div>
            </div>

            <div class="section-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>Insert State</h4>

                            </div>

                            <div class="card-body">
                               <form method="post" action="{{route('admin.states.store')}}">
                                  @csrf

                                  <div class="row">

                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <select class="form-control select2" name="country_id">
                                            <option disabled selected>--Select--</option>
                                            @foreach($country as $item)
                                          <option value="{{$item->id}}">{{$item->name}}</option>
                                          @endforeach
                                          <x-input-error style="color: blue" :messages="$errors->get('country_id')" class="mt-2" />

                                        </select>
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input class="form-control {{hasError($errors, 'name')}}" name="name" value="{{old('name')}}"/>
                                        <x-input-error style="color: blue" :messages="$errors->get('name')" class="mt-2" />

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
