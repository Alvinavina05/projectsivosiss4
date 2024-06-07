
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIVOSIS</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/dist/css/stylelogin.css" />
<!-- SweetAlert CSS dan JavaScript -->
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

</head>

<body>

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
              <a href="#" class="logo-img text-center d-block py-3 w-100">
                  <img class="text-center" src="../ass" alt=""> 
                  <span  class="text-center font-bold text-dark" style="font-size: 20px;">SI-VOSIS</span>
                </a>
                <p class="text-center">Selamat datang di SI-VOSIS</p>

                <form method="POST" action="/authlogin">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nis / Nip</label>
                    <input  type="text" required name="nis_nip" placeholder="Masukkan Nis atau Nip" class="form-control" >

                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input  type="password" required name="pass" placeholder="Masukkan Password" class="form-control">

                  </div>

                  @if (session('error'))
                  <p class="text-danger text-center">{{ session('error') }}</p>
              @endif

                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>

                    {{-- <a class="text-primary fw-bold" href="#">Lupa Sandi?</a> --}}
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
                  <div class="d-flex align-items-center justify-content-center">
                    {{-- <p class="fs-4 mb-0 fw-bold">Sudah memiliki akun?</p> --}}
                    {{-- <a class="text-primary fw-bold ms-2" href="indexregis.php">Register</a> --}}
                  </div>
                </form>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    
</body>

</html>
