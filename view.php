<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "karyawan_kel8";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$sSQL = "SELECT * FROM tbl_performance WHERE nik = '$id' LIMIT 1";
$result = mysqli_query($conn, $sSQL);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $foto = $row['foto'];
        $tgl_penilaian = $row['tgl_penilaian'];
        $nik = $row['nik'];
        $nama = $row['nama'];
        $status_kerja = $row['status_kerja'];
        $position = $row['position'];
        $responsibility = $row['responsibility'];
        $teamwork = $row['teamwork'];
        $management_time = $row['management_time'];
        $total = $row['total'];
        $grade = $row['grade'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Only</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <style>
    .grid-item {
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 10px;
        transition: background-color 0.3s;
        background-color:white; 
    }
    .grid-item:hover {
        background-color: #009688  ;
        color: #fff;
        cursor: pointer;
    }
    body {
            background-color: #F7F1E5; /* Ganti dengan warna yang Anda inginkan */
        }

        .navbar-nav .nav-link{

background-color: #009688; 
padding: 0.5rem 1rem; 
border-radius: 0.25rem; 
margin: 0 0.25rem;
margin-left: auto; 
}

@media (max-width: 768px) {
.navbar-nav .nav-link {
max-width: 100%; /* Maksimum lebar saat layar diperkecil */
}
}


</style>
</head>     
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:  #009688;">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">
            <img src="logo.jpg" alt="Healty Food Logo" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="performance.php">Performance</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-3" style="padding-top: 100px;">
  <h2>Data Employee</h2>
  <div class="row">
    <div class="col-md-6">
      <div class="grid-item">
      <div class="mb-3 mt-3">
    <label for="foto"></label>
    <?php if (!empty($foto) && file_exists("images/" . $foto)): ?>
        <div style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden;">
            <img src="images/<?php echo $foto; ?>" width="100%" height="100%" alt="Foto Profil" style="object-fit: cover;">
        </div>
    <?php else: ?>
        <p>Tidak ada gambar atau gambar tidak valid.</p>
    <?php endif; ?>
</div>

        <div class="mb-3 mt-3">
          <label for="tgl_penilaian">Tanggal Penilaian:</label>
          <p><?php echo $tgl_penilaian; ?></p>
        </div>
        <div class="mb-3 mt-3">
          <label for="nik">NIK:</label>
          <p><?php echo $nik; ?></p>
        </div>
        <div class="mb-3 mt-3">
          <label for="nama">Nama:</label>
          <p><?php echo $nama; ?></p>
        </div>
        <div class="mb-3 mt-3">
          <label for="status_kerja">Status Kerja:</label>
          <p><?php echo $status_kerja; ?></p>
        </div>
        <div class="mb-3 mt-3">
          <label for="position">Position:</label>
          <p><?php echo $position; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="grid-item">
        <div class="mb-3 mt-3">
          <label for="responsibility">Responsibility:</label>
          <p><?php echo $responsibility; ?></p>
        </div>
        <div class="mb-3 mt-3">
          <label for="teamwork">Teamwork:</label>
          <p><?php echo $teamwork; ?></p>
        </div>
        <div class="mb-3 mt-3">
          <label for="management_time">Management Time:</label>
          <p><?php echo $management_time; ?></p>
        </div>
        <div class="mb-3 mt-3">
          <label for="total">Total:</label>
          <p><?php echo $total; ?></p>
        </div>
        <div class="mb-3 mt-3">
          <label for="grade">Grade:</label>
          <p><?php echo $grade; ?></p>
        </div>
      </div>
      <div class="mb-3 mt-3"><div>
      <a href="performance.php">
    <button type="button" class="btn btn-danger">Back</button>
  </a>
    </div>
  </div>
  
</div>
</body>
</html>
