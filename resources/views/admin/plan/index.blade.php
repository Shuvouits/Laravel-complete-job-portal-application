@extends('admin.master')

@section('main')


 <!-- Main Content -->
 <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pricing</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>

                <div class="breadcrumb-item">Pricing</div>
            </div>
        </div>

        <div class="section-body">


                <a href="{{route('admin.plans.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Create New</a>
                <br>
                <br>

            <div class="row">

                @foreach($plans as $plan)
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="pricing">
                        @if ($plan->recommended)
                                <div class="pricing-title">
                                    Recommended
                                </div>
                            @endif


                        <div class="pricing-padding">
                            <div class="pricing-price">
                                <div>{{$plan->label}}</div>

                                <div style="font-size: 30px">${{$plan->price}}</div>
                            </div>



                            <div class="pricing-details">

                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">{{ $plan->job_limit }} Job Post Limit</div>
                                </div>

                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">{{ $plan->featured_job_limit }} Featured Job Post
                                        Limit</div>
                                </div>

                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">{{ $plan->highlight_job_limit }} Highlight Job Post
                                    </div>
                                </div>

                                <div class="pricing-item">
                                    @if ($plan->profile_verified)
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon bg-danger">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @endif
                                    <div class="pricing-item-label">Verify Company</div>
                                </div>


                            </div>
                        </div>
                        <div class="pricing-cta" style="display: flex;
                            justify-content: space-between;
                            width: 100%;">
                                <a href="{{ route('admin.plans.edit', $plan->id) }}" class="w-100 bg-primary text-light">Edit <i class="fas fa-arrow-right"></i></a>
                                <a href="{{ route('admin.plans.destroy', $plan->id) }}" class="w-100 bg-danger text-light delete">Delete <i class="fas fa-times"></i></a>
                            </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</div>

@endsection
