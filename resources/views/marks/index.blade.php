@extends("layouts.app")
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Car Mark</h2>
                </div>
                @admin
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('marks.create') }}"> Add New Car Mark</a>
                </div>
                @endadmin
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Mark</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($marks as $mark)
                <tr>

                    <td>{{$mark->id}}</td>
                    <td>{{ $mark->mark }}</td>
                    <td>
                        @admin
                        <form action="{{ route('marks.destroy', ['mark' => $mark]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            @endadmin
                            <div class="pull-right mb-2">
                                <a class="btn btn-info" href="/marks/{{$mark->id}}"> See Models</a>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $marks->links() !!}
    </div>
@endsection
