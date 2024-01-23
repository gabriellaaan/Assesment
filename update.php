<?php
include 'function.php';
// ambil data di URL
$id = $_GET["id"];
// query data ubah
$update = query("SELECT * FROM cuti WHERE id = $id")[0];

// pesan cek perubahan data
if (isset($_POST["submit"])) {

    if (update($_POST) > 0) {
        echo "
			<script>
			alert('Data Updated Successfully');
			document.location.href='index.php';
			</script>
		";
    } else {
        echo "
            <script>
            alert('Data Failed to Updated');
            document.location.href='index.php';
            </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee's Annual Leave Data</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" href="style/style2.css">

</head>

<body>
    <div class="container judul">
        <h2 class="judul teks"> Update Employee's Annual Leave Data</h2> <br>
    </div>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id">ID</label>
                <input type="text" name="id" required class="form-control" value="<?= $id; ?>" placeholder="Update ID" aria-label="ID">
            </div>
            <div class="mt-3 mb-3">
                <label for="employee">Employee ID</label>
                <input type="text" name="karyawan_id" required class="form-control" value="<?= $update["karyawan_id"]; ?>" placeholder="Employee's ID" aria-label="Employee ID">
            </div>
            <div class="mb-3">
                <label for="cuti">Date of Annual Leave</label>
                <input type="date" name="tanggal_cuti" required class="form-control" value="<?= $update["tanggal_lembur"]; ?>" placeholder="Date of Annual Date" aria-label="Date">
            </div>
            <div class="mb-3">
                <label for="jumlah">Quantity</label>
                <input type="text" name="jumlah" required class="form-control" value="<?= $update["jumlah"]; ?>" placeholder="Quantity of Annual Date" aria-label="Quantity">
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>