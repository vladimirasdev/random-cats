<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Fontawesom css -->
    <script src="https://kit.fontawesome.com/e354dbdd31.js" crossorigin="anonymous"></script>
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/main.css?1') }}" />

    <title>{{ $meta_title ?? 'Atsitiktinės kačių veislės!' }}</title>
  </head>
  <body>
    <div class="row justify-content-center mt-5">
        <h3 class="lead display-4" style="font-size: 2rem;"><i class="fas fa-cat"></i> Atsitiktinės kačių veislės!</h3>
    </div>

    <ul class="nav justify-content-center mb-3">
        <li class="nav-item lead btn-light">
            <a class="nav-link text-dark {{ (request()->is('/*')) ? 'active' : '' }}" href="{{ route('index') }}"><i class="fas fa-home"></i> Pradinis</a>
        </li>
        <li class="nav-item lead btn-light">
            <a class="nav-link text-dark {{ (request()->is('statistics*')) ? 'active' : '' }}" href="{{ route('statistics') }}"><i class="fas fa-chart-bar"></i> Statistika</a>
        </li>
        <li class="nav-item lead btn-light">
            <a class="nav-link text-dark {{ (request()->is('log*')) ? 'active' : '' }}" href="{{ route('log') }}"><i class="fas fa-list"></i> Log įrašas</a>
        </li>
    </ul>

    <!-- Content -->
    <content>
        @yield('content')
    </content>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>