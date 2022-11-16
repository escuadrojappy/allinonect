<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- CSS only -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="{{ asset('/css/libraries/jquery-confirm.min.css') }}">
        <script src="{{ asset('/js/common.js') }}"></script>
        <script src="{{ asset('/js/jquery-3.6.1.min.js') }}"></script>
        <!-- JavaScript Bundle with Popper -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> --}}
        <script src="{{ asset('/js/jquery-confirm.min.js') }}"></script>
    </head>
    <body>
        @yield('content')
    </body>
</html>