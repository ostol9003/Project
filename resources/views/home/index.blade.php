<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Culinary recipes
    </title>
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
        <div class="container-fluid justify-content-center">
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
                    <form class="d-flex" action="/recipes/{{ request('name') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" name="name">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </nav>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/brooke-lark-jUPOXXRNdcA-unsplash.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/olayinka-babalola-r01ZopTiEV8-unsplash.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/rumman-amin-LNn6O_Mt730-unsplash.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <div class="container mt-4">
    <div class="row gy-3">
        @foreach($models as $model)
        <div class="col-sm-12 col-md-6 col-lg-3 d-flex">
            <div class="card h-100">
                <img src="{{ $model->url }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $model->title }}</h5>
                    <p class="card-text">{!! $model->description !!}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Cooking Time:</strong> {{ $model->cooking_time }} minutes</li>
                    <li class="list-group-item"><strong>Owner:</strong> {!! $model->User->name !!} {!! $model->User->email !!}</li>
                    <li class="list-group-item"><strong>Status:</strong> {{ $model->is_active ? 'Active' : 'Inactive' }}</li>
                    <li class="list-group-item"><strong>Created At:</strong> {{ $model->created_at->format('d M Y') }}</li>
                    <li class="list-group-item"><strong>Updated At:</strong> {{ $model->updated_at->format('d M Y') }}</li>
                    <li class="list-group-item"><strong>Ingredients:</strong>
                        @foreach($model->recipeIngredients as $recipeIngredient)
                        {!! $recipeIngredient->ingredient->name !!} ({!! $recipeIngredient->quantity !!} {!! $recipeIngredient->unit!!}),
                        @endforeach</li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>

<br>
<br>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>