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
    $query = "SELECT * FROM promotion WHERE id ='$id'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {   
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $desc = $_POST['desc'];
  $img = $_FILES['img']; 
  $id = $_POST['id'];

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
  $update = mysqli_query($conn, "UPDATE promotion SET pro_name='".$name."', pro_quantity='".$quantity."', pro_price='".$price."', pro_desc='".$desc."', pro_img='".$img."' WHERE id=$id") or die(mysqli_error());

  if($update) {
    $_SESSION['success'] == "Edit Success";
    echo '<script>alert("แก้ไขเรียบร้อย")</script>';
    echo('<script>window.location="editpromotion?id=". $id .""</script>');
} else {
    $_SESSION['error'] == "Edit Error";
    echo '<script>alert("แก้ไขผิดพลาด")</script>';
    echo('<script>window.location="managepromotion"</script>');
}
}
  ?>
      <title>Edit&nbsp;<?php echo $row['pro_name'];?></title>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <center>
            <div class="card border-dark" style="width: 35rem; height:50rem; margin: 2rem; margin-top:5rem; padding: 2rem; background-color: rgb(57, 58, 59); border-radius: 16px; border: 1rem; border-style: solid;">
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <h2>ชื่อเรื่อง</h2><input type="text" name="name" id="" required class="form-control" value="<?php echo $row['pro_name'];?>"><br>
            <h2>รูปโปรโมชั่น</h2><input type="file" name="img" id="" required class="form-control" style="height:4rem;"  accept="img/*"><br>
            <h2>ราคา</h2><input type="number" name="price" id="" min="0" required class="form-control" value="<?php echo $row['pro_price'];?>"><br>
            <h2>จำนวนตั๋ว</h2><input type="number" name="quantity" id="" min="0" required class="form-control" value="<?php echo $row['pro_quantity'];?>"><br>
            <h2>คำอธิบาย</h2><textarea  name="desc" id="" cols="30" rows="10" style="resize: none; color: black; font-size:1rem;" class="form-control"><?php echo $row['pro_desc'];?></textarea><br>
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
