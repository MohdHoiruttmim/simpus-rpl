@extends('layouts.user_type.auth')

@section('content')

<div>
  <div class="row">
    <div class="col-6">
      <form class="card p-4">
        <h3>Register</h3>
        <div class="form-group">
          <label for="example-text-input" class="form-control-label">Nama</label>
          <input class="form-control" type="text" id="example-text-input">
        </div>
        <div class="form-group">
          <label for="example-text-input" class="form-control-label">Username</label>
          <input class="form-control" type="text" id="example-text-input">
        </div>
        <div class="form-group">
          <label for="example-email-input" class="form-control-label">Email</label>
          <input class="form-control" type="email" id="example-email-input">
        </div>
        <div class="form-group">
          <label for="example-tel-input" class="form-control-label">No. Telp</label>
          <input class="form-control" type="tel" value="40-(770)-888-444" id="example-tel-input">
        </div>
        <label for="gender">Gender</label>
        <div class="form-group d-flex">
          <div class="form-check me-2">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
            <label class="custom-control-label" for="customRadio1">Pria</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
            <label class="custom-control-label" for="customRadio2">Wanita</label>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Role</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>
        <div class="form-group">
          <label for="example-password-input" class="form-control-label">Password</label>
          <input class="form-control" type="password" id="example-password-input">
        </div>
        <div class="col">
          <button class="btn btn-success me-2" type="submit">Save</button>
          <a href="{{ route('user-management') }}" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection