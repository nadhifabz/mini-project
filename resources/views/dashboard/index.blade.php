@extends('layouts.main')
@section('content-header')
    Welcome!
@endsection

@section('content-body')
        <div class="card">
            <div class="card-body">
                <h6>Menu CRUD Company</h6>
                <a href="/companies" class="btn btn-primary">Click here</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6>Menu CRUD Employee</h6>
                <a href="/employees" class="btn btn-primary">Click here</a>
            </div>
        </div>
@endsection
