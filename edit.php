<?php
include 'connection.php'; 
$id = $_GET['id'];
$sSQL = "SELECT * FROM tbl_performance WHERE nik = '$id' LIMIT 1";
$result = mysqli_query($conn, $sSQL);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
.col-4 {
  transition: transform 0.2s;
}

.col-4:hover {
  transform: scale(1.05); 
  cursor: pointer;
}

.custom-container{
      background-color : #97FEED;
    }
    .custom-container:hover {
            background-color: #28666e  ; 
            color: #fff; 
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease; 
        }
    .button-container {
            display: flex;
            justify-content: flex-end; 
            margin-right: 20px;
}

.responsive-table {
  overflow-x: auto;
  display: block;
}

.responsive-table thead {
  background-color: #f2f2f2; 
}

.responsive-table tbody {
  display: block;
  max-height: 300px; 
  overflow-y: auto;
}

.responsive-table tbody tr:last-child td {
  border-right: none;
}
.small-input {
    width: 150px; /* Atur lebar yang sesuai */
    padding: 6px; /* Atur padding yang sesuai */
    font-size: 14px; /* Atur ukuran font yang sesuai */
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

<script>
    function simpan()
    {
         if (confirm('Are you sure to save ?'))
            return true;
         else 
            return false;   

    }
    function clear()
    {
         if (confirm('Are you sure to clear all data?')) {
        document.getElementById("foto").value = "";
        document.getElementById("tgl_penilaian").value = ""; 
        document.getElementById("nik").value = ""; 
        document.getElementById("nama").value = ""; 
        document.getElementById("status_kerja").value = "Tetap"; 
        document.getElementById("position").value = ""; 
        document.getElementById("responsibility").value = ""; 
        document.getElementById("teamwork").value = ""; 
        document.getElementById("management_time").value = ""; 
    }
    }
  </script>
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
  <h2>Edit Data</h2>
  <div class="row">
  <div class="col-sm-6">
    <form action="save_edit.php" method="POST" enctype="multipart/form-data" onSubmit="return simpan();">
    <div class="row">
  <div class="col-sm-6">
    <div class="mb-3 mt-3">
    <label for="tgl_penilaian">Tanggal Penilaian:</label>
      <input type="date" class="form-control small-input"
       id="tgl_penilaian" placeholder="Choose" name="tgl_penilaian" 
       value="<?php echo $tgl_penilaian;?>"required>
          </div>  
    <div class="mb-3 mt-3">
        <label for="foto">Foto:</label>
        <input type="file" class="form-control small-input" id="foto" placeholder="Upload promo File" name="foto" accept=".jpg,.jpeg,.png" required>
    </div>
</div>
<div class="col-sm-6"> 
<img src='images/<?php echo $foto; ?>' class="img-fluid rounded-circle" style="width: 200px; height: 200px;" alt='<?php echo $nik . '.' . pathinfo("images/$foto", PATHINFO_EXTENSION); ?>'>
     </div>

</div>
</div>
    <div class="col-sm-6">
      <div class="mb-3 mt-3">
      <div class="mb-3 mt-3">
      <label for="nik">NIK:</label>
      <input type="text" class="form-control small-input"
       id="nik" placeholder="" name="nik" 
       value="<?php echo $nik;?>"required readonly>     
     </div>
     <label for="nama">Nama:</label>
      <input type="text" class="form-control"
       id="nama" placeholder="Enter username" name="nama" 
       value="<?php echo $nama;?>"required>      </div>
    </div>
    </div>
    <div class="row">
  <div class="col-sm-6">
  <div class="mb-3 mt-3">
  <label>Status Kerja:</label>
  <div class="form-check form-check-inline">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status_kerja" id="tetap" value="Tetap" <?php if($status_kerja === 'Tetap') echo 'checked'; ?> required>
  <label class="form-check-label" for="tetap">Tetap</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status_kerja" id="tidak_tetap" value="Tidak Tetap" <?php if($status_kerja === 'Tidak Tetap') echo 'checked'; ?> required>
  <label class="form-check-label" for="tidak_tetap">Tidak Tetap</label>
</div>
  </div>
</div>
      <div class="mb-3 mt-3">
      <label for="position">Position:</label>
      <input type="text" class="form-control"
       id="position" placeholder="Enter Position" name="position" 
       value="<?php echo $position;?>"required>
          </div>
</div>
          <div class="col-sm-6">
          <div class="mb-3 mt-3">
          <label for="responsibility">Responsibility:</label>
      <input type="number" class="form-control"
       id="responsibility" placeholder="Enter value"
        name="responsibility" 
        value="<?php echo $responsibility;?>"
        required>    </div>
    <div class="mb-3 mt-3">
    <label for="teamwork">Teamwork:</label>
      <input type="number" class="form-control"
       id="teamwork" placeholder="Enter value" name="teamwork" 
       value="<?php echo $teamwork;?>"required>    </div>
    <div class="mb-3 mt-3">
    <label for="management_time">Management Time:</label>
      <input type="number" class="form-control"
       id="management_time" placeholder="Enter value"
        name="management_time" 
        value="<?php echo $management_time;?>"
        required>
    </div>
    <button type="submit" class="btn btn-success" >Save</button>
    <button type="reset" class="btn btn-warning" >Clear</button>
    <a href="performance.php">
            `<button type="button" class="btn btn-danger">Cancel</button>
    </a>
  </form>
    </div>
</div>
    
</body>
</html>