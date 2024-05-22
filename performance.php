<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<style>
/* Style for col-4 */
.col-4 {
  transition: transform 0.2s;
}

/* Hover effect */
.col-4:hover {
  transform: scale(1.05); /* Membesarkan elemen saat dihover */
  cursor: pointer; /* Mengubah kursor saat dihover */
}

.custom-container{
      background-color : #97FEED;
    }
    .custom-container:hover {
            background-color: #28666e  ; /* Warna latar belakang saat hover */
            color: #fff; /* Warna teks saat hover */
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease; /* Efek transisi saat hover */
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
  background-color: #f2f2f2; /* Ganti dengan warna latar belakang yang Anda inginkan */
}

.responsive-table tbody {
  display: block;
  max-height: 300px; 
  overflow-y: auto;
}

/* Menghilangkan border sisi kanan dari sel terakhir di kolom tbody */
.responsive-table tbody tr:last-child td {
  border-right: none;
}
.search-container {
        width: 30%; /* Atur lebar kotak pencarian sesuai kebutuhan */
        margin: 10px auto; 
        height: 30px; 
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
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchInput");
    const table = document.querySelector("table");

    searchInput.addEventListener("input", function() {
        const searchTerm = searchInput.value.toLowerCase();

        Array.from(table.querySelectorAll("tbody tr")).forEach(row => {
            const name = row.querySelector("td:nth-child(3)").textContent.toLowerCase();

            if (name.includes(searchTerm)) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    });
});
       function konfirmasi_hapus()
       {
         if (confirm('are you sure to delete ?'))
            return true;
         else 
            return false;   
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

<div class="container mt-3 text-center" style="padding-top: 100px;">
  <h2>Performance Rate Employee</h2>
  <div class="button-container">
    <a href="add.php">
        <button type="button" class="btn border-primary">Add New Data+</button>
    </a>
</div>
  <div class="form-group search-container">
        <input type="text" class="form-control" id="searchInput" placeholder="Cari berdasarkan nama">
    </div>
    <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Tgl Penilaian</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Status Kerja</th>
          <th>Posisi</th>
          <th>Responsibility</th>
          <th>Teamwork</th>
          <th>Management Time</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sSQL = "select * from tbl_performance";
        $result = mysqli_query($conn, $sSQL);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row['tgl_penilaian']; ?></td>
              <td><?php echo $row['nik']; ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['status_kerja']; ?></td>
              <td><?php echo $row['position']; ?></td>
              <td><?php echo $row['responsibility']; ?></td>
              <td><?php echo $row['teamwork']; ?></td>
              <td><?php echo $row['management_time']; ?></td>
              <td>
              <a href="view.php?id=<?php echo $row['nik']; ?>">
                <button type="button" class="btn btn-secondary btn-sm">View</button>
                </a>
                <a href="edit.php?id=<?php echo $row['nik']; ?>">
                <button type="button" class="btn btn-success btn-sm">Edit</button>
                </a>
                <a href="delete.php?id=<?php echo $row['nik']; ?>" onClick="return konfirmasi_hapus();">
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                </a>

              </td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>