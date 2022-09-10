@extends('master')
@section('main')
@include('components.outlets.modal')
<div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h3 class="text-light">Manage Outlets</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addOutletModal"><i
                class="bi-plus-circle me-2"></i>Add New Outlets</button>
          </div>
          <div class="card-body" id="show_all_outlets">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>
    </div>
    @push('script')
      @include('components.outlets.script')
      @include('components.outlets.map')
    @endpush
@endsection