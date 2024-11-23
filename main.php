<?php
 session_start();
 if(empty($_SESSION['logged_in'])){
  header("Location: index");
 }
 include('condb.php');
 // ระบบกดซื้อ
 if(isset($_POST['add_to_cart'])) {
  if(isset($_SESSION['shopping_cart'])) {
    $item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
    if(!in_array($_SESSION['shopping_cart'], $item_array_id)) {
      $count = count($_SESSION['shopping_cart']);
      $item_array = array(
        'item_id' => $_GET['id'],
        'item_name' => $_POST['hidden_name'],
        'item_price' => $_POST['hidden_price'],
        'item_quantity' => $_POST['quantity'],
        'item_time' => $_POST['time'],
        'item_date' => $_POST['today'],
        'seat' => $_POST['seat'],
        'item_theatre' => $_POST['theatre']
    );
    //echo '<script>alert("เพิ่มรายการเรียบร้อยแล้ว");</script>';
    $_SESSION['add'] = "เพิ่มรายการเรียบร้อยแล้ว";
    $_SESSION['shopping_cart'][$count] = $item_array;
    } else {
      echo '<script>window.location = "main"</script>';

    }
  }else {
    $item_array = array(
        'item_id' => $_GET['id'],
        'item_name' => $_POST['hidden_name'],
        'item_price' => $_POST['hidden_price'],
        'item_quantity' => $_POST['quantity'],
        'item_time' => $_POST['time'],
        'item_date' => $_POST['today'],
        'seat' => $_POST['seat'],
        'item_theatre' => $_POST['theatre']
    );
    $_SESSION['shopping_cart'][0] = $item_array;
  }
 }

 if(isset($_GET['action'])) {
  if($_GET['action'] == 'delete') {
    foreach($_SESSION['shopping_cart'] as $keys => $value) {
      if($value['item_id'] == $_GET['id']) {
        unset($_SESSION['shopping_cart'][$keys]);
        echo '<script>window.location = "main"</script>';
      }
    }

  }
if($_GET['action'] == 'checkout') {
  if(isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
    $total = 0;
    foreach($_SESSION['shopping_cart'] as $item) {
        $total += ($item['item_price'] * $item['item_quantity']);
    }
    $query = "INSERT INTO orders (username, total_cost) VALUES ('".$_SESSION['username']."', '".$total."')";
    mysqli_query($conn, $query);
    $order_id = mysqli_insert_id($conn);

    foreach($_SESSION['shopping_cart'] as $item) {
      $query = "INSERT INTO order_items (order_id, item_id, item_name, item_price, item_quantity, item_time, item_date, item_theatre, seat) VALUES ('".$order_id."', '".$item['item_id']."', '".$item['item_name']."', '".$item['item_price']."', '".$item['item_quantity']."', '".$item['item_time']."', '".$item['item_date']."', '".$item['item_theatre']."', '".$item['seat']."' )";
      mysqli_query($conn, $query);
      $thea = $item['item_theatre'];
      $sss = $item['seat'];
      $query2 = "UPDATE seat SET seat_status ='1' WHERE theatre ='$thea' AND seat_name = '$sss'";
      mysqli_query($conn, $query2);
    }
  
$query2 = "SELECT * FROM orders WHERE order_id = $order_id";
$result2 = mysqli_query($conn, $query2);
$order = mysqli_fetch_assoc($result2);


unset($_SESSION['shopping_cart']);


//ไปหน้ารับใบเสร็จ
sleep(3);
header("Location: receipt?order_id=" . $order_id);
exit;

} else {
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
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&family=Noto+Sans+Thai&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $(document).ready(function() {
  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  var tomorrow = new Date(date.getFullYear(), date.getMonth(), (date.getDate() + 1));
  var end = new Date(date.getFullYear(), date.getMonth(), (date.getDate() + 1));
	
  $('.today').datepicker({
    dateFormat: 'yy-mm-dd',
    startDate: tomorrow,
    endDate: end,
    minDate: 1,
    maxDate: 1,
    autoclose: true
  });
 
  var datepicker2 = (date.getMonth() + 1) + '/' +  (date.getDate() + 1) + '/' +  date.getFullYear();

  $('.today').datepicker('setDate', datepicker2);

});

$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 2000);
});
  </script>
