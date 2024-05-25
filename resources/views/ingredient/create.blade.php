@extends('main')

@section('menu')
<a class="btn btn-outline-secondary" href="/ingredients">Back</a>
@endsection

@section('content')
<div class="container mt-5">
    <h1>New ingredient</h1>
    <form method="POST" action="/ingredients/add-to-db">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$model->name}}" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Image url</label>
            <input type="text" class="form-control" name="url" value="{{$model->url}}" required>
        </div>
        <button type="submit" class="btn btn-outline-secondary" type="submit">Create</button>
    </form>
</div>
<br>
@endsection