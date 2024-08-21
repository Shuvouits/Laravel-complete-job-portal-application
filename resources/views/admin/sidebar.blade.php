<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>


        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="/admin/login" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>

            <li class="menu-header">Starter</li>

            <li class="{{ setSidebarActive(['admin.orders.*']) }}">
                <a class="nav-link" href="{{ route('admin.orders.index') }}"><i class="fas fa-cart-plus"></i> <span>Orders</span></a>
            </li>


            <li class="{{ setSidebarActive(['admin.job-categories.*']) }}">
                <a class="nav-link" href="{{ route('admin.job-categories.index') }}">
                    <i class="fas fa-list"></i> <span>Job Category</span></a>
            </li>

            <li class="{{ setSidebarActive(['admin.jobs.*']) }}">
                <a class="nav-link" href="{{ route('admin.jobs.index') }}">
                    <i class="fas fa-list"></i> <span>Job Post</span></a>
            </li>


            <li class="dropdown {{setSidebarActive(['admin.industry-types*', 'admin.organization-types*', 'admin.language*', 'admin.profession*', 'admin.skill*', 'admin.educations*', 'admin.job-types*', 'admin.salary-types*', 'admin.tags*', 'admin.job-roles*', 'admin.job-experiences*'])}} ">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Attribute</span></a>
              <ul class="dropdown-menu">
                <li class=" {{setSidebarActive(['admin.industry-types*'])}} "><a class="nav-link" href="{{route('admin.industry-types.index')}}">Industry Type</a></li>
                <li class=" {{setSidebarActive(['admin.organization-types*'])}} "><a class="nav-link" href="{{route('admin.organization-types.index')}}">Organization Type</a></li>
                <li class=" {{setSidebarActive(['admin.language*'])}} "><a class="nav-link" href="{{route('admin.language.index')}}">Language</a></li>
                <li class=" {{setSidebarActive(['admin.profession*'])}} "><a class="nav-link" href="{{route('admin.profession.index')}}">Profession</a></li>

                <li class=" {{setSidebarActive(['admin.skill*'])}} "><a class="nav-link" href="{{route('admin.skill.index')}}">Skill</a></li>

                <li class="{{ setSidebarActive(['admin.educations.*']) }}">
                    <a class="nav-link" href="{{ route('admin.educations.index') }}">Educations</a>
                </li>

                <li class="{{ setSidebarActive(['admin.job-types.*']) }}">
                    <a class="nav-link" href="{{ route('admin.job-types.index') }}">Job Types</a>
                </li>

                <li class="{{ setSidebarActive(['admin.salary-types.*']) }}">
                    <a class="nav-link" href="{{ route('admin.salary-types.index') }}">Salary Types</a>
                </li>

                <li class="{{ setSidebarActive(['admin.tags.*']) }}">
                    <a class="nav-link" href="{{ route('admin.tags.index') }}">Tags</a>
                </li>

                <li class="{{ setSidebarActive(['admin.job-roles.*']) }}">
                    <a class="nav-link" href="{{ route('admin.job-roles.index') }}">Job Roles</a>
                </li>

                <li class="{{ setSidebarActive(['admin.job-experiences.*']) }}">
                    <a class="nav-link" href="{{ route('admin.job-experiences.index') }}">Job Experience</a>
                </li>


              </ul>
            </li>

            <li class="dropdown {{setSidebarActive(['admin.countries*', 'admin.states*', 'admin.cities*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Locations</span></a>

                <ul class="dropdown-menu">
                  <li class="{{setSidebarActive(['admin.countries*'])}}"><a class="nav-link" href="{{route('admin.countries.index')}}">Country</a></li>
                </ul>

                <ul class="dropdown-menu">
                    <li class="{{setSidebarActive(['admin.states*'])}}"><a class="nav-link" href="{{route('admin.states.index')}}">State</a></li>
                </ul>

                <ul class="dropdown-menu">
                    <li class="{{setSidebarActive(['admin.cities*'])}}"><a class="nav-link" href="{{route('admin.cities.index')}}">City</a></li>
                </ul>

              </li>

              <li class="dropdown {{setSidebarActive(['admin.plans*'])}} ">
                <a href="{{route('admin.plans.index')}}" class="nav-link "><i class="fas fa-fire"></i><span>Price Plan</span></a>

            </li>

            <li class="dropdown {{setSidebarActive(['admin.payment*'])}} ">
                <a href="{{route('admin.payment')}}" class="nav-link "><i class="fas fa-fire"></i><span>Payment Setting</span></a>

            </li>

            <li class="dropdown {{setSidebarActive(['admin.site-settings'])}} ">
                <a href="{{route('admin.site-settings')}}" class="nav-link "><i class="fas fa-fire"></i><span>Site Setting</span></a>

            </li>



        </ul>




    </aside>
</div>
