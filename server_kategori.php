<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "pustaka";
$con = mysqli_connect($server, $username, $password) or die("<h1>Koneksi Mysqli Error : </h1>" .mysqli_connect_error());
mysqli_select_db($con, $database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysqli_error($con));

@$operasi = $_GET['operasi'];

switch ($operasi) {
	
	case "view":
	
	$query_tampil_kategori = mysqli_query($con,"SELECT * FROM kategori") or die (mysqli_error($con));
	$data_array = array();

	While ($data = mysqli_fetch_assoc($query_tampil_kategori)) {
		$data_array[]=$data;
	}
	echo json_encode($data_array);

		break;
	
	case "insert":
	@$id = $_GET['id_kategori'];
	@$nama = $_GET['nama_kategori'];

	$query_insert_data = mysqli_query($con, "INSERT INTO kategori (id_kategori,nama_kategori)   VALUES('$id','$nama')");

	if ($query_insert_data) {
		echo "Data Berhasil Disimpan";
	}
	else {
		echo "Maaf Insert Ke Dalam Database Error" . mysqli_error($con);
	}
	
	break;
	
	case "get_kategori_by_id":
	@$id =(int)$_GET['id_kategori'];
	$query_tampil_kategori = mysqli_query($con, "SELECT * FROM kategori WHERE id_kategori='$id'") or die (mysqli_error($con));
	$data_array = array();
	$data_array = mysqli_fetch_assoc($query_tampil_kategori);
	echo "[" .json_encode($data_array) . "]";
	break;

	case "update":
	@$nama = $_GET['nama_kategori'];
	@$id = $_GET['id_kategori'];

	$query_update_kategori = mysqli_query($con, "UPDATE kategori SET nama_kategori ='$nama' WHERE id_kategori='$id'");

	if ($query_update_kategori) {
		echo "Update Data Berhasil";
	}
	else {
         echo mysqli_error($con);
	}
		break;

	case "delete":
	@$id = $_GET['id_kategori'];
	$query_delete_kategori = mysqli_query($con, "DELETE FROM kategori WHERE id_kategori='$id'");
	if ($query_delete_kategori) {
		echo "Data Berhasil Dihapus";
	}
	else {
		echo mysqli_error($con);
	}
	break;

	default;
	break;	
}
?>