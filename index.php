<?php
session_start();
?>
<!doctype html>
<html>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Re Cinema</title>
    </head>
    <body>
        <style>img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{ display: none; }</style>
    <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://picfiles.alphacoders.com/566/thumb-566228.jpg"alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width:22rem; height:40rem;filter: blur(.5px);" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="login" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #000000;"></i>
                    <h1 class="h1 fw-bold mb-0" style="color: #000000;">Re Cinema ระบบซื้อตั๋ว</h1>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="color: #000000;letter-spacing: 1px; font-size:2rem;">เข้าสู่ระบบ</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label"  style=" font-size:1.5rem; color: #000000;">ชื่อผู้ใช้</label>
                    <input name="username" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label"  style=" font-size:1.5rem; color: #000000;">รหัสผ่าน</label>
                    <input name="password" type="password"   class="form-control form-control-lg" />
                  </div>

                  <div class="pt-1 mb-4">
                  <input type="submit" class="btn btn-dark btn-lg btn-block" name="submit" value="เข้าสู่ระบบ">
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81; font-size:1.2rem;">ไม่มีบัญชีผู้ใช้?
                  <a href="register"
                      style="color: #393f81;">สมัครที่นี่!</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </body>
</html>