<meta charset="utf-8">
<style>
 body {
  font-family: 'Noto Sans Thai';
 }
   .modal-header {
  background-color: rgb(38, 38, 37);
}
#mybutton {

  position:fixed;
    bottom:20px;
    right:20px;
    z-index:1000;
}
</style>
</head>
<title>Re Cinema ซื้อตั๋วหนัง</title>
<body>
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
<br>
    <br>
    <?php if(isset($_SESSION['add'])) : ?>
            <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['add']?>
          </div>
        <?php endif ?>
	<?php 
    include('condb.php');
    $query = "SELECT * FROM movie";
    $result = mysqli_query($conn, $query);
    $id = $_GET['id'];
    while($row = mysqli_fetch_array($result))
    {
  ?>
  <div class="boxp">
    <form action="main?action=add&id=<?php echo $row['id'];?>" method="post">
    <div class="card" style="background-color: black; width: 18rem; border-radius: 16px; margin:1rem;" >
    <img class="card-img-top" style="border-radius: 16px;height:28rem;"src="<?php echo $row['m_img'];?>" alt="Card image cap">
    <div class="card-body">
		<textarea class="card-title" name="" id="" style="resize: none; background: none; border: none; color: white; font-weight: bold; font-size:1.3rem;" cols="20" rows="3" disabled><?php echo $row['m_name'];?></textarea>
    <h4>Theatre&nbsp;<?php echo $row['m_theatre']?></h4>
    <div class="md-form md-outline input-with-post-icon datepicker" inline="true">
    <label for="today">วันที่เข้าชม</label><br>
    <input type="text" name="today" class="form-control today" placeHolder="เลือกวันที่จอง" style="width:10rem" required READONLY><br>
    <i class="fas fa-calendar input-prefix"></i>
</div>
    <label>เลือกเวลาที่ชม</label><br>
    <select name="time" class="form-control" style="width:10rem">
    <option value="day">รอบเช้า 10.00-12.00น.</option>
    <option value="night">รอบดึก 19.00-21.00น.</option>
  </select><br>
    <label>เลือกที่นั่ง</label><a class="badge badge-pill badge-primary"data-toggle="modal" data-target="#learnMore1">
    ดูผังโรงหนัง
    </a><br>
    <select name="seat" class="form-control" style="width:10rem">
    <?php
    $theatre = $row['m_theatre'];
    $query1 = "SELECT * FROM seat Where theatre ='$theatre' AND seat_status ='0'";
    $result1 = mysqli_query($conn, $query1);
  

    while($roww = mysqli_fetch_array($result1))
    {
    ?>
    <option value="<?php echo $roww['seat_name'];?>"><?php echo $roww['seat_name'];?></option>
     <!---<option value="A01">A01</option>
      <option value="A02">A02</option>
      <option value="B01">B01</option>
      <option value="B02">B02</option>
      </select><br>!--->
      <?php
      }
      ?>
      </select><br>
    <input type="hidden" name="quantity" value="1">
    <h3 class="text-success"><b><?php echo $row['m_price'];?></b>บาท/ที่นั่ง</h3>
    <input type="submit" class="btn btn-dark" name="add_to_cart" value="ซื้อตั๋ว&nbsp;">
    <input type="hidden" name="theatre" value="<?php echo $row['m_theatre'];?>">
    <input type="hidden" name="hidden_price" value="<?php echo $row['m_price'];?>">
    <input type="hidden" name="hidden_name" value="<?php echo $row['m_name'];?>">
    <a href="movie?id=<?php echo $row['id'];?>" class="btn btn-outline-success">รายละเอียดหนัง</a>

</div>
    </div>
    </form>
</div>
<?php 
    }
