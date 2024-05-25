@extends('main')

@section('menu')
<a class="btn btn-outline-secondary" href="/users">Back</a>
@endsection

@section('content')
<div class="container mt-5">
    <h1>New User</h1>
    <form method="POST" action="/users/add-to-db">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $model->name) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cooking_time" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email', $model->email) }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cooking_time" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" value="{{ old('password', $model->password) }}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-secondary">Create</button>
    </form>
</div>
<br>
@endsection