@extends('layouts.app')

@section("content")
    <div class="container">
        @if(session('message'))
            <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @admin
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('models.create') }}"> Add New Car Mark</a>
        </div>
        @endadmin
        <div class="container">
            <div class="row g-4 mt-1">
                <h2 class="text-center mx-auto">Models</h2>
                @foreach($models as $model)
                    <div class="col-lg-4">
                        <div class="card shadow h-auto" style="width: 250px">
                            <a href="/models/{{$model->id}}">
                                <img src="{{ asset('storage/images/'.$model->image) }}" class="card-img-top img-fluid">
                            </a>
                            <div class="card-title fw-bold text-primary h4">{{ $model->model_name }}</div>
                            <p class="text-secondary">{{ Str::limit($model->description, 100) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
