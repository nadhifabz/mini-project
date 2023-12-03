@extends('layouts.main')
@section('content-header')
    <h1>Create New Company</h1>
@endsection
@section('content-body')
    <form action="/companies" method="POST">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="name" class="col-form-label">Company Name</label>
            </div>
            <div class="col">
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
            </div>
            
          </div>
          <div class="col">
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
          </div>
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="email" class="col-form-label">Email</label>
            </div>
            <div class="col">
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror">
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
            <div class="col">
                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="2"></textarea>
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
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @endsection
