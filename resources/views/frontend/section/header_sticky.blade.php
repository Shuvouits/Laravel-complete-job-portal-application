<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo"><a class="d-flex" href="/"><img alt="joblist"
                            src="{{ asset('frontend/assets/imgs/template/logo.png') }}"></a></div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li class="has-children"><a class="active" href="index.html">Home</a></li>
                        <li class="has-children"><a href="jobs-list.html">Find a Job</a></li>
                        <li class="has-children"><a href="companies-grid.html">Recruiters</a></li>
                        <li class="has-children"><a href="candidates-grid.html">Candidates</a></li>
                        <li class="has-children"><a href="blog-grid.html">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="page-about.html">About Us</a></li>
                                <li><a href="page-pricing.html">Pricing Plan</a></li>
                                <li><a href="page-contact.html">Contact Us</a></li>
                                <li><a href="/register">Register</a></li>
                                <li><a href="/login">Signin</a></li>
                                <li><a href="page-reset-password.html">Reset Password</a></li>
                                <li><a href="blog-details.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li class="has-children"><a href="blog-grid.html">Blog</a></li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
                <div class="block-signin">
                    <!-- <a class="text-link-bd-btom hover-up" href="page-register.html">Register</a> -->
                    @php
                    $dashboardUrl = auth()->user()->role === 'company' ? '/company/dashboard' : '/candidate/dashboard';
                
                    @endphp

@if($dashboardUrl)
<a class="btn btn-default btn-shadow ml-40 hover-up" href="{{$dashboardUrl}}">Dashboard</a>
@else 
<a class="btn btn-default btn-shadow ml-40 hover-up" href="/login">Sign in</a>
@endif
                    
                </div>
            </div>
        </div>
    </div>
</header>