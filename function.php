<?php

$conn = mysqli_connect("localhost", "root", "", "asses");


// cek koneksi database	 
if (mysqli_connect_errno()) {
    echo "Error connecting database : " . mysqli_connect_error();
}


// menampilkan query database
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// menambahkan data cuti
function add($data)
{
    global $conn;

    $id = htmlspecialchars($data["id"]);
    $karyawan_id = htmlspecialchars($data["karyawan_id"]);
    $tanggal_lembur = htmlspecialchars($data["tanggal_cuti"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    $tanggal_cuti = date("Y-m-d", strtotime($data["tanggal_cuti"]));

    $query = "INSERT INTO cuti
				VALUES
				('$id', '$karyawan_id','$tanggal_cuti', '$jumlah')
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// memperbarui data cuti
function update($data)
{
    global $conn;

    $id = $data["id"];
    $karyawan_id = htmlspecialchars($data["karyawan_id"]);
    $tanggal_cuti = htmlspecialchars($data["tanggal_cuti"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    $query = "UPDATE cuti SET
				karyawan_id = '$karyawan_id', 
            	tanggal_cuti = '$tanggal_cuti', 
				jumlah = $jumlah
                WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// menghapus data cuti
function delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM cuti WHERE id = $id");
    return mysqli_affected_rows($conn);
}
