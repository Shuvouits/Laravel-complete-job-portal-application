@extends('admin.master')


@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Job Type</h1>
            </div>

            <div class="section-body">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Type</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.job-types.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a href="{{ route('admin.job-types.create') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i> Create new</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <th>slug</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                <tbody>
                                    @forelse ($jobTypes as $type)
                                        <tr>
                                            <td>{{ $type->name }}</td>
                                            <td>{{ $type->slug }}</td>
                                            <td>
                                                <a href="{{ route('admin.job-types.edit', $type->id) }}" class="btn-sm btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.job-types.destroy', $type->id) }}" class="btn-sm btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No result found!</td>
                                        </tr>
                                    @endforelse

                                </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($jobTypes->hasPages())
                                    {{ $jobTypes->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection