<header>
    <div class="desktop-header">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-3">
                    <a href="{{ getHomeUrl() }}">
                        @include('front.partials.svg.logo-svg')
                    </a>
                </div>
                <div class="col-lg-8">
                    <nav>
                        @include('front.partials.menu')
                    </nav>
                </div>
                <div class="col-lg-1">
                    <span class="icon">
                        <span class="number">0</span>
                        <i class="fa-solid fa-cart-shopping"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-header">
        <div class="mobile-header-top">
            <a class="logo" href="{{ getHomeUrl() }}">
                @include('front.partials.svg.logo-svg')
            </a>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
        <div class="header-wrapper">
            <a class="mobile-logo" href="{{ getHomeUrl() }}">
                @include('front.partials.svg.logo-svg')
            </a>
            <nav>
                @include('front.partials.menu')
            </nav>
            <a class="cart" href="#">Cart</a>
        </div>
        <div class="overlay"></div>
    </div>
</header>
