<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo"><a class="d-flex" href="/"><img alt="joblist"
                            src="{{ config('settings.site_logo') }}"></a></div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">

                    @php
                        $navigationMenu = \Menu::getByName('navigation_menu');

                    @endphp

                    <ul class="main-menu">
                        @foreach ($navigationMenu as $menu)

                            @if ($menu['child'])
                                <li class="has-children"><a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                                    <ul class="sub-menu">
                                        @foreach ($menu['child'] as $childMenu)
                                            <li><a href="{{ $childMenu['link'] }}">{{ $childMenu['label'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                            <li class="has-children"><a class=""
                                href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>
                            @endif
                        @endforeach

                    </ul>




                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
                <div class="block-signin">
                    <!-- <a class="text-link-bd-btom hover-up" href="page-register.html">Register</a> -->


                    @php
                        $user = auth()->user();
                        if ($user) {
                            $dashboardUrl =
                                $user->role === 'company'
                                    ? '/company/dashboard'
                                    : ($user->role === 'candidate'
                                        ? '/candidate/dashboard'
                                        : '');
                        } else {
                            $dashboardUrl = '/login';
                        }
                    @endphp



                    @if ($user)
                        <a class="btn btn-default btn-shadow ml-40 hover-up" href="{{ $dashboardUrl }}">Dashboard</a>
                    @elseif(!$user)
                        <a class="btn btn-default btn-shadow ml-40 hover-up" href="/login">Sign in</a>
                    @endif






                </div>
            </div>
        </div>
    </div>
</header>
