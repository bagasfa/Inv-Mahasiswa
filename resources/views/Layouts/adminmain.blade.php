<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title></title>

  <!-- Logo title -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/ub.png')}}">

  <!-- Online CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Offline CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hai, {{auth()->user()->nama_user}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{url('/profile')}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{url('/logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      
      <!-- Side Bar -->
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/dashboard">Inventori UB</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">UB</a>
          </div>
          <ul class="sidebar-menu">

            <!-- List Menu Sebagai Admin -->
            @if(auth()->user()->role == "admin")
              <li id="dashboard" class="">
                <a class="nav-link" href="{{url('/dashboard')}}"><i class="far fa-circle"></i> <span>Dashboard</span></a>
              </li>
              <li id="fakultas" class="">
                <a class="nav-link" href="{{url('/fakultas')}}"><i class="far fa-circle"></i> <span>Fakultas</span></a>
              </li>
              <li id="jurusan" class="">
                <a class="nav-link" href="{{url('/jurusan')}}"><i class="far fa-circle"></i> <span>Jurusan</span></a>
              </li>
              <li id="ruangan" class="">
                <a class="nav-link" href="{{url('/ruangan')}}"><i class="far fa-circle"></i> <span>Ruangan</span></a>
              </li>
              <li id="barang" class="">
                <a class="nav-link" href="{{url('/barang')}}"><i class="far fa-circle"></i> <span>Barang</span></a>
              </li>
              <li id="user" class="">
                <a class="nav-link" href="{{url('/user')}}"><i class="far fa-circle"></i> <span>User</span></a>
              </li>

            <!-- List Menu Sebagai Staff  -->
            @elseif(auth()->user()->role == "staff")
              <li id="dashboard" class="">
                <a class="nav-link" href="{{url('/dashboard')}}"><i class="far fa-circle"></i> <span>Dashboard</span></a>
              </li>
              <li id="barang" class="">
                  <a class="nav-link" href="{{url('/barang')}}"><i class="far fa-circle"></i> <span>Barang</span></a>
                </li>
            @endif

          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>

      <!-- Footer -->
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <script>document.write(new Date().getFullYear());</script> <div class="bullet"></div> Developed by <a href="https://ub.ac.id/">TIK UB</a>
        </div>
      </footer>
    </div>
  </div>

  <!-- Online JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


  <!-- Offline JS File -->
  <script type="text/javascript" src="{{asset('assets/js/bootstrap-show-password.js')}}"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- Jam -->
  <script type="text/javascript">
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
      document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }
 
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
    </script>

  <!-- Toaster -->
  <script>
    @if(Session::has('message'))
      toastr.success("{{ Session::get('message') }}");
    @endif
  </script>

</body>
</html>
