@include('front.main-head')

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
                    <li><a class="nav-link scrollto" href="/">{{ trans('front.About') }}</a></li>
                    <li><a class="nav-link scrollto" href="/">{{ trans('front.Services') }}</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('blogs') }}">{{ trans('front.Blog') }}</a></li>

                    <li><a class="nav-link scrollto" href="/">{{ trans('front.Contact') }}</a></li>

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


<body>
    <main id="main">


        <!-- ======= About Us Section ======= -->
        <div class="container">
            <div class="row" style="margin-top: 10%">
                @foreach ($blogs as $blog)
                    <div class="col-xl-3 col-md-3">
                        <div class="card custom-card my_card">
                            <img class="card-img-top w-100 bg-danger-transparent" src="{{ $blog->image_path }}" alt="No iamge" title="{{ $blog->title }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $blog->title }}</h4>
                                <p class="card-text">{!! $blog->content !!}</p>
                                <a class="a_link" href=" {{ route('single',$blog->id) }}" title="{{$blog->title }}">Read More<i
                                        class="fe fe-arrow-right ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- End About Us Section -->

    </main><!-- End #main -->

    @include('front.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @include('front.java-scripts')
</body>

</html>
