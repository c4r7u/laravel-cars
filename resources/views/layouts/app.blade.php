<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('cars.index') }}">Cars list</a>
            </div>
            {{-- <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('cars.index') }}">Cars list</a>
            </div> --}}
          </nav>
    </header>

    <main>
        @yield('main_content')
    </main>

    <footer>
        <h1>Sono il footer</h1>
    </footer>
</body>
</html>