<?php
session_start();
require_once('condb.php');
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $trailer = $_POST['trailer'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $img = $_POST['img']; 

    $query = "UPDATE movie SET m_name  ='$name',
                                m_trailer ='$trailer', 
                                m_price ='$price',
                                m_desc  ='$desc',
                                m_img ='$img'
                                WHERE id ='$id'";

    $result = mysqli_query($conn, $query);
    if($result) {
      $_SESSION['success'] == "Edit Success";
      echo '<script>alert("แก้ไขเรียบร้อย")</script>';
      echo('<script>window.location="managemovies"</script>');
  } else {
      $_SESSION['error'] == "Edit Error";
      echo '<script>alert("แก้ไขผิดพลาด")</script>';
      echo('<script>window.location="managemovies"</script>');
  }
}
?>