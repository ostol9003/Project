@extends('main')

@section('title', 'Recipe ingredient')

@section('menu')
<a class="btn btn-outline-secondary" href="/RecipeIngredient/create">New recipe ingredient</a>
@endsection

@section('content')
<div class="container mt-4">
    <div class="row gy-3">
        @foreach($models as $model)
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">ID: {{ $model->id}}</h5>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"><strong>Ingredient ID:</strong> {{ $model->ingredient_id }}</li>
                    <li class="list-group-item"><strong>Recipe ID:</strong> {{ $model->recipe_id }}</li>
                    <li class="list-group-item"><strong>Quantity:</strong> {{ $model->quantity }}</li>
                    <li class="list-group-item"><strong>Unit:</strong> {{ $model->unit }}</li>
                    <li class="list-group-item"><strong>Status:</strong> {{ $model->is_active ? 'Active' : 'Inactive' }}</li>
                    <li class="list-group-item"><strong>Created At:</strong> {{ $model->created_at->format('d M Y') }}</li>
                    <li class="list-group-item"><strong>Updated At:</strong> {{ $model->updated_at->format('d M Y') }}</li>
                </ul>
                <div class="card-body row">
                    <div class="col">
                        <a href="/recipe-ingredient/edit/{{$model->id}}" class="btn btn-outline-secondary">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                    </div>
                </div>

            </div>
        </div>


        @endforeach
    </div>
</div>
@endsection