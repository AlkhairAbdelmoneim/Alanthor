    <!-- ======= Footer ======= -->
    <footer id="footer" style="background-color: #b56740">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>{{ trans('front.Join Our Newsletter') }} </h4>
                        <p> {{ trans('front.Join Our Newsletter Info') }} </p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit"
                                value="{{ trans('front.Subscribe') }} " style="background-color: #b56740">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>{{ trans('front.company') }}</h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br>
                            <strong style="color: #b56740;">{{ trans('front.Phone') }}: <br></strong> 249912515347
                            <br>
                            249912959525<br> 249125568554<br>
                            <strong style="color: #b56740;">{{ trans('front.Email') }}: <br></strong>
                            info@alanthor.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>{{ trans('front.Useful Links') }} </h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('front.Home') }}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('front.About') }}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('front.Services') }}</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('front.Contact') }}</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="#">{{ trans('front.Privacy policy') }}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>{{ trans('front.Services') }} </h4>
                        <ul>
                            @foreach ($services as $item)
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{$item->name}}</a></li>
                            @endforeach
                           
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>{{ trans('front.Our Social Networks') }} </h4>
                        <p>{{ trans('front.Our Social Info') }}</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter" style="background-color: #b56740"><i
                                    class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook" style="background-color: #b56740"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram" style="background-color: #b56740"><i
                                    class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin" style="background-color: #b56740"><i
                                    class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                <span> {{ trans('front.Reserved') }} </span><strong>{{ trans('front.company') }} </strong> &copy;
            </div>
            <div class="credits">
                {{ trans('front.Designed by') }}<a href="http://microzool.com/"
                    style="color: #fff"><strong>{{ trans('front.Microzool') }} </strong></a>
            </div>
        </div>
    </footer><!-- End Footer -->