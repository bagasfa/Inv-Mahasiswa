@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Dashboard";
  document.getElementById('dashboard').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Dashboard</h1>

    <div id="clock"></div>
  </div>

  @if(auth()->user()->role == "admin")
  	<h4 style="color: #32364a;"><marquee>Selamat Datang {{auth()->user()->nama_user}}, Di Halaman Admin</marquee></h4>
  @elseif(auth()->user()->role == "staff")
  	<h4 style="color: #32364a;"><marquee>Selamat Datang {{auth()->user()->nama_user}}, Di Halaman Staff</marquee></h4>
  @endif
  <br>

  @if(auth()->user()->role == "admin")
  <marquee direction="up" scrollamount="50" behavior="slide"><div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('user')}}" class="nounderline">
      <div class="card card-primary">
        <div class="card-header">
          <i id="micon" class="fa fa-user-secret" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Admin</h4>
            <h3 align="center">{{ $userAdmin }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('user')}}" class="nounderline">
      <div class="card card-primary">
        <div class="card-header">
          <i id="micon" class="fa fa-users" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Staff</h4>
            <h3 align="center">{{ $userStaff }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('fakultas')}}" class="nounderline">
      <div class="card card-primary">
        <div class="card-header">
          <i id="micon" class="fa fa-university" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Fakultas</h4>
            <h3 align="center">{{ $fakultas }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
  </div></marquee>
  <marquee direction="up" scrollamount="50" behavior="slide"><div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('jurusan')}}" class="nounderline">
      <div class="card card-primary">
        <div class="card-header">
          <i id="micon" class="fa fa-graduation-cap" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Jurusan</h4>
            <h3 align="center">{{ $jurusan }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('ruangan')}}" class="nounderline">
      <div class="card card-primary">
        <div class="card-header">
          <i id="micon" class="fas fa-door-open" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Ruangan</h4>
            <h3 align="center">{{ $ruangan }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('barang')}}" class="nounderline">
      <div class="card card-primary">
        <div class="card-header">
          <i id="micon" class="fa fa-cubes" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Barang</h4>
            <h3 align="center">{{ $barang }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
  </div></marquee>
  <!-- Collapse -->
  <marquee direction="up" scrollamount="50" behavior="slide">
    <a class="nounderline" data-toggle="collapse" href="#collapseAdd" role="button" aria-expanded="false" aria-controls="collapseAdd">
      <div class="card card-primary">
        <div class="card-header">
          <i id="micon2" class="fa fa-tasks" aria-hidden="true"></i>
          <div class="ml-auto table-responsive">
            <h4>History Tambah Data Barang</h4>
            <div class="collapse" id="collapseAdd">
              <div class="card card-body">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr align="center">
                      <th width="5%" scope="col"><center>#</center></th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Di Ruangan</th>
                      <th scope="col">Total Barang</th>
                      <th scope="col">Dibuat</th>
                      <th scope="col">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($his_add as $no => $ha)
                    <tr>
                      <td align="center">{{ $no +1 }}</td>
                      <td>{{ $ha->nama_barang }}</td>
                      <td align="center">{{$ha->ruangan->nama_ruangan}}</td>
                      <td align="center">{{ $ha->total }}</td>
                      <td align="center">@foreach($user as $u)
                            @if($u->id == $ha->created_by)
                              {{ $u->nama_user }}
                            @endif
                          @endforeach
                      </td>
                      <td align="center">{{ $ha->created_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="8"><center>Tidak ada data terkini</center></td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
    </marquee>
<!-- Collapse -->
<!-- Collapse -->
  <marquee direction="up" scrollamount="50" behavior="slide">
    <a class="nounderline" data-toggle="collapse" href="#collapseEdit" role="button" aria-expanded="false" aria-controls="collapseEdit">
      <div class="card card-primary">
        <div class="card-header">
          <i id="micon2" class="fa fa-tasks" aria-hidden="true"></i>
          <div class="ml-auto table-responsive">
            <h4>History Edit Data Barang</h4>
            <div class="collapse" id="collapseEdit">
              <div class="card card-body">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr align="center">
                      <th width="5%" scope="col"><center>#</center></th>
                      <th>Nama Barang</th>
                      <th scope="col">Di Ruangan</th>
                      <th scope="col">Total Barang</th>
                      <th scope="col">Barang Rusak</th>
                      <th scope="col">Diupdate</th>
                      <th scope="col">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($his_edit as $no => $he)
                    <tr>
                      <td align="center">{{ $no +1 }}</td>
                      <td>{{ $he->nama_barang }}</td>
                      <td align="center">{{$he->ruangan->nama_ruangan}}</td>
                      <td align="center">{{ $he->total }}</td>
                      <td align="center">{{ $he->broken }}</td>
                      <td align="center">@foreach($user as $u)
                            @if($u->id == $he->updated_by)
                              {{ $u->nama_user }}
                            @endif
                          @endforeach
                      </td>
                      <td align="center">{{ $he->updated_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="8"><center>Tidak ada data terkini</center></td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
    </marquee>
<!-- Collapse -->

  @elseif(auth()->user()->role == "staff")
  <marquee direction="up" scrollamount="50" behavior="slide">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <a href="#" class="nounderline">
          <div class="card card-primary">
            <div class="card-header">
              <i id="micon" class="fa fa-university" aria-hidden="true"></i>
              <div class="ml-auto">
                <h4>Total Fakultas</h4>
                <h3 align="center">{{ $fakultas }}</h3>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <a href="#" class="nounderline">
          <div class="card card-primary">
            <div class="card-header">
              <i id="micon" class="fa fa-graduation-cap" aria-hidden="true"></i>
              <div class="ml-auto">
                <h4>Total Jurusan</h4>
                <h3 align="center">{{ $jurusan }}</h3>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </marquee>
  <marquee direction="up" scrollamount="50" behavior="slide">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <a href="#" class="nounderline">
          <div class="card card-primary">
            <div class="card-header">
              <i id="micon" class="fas fa-door-open" aria-hidden="true"></i>
              <div class="ml-auto">
                <h4>Total Ruangan</h4>
                <h3 align="center">{{ $ruangan }}</h3>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <a href="{{url('barang')}}" class="nounderline">
          <div class="card card-primary">
            <div class="card-header">
              <i id="micon" class="fa fa-cubes" aria-hidden="true"></i>
              <div class="ml-auto">
                <h4>Total Barang</h4>
                <h3 align="center">{{ $barang }}</h3>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </marquee>

  <!-- Collapse -->
  <marquee direction="up" scrollamount="50" behavior="slide">
    <a class="nounderline" data-toggle="collapse" href="#collapseEdit" role="button" aria-expanded="false" aria-controls="collapseEdit">
      <div class="card card-primary">
        <div class="card-header">
          <i id="micon2" class="fa fa-tasks" aria-hidden="true"></i>
          <div class="ml-auto table-responsive">
            <h4>History Edit Data Barang</h4>
            <div class="collapse" id="collapseEdit">
              <div class="card card-body">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr align="center">
                      <th width="5%" scope="col"><center>#</center></th>
                      <th>Nama Barang</th>
                      <th scope="col">Di Ruangan</th>
                      <th scope="col">Total Barang</th>
                      <th scope="col">Barang Rusak</th>
                      <th scope="col">Diupdate</th>
                      <th scope="col">Waktu</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($his_edit as $no => $he)
                    <tr>
                      <td align="center">{{ $no +1 }}</td>
                      <td>{{ $he->nama_barang }}</td>
                      <td align="center">{{$he->ruangan->nama_ruangan}}</td>
                      <td align="center">{{ $he->total }}</td>
                      <td align="center">{{ $he->broken }}</td>
                      <td align="center">@foreach($user as $u)
                            @if($u->id == $he->updated_by)
                              {{ $u->nama_user }}
                            @endif
                          @endforeach
                      </td>
                      <td align="center">{{ $he->updated_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="8"><center>Tidak ada data terkini</center></td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
    </marquee>
<!-- Collapse -->
  @endif
  
</section>
@endsection()