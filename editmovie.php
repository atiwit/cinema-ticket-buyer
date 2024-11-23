<?php
session_start();
require_once('condb.php');
if(empty($_SESSION['type'] == 'admin')) {
  header("location: index");
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

<?php 
    include('condb.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM movie WHERE id ='$id'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {   
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $trailer = $_POST['trailer'];
  $price = $_POST['price'];
  $desc = $_POST['desc'];
  $img = $_FILES['img']; 
  $theatre = $_POST['theatre']; 
  $id = $_POST['id'];

  $tcheck = "SELECT * From movie Where m_theatre = '$theatre' limit 1";
  $query = mysqli_query($conn, $tcheck);
  $t = mysqli_fetch_assoc($query);

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
   $update = mysqli_query($conn, "UPDATE movie SET m_name='".$name."', m_trailer='".$trailer."', m_price='".$price."', m_desc='".$desc."', m_img='".$img."', m_theatre='".$theatre."' WHERE id=$id") or die(mysqli_error());
   if($update) {
     $_SESSION['success'] == "Edit Success";
     echo '<script>alert("แก้ไขเรียบร้อย")</script>';
     echo('<script>window.location="editmovie?id=". $id .""</script>');
 } else {
     $_SESSION['error'] == "Edit Error";
     echo '<script>alert("แก้ไขผิดพลาด")</script>';
     echo('<script>window.location="managemovies"</script>');
 }

}
  ?>
      <title>Edit&nbsp;<?php echo $row['m_name'];?></title>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <center>
            <div class="card border-dark" style="width: 35rem; height:50rem; margin: 2rem; margin-top: 5rem; padding: 2rem; background-color: rgb(57, 58, 59); border-radius: 16px; border: 1rem; border-style: solid;">
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <h2>ชื่อเรื่อง</h2><input type="text" name="name" id="" required class="form-control" value="<?php echo $row['m_name'];?>"><br>
            <h2>โรงภาพยนต์</h2><input type="number" min="0"name="theatre" id="" required class="form-control" value="<?php echo $row['m_theatre'];?>"><br>
            <h2>ตัวอย่าง</h2><input type="text" name="trailer" id="" required class="form-control" value="<?php echo $row['m_trailer'];?>"><br>
            <h2>ปกหนัง</h2>
            <input type="file" name="img" id="" required class="form-control" style="height:15rem;"  accept="img/*"><br>
            <h2>ราคา</h2><input type="number" name="price" id="" min="0" required class="form-control" value="<?php echo $row['m_price'];?>"><br>
            <h2>คำอธิบาย</h2><textarea  name="desc" id="" cols="30" rows="10" style="resize: none; color: black; font-size:1rem;" class="form-control"><?php echo $row['m_desc'];?></textarea><br>
            <center><button type="submit" class="btn btn-primary btn-lg" name="submit">บันทึกการแก้ไข</button></center>
        </div>
        </center>
        </form>
  <?php 
    }
?>
</center>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script><script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>
