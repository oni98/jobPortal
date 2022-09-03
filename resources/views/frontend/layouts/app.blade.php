<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ @config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/frontend/img/logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
</head>

<body>
    @include('frontend.partials.navbar')

    @yield('main_section')

    @include('frontend.partials.footer')

    {{-- <script src="{{ asset('assets/backend/auth/js/jquery-3.2.1.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/backend/auth/js/popper.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            })
        });
    </script>
</body>

</html>
