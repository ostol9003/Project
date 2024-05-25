@extends('main')

@section('menu')
<a class="btn btn-outline-secondary" href="/recipes">Back</a>
@endsection

@section('content')
<div class="container mt-5">
    <h1>New Recipe</h1>
    <form method="POST" action="recipes/add-to-db">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $model->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{ old('description', $model->description) }}" required>
        </div>
        <div class="mb-3">
            <label for="cooking_time" class="form-label">Cooking Time</label>
            <input type="text" class="form-control" name="cooking_time" value="{{ old('cooking_time', $model->cooking_time) }}" required>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="categories" class="form-label">Categories</label>
            <select class="form-control" name="categories[]" multiple required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            @foreach($ingredients as $ingredient)
            <div class="form-check">
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
        <button type="submit" class="btn btn-outline-secondary">Create</button>
    </form>
</div>
<br>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.ingredient-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const isChecked = checkbox.checked;
                const quantityInput = checkbox.closest('.form-check').querySelector('.ingredient-quantity');
                const unitInput = checkbox.closest('.form-check').querySelector('.ingredient-unit');
                quantityInput.disabled = !isChecked;
                unitInput.disabled = !isChecked;
            });
        });
    });
</script>
@endsection
