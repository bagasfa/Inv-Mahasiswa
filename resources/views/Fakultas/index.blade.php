@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Fakultas";
  document.getElementById('fakultas').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Fakultas</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Fakultas" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
          </div>
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Fakultas</button>
            &nbsp;
            <button type="button" data-toggle="modal" data-target="#importData" class="btn btn-success"><i class="fas fa-file-import"></i> Import Fakultas</button>
          </div>
          <div class="counter">
            <b>Total Fakultas</b> : {{$counter}}
          </div>

          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col" width="100px"><center>@sortablelink('id','#')</center></th>
                  <th scope="col">@sortablelink('nama_fakultas','Nama Fakultas')</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $key => $fakultas)
                <tr>
                  <td align="center">{{ $data->firstItem() + $key }}</td>
                  <td>{{ $fakultas->nama_fakultas }}</td>
                  <td align="center">
                    <a href="{{url('fakultas/'.$fakultas->id. '/edit')}}">
                      <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Edit">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                    &nbsp;
                    <a href="{{url('fakultas/'.$fakultas->id. '/delete')}}">
                      <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="right" title="Hapus">
                        <i class="fas fa-trash"></i>
                      </button>
                    </a>
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{!! $data->appends(request()->except('page'))->render() !!}</div>
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
    <div class="modal hide fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addData" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel">Tambah Data Fakultas</h5>
          </div>
          <div class="modal-body">
            <form action="{{url('/fakultas/add')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              <label for="inputNamaFakultas">Nama Fakultas <i style="color: red;">*</i></label>
              <input name="nama_fakultas" type="text" class="form-control" id="inputNamaFakultas" placeholder="Nama Fakultas" required="">
              <br>
              <span style="font-size: 12px;"><i style="color: red;"> * </i> : Data harus terisi</span>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->

    <!-- Modal Import -->
    <div class="modal hide fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel">Import Data Fakultas (Excel)</h5>
          </div>
          <div class="modal-body">
            <form action="{{url('/fakultas/import')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
              <input id="upload" type="file" accept=".xls, .xlsx" name="file" class="form-control">
              <label id="upload-label" for="upload" class="font-weight-light text-muted">Format File Wajib .xls / .xlsx</label>
              <div class="input-group-append" style="margin-top: 5px;">
                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2"></i><small style="font-size: 14px;" class="text-bold">Pilih File</small></label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Import -->

@endsection()