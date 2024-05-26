<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title")</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ms+Madi&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <h1 class="logo">
            Cookiedough
            <img src="{{ asset('images/chef-hat-svgrepo-com.svg') }}" alt="Logo">
        </h1>
    </header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('/images/chef-toque-svgrepo-com.svg') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ingredients">Ingredients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/recipes">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/recipe-category">Recipes-Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/recipe-ingredient">Recipes-Ingredients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users">Users</a>
                    </li>
                </ul>
            </div>
            <!-- Formularz wyszukiwania -->
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" action="/recipes/search" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" name="name">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </nav>            

        </div>
    </nav>

    <hr>
    <div class="container-fluid">
        <img src="/images/pineapple-supply-co-Q7PclNhVRI0-unsplash 1.png" style="height: 300px;" width="100%">
    </div>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h2>@yield("title")</h2>
            </div>
            <div class="col-sm-6 text-end">
                @yield("menu")
            </div>
        </div>
    </div>

    <hr>
    @yield("content")
    @yield('scripts')
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>