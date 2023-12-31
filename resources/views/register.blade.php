<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pondok Pesantren Ngalah | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Pondok Pesantren Ngalah</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Pendaftaran Aplikasi Pelanggaran Santri</p>

        <form action="/registeruser" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="id_yayasan" placeholder="ID Yayasan">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          <!-- <div class="input-group mb-3">
            <input type="text" class="form-control" name="whatsapp" placeholder="Gunakan Format +62">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div> -->
          <div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <span>+62</span>
    </div>
  </div>
  <input type="text" class="form-control" name="whatsapp" placeholder="Gunakan Format +62">
</div>

<script>
  // Ambil elemen input nomor telepon
  var inputNumber = document.querySelector('input[name="whatsapp"]');

  // Saat input nomor telepon berubah, tambahkan otomatis "+62" di depannya
  inputNumber.addEventListener('input', function() {
    if (inputNumber.value.trim() !== '') {
      if (!inputNumber.value.startsWith('+62')) {
        inputNumber.value = '+62' + inputNumber.value;
      }
    }
  });
</script>

          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        
        <!-- /.social-auth-links -->

    
        <p class="mb-0">
          <a href="/login" class="text-center">Login</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
</body>

</html>