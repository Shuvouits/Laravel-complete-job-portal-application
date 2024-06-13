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
                                <h4>State</h4>
                                <div class="card-header-form">
                                    <form method="get" action="{{route('admin.cities.index')}}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" value="{{request('search')}}" placeholder="Search City">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <a href="{{route('admin.cities.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Create New</a>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">

                                    <table class="table table-striped">
                                        <tr>

                                            <th>City</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Actions</th>

                                        </tr>

                                        @forelse($cities as $item)

                                        <tr>

                                            <td>{{$item->name}}</td>
                                            <td>{{$item->state?->name}}</td>
                                            <td>{{$item->country->name}}</td>

                                            <td>
                                                <a href="{{route('admin.cities.edit', $item->id)}}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{route('admin.cities.destroy', $item->id)}}" class="btn btn-danger delete" style="margin-left: 10px">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </td>



                                        </tr>
                                        @empty
                                        <tr>
                                            <td>No Data Found</td>
                                        </tr>
                                        @endforelse

                                    </table>
                                </div>
                            </div>

                            <div class="card-footer text-right">

                                <nav class="d-inline-block">
                                    @if($cities->hasPages())
                                    {{ $cities->withQueryString()->links() }}
                                    @endif
                                </nav>
                              </div>


                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
