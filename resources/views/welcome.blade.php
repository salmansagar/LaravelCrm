<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini Crm</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="jumbotron">
        <h1 class="display-4">Welcome to the Mini-Crm!</h1>
        <p class="lead">This is a simple Crm System, Designed by Salman Khan.</p>
        <hr class="my-4">
        <p>Laravel is fun!</p>
        <p class="lead">


          @if (Route::has('login'))
          <div >
              @auth
                  <a href="{{ url('/admin') }}">Dashboard</a>
              @else

                  <a class="btn btn-danger btn-lg" href="{{ route('login') }}" role="button">Log in</a>

              @endauth
          </div>
      @endif
        </p>
      </div>
</body>
</html>
