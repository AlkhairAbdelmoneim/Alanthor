@include('front.main-head')

@include('front.head')

<body>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>{{ trans('front.main') }}</h1> <br>
                    <h2> {{ trans('front.main info') }} </h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#about" class="btn-get-started scrollto">{{ trans('front.Get Started') }}</a>
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i
                                class="bi bi-play-circle"></i><span>{{ trans('front.Watch Video') }} </span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('assets-front/img/Group.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= About Us Section ======= -->
        <div class="container">
            <div class="row" style="margin-top: 5%">
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




        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ trans('front.Contact') }}</h2>
                    <p>{{ trans('front.Contact Info') }}</p>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>{{ trans('front.Location') }}:</h4>
                                <p>
                                    {{ trans('front.Location info') }}

                                </p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>{{ trans('front.Email') }}:</h4>
                                <p>info@alanthor.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>{{ trans('front.Phone') }}:</h4>
                                <p>249912959525</p>
                            </div>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">

                        <form action="" id="form_data" class="php-email-form">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">{{ trans('front.Name') }}</label>
                                    <small id="name_error" class="text-danger"></small>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">{{ trans('front.Email') }}</label>
                                    <small id="email_error" class="text-danger"></small>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ trans('front.Phone') }}</label>
                                        <small id="phone_error" class="text-danger"></small>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ trans('front.Subject') }}</label>
                                        <small id="subject_error" class="text-danger"></small>
                                        <input type="text" class="form-control" name="subject">
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="name">{{ trans('front.Message') }}</label>
                                <small id="message_error" class="text-danger"></small>
                                <textarea class="form-control" name="message" id="textarea" rows="10"></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit" id="send"
                                    style="background-color: #b56740">{{ trans('front.Send Message') }}</button>
                            </div>

                            <div class="alert alert-success" id="success-msg" style="display: none; margin-top: 20px">
                                <span id="success"></span>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    @include('front.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @include('front.java-scripts')
</body>

</html>
