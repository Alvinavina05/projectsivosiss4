

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/dist/css/stylelogin.css" />
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
              <div class="card-body ">
                <a href="./index.html" class="logo-img text-center d-block py-3 w-100">
                  <img class="text-center" src="../assets/images/ickopi2.png" alt=""> 
                  <span  class="text-center font-bold text-dark" style="font-size: 20px;">Sip Kopi</span>
                </a>
                <p class="text-center">Your Social Campaigns</p>
                
                <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Username</label>
                    <input type="text" placeholder="Masukkan Username" name="user" required class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <!-- <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" required placeholder="Masukkan Nama" name="nama" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div> -->
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" placeholder="Masukkan Email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="text" placeholder="Masukkan Password" name="pass" required class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="text" placeholder="Konfirmasi Password" name="cpass" required class="form-control" id="exampleInputPassword1">
                  </div>

                  <input type="date" name="tgl" value="<?php echo date('Y-m-d'); ?>" hidden>
                  
                  <button type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Registrasi</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="indexlogin.php">Sign In</a>
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
</body>

</html>