@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      User <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/user') }}"> 
              <button type="button" class="btn btn-outline-danger">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('/user/'.$user->id.'/update') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="inputNama">Nama Lengkap</label>
                <input name="nama_user" type="text" class="form-control" id="inputNama" value="{{$user->nama_user}}" required="">
                </div>
              <div class="form-group">
                  <label for="inputEmail">Email</label>
                  <input name="email" type="email" class="form-control" id="inputEmail" value="{{$user->email}}" required="">
              </div>
              <div class="form-group">
                  <label for="inputPassword">Password <i style="color: red;">*</i></label>
                  <div class="input-group" id="show_hide_password">
                    <input name="password" type="password" minlength="8" class="form-control" id="inputPassword" value="{{$user->password}}" required="">
                  <div class="input-group-addon eye">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputRole">Role</label>
                  <select class="form-control" name="role" required="">
                    @if($user->role == 'admin')
                      <option value="{{ $user->role }}" selected="">Admin</option>
                      <option value="staff">Staff</option>
                    @elseif($user->role == 'staff')
                      <option value="admin">Admin</option>
                      <option value="{{ $user->role }}" selected="">Staff</option>
                    @endif
                  </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()