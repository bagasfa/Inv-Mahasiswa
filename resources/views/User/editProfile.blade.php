@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Profile";
</script>
<section class="section">
  
  <div class="section-header">
    <h1>
      Update Profile
    </h1>
  </div>
  <center>
  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-body text-center">
            <div class="form-group">
                Bergabung sejak {{ auth()->user()->created_at->diffForHumans() }}
              </div>
            <form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <!-- Foto -->
              <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" name="foto" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                @if(auth()->user()->foto == !NULL)
                  <a href="{{ asset('uploads/user/'.auth()->user()->foto) }}" class="zoom">
                @else
                  <a href="{{ asset('assets/img/avatar/avatar-3.png') }}" class="zoom">
                @endif
                  <div class="avatar-preview">
                    @if(auth()->user()->foto == !NULL)
                      <div id="imagePreview" style="background-image: url('{{url('uploads/user/'.auth()->user()->foto)}}');"></div>
                    @else
                      <div id="imagePreview" style="background-image: url('{{url('assets/img/avatar/avatar-3.png')}}');"></div>
                    @endif
                  </div>
                </a>
              </div>
              
              <!-- Nama Lengkap -->
              <div class="form-group profile-input">
                <label for="inputNama">Nama Lengkap</label>
                <input name="nama_user" type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap" value="{{auth()->user()->nama_user}}" required="">
              </div>
              <div class="form-group profile-input">
                  <label for="inputEmail">E-mail</label>
                  <input name="email" type="email" class="form-control" id="inputEmail" placeholder="E-Mail" value="{{auth()->user()->email}}" required="">
              </div>
              <br>
              <div class="form-group text-center">
                <a href="{{url('dashboard')}}">
                  <button type="button" class="btn btn-danger col-md-3 col-lg-3">BATAL</button>
                </a>
                <button type="submit" class="btn btn-primary col-md-3 col-lg-3">SIMPAN</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>
</center>
</section>
@endsection()