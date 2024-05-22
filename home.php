<?php
include 'connection.php';
$currentDate = date('Y-m-d');
$sqlTetap = "SELECT COUNT(*) as totalTetap FROM tbl_performance WHERE status_kerja = 'Tetap'";
$resultTetap = mysqli_query($conn, $sqlTetap);
$rowTetap = mysqli_fetch_assoc($resultTetap);
$totalTetap = $rowTetap['totalTetap'];

$sqlTidakTetap = "SELECT COUNT(*) as totalTidakTetap FROM tbl_performance WHERE status_kerja = 'Tidak Tetap'";
$resultTidakTetap = mysqli_query($conn, $sqlTidakTetap);
$rowTidakTetap = mysqli_fetch_assoc($resultTidakTetap);
$totalTidakTetap = $rowTidakTetap['totalTidakTetap'];

$sqlKaryawanTetap = "SELECT foto, nik, nama, position, grade FROM tbl_performance WHERE status_kerja = 'Tetap' AND (grade = 'C' OR grade = 'D')";
$resultKaryawanTetap = mysqli_query($conn, $sqlKaryawanTetap);

$sqlKaryawanTidakTetap = "SELECT foto, nik, nama, position, grade FROM tbl_performance WHERE status_kerja = 'Tidak Tetap' AND (grade = 'C' OR grade = 'D')";
$resultKaryawanTidakTetap = mysqli_query($conn, $sqlKaryawanTidakTetap);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function konfirmasi_hapus() {
            if (confirm("are you sure to delete ?")) return true;
            else return false;
        }
        </script>
<style>
  body{
    background-color: #f7f1e5;
  }

  .navbar {
        display: flex;
        justify-content: space-between;
    }

    .navbar-brand {
        margin-right: 0; 
    }

    .navbar-brand.mb-2 {
        margin-bottom: 10px; 
    }
    .carousel {
  width: 100%;
  margin-top: 56px;
  overflow: hidden;
}

.carousel-inner {
  width: 300%; /* Adjust the width based on the number of slides you have */
  height: 100%;
  display: flex;
  transition: transform 0.3s ease;
}

.carousel-item {
  flex: 0 0 auto;
}

/* Adjust the carousel images to cover the entire container */
.carousel-item img {
  object-fit: cover;
  width: 100%;
  height: 100%;
}
.col-4 {
  transition: transform 0.2s;
}

/* Hover effect */
.col-4:hover {
  transform: scale(1.05); 
  cursor: pointer;
}

