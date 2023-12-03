@extends('layouts.main')
@section('content-header')
    <h1>About {{ $company->name }}</h1>
@endsection
@section('content-body')
    <div class="card pt-1 ps-2 pb-2">
        <h5>Email : {{ $company->email }}</h5>
        <h5>Address : {{ $company->address }}</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum maxime placeat, excepturi, ipsa voluptatum id delectus veritatis natus fuga eligendi velit unde minus! Veritatis voluptate cum, nemo voluptatum laborum ipsam earum. Doloremque vero deleniti ducimus, enim harum aliquam hic sint quidem, a, fugit ut. Nam culpa illo non itaque ducimus omnis unde officia ratione, saepe, fuga ab nulla. Atque reiciendis fuga saepe veritatis repellendus, totam et optio aperiam. Voluptatem pariatur excepturi expedita nemo totam facere. Suscipit error aliquid perferendis amet maxime nemo cum voluptas est, possimus ex natus voluptate reiciendis quia iusto repellat explicabo enim ratione provident, ut distinctio non!</p>
        <div class="row">
            <div class="col gap-2">
                <a href="/companies" class="btn btn-warning">Back</a>
                <a href="/companies/{{ $company->id }}/edit" class="btn btn-success">Edit</a>
                <form action="/companies/{{ $company->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
