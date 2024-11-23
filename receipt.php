<?php
session_start();
include('condb.php');

if (!isset($_GET['order_id'])) {
    // Redirect if order_id is not provided
    header("Location: index");
    exit;
}

$order_id = $_GET['order_id'];

// Fetch the order details from the database
$query = "SELECT * FROM orders WHERE order_id = $order_id";
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);

// Fetch the order items from the database
$query = "SELECT * FROM order_items WHERE order_id = $order_id";
$result = mysqli_query($conn, $query);
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Calculate the total cost
$total_cost = 0;
foreach ($items as $item) {
    $total_cost += ($item['item_price'] * $item['item_quantity']);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&family=Noto+Sans+Thai&display=swap" rel="stylesheet">
<meta charset="utf-8">
<style>
 body {
  font-family: 'Noto Sans Thai';
 }
</style>
    <title>ใบเสร็จ</title>
</head>
<body>
    <br><br>
    <div style="clear:both"> </div>
    <center>
    <h1>ใบเสร็จ</h1>
    <h3>รายละเอียดการสั่งซื้อ</h3>
    <p>เลขการสั่งซื้อ:   <?php echo $order['order_id']; ?></p>
    <p>ชื่อผู้ใช้:       <?php echo $_SESSION['name'];?></p>
    <p>ยอดรวม:       <?php echo $total_cost; ?> THB</p>

    <div class="table-responsive">
    <table class="table table-bordered">
            <tr>
                <th scope="col">ชื่อเรื่อง</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">วันที่</th>
                    <th scope="col">รอบ</th>
                    <th scope="col">โรงภาพยนต์</th>
                    <th scope="col">ที่นั่ง</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">รวม</th>
            </tr>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?php echo $item['item_name']; ?></td>
                    <td><?php echo $item['item_quantity']; ?></td>
                    <td><?php echo $item['item_date']; ?></td>
                    <td><?php echo $item['item_time']; ?></td>
                    <td><?php echo $item['item_theatre']; ?></td>
                    <td><?php echo $item['seat']; ?></td>
                    <td>THB <?php echo $item['item_price']; ?></td>
                    <td><?php echo number_format($item['item_quantity'] * $item['item_price'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
    </div>
            <div>
                <a href="main" class="btn btn-primary" 
                style="font-weight: bold; font-size: 1.3rem; width: 10rem; height: 3rem; margin: 20px; display: flex; float: right; text-align:center;" name="return">กลับหน้าหลัก</a>
            </div>
            </center>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.4.1.js"></script>
<script src="js/datetoday.js"></script>
</body>
</html>
