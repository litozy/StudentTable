<!DOCTYPE html>

<?php
    require 'database.php';
    $databaseClass = new database();

    $data = $databaseClass->readById($_GET);
?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/21ccaf84cf.js" crossorigin="anonymous"></script>
    <title>AKADEMIK</title>
</head>

<body>
    <nav class="navbar bg-primary mb-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                TABEL MAHASISWA
            </a>
        </div>
    </nav>
    <div class="container">
        <?php
            if(isset($_GET['edit'])) {
        ?>
        <h2>Ubah Data Mahasiswa</h2>
        <?php
            } else {
        ?>
        <h2>Tambahkan Data Mahasiswa</h2>
        <?php
            }
        ?>

    </div>
    <div class="container">
        <form method="POST" action="process.php">
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="nama" placeholder="Ex: John Wider" value="<?php echo $data['nama']?>" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                    <div class="form-outline" style="width: 10rem;">
                        <input required min="15" max="70" type="number" id="umur" name="umur" class="form-control" placeholder="Ex: 19" value="<?php echo $data['umur']?>"/>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea required class="form-control" placeholder="Ex: Jl Mangga 2" id="alamat" name="alamat" rows="3"><?php echo $data['alamat']?></textarea>
                </div>
            </div>

            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                        if(isset($_GET['edit'])) {
                    ?>
                        <button type="submit" class="btn btn-primary" name="action" value="edit">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Submit
                        </button>
                    <?php
                        } else {
                    ?>
                        <button type="submit" class="btn btn-primary" name="action" value="add">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Submit
                        </button>
                    <?php
                        }
                    ?>
                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i> Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>