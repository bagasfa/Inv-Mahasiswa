@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Ruangan";
  document.getElementById('ruangan').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Ruangan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Ruangan" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
          </div>
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Ruangan</button>
          </div>

          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col" width="100px"><center>#</center></th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Nama Ruangan</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                @forelse($ruangan as $key => $r)
                <tr>
                  <td align="center">{{ $ruangan->firstItem() + $key }}</td>
                  <td>{{ $r->jurusan->nama_jurusan }}</td>
                  <td>{{ $r->nama_ruangan }}</td>
                  <td align="center">
                    <a href="{{url('ruangan/'.$r->id. '/edit')}}">
                      <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Edit">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                    &nbsp;
                    <a href="{{url('ruangan/'.$r->id. '/delete')}}">
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
            <div class="pull-right">{{ $ruangan->links() }}</div>
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
            <h5 class="modal-title" id="DataLabel">Tambah Data Ruangan</h5>
          </div>
          <div class="modal-body">
        <form action="{{url('/ruangan/add')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputJurusan">Nama Jurusan <i style="color: red;">*</i></label><br>
            <select name="id_jurusan" class="form-control" required="">
              @foreach($jurusan as $j)
              <option value="{{$j->id}}">{{$j->nama_jurusan}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="inputRuangan">Nama Ruangan <i style="color: red;">*</i></label>
            <input name="nama_ruangan" type="text" class="form-control" id="inputRuangan" placeholder="Nama Ruangan" required="">
        </div>
        <br>
        <span style="font-size: 12px;"><i style="color: red;"> * </i> : Data harus terisi</span>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal -->  
  </div>
</section>
@endsection()