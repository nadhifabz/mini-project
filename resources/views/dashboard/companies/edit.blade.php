@extends('layouts.main')

@section('content-header')
    <h1>Update Company</h1>
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
        </div>
        @error('name')
            <div class="row g-3 align-items-center">
                <div class="col-2"></div>
                <div class="col">
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="email" class="col-form-label">Email</label>
            </div>
            <div class="col-6">
                <input type="email" id="email" name="email" class="form-control" value="{{ $company->email }}">
            </div>
        </div>
        @error('email')
            <div class="row g-3 align-items-center">
                <div class="col-2"></div>
                <div class="col">
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="address" class="col-form-label">Address</label>
            </div>
            <div class="col-6">
                <textarea class="form-control" name="address" id="address" rows="2">{{ $company->address }}</textarea>
            </div>
        </div>
        @error('address')
            <div class="row g-3 align-items-center">
                <div class="col-2"></div>
                <div class="col">
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror
        <div class="col gap-2">
            <a href="/companies" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
