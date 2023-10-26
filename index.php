<?php
    require 'database.php';

    $databaseClass = new database();
    $sql = $databaseClass->read();
    $no = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <script src="fontawesome/js/all.js" crossorigin="anonymous"></script>
    <title>AKADEMIK</title>
</head>

<body>

    <nav class="navbar bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                TABEL MAHASISWA
            </a>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-3">Data Mahasiswa</h1>
        <a href="service.php" type="button" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>ID</center>
                        </th>
                        <th>Nama Siswa</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    while($result = mysqli_fetch_assoc($sql)) {
                      
                        
                ?>
                    <tr>
                        <td>
                            <center>
                                <?php echo ++$no;?>.
                            </center>
                        </td>
                        <td><?php echo $result['nama'];?></td>
                        <td><?php echo $result['umur'];?></td>
                        <td><?php echo $result['alamat'];?></td>
                        <td>
                            <center>
                                <a href="service.php?edit=<?php echo $result['id'];?>" type="button" class="btn btn-success btn-sm"><i
                                        class="fa fa-pencil fa-sm"></i></a>
                                <a href="process.php?delete=<?php echo $result['id'];?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus?')"><i
                                        class="fa fa-trash fa-sm"></i></a>
                            </center>
                        </td>
                    </tr>
                <?php
                      }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>