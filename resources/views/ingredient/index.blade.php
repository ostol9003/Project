@extends('main')

@section('title', 'Ingredients')

@section('menu')
    <a class="btn btn-outline-secondary" href="/ingredients/create">New ingredient</a>
@endsection

@section('content')
<div class="container mt-4">
    <div class="row gy-3">
        @foreach($models as $model)
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card" style="width: 18rem;">
                <img src="{{$model->url}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{ $model->name}}</h5>
                </div>
                <ul class="list-group list-group-flush">

                <li class="list-group-item"><strong>Ingredient ID:</strong> {{ $model->id}}</li>
              
                    <li class="list-group-item"><strong>Status:</strong> {{ $model->is_active ? 'Active' : 'Inactive' }}</li>
                    <li class="list-group-item"><strong>Created At:</strong> {{ $model->created_at->format('d M Y') }}</li>
                    <li class="list-group-item"><strong>Updated At:</strong> {{ $model->updated_at->format('d M Y') }}</li>
                </ul>
                <div class="card-body row">
                    <div class="col">
                    <form>
                        <a href="/ingredients/edit/{{$model->id}}" class="btn btn-outline-secondary">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        </form>
                    </div>
                    <div class="col">
                    @csrf
                            <form method="post" action="/ingredients/delete/{!! $model->id !!}">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
@endsection
