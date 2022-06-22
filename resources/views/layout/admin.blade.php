<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="icon" href="{{ url('image/C.jpg') }}" type="image/x-icon">
    <title>Kost | {{ $title }}</title>
</head>
@include("navbar.navadmin")

<body>
    @yield('isi')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
<!-- Footer -->
<!-- Footer -->
<footer class="page-footer font-small blue mt-auto">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 bg-secondary mt-5">
        <p>© 2021 Copyright:</p>
        <a href="https://danendrawm.github.io/portofolio/" class=" text-dark">Danendra Wyanta Mustofa</a>
        <p>Icon from : <a class=" font-italic text-dark" href="https://www.freepik.com">freepik</a></p>
        <p>Photos from : <a class=" font-italic text-dark" href="https://source.unsplash.com">Unsplash</a></p>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
@include('sweetalert::alert')

</html>
