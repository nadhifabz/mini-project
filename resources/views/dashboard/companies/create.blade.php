@extends('layouts.main')
@section('content-body')
    <form action="/companies" method="POST">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-2">
                <label for="name" class="col-form-label">Company Name</label>
            </div>
            <div class="col-auto">
                <input type="text" id="name" name="name" class="form-control">
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
            <div class="col-auto">
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
                <label for="address" class="col-form-label">Address</label>
            </div>
            <div class="col-auto">
                <textarea class="form-control" name="address" id="address" cols="30" rows="2"></textarea>
            </div>
            {{-- <div class="col-auto">
              <span id="passwordHelpInline" class="form-text">
                Must be 8-20 characters long.
              </span>
            </div> --}}
        </div>
        <input type="submit" class="btn btn-primary" value="Create">
    </form>
    @endsection
