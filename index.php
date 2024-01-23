<?php
// koneksi dengan logic
require "function.php";

// mengambil data dari tabel cuti
$conn1 = query("SELECT * FROM cuti");
$conn = mysqli_connect('localhost', 'root', '', 'asses');

// menambahkan data cuti
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah
    if (add($_POST) > 0) {
        echo "<script>
            alert('Data Submitted Successfully');
            document.location.href='index.php';
            </script>";
    } else {
        echo "
            <script>
            alert('Data Failed to Submit');
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annual Leave</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="content-all">
            <div class="containerhead">
                <h1>List of Employee's Annual Leave</h1>
                <a class="tambah" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD DATA</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>EMPLOYEE ID</th>
                        <th>DATE OF ANNUAL LEAVE</th>
                        <th>QUANTITY</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($conn1 as $row) : ?>
                        <tr class="isi">
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['karyawan_id']; ?></td>
                            <td><?= $row['tanggal_cuti']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td>
                                <a href="update.php?id=<?= $row["id"]; ?>" class="update" role="button">Update</a>
                                <a href="delete.php?id=<?= $row["id"]; ?>" class="delete" role="button" aria-pressed="true" onclick="return confirm('Are you sure to delete this data?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee's Annual Leave</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Isi modal -->
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Employee ID</label>
                            <input type="number" name="karyawan_id" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_cuti" class="form-label">Date of Annual Leave</label>
                            <input type="date" name="tanggal_cuti" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Quantity</label>
                            <input type="number" name="jumlah" required class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <!-- End isi -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<footer>
    <p>&copy; Gabriella M</p>
</footer>

</html>