@extends('main')

@section('title', 'recipe ingredient')

@section('menu')
    <a class="btn btn-primary" href="/RecipeIngredient/create">Add new recipe ingredient</a>
@endsection

@section('content')
<div class="container mt-4">
    <div class="row gy-3">
        @foreach($models as $model)
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $model->id }}</h5>
                    <p class="card-text">
                        <strong>Recipe ID:</strong> {{ $model->recipe_id }}
                    </p>
                    <p class="card-text">
                        <strong>Ingredient ID:</strong> {{ $model->ingredient_id }}
                    </p>
                    <p class="card-text">
                        <strong>Quantity:</strong> {{ $model->quantity }}
                    </p>
                    <p class="card-text">
                        <strong>Unit:</strong> {{ $model->unit }}
                    </p>
                    <p class="card-text">
                        <strong>Status:</strong> {{ $model->is_active ? 'Active' : 'Inactive' }}
                    </p>
                    <p class="card-text">
                        <strong>Created At:</strong> {{ $model->created_at->format('d M Y') }}
                    </p>
                    <p class="card-text">
                        <strong>Updated At:</strong> {{ $model->updated_at->format('d M Y') }}
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="/RecipeIngredient/{{ $model->id }}/edit" class="btn btn-primary">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="/RecipeIngredient/{{ $model->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
