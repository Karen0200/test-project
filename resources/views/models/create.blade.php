@extends('layouts.app')
@section('content')
    <div class="row my-3">la
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h3 class="text-light fw-bold">Add New Car Model</h3>
                </div>
                <div class="card-body p-4">
                    <form action={{route("models.store")}} method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="text-center">
                            <h2>Select Car Mark</h2>
                                 <select class="form-select" id="mark_id" name="mark_id">
                                     <option disabled selected> -- select car mark-- </option>
                                     @foreach($allMarks as $mark)
                                         <option value="{{$mark->id}}" name="mark_id">{{$mark->mark}}</option>
                                     @endforeach
                                 </select>
                        </div>

                        <div class="my-2">
                            <input type="text" name="model_name" id="model_name"
                                   class="form-control @error('model_name') is-invalid @enderror" placeholder="Model"
                                   value="{{ old('model_name') }}">
                            @error('model_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-2">
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-2">
                            <textarea name="description" id="description" rows="6"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-2">
                            <input type="submit" value="Add New Model" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
