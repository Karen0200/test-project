<style>
    .content{
        width: 400px;
        height: 450px;
    }
</style>

@extends('layouts.app')
@section('content')
    <div class="container   d-flex justify-content-center align-content-center">
        <div class="row my-4 ">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow content">
                <img src="{{ asset('storage/images/'.$car->image) }}" class="img-fluid card-img-top">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary">{{ $car->model_name }}</h3>
                    <hr>
                    <p class="fs-3">{{ $car->description }}</p>
                </div>
                @admin
                <div class="card-footer px-5 py-3 d-flex justify-content-end">
                    <a href="/models/{{$car->id}}/edit" class="btn btn-success rounded-pill me-2">Edit</a>
                    <form action="/models/{{$car->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
                    </form>
                </div>
                @endadmin
            </div>
        </div>
        </div>
    </div>
@endsection
