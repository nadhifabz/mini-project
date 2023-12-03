@extends('layouts.main')
@section('content-header')
    <h1>Welcome!</h1>
    {{-- {{ $current_token }} --}}
@endsection
@section('content-body')
    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="mb-2">
                    <a href="/companies/create" class="btn btn-success">Create New Company</a>
                </div>
                <table class="table" id="companyTable">

                    <thead>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        {{-- @foreach ($companies as $index => $company)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->address }}</td>
                                <td>
                                    <div class="gap-2">
                                        <a href="/companies/{{ $company->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="/companies/{{ $company->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let table = $('#companyTable').DataTable({
                scrolX: true,
                processing: true,
                serverside: true,
                autoWidth: false,
                ajax: {
                    url: "/companies/list",
                    type: 'GET',
                    dataSrc: ''
                },
                
                // columns: [
                //     {data: 'id', name: 'id', orderable: false, searchable: false},
                //     {data: 'name', name: 'name'},
                //     {data: 'email', name: 'email'},
                //     {data: 'address', name: 'address'},
                //     {data: 'action', name: 'action', orderable: false, searchable: false},
                // ]
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'address'
                    },
                    // {data: 'action'},
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                order: [
                    [1, 'asc']
                ],
            });

            table.on('order.dt search.dt', function() {
                let i = 1;
                table
                    .cells(null, 0, {
                        search: 'applied',
                        order: 'applied'
                    })
                    .every(function(cell) {
                        this.data(i++);
                    });
            }).draw();
        });
    </script>
@endpush
