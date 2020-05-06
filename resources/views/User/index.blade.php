@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="User";
  document.getElementById('user').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>User</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari User" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
          </div>
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</button>
          </div>

          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr align="center">
                  <th scope="col" width="100px"><center>#</center></th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nama User</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Password</th>
                  <th scope="col">Role</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                @forelse($user as $key => $u)
                <tr>
                  <td align="center">{{ $user->firstItem() + $key }}</td>
                  <td style="padding-top: 10px; padding-bottom: 10px;" align="center">
                    @if($u->foto == !NULL)
                      <a href="{{url('uploads/user/'.$u->foto)}}" class="zoom">
                        <img src="{{url('uploads/user/'.$u->foto)}}" class="rounded-circle mr-1" width="100px" height="100px">
                      </a>
                    @else
                      <a href="{{ asset('assets/img/avatar/avatar-3.png') }}" class="zoom">
                        <img src="{{ asset('assets/img/avatar/avatar-3.png') }}" class="rounded-circle mr-1" width="100px" height="100px">
                      </a>
                    @endif
                  </td>
                  <td>{{ $u->nama_user }}</td>
                  <td>{{ $u->email }}</td>
                  <td align="center">Ter-Enkripsi</td>
                  <td align="center">{{ $u->role }}</td>
                  <td align="center">
                    <a href="{{url('user/'.$u->id. '/edit')}}">
                      <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Edit">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                    &nbsp;
                    <a href="{{url('user/'.$u->id. '/delete')}}">
                      <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="right" title="Hapus">
                        <i class="fas fa-trash"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{ $user->links() }}</div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
    </div>  
  </div>
</section>

<!-- Modal -->
    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addData" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel">Tambah User</h5>
          </div>
          <div class="modal-body">
        <form action="{{url('/user/add')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputNama">Nama Lengkap <i style="color: red;">*</i></label>
            <input name="nama_user" type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap" required="">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email <i style="color: red;">*</i></label>
            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="E-Mail" required="">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password <i style="color: red;">*</i></label>
            <div class="input-group" id="show_hide_password">
              <input name="password" type="password" minlength="8" class="form-control" id="inputPassword" placeholder="Password" required="">
              <a href=""><div class="input-group-addon eye">
                <i class="fa fa-eye-slash" aria-hidden="true"></i>
              </div></a>
            </div>
        </div>
        <div class="form-group">
            <label for="inputRole">Role <i style="color: red;">*</i></label>
            <select class="form-control" name="role" required="">
                <option value="" hidden="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select>
        </div>
        <!-- Upload image input-->
        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
          <input id="upload" type="file" accept=".jpg, .jpeg, .png" name="foto" onchange="readURL(this);" class="form-control">
          <label id="upload-label" for="upload" class="font-weight-light text-muted">Upload Foto disini ...</label>
          <div class="input-group-append">
            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2"></i><small style="font-size: 12px;" class="text-bold">Pilih Foto</small></label>
            </div>
          </div>

        <!-- Uploaded image area-->
        <p class="font-italic text-center">Gambar preview akan ditampilkan dibawah</p>
        <div class="image-area mt-4"><img id="imageResult" src="#" alt="" width="300px" height="300px" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

        <br>
        <span style="font-size: 12px;"><i style="color: red;"> * </i> : Data harus terisi</span>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal -->

@endsection()