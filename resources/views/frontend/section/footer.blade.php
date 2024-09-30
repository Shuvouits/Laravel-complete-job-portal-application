<footer class="footer pt-165">
    <div class="container">
        <div class="row justify-content-between">
            @php
                $footerDetails = \App\Models\Footer::first();
                $footerIcons = \App\Models\SocialIcon::all();
                $footerOne = \Menu::getByName('footer_1');
                $footerTwo = \Menu::getByName('footer_2');
                $footerThree = \Menu::getByName('footer_3');
                $footerFour = \Menu::getByName('footer_4');
            @endphp

            <div class="footer-col-1 col-md-3 col-sm-12">
                <a class="footer_logo" href="index.html">
                    <img alt="joblist" src="{{ getImagePath($footerDetails?->logo) }}">
                </a>
                <div class="mt-20 mb-20 font-xs color-text-paragraph-2">{{ $footerDetails?->details }}</div>
                <div class="footer-social">
                    @foreach ($footerIcons as $icon)
                    <a class="icon-socials icon-facebook" href="{{ $icon->url }}"><i class="{{ $icon->icon }}"></i></a>
                    @endforeach

                </div>
            </div>

            <div class="footer-col-2 col-md-2 col-xs-6">
                <h6 class="mb-20">Resources</h6>
                <ul class="menu-footer">
                    @foreach ($footerOne as $menu)
                        <li><a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="footer-col-3 col-md-2 col-xs-6">
                <h6 class="mb-20">Community</h6>
                <ul class="menu-footer">
                    @foreach ($footerTwo as $menu)
                    <li><a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-col-4 col-md-2 col-xs-6">
                <h6 class="mb-20">Quick links</h6>
                <ul class="menu-footer">
                    @foreach ($footerThree as $menu)
                    <li><a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-col-5 col-md-2 col-xs-6">
                <h6 class="mb-20">More</h6>
                <ul class="menu-footer">
                    @foreach ($footerFour as $menu)
                    <li><a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="footer-bottom mt-50">
            <div class="row">
                <div class="col-md-6">
                    <span class="font-xs color-text-paragraph">{{ $footerDetails?->copyright }}</span>
                </div>

                <div class="col-md-6 text-md-end text-start">
                    <div class="footer-social"><a class="font-xs color-text-paragraph" href="#">Privacy Policy</a><a class="font-xs color-text-paragraph mr-30 ml-30" href="#">Terms &amp; Conditions</a><a class="font-xs color-text-paragraph" href="#">Security</a></div>
                </div>

            </div>
        </div>
    </div>
</footer>
