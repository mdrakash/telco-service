@extends('master')
@section('main')
@include('components.users.modal')
<div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h3 class="text-light">Manage Users</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addUserModal"><i
                class="bi-plus-circle me-2"></i>Add New User</button>
          </div>
          <div class="card-body" id="show_all_users">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>
    </div>
    @push('script')
      @include('components.users.script')
    @endpush
@endsection