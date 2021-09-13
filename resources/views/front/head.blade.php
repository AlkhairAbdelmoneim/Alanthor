    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top " style="background-color: #b56740;">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">{{ trans('front.company Name') }} </a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo me-auto"><img src="assets-front/img/logo.png" alt=""
                    class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ route('welcome') }}">{{ trans('front.Home') }}</a>
                    </li>
                    <li><a class="nav-link scrollto" href="#about">{{ trans('front.About') }}</a></li>
                    <li><a class="nav-link scrollto" href="#services">{{ trans('front.Services') }}</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('blog') }}">{{ trans('front.Blog') }}</a></li>

                    <li><a class="nav-link scrollto" href="#contact">{{ trans('front.Contact') }}</a></li>

                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a class="nav-link scrollto" href="{{ route('login') }}"
                                    title="{{ __('site.login') }}">{{ trans('front.login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a class="nav-link scrollto" href="{{ route('register') }}"
                                    title="{{ __('site.Register') }}">{{ __('site.Register') }}</a>
                            </li>
                        @endif

                    @else

                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="nav-link scrollto" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                      {{ trans('front.logout') }}
                  </a>
                        </li>

                    @endguest

                    <li class="dropdown"><a href=""><span> {{ trans('front.Lang') }} </span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>


                    <li><a class="getstarted scrollto" href="#about">{{ trans('front.Get Started') }}</a></li>


                </ul>


                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
