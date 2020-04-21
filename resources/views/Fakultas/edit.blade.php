@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Edit Fakultas";
  document.getElementById('fakultas').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>
      Fakultas <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/fakultas') }}"> 
              <button type="button" class="btn btn-outline-danger">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('/fakultas/'.$fakultas->id.'/update') }}" method="POST">
              @csrf
              <div class="form-group">
                <label>Nama Fakultas</label>
                <input type="text" name="nama_fakultas" class="form-control" value="{{ $fakultas->nama_fakultas }}">
              </div>
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