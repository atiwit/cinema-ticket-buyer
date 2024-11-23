<?php
session_start();
require_once('condb.php');
if(empty($_SESSION['type'] == 'admin')) {
    header("location: index");
}
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $trailer = $_POST['trailer'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $img = $_FILES['img'];
    $theatre = $_POST['theatre'];
    
    $theatrecheck = "SELECT * FROM movie WHERE m_theatre = '$theatre' limit 1";
    $query = mysqli_query($conn, $theatrecheck);
    $movie = mysqli_fetch_assoc($query);

    if($movie['m_theatre'] == $theatre) {
        echo '<script>alert("โรงภาพยนต์นี้มีหนังฉายอยู่แล้ว")</script>';
    } else {
        if ($img['error'] == UPLOAD_ERR_OK) {
            $tmpName = $img['tmp_name'];
            $fileName = $img['name'];
    
            // ย้ายไฟล์
            $uploadPath = 'img/' . $fileName;
            move_uploaded_file($tmpName, $uploadPath);
    
            $img = $uploadPath;
        } else {
            $img = '';
        }
        $query = "INSERT INTO movie(m_name, m_trailer, m_price, m_desc, m_img, m_theatre) value
                    ('$name', '$trailer', '$price', '$desc', '$img', '$theatre')";
        $result = mysqli_query($conn, $query);
        if($result) {
            $_SESSION['success'] == "Add Movie Success";
            echo '<script>alert("Movie is added.")</script>';
            echo '<script>window.location = "addmovie"</script>';
        } else {
            $_SESSION['error'] == "Add Movie Error";
            echo '<script>alert("Soemething went wrong.")</script>';
            echo '<script>window.location = "addmovie"</script>';
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Movie</title>
    </head>
    <style>
 body {
  font-family: 'Noto Sans Thai';
 }
</style>
    <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark"> <a class="navbar-brand" href="main">Re Cinema</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
    <ul class="navbar-nav mr-auto justify-content-between">
    <li class="nav-item active"> <a class="nav-link text-danger" href="addmovie">เพิ่มหนัง&nbsp; <span class="sr-only">(current)</span></a> </li>
    <li class="nav-item active"> <a class="nav-link text-primary" href="addpromotion">เพิ่มโปรโมชั่น&nbsp; <span class="sr-only">(current)</span></a> </li>
    <li class="nav-item active"> <a class="nav-link text-danger" href="managemovies">จัดการหนัง&nbsp; <span class="sr-only">(current)</span></a> </li>
    <li class="nav-item active"> <a class="nav-link text-primary" href="managepromotion">จัดการโปรโมชั่น&nbsp; <span class="sr-only">(current)</span></a> </li>
</ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item active"> <a class="btn btn-outline-success" href="logout">Logout&nbsp; <span class="sr-only">(current)</span></a> </li>
    </ul>
  </div>
</nav>
        
        <center>
        <div class="card border-dark" style="width: 35rem; margin: 5rem 2rem; padding: 2rem; background-color: rgb(57, 58, 59); border-radius: 16px; border: 1rem; border-style: solid;">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h2>ชื่อเรื่อง</h2><input type="text" name="name" id="" required class="form-control" placeholder="Enter Movie's name"><br>
            <h2>โรงภาพยนต์</h2><input type="number" name="theatre" min="0" required class="form-control" placeHolder="Number Of Theatre"><br>
            <h2>ตัวอย่าง</h2>
            <input type="text" name="trailer" id="" required class="form-control" placeholder="YT Embed Link (https://www.youtube.com/embed/MhIRVwDW8N0)" ><br>
            <h2>ปกหนัง</h2>
            <input type="file" name="img" id="" required class="form-control" style=""  accept="img/*"><br>
            <h2>ราคา</h2><input type="number" name="price" id="" min="0" required class="form-control" placeHolder="Enter Movie's ticket price"><br>
            <h2>คำอธิบาย</h2><textarea  name="desc" id="" cols="30" rows="10" style="resize: none; color: black; font-size:1rem;" class="form-control" placeHolder="Enter Movie's Description"></textarea><br>
            <center><input type="submit" value="เพิ่มหนัง" name="submit" class="btn btn-secondary btn-lg" style="width:18rem"></center>
        </form>
        </div>
        </center>
    </body>
    <script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.4.1.js"></script>
</html>