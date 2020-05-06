@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Edit Ruangan";
  document.getElementById('ruangan').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>
      Ruangan <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/ruangan') }}"> 
              <button type="button" class="btn btn-outline-danger">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('/ruangan/'.$ruangan->id.'/update') }}" method="POST">
              @csrf
              <div class="form-group">
                <select name="id_jurusan" class="form-control" required="">
                  @foreach($jurusan as $j)
                  <option value="{{ $j->id }}" {{ ($ruangan->id_jurusan == $j->id) ? 'selected' : ''}}>{{ $j->nama_jurusan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" value="{{ $ruangan->nama_ruangan }}">
              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()