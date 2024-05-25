@extends('main')

@section('menu')
<a class="btn btn-outline-secondary" href="/categories">Back</a>
@endsection

@section('content')
<div class="container mt-5">
    <h1>Create Category</h1>
    <form method="POST" action="/categories/add-to-db">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="Name" value="{{$model->name}}" required>
        </div>
        <button type="submit" class="btn btn-outline-secondary" type="submit">Create</button>
    </form>
</div>
<br>
@endsection