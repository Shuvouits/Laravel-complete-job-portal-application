@extends('admin.master')

@section('main')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1>Blogs</h1>
            </div>

            <div class="section-body">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Blogs</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.blogs.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary"> <i
                                    class="fas fa-plus-circle"></i> Create new</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th>slug</th>
                                        <th>Featured</th>
                                        <th>Status</th>

                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->slug }}</td>
                                                <td>
                                                    @if ($blog->featured == 1)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($blog->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                        class="btn-sm btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.blogs.destroy', $blog->id) }}"
                                                        class="btn-sm btn btn-danger delete"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($blogs->hasPages())
                                    {{ $blogs->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection