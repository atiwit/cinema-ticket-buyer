<?php
session_start();
require_once('condb.php');
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $usercheck = "SELECT * FROM users WHERE username = '$username' limit 1";
    $query = mysqli_query($conn, $usercheck);
    $user = mysqli_fetch_assoc($query);
    if($user['username'] == $username) {
        echo '<script>alert("Username is already used.")</script>';
        echo '<script>window.location = "register"</script>';
    } else {
        $query = "INSERT INTO users(name, username, password, email) value
                    ('$name', '$username', '$password', '$email')";
        $result = mysqli_query($conn, $query);
        if($result) {
            $_SESSION['success'] == "Register Success";
            echo '<script>alert("สมัครผู้ใช้สำเร็จ.")</script>';
            echo '<script>window.location = "index"</script>';
        } else {
            $_SESSION['error'] == "Register Error";
            echo '<script>alert("Soemething went wrong.")</script>';
            echo '<script>window.location = "register"</script>';
        }
    }
}
?>

<!doctype html>
<html>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Registration</title>
    </head>
    <body>
    <html>
    <body>
    <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://w0.peakpx.com/wallpaper/38/610/HD-wallpaper-kgf-yeash-art-tamil-movie-portrait-vector-draw.jpg"alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 50rem; width:70rem; filter: blur(.2px);" alt="Responsive image" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #000000;"></i>
                    <span class="h1 fw-bold mb-0" style="color: #000000;">สมัครสมาชิก</span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label"  style=" color: #000000;font-size:1.5rem;">ชื่อ</label>
                    <input name="name"  class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" style="color: #000000; font-size:1.5rem;">ชื่อผู้ใช้</label>
                    <input name="username"  class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" style=" color: #000000;font-size:1.5rem;">รหัสผ่าน</label>
                    <input name="password" type="password"  class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label"  style="color: #000000; font-size:1.5rem;">อีเมล</label>
                    <input name="email" type="email"  class="form-control form-control-lg" />
                  </div>

                  <div class="pt-1 mb-4">
                    <input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="สมัครสมาชิก">
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81; font-size:1.2rem;">มีบัญชีผู้ใช้ อยู่แล้ว?
                  <a href="index"
                      style="color: #393f81;">เข้าสู่ระบบที่นี่!</a></p>
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

    </body>
</html>
