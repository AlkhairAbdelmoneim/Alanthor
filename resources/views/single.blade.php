@include('front.main-head')

@include('front.head')

<body>

    <main id="main">


        <!-- ======= About Us Section ======= -->
        <div class="container">
            <div class="row" style="margin-top: 10%">
                {{-- @foreach ($blogs as $blog)
                    <div class="col-xl-3 col-md-3">
                        <div class="card custom-card my_card">
                            <img class="card-img-top w-100 bg-danger-transparent" src="{{ $blog->image_path }}" alt="No iamge" title="{{ $blog->title }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $blog->title }}</h4>
                                <p class="card-text">{!! $blog->content !!}</p>
                                <a class="a_link" href=" {{ $blog->id }}" title="{{$blog->title }}">Read More<i
                                        class="fe fe-arrow-right ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
                <div class="my_image">
                    <img src="{{$single->image_path}}" alt="{{$single->title}}" title="{{$single->title}}">
                </div>
                <div class="my_content">
                    <h1 style="color: #B56740">{{$single->title}}</h1>
                    <p>{!!$single->content!!}</p>
                </div>

            </div>
            <div class="clear-fix"></div>
        </div>
        <div class="clear-fix"></div>
        <!-- End About Us Section -->

    </main><!-- End #main -->

    @include('front.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @include('front.java-scripts')
</body>

</html>
