@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Barang";
  document.getElementById('barang').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Barang" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
          </div>
          @if(auth()->user()->role == "admin")
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang</button>&nbsp;
            <a href="{{url('/barang/exportXLSX')}}">
              <button type="button" class="btn btn-success"><i class="fa fa-print"></i> Export Barang</button>
            </a>
          </div>
          @endif
          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col" width="100px"><center>#</center></th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Total Barang</th>
                  <th scope="col">Barang Rusak</th>
                  <th scope="col">Dibuat</th>
                  <th scope="col">Diupdate</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                @forelse($barang as $key => $b)
                <tr>
                  <td align="center">{{ $barang->firstItem() + $key }}</td>
                  <td>{{ $b->ruangan->nama_ruangan }}</td>
                  <td>{{ $b->nama_barang }}</td>
                  <td>{{ $b->total }}</td>
                  <td>{{ $b->broken }}</td>
                  <td>@foreach($user as $u)
                        @if($u->id == $b->created_by)
                          {{ $u->nama_user }}
                        @endif
                      @endforeach
                  </td>
                  <td>@foreach($user as $u)
                        @if($u->id == $b->updated_by)
                          {{ $u->nama_user }}
                        @endif
                      @endforeach
                  </td>
                  <td align="center">
                    <a href="{{url('barang/'.$b->id. '/edit')}}">
                      <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                  @if(auth()->user()->role == "admin")
                    &nbsp;
                    <a href="{{url('barang/'.$b->id. '/delete')}}">
                      <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fas fa-trash"></i>
                      </button>
                    </a>
                  @endif
                </td>
                </tr>
                @empty
                <tr>
                  <td colspan="8"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{ $barang->links() }}</div>
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
            <h5 class="modal-title" id="DataLabel">Tambah Data Barang</h5>
          </div>
          <div class="modal-body">
        <form action="{{url('/barang/add')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputJurusan">Ruangan <i style="color: red;">*</i></label><br>
            <select name="id_ruangan" class="form-control" required="">
              @foreach($ruangan as $r)
              <option value="{{$r->id}}">{{$r->nama_ruangan}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="inputBarang">Nama Barang <i style="color: red;">*</i></label>
            <input name="nama_barang" type="text" class="form-control" id="inputBarang" placeholder="Nama Barang" required="">
        </div>
        <div class="form-group">
            <label for="inputTotal">Total Barang <i style="color: red;">*</i></label>
            <input name="total" type="number" min="1" class="form-control" id="inputTotal" placeholder="Total Barang" required="">
        </div>
        <div class="form-group">
            <label for="inputBroken">Barang Rusak <i style="color: red;">*</i></label>
            <input name="broken" type="number" min="0" class="form-control" id="inputBroken" placeholder="Barang Rusak" required="">
        </div>
            <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
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