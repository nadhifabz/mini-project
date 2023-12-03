@extends('layouts.main')
@section('content-header')
<h1>Update Employee</h1>
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection
@section('content-body')
    <form action="/employees/{{ $employee->id }}" method="POST">
        @method('put');
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="first_nm" class="col-form-label">First Name</label>
            </div>
            <div class="col-4">
                <input type="text" id="first_nm" name="first_nm"
                    class="form-control @error('first_nm') is-invalid @enderror" value="{{ $employee->first_nm }}">
                    @error('first_nm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="col-2">
                <label for="last_nm" class="col-form-label">Last Name</label>
            </div>
            <div class="col-4">
                <input type="text" id="last_nm" name="last_nm" class="form-control" value="{{ $employee->last_nm }}">
                @error('last_nm')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="company_id" class="col-form-label">Company</label>
            </div>
            <div class="col">
                <select name="company_id" id="company_id" class="form-control">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $employee->id == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="email" class="col-form-label">Email</label>
            </div>
            <div class="col">
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $employee->email }}">
                @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="phone" class="col-form-label">Phone</label>
            </div>
            <div class="col">
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    id="phone" value="{{ $employee->phone }}">
                @error('phone')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <a href="/employees" class="btn btn-warning">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
