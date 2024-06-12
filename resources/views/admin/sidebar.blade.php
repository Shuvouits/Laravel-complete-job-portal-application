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

            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Attribute</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('admin.industry-types.index')}}">Industry Type</a></li>
                <li><a class="nav-link" href="{{route('admin.organization-types.index')}}">Organization Type</a></li>

              </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Locations</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('admin.countries.index')}}">Countries</a></li>


                </ul>
              </li>

        </ul>


    </aside>
</div>
