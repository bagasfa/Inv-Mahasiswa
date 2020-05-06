@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Jurusan";
  document.getElementById('jurusan').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" action="{{url('jurusan/search')}}" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Fakultas">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
          </div>
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah jurusan</button>
          </div>

          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col" width="100px"><center>#</center></th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                @forelse($data as $key => $jurusan)
                <tr>
                  <td align="center">{{ $data->firstItem() + $key }}</td>
                  <td>@foreach($fakultas as $f)
                        @if($f->id == $jurusan->id_fakultas)
                          {{ $f->nama_fakultas }}
                        @endif
                      @endforeach
                  </td>
                  <td>{{ $jurusan->nama_jurusan }}</td>
                  <td align="center">
                    <a href="{{url('jurusan/'.$jurusan->id. '/edit')}}">
                      <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Edit">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                    &nbsp;
                    <a href="{{url('jurusan/'.$jurusan->id. '/delete')}}">
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
            <div class="pull-right">{{ $data->links() }}</div>
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
            <h5 class="modal-title" id="DataLabel">Tambah Data Jurusan</h5>
          </div>
          <div class="modal-body">
        <form action="{{url('/jurusan/add')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputFakultas">Nama Fakultas <i style="color: red;">*</i></label><br>
            <select name="id_fakultas" class="form-control" required="">
              <option value="" hidden="">-- Pilih Jurusan --</option>
              @foreach($fakultas as $f)
              <option value="{{$f->id}}">{{$f->nama_fakultas}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="inputNamaJurusan">Nama Jurusan <i style="color: red;">*</i></label>
            <input name="nama_jurusan" type="text" class="form-control" id="inputNamaJurusan" placeholder="Nama Jurusan" required="">
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
    
@endsection()