<?php
session_start();
    if($_POST['username']) {
        include('condb.php');
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['name'] = $row['name'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['type'] = $row['type'];
            if($_SESSION['type'] == 'user') {
                $_SESSION['logged_in'] = 1;
                header("location: main");
            }
            if($_SESSION['type'] == 'admin') {
                $_SESSION['logged_in'] = 1;
                header("location: addmovie");
            }
        } else {
            echo '<script>alert("Username or Password is incorrected.")</script>';
            echo '<script>window.location = "index"</script>'; 
        }
    }
?>