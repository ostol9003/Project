@extends('main')

@section('title', 'Recipe category')

@section('menu')
    <a class="btn btn-outline-secondary" href="/RecipeCategory/create">Add new recipe category</a>
    <a class="btn btn-outline-secondary" href="/">Home</a>
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
                        <strong>Category ID:</strong> {{ $model->category_id }}
                    </p>
                    <p class="card-text">
                        <strong>Status:</strong> {{ $model->is_active ? 'Active' : 'Inactive' }}
                    </p>
                    <p class="card-text">
                        <strong>Created At:</strong> {{ $model->created_at->format('Y-m-d') }}
                    </p>
                    <p class="card-text">
                        <strong>Updated At:</strong> {{ $model->updated_at->format('Y-m-d') }}
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="/RecipeCategory/{{ $model->id }}/edit" class="btn btn-outline-secondary">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="/RecipeCategory/{{ $model->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
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
