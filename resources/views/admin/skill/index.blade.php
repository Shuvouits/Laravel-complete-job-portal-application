@extends('admin.master')


@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Skill</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Attribute</a></div>
                    <div class="breadcrumb-item">Skill</div>
                </div>
            </div>

            <div class="section-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>All Skill</h4>
                                <div class="card-header-form">
                                    <form method="get" action="{{route('admin.skill.index')}}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" value="{{request('search')}}" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <a href="{{route('admin.skill.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Create New</a>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">

                                    <table class="table table-striped">
                                        <tr>

                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Actions</th>

                                        </tr>

                                        @forelse($skill as $item)

                                        <tr>

                                            <td>{{$item->name}}</td>
                                            <td>{{$item->slug}}</td>
                                            <td>
                                                <a href="{{route('admin.skill.edit', $item->id)}}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{route('admin.skill.destroy', $item->id)}}" class="btn btn-danger delete" style="margin-left: 10px">
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
                                    @if($skill->hasPages())
                                    {{ $skill->withQueryString()->links() }}
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
