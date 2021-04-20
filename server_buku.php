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
	
	$query_tampil_buku = mysqli_query($con,"SELECT * FROM buku") or die (mysqli_error($con));
	$data_array = array();

	While ($data = mysqli_fetch_assoc($query_tampil_buku)) {
		$data_array[]=$data;
	}
	echo json_encode($data_array);

		break;
	
	case "insert":
	@$id = $_GET['id'];
	@$judul_buku= $_GET['judul_buku'];
    @$pengarang = $_GET['pengarang'];
    @$tahun_terbit = $_GET['tahun_terbit'];
    @$penerbit = $_GET['penerbit'];
    @$isbn = $_GET['isbn'];
    @$stok = $_GET['stok'];
    @$image = $_GET['image'];

	$query_insert_buku = mysqli_query($con, "INSERT INTO buku (id,judul_buku,pengarang,tahun_terbit,penerbit,isbn,stok,image)   VALUES('$id','$judul_buku','$pengarang','$tahun_terbit','$penerbit','$isbn','$stok','$image')");

	if ($query_insert_buku) {
		echo "Data Berhasil Disimpan";
	}
	else {
		echo "Maaf Insert Ke Dalam Database Error" . mysqli_error($con);
	}
	
	break;
	
	case "get_buku_by_id":
	@$id =(int)$_GET['id'];
	$query_tampil_buku = mysqli_query($con, "SELECT * FROM buku WHERE id='$id'") or die (mysqli_error($con));
	$data_array = array();
	$data_array = mysqli_fetch_assoc($query_tampil_buku);
	echo "[" .json_encode($data_array) . "]";
	break;

	case "update":
	@$judul_buku = $_GET['judul_buku'];
	@$pengarang = $_GET['pengarang'];
	@$tahun_terbit = $_GET['tahun_terbit'];
    @$penerbit = $_GET['penerbit'];
    @$isbn = $_GET['isbn'];
    @$stok = $_GET['stok'];
    @$image = $_GET['image'];
	@$id = $_GET['id'];

	$query_update_buku = mysqli_query($con, "UPDATE buku SET judul_buku ='$judul_buku', pengarang ='$pengarang', tahun_terbit ='$tahun_terbit', penerbit ='$penerbit', isbn ='$isbn', stok ='$stok', image ='$image' WHERE id='$id'");

	if ($query_update_buku) {
		echo "Update Data Berhasil";
	}
	else {
         echo mysqli_error($con);
	}
		break;

	case "delete":
	@$id = $_GET['id'];
	$query_delete_buku = mysqli_query($con, "DELETE FROM buku WHERE id='$id'");
	if ($query_delete_buku) {
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