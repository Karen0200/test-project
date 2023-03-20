<style>

    .img_div {
        width: 400px;
        height: 450px;
    }

</style>
@extends("layouts.app")
@section("content")
    <div class="container d-flex justify-content-center align-content-center">
        @foreach($cars as $item)

            <div class="row my-4">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow img_div">
                        <img src="{{ asset('storage/images/'.$item->image) }}" class="img-fluid card-img-top">
                        <div class="card-body">
                            <h3 class="fw-bold text-primary">{{ $item->model_name }}</h3>
                            <hr>
                            <p class="fs-3">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
@endsection
