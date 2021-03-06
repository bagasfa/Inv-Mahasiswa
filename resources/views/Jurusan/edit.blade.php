@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Edit Jurusan";
  document.getElementById('jurusan').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>
      Jurusan <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/jurusan') }}"> 
              <button type="button" class="btn btn-outline-danger">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('/jurusan/'.$jurusan->id.'/update') }}" method="POST">
              @csrf
              <div class="form-group">
                <select name="id_fakultas" class="form-control" required="">
                  @foreach($fakultas as $f)
                  <option value="{{ $f->id }}" {{ ($jurusan->id_fakultas == $f->id) ? 'selected' : ''}}>{{ $f->nama_fakultas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="nama_jurusan" class="form-control" value="{{ $jurusan->nama_jurusan }}">
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