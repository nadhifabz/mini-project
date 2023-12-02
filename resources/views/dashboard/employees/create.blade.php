@extends('layouts.main')
@section('content-body')
    <form action="/employees" method="POST">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="first_nm" class="col-form-label">First Name</label>
            </div>
            <div class="col-4">
                <input type="text" id="first_nm" name="first_nm" class="form-control">
            </div>
            <div class="col-2">
                <label for="last_nm" class="col-form-label">Last Name</label>
            </div>
            <div class="col-4">
                <input type="text" id="last_nm" name="last_nm" class="form-control">
            </div>
            {{-- <div class="col-auto">
              <span id="passwordHelpInline" class="form-text">
                Must be 8-20 characters long.
              </span>
            </div> --}}
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="company_id" class="col-form-label">Company</label>
            </div>
            <div class="col">
                <select name="company_id" id="company_id" class="form-control">
                  @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                  @endforeach
                </select>
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
            <div class="col">
                <input type="email" id="email" name="email" class="form-control">
            </div>
            {{-- <div class="col-auto">
              <span id="passwordHelpInline" class="form-text">
                Must be 8-20 characters long.
              </span>
            </div> --}}
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="phone" class="col-form-label">Phone</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="phone" id="phone">
            </div>
            {{-- <div class="col-auto">
              <span id="passwordHelpInline" class="form-text">
                Must be 8-20 characters long.
              </span>
            </div> --}}
        </div>
        <a href="/employees" class="btn btn-warning">Back</a>
        <input type="submit" class="btn btn-primary" value="Create">
    </form>
    @endsection
