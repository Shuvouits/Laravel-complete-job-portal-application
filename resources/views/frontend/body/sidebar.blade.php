<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
      <ul class="nav" role="tablist">
        @php
        $profileUrl = auth()->user()->role === 'company' ? '/company/profile' : '/candidate/profile';
       @endphp

        <li><a class="btn btn-border mb-20" href="{{$profileUrl}}">My Profile</a></li>
        <li><a class="btn btn-border mb-20" href="{{route('orders.index')}}">Order</a></li>
        <li><a class="btn btn-border mb-20" href="candidate-profile-jobs.html">My Jobs</a></li>
        <li><a class="btn btn-border mb-20" href="candidate-profile-save-jobs.html">Saved Jobs</a></li>
        <li>
            @php
            $dashboardUrl = auth()->user()->role === 'company' ? '/company/dashboard' : '/candidate/dashboard';
           @endphp

            <a class="btn btn-border mb-20 active" href="{{$dashboardUrl}}">Dashboard</a>
        </li>
        <li>


             <!-- Authentication -->
             <form method="POST" action="{{ route('logout') }}">
                @csrf


                <a class="btn btn-border mb-20" :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">Logout</a>
            </form>

        </li>
      </ul>
      <div class="mt-20"><a class="link-red" href="#">Delete Account</a></div>
    </div>
  </div>
