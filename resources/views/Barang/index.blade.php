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
                <tr align="center">
                  <th scope="col" width="100px"><center>#</center></th>
                  <th scope="col">Foto Barang</th>
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
                  <td style="padding-top: 10px; padding-bottom: 10px;" align="center">
                    @if($b->foto == !NULL)
                      <a href="{{url('uploads/barang/'.$b->foto)}}" class="zoom">
                        <img src="{{url('uploads/barang/'.$b->foto)}}" class="img-fluid rounded shadow-sm mx-auto d-block" width="100px" height="100px">
                      </a>
                    @else
                      <a href="{{ asset('assets/img/avatar/barang.png') }}" class="zoom">
                        <img src="{{ asset('assets/img/avatar/barang.png') }}" class="img-fluid rounded shadow-sm mx-auto d-block" width="100px" height="100px">
                      </a>
                    @endif
                  </td>
                  <td align="center">{{ $b->ruangan->nama_ruangan }}</td>
                  <td>{{ $b->nama_barang }}</td>
                  <td align="center">{{ $b->total }}</td>
                  <td align="center">{{ $b->broken }}</td>
                  <td>@foreach($user as $u)
                        @if($u->id == $b->created_by)
                          {{ $u->nama_user }}
                        @endif
                      @endforeach
                  </td>
                  <td>
                    @if($b->updated_by == !NULL)
                      @foreach($user as $u)
                        @if($u->id == $b->updated_by)
                          {{ $u->nama_user }}
                        @endif
                      @endforeach
                    @else
                      ---
                    @endif
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
        <form action="{{url('/barang/add')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputJurusan">Ruangan <i style="color: red;">*</i></label><br>
            <select name="id_ruangan" class="form-control" required="">
              <option value="" hidden="">-- Pilih Ruangan --</option>
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
        <!-- Upload image input-->
        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
          <input id="upload" type="file" name="foto" accept=".jpg, .jpeg, .png" onchange="readURL(this);" class="form-control">
          <label id="upload-label" for="upload" class="font-weight-light text-muted">Upload Foto disini ...</label>
          <div class="input-group-append">
            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2"></i><small style="font-size: 12px;" class="text-bold">Pilih Foto</small></label>
            </div>
          </div>

        <!-- Uploaded image area-->
        <p class="font-italic text-center">Gambar preview akan ditampilkan dibawah</p>
        <div class="image-area mt-4"><img id="imageResult" src="#" alt="" width="300px" height="300px" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

        <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
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