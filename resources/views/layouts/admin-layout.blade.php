<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ (request()->is('customers*')) ? 'active' : '' }}">
                    <a class="nav-link" href="/customers">Customers</span></a>
                </li>
                <li class="nav-item {{ (request()->is('products*')) ? 'active' : '' }}">
                    <a class="nav-link" href="/products">Products</a>
                </li>
                <li class="nav-item {{ (request()->is('categories*')) ? 'active' : '' }}">
                    <a class="nav-link" href="/categories">Categories</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="pt-2">

    @yield('main-content')

    @yield('footer')

    </main>
</body>

</html>
