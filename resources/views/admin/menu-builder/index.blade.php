@extends('admin.master')

@section('main')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1>Menu Builder</h1>
            </div>

            <div class="section-body">
                <div class="col-12">
                    <div class="card" style="padding: 25px">

                        <div class="card-body p-0">
                            {!! Menu::render() !!}
                        </div>

                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
