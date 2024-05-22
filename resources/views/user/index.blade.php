@extends('main')

@section('title', 'All users')

@section('menu')
    <a class="btn btn-outline-secondary" href="/Recipe/create">Add new user</a>
    <a class="btn btn-outline-secondary" href="/">Home</a>
@endsection

@section('content')
<div class="container mt-4">
    <div class="row gy-3">
        @foreach($models as $model)
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $model->name }}</h5>
                    <p class="card-text">
                        <strong>Email:</strong> {{$model->email}}
                    </p>
                    <p class="card-text">
                        <strong>Password:</strong> {{$model->password}}
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
                    <a href="/Recipe/{{ $model->id }}/edit" class="btn btn-outline-secondary">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="/Recipe/{{ $model->id }}" method="POST">
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