.custom-container{
      background-color : white;
    }
    .custom-container:hover {
            background-color: #009688  ; 
            color: #fff; 
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease; 
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
        function displayCurrentDate() {
            var currentDate = new Date();  // Create a new Date object
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var formattedDate = currentDate.toLocaleDateString('en-US', options);
            
            document.getElementById("currentDate").textContent = formattedDate;
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:  #009688;">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">
            <img src="logo.jpg" alt="Healty Food Logo" width="120px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="performance.php">Performance</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid ">
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <div class="carousel-inner img-fluid">
    <div class="carousel-item active">
      <img src="office.jpg" alt="" class="d-block  ">
    </div>
    <div class="carousel-item">
      <img src="office.jpeg" alt="" class="d-block">
    </div>
    <div class="carousel-item">
      <img src="office3.jpeg" alt="" class="d-block ">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div class="container mt-5">
<div class="d-flex align-items-center">
        <i class="far fa-calendar-alt mr-2"></i>
        <h5 id="currentDate"></h5>
    </div></div>

<div class="container mt-0 pt-1 text-center">
        <div class="row">
            <div class="col-md-4">
                <div class="border border-2 rounded-4 custom-container">
                <div class="container-fluid pt-2 pb-2"><h4>Total</h4>
        </div>
      <div class="container-fluid pt-2 pb-5">
      <div class="row">
          <table class="table-sm">
          <thead>
            <tr>
                <th>Jenis Karyawan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Karyawan Tetap</td>
                <td><?php echo $totalTetap; ?></td>
            </tr>
            <tr>
                <td>Karyawan Tidak Tetap</td>
                <td><?php echo $totalTidakTetap; ?></td>
            </tr>
        </tbody>
    </table>
        </div>
      </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="border border-2 rounded-4 custom-container">
                <div class="container-fluid pt-2 pb-2" ><h4>Karyawan Tetap</h4>
        </div>
        <div class="container-fluid pt-2 pb-5">
        <table class=" table-sm mx-auto">
        <thead>
            <tr>
                <th>Grade</th>
                <th>Jumlah Karyawan Tetap</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $grades = ['A', 'B', 'C', 'D'];
            
            foreach ($grades as $grade) {
                $sqlTetap = "SELECT COUNT(*) as totalTetap FROM tbl_performance WHERE status_kerja = 'Tetap' AND grade = '$grade'";
                $resultTetap = mysqli_query($conn, $sqlTetap);
                $rowTetap = mysqli_fetch_assoc($resultTetap);
                $totalTetap = $rowTetap['totalTetap'];
                
                
                echo "<tr>
                        <td>$grade</td>
                        <td>$totalTetap</td>
                      </tr>";
            }
            ?>
        </tbody>
        </table>
        </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="border border-2 rounded-4 custom-container">
                <div class="container-fluid pt-2 pb-2"><h4>Karyawan Tidak Tetap</h4>
        </div>
      <div class="container-fluid pt-2 pb-5">
      <div class="row">
          <table class="table-sm mx-auto">
        <thead>
            <tr>
                <th>Grade</th>
                <th>Jumlah Karyawan Tidak Tetap</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $grades = ['A', 'B', 'C', 'D'];
            
            foreach ($grades as $grade) {
                $sqlTidakTetap = "SELECT COUNT(*) as totalTidakTetap FROM tbl_performance WHERE status_kerja = 'Tidak Tetap' AND grade = '$grade'";
                $resultTidakTetap = mysqli_query($conn, $sqlTidakTetap);
                $rowTidakTetap = mysqli_fetch_assoc($resultTidakTetap);
                $totalTidakTetap = $rowTidakTetap['totalTidakTetap'];
                
                echo "<tr>
                        <td>$grade</td>
                        <td>$totalTidakTetap</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
          </div>
        </div>
        
                </div>
            </div>
        </div>
    </div>

    
    <div class="container mt-5 border border-2 rounded-4 text-center custom-container">
        <div class="container-fluid pt-2 pb-2"><h2>Grade C dan D</h2>
        </div>
      <div class="container-fluid pt-2 pb-5">
      <div class="row">
      <div class="col-sm">
      <div class="table-responsive">
      <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultKaryawanTetap)) {
                            $foto = $row['foto'];
                            $nik = $row['nik'];
                            $nama = $row['nama'];
                            $posisi = $row['position'];
                            $grade = $row['grade'];

                            echo "<tr>
                            <td><img src='images/$foto' alt='$nik." . '.' . pathinfo("images/$foto", PATHINFO_EXTENSION) . "' width='100' ' height='100' style='border-radius: 50%;'></td>
                            <td>$nik</td>
                            <td>$nama</td>
                            <td>$posisi</td>
                            <td>$grade</td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>

      </div>
      </div>
      </div>
      </div>
      </div>
  </div>
                    </div>

  <div class="container mt-5 border border-2 rounded-4 text-center custom-container">
        <div class="container-fluid pt-2 pb-2"><h2>Grade C dan D</h2>
        </div>
      <div class="container-fluid pt-2 pb-5">
      <div class="row">
      <div class="col-sm">
      <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultKaryawanTidakTetap)) {
                            $foto = $row['foto'];
                            $nik = $row['nik'];
                            $nama = $row['nama'];
                            $posisi = $row['position'];
                            $grade = $row['grade'];

                            echo "<tr>
                            <td><img src='images/$foto' alt='$nik." . '.' . pathinfo("images/$foto", PATHINFO_EXTENSION) . "'width='100' style='border-radius: 50%;'></td>
                            <td>$nik</td>
                            <td>$nama</td>
                            <td>$posisi</td>
                            <td>$grade</td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>

      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <script>
        displayCurrentDate();
    </script>
</body>
</html>