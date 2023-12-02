@extends('layouts.main')

@section('content-header')
@if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
@endsection
@section('content-body')
<form action="/companies/{{ $company->id }}" method="POST">
    @method('patch')
    @csrf
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="name" class="col-form-label">Company Name</label>
        </div>
        <div class="col-6">
            <input type="text" id="name" name="name" class="form-control" value="{{ $company->name }}">
        </div>
        {{-- <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Must be 8-20 characters long.
          </span>
        </div> --}}
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="email" class="col-form-label">Email</label>
        </div>
        <div class="col-6">
            <input type="email" id="email" name="email" class="form-control" value="{{ $company->email }}">
        </div>
        {{-- <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Must be 8-20 characters long.
          </span>
        </div> --}}
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="address" class="col-form-label">Address</label>
        </div>
        <div class="col-6">
            <textarea class="form-control" name="address" id="address" rows="2">{{ $company->address }}</textarea>
        </div>
        {{-- <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Must be 8-20 characters long.
          </span>
        </div> --}}
    </div>
    <div class="col gap-2">
        <a href="/companies" class="btn btn-warning">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection