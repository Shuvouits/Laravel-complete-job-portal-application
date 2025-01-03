<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Advanced Job Portal</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">



    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}"> 

    <link rel="stylesheet" href="{{asset('admin/assets/modules/codemirror/lib/codemirror.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/codemirror/theme/duotone-dark.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/jquery-selectric/selectric.css')}}">



    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">




    <!-- Template CSS -->



     <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/admin.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />

    <!-- Bootstrap-Iconpicker -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">










    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
    @notifyCss
</head>

<style>
    .notify {
        z-index: 9999 !important;
    }


    .btn-primary {
        background: #6777ef !important;
    }

    .ck-editor__editable_inline {
        min-height: 350px !important;
        height: 350px !important;
        max-height: 350px !important;
        overflow-y: auto;
        /* Ensure content overflow is scrollable */
    }
</style>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <div class="navbar-bg"></div>

            @include('admin.navbar')
            @include('admin.sidebar')



            <!-- Main Content -->

            @yield('main')


            <!---end -->


            @include('admin.footer')

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>



       <!-- JS Libraies -->

       <script src="{{asset('admin/assets/modules/summernote/summernote-bs4.js')}}"></script>

       <script src="{{asset('admin/assets/modules/codemirror/lib/codemirror.js')}}"></script>
       <script src="{{asset('admin/assets/modules/codemirror/mode/javascript/javascript.js')}}"></script>
       <script src="{{asset('admin/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>





    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/modules/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/modules-sweetalert.js') }}"></script>

    <script src="{{ asset('admin/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>








    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Bootstrap CDN -->
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js">
    </script>
    <!--icon picker --->
    <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>









    <!-------

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>  --->





<!-------

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                // No need to specify height in the configuration
            })
            .then(editor => {
                // Use CSS to enforce a consistent height
                const editorElement = editor.ui.view.editable.element;
                editorElement.style.minHeight = '350px'; // Set minimum height
                editorElement.style.height = '350px'; // Enforce consistent height
                editorElement.style.maxHeight = '350px'; // Optional: set maximum height if you want to limit growth
            })
            .catch(error => {
                console.error(error);
            });
    </script>


    ----->





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





    <x-notify::notify />
    @notifyJs




</body>

</html>



{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Admin {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
