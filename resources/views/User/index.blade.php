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
                <tr>
                  <th scope="col" width="100px"><center>#</center></th>
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
                  <td>{{ $u->nama_user }}</td>
                  <td>{{ $u->email }}</td>
                  <td>Ter-Enkripsi</td>
                  <td>{{ $u->role }}</td>
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

    <!-- Modal -->
    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addData" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel">Tambah User</h5>
          </div>
          <div class="modal-body">
        <form action="{{url('/user/add')}}" method="POST">
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
            <div class="input-group-addon eye">
              <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="form-group">
            <label for="inputRole">Role <i style="color: red;">*</i></label>
            <select class="form-control" name="role" required="">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select>
        </div>
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
  </div>
</section>
@endsection()