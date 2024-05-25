@extends('main')

@section('menu')
<a class="btn btn-outline-secondary" href="/recipes">Back</a>
@endsection

@section('content')
<div class="container mt-5">
    <h1>New Recipe</h1>
    <form method="POST" action="{{ url('recipes/add-to-db') }}">
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
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" name="User_id" required>
                @foreach($users as $user)
                 <option value="{{ $user->Id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        </div>
        <button type="submit" class="btn btn-outline-secondary">Create</button>
    </form>
</div>
<br>
@endsection