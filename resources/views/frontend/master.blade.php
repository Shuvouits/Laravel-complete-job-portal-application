<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{config('settings.site_favicon')}}">

    @notifyCss

    <link href="{{ asset('frontend/assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/modules/sweetalert/sweetalert.min.js') }}"></script>

     <!-- Include Notyf CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">



    <title>Ultimate Job Portal Website</title>
</head>

<style>
    .notify {
        z-index: 9999 !important;
    }

    .cke_notifications_area {

        display: none !important;
    }

    .select2-selection__rendered {
    color: black !important;
}
</style>

<body>


    @include('frontend.section.preloader')

    @include('frontend.section.header_sticky')

    @include('frontend.section.mobile_header')

    @yield('main')


    @include('frontend.section.subscription_box')



    @include('frontend.section.footer')

    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/Font-Awesome.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js?v=4.1') }}"></script>

    <!---slider price range-->
    <script src="{{ asset('frontend/assets/js/noUISlider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slider.js') }}"></script>


    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        // Initialize CKEditor
        CKEDITOR.replace('content');
    </script>

    <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <!---social share-->
    <script src="https://cdn.jsdelivr.net/npm/goodshare.js@6/goodshare.min.js"></script>

     <!-- Include Notyf JS -->
     <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>



    <x-notify::notify />
    @notifyJs



    <script>
        $(document).ready(function() {
            $('.select-2').select2();
        });
    </script>

    <script>
        $(".delete").click(function(e) {
            e.preventDefault();
            swal({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this data!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {

                    if (willDelete) {
                        let url = $(this).attr('href')

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                window.location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr);
                                swal(xhr.responseJSON.message, {
                                    icon: 'error'
                                });
                            }

                        })


                        swal('Poof! Your imaginary file has been deleted!', {
                            icon: 'success',
                        });
                    }
                });
        });
    </script>




    @stack('scripts');


</body>

</html>
