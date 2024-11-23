<?php
 session_start();
 if(empty($_SESSION['logged_in'])){
  header("Location: index");
 }
  include('condb.php');
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&family=Noto+Sans+Thai&display=swap" rel="stylesheet">
<meta charset="utf-8">
</head>
<body style="font-family: 'Noto Sans Thai';">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark"> <a class="navbar-brand" href="main">Re Cinema</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
    <ul class="navbar-nav mr-auto justify-content-between">
    <li class="nav-item active"> <a class="nav-link" href="main">หน้าหลัก&nbsp; <span class="sr-only">(current)</span></a> </li>
    <li class="nav-item active"> <a class="nav-link" href="promotion">โปรโมชั่น&nbsp; <span class="sr-only">(current)</span></a> </li>

</ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item active"> <a class="nav-link" href="main"><?php echo $_SESSION['name'];?>&nbsp; <span class="sr-only">(current)</span></a> </li>
    <li class="nav-item active"> <a class="btn btn-outline-danger" href="logout">Logout&nbsp; <span class="sr-only">(current)</span></a> </li>
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
  ?>
  <center>
  <title><?php echo $row['m_name'];?></title>

<div class="card col-md-8 col-xl-6" style="margin-top: 5rem;">
  <div class="embed-responsive embed-responsive-16by9">
	  <iframe class="embed-responsive-item" src="<?php echo $row['m_trailer'];?>?autoplay=1" frameborder="0" allow='autoplay'></iframe>
  </div>
<div class="card-body">
    <h5 class="card-title" style="font-size:2rem; font-weight: bold;"><?php echo $row['m_name'];?></h5>
    <textarea class="form-control" style="resize: none; border: none; background: none; font-size: 1.2rem;" id="" cols="60" rows="8" disabled><?php echo $row['m_desc'];?></textarea>
    <p class="lead"> <a class="btn btn-primary btn-lg" href="main" role="button">กลับหน้าจอง</a> </p>
</div>
</div>



  <?php 
    }
?>
</center>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script><script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>
