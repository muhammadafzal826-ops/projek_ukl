<?php
include '../koneksi.php';

$id = $_GET['id']; 

$query = "DELETE FROM program_latihan WHERE id_program = '$id'";
$hasil = mysqli_query($conn, $query);

if($hasil){
    header("location:kel_program.php");
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>