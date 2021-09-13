    <!-- Vendor JS Files -->
    <script src="{{ asset('assets-front/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets-front/js/main.js') }}"></script>

    <script src="{{ asset('assets-front/js/jquery.nicescroll.min.js') }}"></script>

    <script>
        use = "strict";

        $(document).on('click', '#send', function(e) {

            e.preventDefault();

            $('#name_error').text('');
            $('#email_error').text('');
            $('#subject_error').text('');
            $('#phone_error').text('');
            $('#message_error').text('');

            var formData = new FormData($('#form_data')[0]);

            $.ajax({
                type: "post",
                url: "{{ route('client_store') }}",
                cach: false,
                processData: false,
                contentType: false,
                data: formData,

                success: function(data) {


                    $('input[type=email],input[type=text]').val('');
                    $('#textarea').val('');

                    $.each(data, function(key, val) {

                        $('#success').text(val);

                        $('#success-msg').fadeIn(300, function() {
                            $(this).fadeOut(11000);
                        });
                    });
                },

                error: function(reject) {

                    console.log(reject);

                    var response = $.parseJSON(reject.responseText);

                    $.each(response.errors, function(key, val) {

                        $('#' + key + '_error').text(val);

                    });

                }
            });
        });

          // Trigger NiceScroll
    $('body').niceScroll({
        cursorcolor: '#f03',
        cursorwidth: '10px',
        cursorborder: 'none',
        cursorborderradius: '0',
        zindex: '99999999',
        smoothscroll: 'true',
    });
    </script>
