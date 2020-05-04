@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Edit Barang";
  document.getElementById('barang').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>
      Barang <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/barang') }}"> 
              <button type="button" class="btn btn-outline-danger">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('/barang/'.$barang->id.'/update') }}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                <label>Ruangan</label><br>
                <select name="id_ruangan" class="form-control" required="">
                  @foreach($ruangan as $r)
                  <option value="{{ $r->id }}" {{ ($barang->id_ruangan == $r->id) ? 'selected' : ''}}>{{ $r->nama_ruangan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}">
              </div>
              <div class="form-group">
                <label>Total Barang</label>
                <input type="number" min="1" name="total" class="form-control" value="{{ $barang->total }}">
              </div>
              <div class="form-group">
                <label>Barang Rusak</label>
                <input type="number" min="0" name="broken" class="form-control" value="{{ $barang->broken }}">
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
                @if($barang->foto == !NULL)
                  <a href="{{url('uploads/barang/'.$barang->foto)}}" class="zoom">
                    <img id="imageResult" src="{{url('uploads/barang/'.$barang->foto)}}" alt="" width="300px" height="300px" class="img-fluid rounded shadow-sm mx-auto d-block">
                  </a>
                @else
                  <img id="imageResult" src="#" alt="" width="300px" height="300px" class="img-fluid rounded shadow-sm mx-auto d-block">
                @endif
              </div>

                <input type="hidden" name="created_by" value="{{ $barang->created_by }}">
                <input type="hidden" name="updated_by" value="{{auth()->user()->id}}">
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