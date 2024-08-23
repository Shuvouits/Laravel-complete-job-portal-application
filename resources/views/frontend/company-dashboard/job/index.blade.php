@extends('frontend.master')

@section('main')
    <style>
        .table {

            padding: 15px;
        }

        .table tr {
            border-bottom: 1px solid #1ca77459 !important;
        }

        .search {
            border: 1px solid #1ca77459 !important;
        }
    </style>

    <main class="main">

        <section class="section-box mt-75">
            <div class="breacrumb-cover">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <h2 class="mb-20">Orders</h2>
                            <ul class="breadcrumbs">
                                <li><a class="home-icon" href="index.html">Home</a></li>
                                <li>Orders</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box mt-120">
            <div class="container">
                <div class="row">
                    @include('frontend.company-dashboard.sidebar')

                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="content-single">
                            <h3 class="mt-0 mb-15 color-brand-1 text-center">All Jobs</h3>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="card-header-form">
                                        <form action="{{ route('company.jobs.index') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text" class="form-control search" placeholder="Search"
                                                    name="search" value="{{ request('search') }}">
                                                <div class="input-group-btn">
                                                    <button type="submit" style="height: 50px;" class="btn btn-success"><i
                                                            class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <a href="{{ route('company.jobs.create') }}" class="btn btn-success"> <i
                                            class="fas fa-plus-circle"></i> Create new</a>
                                </div>
                            </div>
                            <br>

                            <div>
                                <table class="table table-hover">
                                    <tr>
                                        <th style="width: 270px">Job</th>
                                        <th>Category/Role</th>
                                        <th>Applications</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    <tbody>
                                        @forelse ($jobs as $job)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">

                                                        <div>
                                                            <b>{{ $job->title }}</b>
                                                            <br>
                                                            <span>{{ $job->company->name }} -
                                                                {{ $job->jobType->name }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <b>{{ $job->category?->name }}</b>
                                                        <br>
                                                        <span>{{ $job->jobRole->name }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $job->applications_count }} Applications
                                                </td>
                                                <td>{{ formatDate($job->deadline) }}</td>
                                                <td>
                                                    @if ($job->status === 'pending')
                                                        <span class="badge bg-warning">Peinding</span>
                                                    @elseif ($job->deadline > date('Y-m-d'))
                                                        <span class="badge bg-success ">Active</span>
                                                    @else
                                                        <span class="badge bg-danger ">Expired</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="dropdown">

                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fas fa-cog"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                            <a class="dropdown-item"
                                                                href="{{ route('company.job.applications', $job->id) }}">Applications</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('company.jobs.edit', $job->id) }}">Edit</a>
                                                            <a class="dropdown-item delete"
                                                                href="{{ route('company.jobs.destroy', $job->id) }}">Delete</a>


                                                        </ul>




                                                    </div>

                                                </td>



                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No result found!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>
                            </div>

                            <div class="paginations">
                                <ul class="pager">
                                    @if ($jobs->hasPages())
                                        {{ $jobs->withQueryString()->links('pagination::bootstrap-5') }}
                                    @endif
                                </ul>
                            </div>


                        </div>
                    </div>



                </div>
            </div>
        </section>

    </main>
@endsection


