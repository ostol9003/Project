@extends('main')

@section('menu')
<a class="btn btn-outline-secondary" href="/recipe-ingredient">Back</a>
@endsection

@section('content')
<div class="container mt-5">
    <h1>Create Recipe Ingredient</h1>

    <form method="POST" action="/recipe-ingredient/update/{{ $model->id }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="recipe_id" class="form-label">Recipe</label>
                <select class="form-select" name="recipe_id" required>
                    @foreach($recipes as $recipe)
                    <option value="{{ $recipe->id }}">
                        {{ $recipe->title }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="ingredient_id" class="form-label">Ingredient</label>
                <select class="form-select" name="ingredient_id" required>
                    @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}">
                        {{ $ingredient->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" class="form-control" name="quantity" value="{{ old('quantity', $model->quantity) }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="unit" class="form-label">Unit</label>
                <input type="text" class="form-control" name="unit" value="{{ old('unit', $model->unit) }}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-secondary">Create</button>
    </form>
</div>
<br>
@endsection