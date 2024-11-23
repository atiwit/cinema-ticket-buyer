<?php
session_start();
require_once('condb.php');
if(empty($_SESSION['type'] == 'admin')) {
    header("location: index");
}
if(isset($_GET['action'])) {
        if($_GET['action'] == 'delete') {
            $id = $_GET['id'];
            $query = "DELETE FROM movie WHERE id='$id'";
            mysqli_query($conn, $query);
          echo '<script>window.location = "managemovies"</script>';
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
    <title>Edit Movies</title>
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
        <h1><center>จัดการหนัง</center></h1>
            <?php
                include('condb.php');
                $query = "SELECT * from movie";
                $result = mysqli_query($conn, $query);
                $id = $_GET['id'];
                while($row = mysqli_fetch_array($result)) {
            ?>
        <div class="boxp">
        <div class="card" style="background-color: black; width: 18rem; border-radius: 16px; margin:1rem;" >
        <img class="card-img-top" style="border-radius: 16px; height:25rem;"src="<?php echo $row['m_img'];?>" alt="Card image cap">
        <textarea class="card-title" name="" id="" style="resize: none; background: none; border: none; color: white; font-size:1.1rem;" cols="28" rows="2" disabled><?php echo $row['m_name'];?></textarea>
        <center>
        <a href="editmovie?id=<?php echo $row['id'];?>" class="btn btn-outline-warning">แก้ไข</a> <a href="managemovies?action=delete&id=<?php echo $row['id'];?>" class="btn btn-danger">ลบ</a>
        </center>
        <br>
        </div>
        </div>
        <?php
             }
        ?>
    </body>
    <script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script><script src="js/bootstrap-4.4.1.js"></script>
</html>