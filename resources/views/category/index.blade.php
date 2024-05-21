@extends('main')

@section('title')
Categories
@endsection

@section('menu')
    <a class="btn btn-primary" href="/Category/create">Add new category</a>
    <a class="btn btn-primary" href="/">Home</a>
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
                        <strong>Status:</strong> {{ $model->is_active ? 'Active' : 'Inactive' }}
                    </p>
                    <p class="card-text">
                        <strong>Created At:</strong> {{ $model->created_at}}
                    </p>
                    <p class="card-text">
                        <strong>Updated At:</strong> {{ $model->updated_at }}
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="/Category/{{ $model->id }}/edit" class="btn btn-primary">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="/Category/{{ $model->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
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
