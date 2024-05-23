@extends('main')

@section('title', 'Ingredients')

@section('menu')
    <a class="btn btn-outline-secondary" href="/RecipeIngredient/create">New ingredient</a>
@endsection

@section('content')
<div class="container mt-4">
    <div class="row gy-3">
        @foreach($models as $model)
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{ $model->id }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Recipe ID:</strong> {{ $model->recipe_id }}</li>
                <li class="list-group-item"><strong>Ingredient ID:</strong> {{ $model->ingredient_id }}</li>
                <li class="list-group-item"><strong>Quantity:</strong> {{ $model->quantity }}</li>
                <li class="list-group-item"><strong>Unit:</strong> {{ $model->unit }}</li>
                    <li class="list-group-item"><strong>Status:</strong> {{ $model->is_active ? 'Active' : 'Inactive' }}</li>
                    <li class="list-group-item"><strong>Created At:</strong> {{ $model->created_at->format('d M Y') }}</li>
                    <li class="list-group-item"><strong>Updated At:</strong> {{ $model->updated_at->format('d M Y') }}</li>
                </ul>
                <div class="card-body row">
                    <div class="col">
                    <a href="/RecipeIngredient/{{ $model->id }}/edit" class="btn btn-outline-secondary">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    </div>
                    <div class="col">
                    <form action="/RecipeIngredient/{{ $model->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
@endsection
