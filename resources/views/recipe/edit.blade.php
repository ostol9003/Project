@extends('main')

@section('menu')
<a class="btn btn-outline-secondary" href="/recipes">Back</a>
@endsection

@section('content')
<div class="container mt-5">
    <h1>Edit Recipe</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/recipes/update/{{$model->id}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <div class="input-group">
                <input type="text" class="form-control" name="title" value="{{ old('title', $model->title) }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <input type="checkbox" class="form-check-input" name="is_promoted" id="is_promoted">
                        <label class="form-check-label" for="is_promoted">  Promoted  </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Image url</label>
            <input type="text" class="form-control" name="url" value="{{$model->url}}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cooking_time" class="form-label">Cooking Time</label>
                <input type="text" class="form-control" name="cooking_time" value="{{ old('cooking_time', $model->cooking_time) }}" required>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4" required>{{ old('description', $model->description) }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="categories" class="form-label">Category</label>
                <select class="form-select form-control" name="categories[]" multiple required style="height: 100%;">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            @foreach($ingredients as $ingredient)
            <div class="form-check mb-2">
                <input class="form-check-input ingredient-checkbox" type="checkbox" name="ingredients[{{ $ingredient->id }}][checked]" id="ingredient-{{ $ingredient->id }}">
                <label class="form-check-label" for="ingredient-{{ $ingredient->id }}">
                    {{ $ingredient->name }}
                </label>
                <div class="input-group mt-2">
                    <input type="number" class="form-control ingredient-quantity" name="ingredients[{{ $ingredient->id }}][Quantity]" placeholder="Quantity" disabled>
                    <input type="text" class="form-control ingredient-unit" name="ingredients[{{ $ingredient->id }}][Unit]" placeholder="Unit" disabled>
                </div>
            </div>
            @endforeach
        </div>
        
        <button type="submit" class="btn btn-outline-secondary">Update</button>
    </form>
</div>
<br>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.ingredient-checkbox').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const isChecked = this.checked;
                const quantityInput = this.closest('.form-check').querySelector('.ingredient-quantity');
                const unitInput = this.closest('.form-check').querySelector('.ingredient-unit');
                quantityInput.disabled = !isChecked;
                unitInput.disabled = !isChecked;
                if (!isChecked) {
                    quantityInput.value = '';
                    unitInput.value = '';
                }
            });
        });
    });
</script>
@endsection
