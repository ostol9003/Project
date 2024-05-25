@extends('main')

@section('menu')
<a class="btn btn-outline-secondary" href="/recipe-ingredient">Back</a>
@endsection

@section('content')
<div class="container mt-5">
    <h1>Edit Recipe ingredient</h1>
    <form method="POST" action="/recipe-ingredient/update/{{$model->id}}">
        @csrf
        <div class="row">
    <div class="col-md-6 mb-3">
        <span class="form-label">Recipe ID</span>
        <input type="text" class="form-control" name="recipe_id" value="{{ $model->recipe_id }}" disabled>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <span class="form-label">Ingredient ID</span>
        <input type="text" class="form-control" name="ingredient_id" value="{{ $model->ingredient_id }}" disabled>
    </div>
</div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cooking_time" class="form-label">Quantity</label>
                <input type="text" class="form-control" name="quantity" value="{{ old('quantity', $model->quantity) }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cooking_time" class="form-label">Unit</label>
                <input type="text" class="form-control" name="unit" value="{{ old('unit', $model->unit) }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-secondary">Update</button>
    </form>
</div>
<br>
@endsection