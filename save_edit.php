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

$sSQL = "";

if (!empty($foto)) {
    // Jika ada file foto yang diunggah, kita akan mengupdate foto
    $sSQL = "UPDATE `tbl_performance` SET 
        `foto` = '$foto',
        `tgl_penilaian` = '$tgl_penilaian',
        `nama` = '$nama',
        `status_kerja` = '$status_kerja',
        `position` = '$position',
        `responsibility` = '$responsibility',
        `teamwork` = '$teamwork',
        `management_time` = '$management_time',
        `total` = '$total',
        `grade` = '$grade'
        WHERE nik = '$nik'";
} else {
    // Jika tidak ada file foto yang diunggah, kita akan mengupdate data lain tanpa mempengaruhi foto
    $sSQL = "UPDATE `tbl_performance` SET 
        `tgl_penilaian` = '$tgl_penilaian',
        `nama` = '$nama',
        `status_kerja` = '$status_kerja',
        `position` = '$position',
        `responsibility` = '$responsibility',
        `teamwork` = '$teamwork',
        `management_time` = '$management_time',
        `total` = '$total',
        `grade` = '$grade'
        WHERE nik = '$nik'";
}

$result = mysqli_query($conn, $sSQL);
if ($result) {
    if (!empty($foto)) {
        $ok = uploadFile($nik);
        if ($ok) {
            header("location:performance.php");
        }
    } else {
        header("location:performance.php");
    }
}

function uploadFile($nik) {
    $target_dir = "images/";
    $imageFileType = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    $newfilename = $nik . "." . $imageFileType;
    $target_file = $target_dir . $newfilename;
    $uploadOk = 1;

    if ($uploadOk == 0) {
        echo "Maaf, berkas tidak terunggah.";
        return false;
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "Berkas " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " telah berhasil diunggah.";
            return true;
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah berkas.";
            return false;
        }
    }
}
?>
