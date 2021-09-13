@include('front.main-head')

@include('front.head')

<body class="body">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>{{ trans('front.main') }}</h1> <br>
                    <h2> {{ trans('front.main info') }} </h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#about" class="btn-get-started scrollto"
                            title="{{ trans('front.Get Started') }}">{{ trans('front.Get Started') }}</a>
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"
                            title="{{ trans('front.Watch Video') }} "><i
                                class="bi bi-play-circle"></i><span>{{ trans('front.Watch Video') }} </span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('assets-front/img/Group.png') }}" class="img-fluid animated" alt="صورة"
                        title="{{ trans('front.company Name') }}">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ trans('front.About') }}</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            {{ trans('front.About Info') }}
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line" style="color: #b56740;"></i>
                                {{ trans('front.About Info 1') }}</li>
                            <li><i class="ri-check-double-line"
                                    style="color: #b56740;"></i>{{ trans('front.About Info 2') }} </li>
                            <li><i class="ri-check-double-line"
                                    style="color: #b56740;"></i>{{ trans('front.About Info 3') }}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            {{ trans('front.About Info 4') }}
                        </p>

                        {{-- <a href="#" class="btn-learn-more"> {{ trans('front.Read More') }}</a> --}}
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3>{{ trans('front.company export') }}</h3>
                            <p>
                                {{ trans('front.company export info') }} </p>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse"
                                        data-bs-target="#accordion-list-1" style="color: #b56740;"><span
                                            style="color: #3b3b3a;"> 01</span> {{ trans('front.company export 1') }}
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p>
                                            {{ trans('front.company export 1 info') }} </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                        class="collapsed" style="color: #b56740;"><span
                                            style="color: #3b3b3a;">02</span> {{ trans('front.company export 2') }}
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            {{ trans('front.company export 2 info') }} </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                        class="collapsed" style="color: #b56740;"><span
                                            style="color: #3b3b3a;">03</span> {{ trans('front.company export 3') }}
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            {{ trans('front.company export 3 info') }} </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4"
                                        class="collapsed" style="color: #b56740;"><span style="color: #3b3b3a;">
                                            04</span> {{ trans('front.company export 4') }} <i
                                            class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            {{ trans('front.company export 4 info') }} </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5"
                                        class="collapsed" style="color: #b56740;"><span
                                            style="color: #3b3b3a;">05</span> {{ trans('front.company export 5') }}
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            {{ trans('front.company export 5 info') }} </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("assets-front/img/why-us.png");' data-aos="zoom-in"
                        data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section><!-- End Why Us Section -->


        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg" style="background-color: #fff">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ trans('front.Services') }}</h2>
                    <p>
                        {{ trans('front.Services info') }}
                    </p>
                </div>

                <div class="row">

                    @foreach ($services as $item)
                        <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box">
                                <center>
                                    <div class="icon"><img src="https://img.icons8.com/nolan/64/service.png"
                                            title="{{ $item->name }}" alt="No image" /></div>
                                    <h4><a href="#" title="{{ $item->name }}">{{ $item->name }}</a></h4>
                                </center>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    @endforeach

                    <div class="content-center" style="margin-top: 20px">
                        {{ $services->appends(request()->query())->links() }}
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->


        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ trans('front.Frequently Asked Questions') }} </h2>
                    <p>{{ trans('front.Frequently Asked Questions info') }} </p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus
                                urna duis? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet
                                    non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor
                                    purus non.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi
                                enim nunc? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                    donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                    cursus turpis massa tincidunt dui.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur
                                adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                    pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                    Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis
                                    tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam
                                aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in
                                    est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="500">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare.
                                Varius vel pharetra vel turpis nunc eget lorem dolor? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo
                                    integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc
                                    eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

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
