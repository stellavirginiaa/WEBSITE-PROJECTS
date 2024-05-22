<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "karyawan_kel8";
    $conn = mysqli_connect($servername, $username, $password,$database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id = $_GET['id'];
    $sSQL="";
    $sSQL=" DELETE FROM `tbl_performance` 
            WHERE nik = '$id' ";    
     $ok=mysqli_query($conn,$sSQL);
     if ($ok)
        header("location:performance.php");
?>
