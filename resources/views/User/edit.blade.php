@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Edit User";
  document.getElementById('user').classList.add('active');
</script>
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
            <form action="{{ url('/user/'.$user->id.'/update') }}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
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
                    <a href=""><div class="input-group-addon eye">
                      <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </div></a>
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
              <!-- Upload image input-->
              <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" name="foto" onchange="readURL(this);" class="form-control">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Upload Foto disini ...</label>
                <div class="input-group-append">
                  <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2"></i><small style="font-size: 12px;" class="text-bold">Pilih Foto</small></label>
                  </div>
                </div>

              <!-- Uploaded image area-->
              <p class="font-italic text-center">Gambar preview akan ditampilkan dibawah</p>
              <div class="image-area mt-4">
                @if($user->foto == NULL)
                  <img id="imageResult" src="#" alt="" width="300px" height="300px" class="img-fluid rounded shadow-sm mx-auto d-block">
                @else
                  <a href="{{url('uploads/user/'.$user->foto)}}" class="zoom">
                    <img id="imageResult" src="{{url('uploads/user/'.$user->foto)}}" alt="" width="300px" height="300px" class="img-fluid rounded shadow-sm mx-auto d-block">
                  </a>
                @endif
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