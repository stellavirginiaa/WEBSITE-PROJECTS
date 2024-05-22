<?php
include 'connection.php';

$id = $_POST['id'];
$nik = trim($_POST['nik']);
$nama = trim($_POST['nama']);
$foto = $_FILES["foto"]["name"];
$imageFileType = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
$foto = $nik . "." .$imageFileType;
$tgl_penilaian = trim($_POST['tgl_penilaian']);
$position = trim($_POST['position']);
$status_kerja = trim($_POST['status_kerja']);
$responsibility = trim($_POST['responsibility']);
$teamwork = trim($_POST['teamwork']);
$management_time = trim($_POST['management_time']);
$total = (0.3 * $responsibility) + (0.3 * $teamwork) + (0.4 * $management_time);
if ($total >= 80) {
    $grade = 'A';
} elseif ($total >= 60) {
    $grade = 'B';
} elseif ($total >= 40) {
    $grade = 'C';
} else {
    $grade = 'D';
}

$sSQL="";
$sSQL = "INSERT INTO `tbl_performance` (`foto`, `tgl_penilaian`, `nik`, `nama`, `status_kerja`, `position`, `responsibility`, `teamwork`, `management_time`, `total`, `grade`) 
VALUES ('$foto', '$tgl_penilaian', '$nik', '$nama', '$status_kerja', '$position', '$responsibility', '$teamwork', '$management_time', '$total', '$grade')";
$result = mysqli_query($conn,$sSQL);
if ($result)
{
   $ok=uploadFile($nik);
   if ($ok)
      header("location:performance.php");
} 

function uploadFile($nik) {
    $target_dir = "images/";
    $imageFileType = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    $newfilename = $nik . "." . $imageFileType;
    $target_file = $target_dir.$newfilename;
    $uploadOk = 1;   
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Maaf, berkas tidak terunggah.";
        return false; // Mengembalikan false jika ada masalah
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "Berkas ". htmlspecialchars(basename($_FILES["foto"]["name"])). " telah berhasil diunggah.";
            return true; // Mengembalikan true jika pengunggahan berhasil
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah berkas.";
            return false; // Mengembalikan false jika terjadi kesalahan
 }
}
}
?>
