@extends('layouts.app')
@section('content')

    <div class="row my-3">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h3 class="text-light fw-bold">Edit Model</h3>
                </div>
                <div class="card-body p-4">
                    <form action="/models/{{ $car->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="my-2">
                            <input type="text" name="model_name" id="model_name" class="form-control" placeholder="Model" value="{{ $car->model_name }}" required>
                        </div>

                        <div class="my-2">
                            <input type="file" name="image" id="image" accept="image/*" class="form-control">
                        </div>

                        <img src="{{ asset('storage/images/'.$car->image) }}" class="img-fluid img-thumbnail" width="150">

                        <div class="my-2">
                            <textarea name="description" id="description" rows="6" class="form-control" placeholder="Description" required>{{ $car->description }}</textarea>
                        </div>

                        <div class="my-2">
                            <input type="submit" value="Update Model" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