?>
        <div style="clear:both"> </div>
        <br>
        <!---<div class="container-fluid">
        <center>
        <h3>รายละเอียดการสั่งซื้อ</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="35%">ชื่อเรื่อง</th>
                    <th width="5%">จำนวน</th>
                    <th width="15%">วันที่</th>
                    <th width="10%">รอบ</th>
                    <th width="10%">โรงภาพยนต์</th>
                    <th width="10%">ที่นั่ง</th>
                    <th width="20%">ราคา</th>
                    <th width="20%">รวม</th>
                    <th width="5%">จัดการ</th>
                </tr>
                <?php 
                if(!empty($_SESSION['shopping_cart'])) {
                    $total = 0;
                    foreach($_SESSION['shopping_cart'] as $keys => $values)
                {
                ?>
                <tr>
                    <td><?php echo $values['item_name']; ?></td>
                    <td><?php echo $values['item_quantity']; ?></td>
                    <td><?php echo $values['item_date']; ?></td>
                    <td><?php echo $values['item_time']; ?></td>
                    <td><?php echo $values['item_theatre']; ?></td>
                    <td><?php echo $values['seat']; ?></td>
                    <td>THB <?php echo $values['item_price']; ?></td>
                    <td><?php echo number_format($values['item_quantity'] * $values['item_price'], 2); ?></td>
                    <td><a href="main?action=delete&id=<?php echo $values['item_id'];?>"><span class="text-danger">ยกเลิก</span></a></td>
                </tr>
                <?php 
                    $total = $total + ($values['item_quantity'] * $values['item_price']);
                }
                ?>
                <tr>
                    <td colspan="6" align="right">ยอดรวมสรุป</td>
                    <td align="right">THB <?php echo number_format($total, 2);?></td>
                </tr>
                <?php
            }
                ?>
            </table>
            <div>
                <a href="main?action=checkout" class="btn btn-primary" 
                style="font-weight: bold; font-size: 1.3rem; width: 10rem; height: 3rem; margin: 20px; display: flex; float: right; text-align:center;" name="checkout">สั่งซื้อ</a>
            </div>
            </div>
            </center>
        </div>--->
 <div class="modal fade" id="learnMore1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </br>
      <div class="container-fluid">
             <img src="/img/seatpoppng.png" class="img-fluid img-thumbnail" alt="Responsive image"/>
      </div>
      
      </div>

    </div>
  </div>
</div>   

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header float-right">
           <h2>รายการสั่งซื้อ</h2>
        <div class="text-right">
          <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
        </div>
      </div>
      <div class="modal-body">
          


        <div class="table-responsive">
          <table class="table table-dark">
  <thead>
    <tr>
                    <th scope="col">ชื่อเรื่อง</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">วันที่</th>
                    <th scope="col">รอบ</th>
                    <th scope="col">โรงภาพยนต์</th>
                    <th scope="col">ที่นั่ง</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">รวม</th>
                    <th scope="col">จัดการ</th>
    </tr>
  </thead>
  <tbody>
  <?php 
                if(!empty($_SESSION['shopping_cart'])) {
                    $total = 0;
                    foreach($_SESSION['shopping_cart'] as $keys => $values)
                {
                ?>
                <tr>
                    <td><?php echo $values['item_name']; ?></td>
                    <td><?php echo $values['item_quantity']; ?></td>
                    <td><?php echo $values['item_date']; ?></td>
                    <td><?php echo $values['item_time']; ?></td>
                    <td><?php echo $values['item_theatre']; ?></td>
                    <td><?php echo $values['seat']; ?></td>
                    <td>THB <?php echo $values['item_price']; ?></td>
                    <td><?php echo number_format($values['item_quantity'] * $values['item_price'], 2); ?></td>
                    <td><a href="main?action=delete&id=<?php echo $values['item_id'];?>"><span class="text-danger">ยกเลิก</span></a></td>
                </tr>
                <?php 
                    $total = $total + ($values['item_quantity'] * $values['item_price']);
                }
                ?>
                <tr>
                    <td colspan="6" align="right">ยอดรวมสรุป</td>
                    <td align="right">THB <?php echo number_format($total, 2);?></td>
                </tr>
                <?php
            }
                ?>
  </tbody>
</table>

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="main?action=checkout" class="btn btn-primary" name="checkout">สั่งซื้อ</a>
      </div>
    </div>
  </div>
</div>
<div id="mybutton">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="width:5rem;">ชำระเงิน<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></button>
</div>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.4.1.js"></script>
<script src="js/datetoday.js"></script>
<script src="js/pickaday.js"></script>
	</body>
</html>
