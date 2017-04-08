<!DOCTYPE html>
<html>

  <head>
    <title>WO - Harjoitustyö </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
    integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
    integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    <link href="/css/blog.css" rel="stylesheet" />

  </head>

  <body>

    @include ('layouts.nav')


    @if ($flash = session('message'))
    <div id="flash-message" class="alert alert-success" role="alert">
        {{ $flash }}
    </div>
    @elseif ($flash = session('error'))
        <div id="flash-message" class="alert alert-danger" role="alert">
            {{ $flash }}
        </div>
    @endif


    <div class="container">

        <div class="row">

        @yield ('content')

        @include ('layouts.sidebar')

      </div>
    </div>



    @include ('layouts.footer')

  </body>

</html>
