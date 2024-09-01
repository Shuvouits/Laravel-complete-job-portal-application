<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
        <ul class="nav" role="tablist">
            <li><a class="btn btn-border mb-20 {{ setSidebarActive(['candidate.dashboard']) }} " href="{{ route('candidate.dashboard') }}">Dashboard</a>
            </li>
            <li><a class="btn btn-border mb-20 {{ setSidebarActive(['candidate.applied-jobs.index']) }} " href="{{ route('candidate.applied-jobs.index') }}">Applied Jobs</a></li>
            <li><a class="btn btn-border mb-20  {{ setSidebarActive(['candidate.bookmarked-jobs.index']) }}" href="{{ route('candidate.bookmarked-jobs.index') }}">Bookmarked</a>
            </li>
            <li><a class="btn btn-border mb-20 {{ setSidebarActive(['candidate.profile.index']) }} " href="{{ route('candidate.profile.index') }}">My Profile</a></li>
            <li>
                 <!-- Authentication -->
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a class="btn btn-border mb-20" onclick="event.preventDefault();
                this.closest('form').submit();" href="{{ route('logout') }}">Logout</a>

                </form>
            </li>
        </ul>

    </div>
</div>
