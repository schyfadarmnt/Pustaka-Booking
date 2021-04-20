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
	
	$query_tampil_user = mysqli_query($con,"SELECT * FROM user") or die (mysqli_error($con));
	$data_array = array();

	While ($data = mysqli_fetch_assoc($query_tampil_user)) {
		$data_array[]=$data;
	}
	echo json_encode($data_array);

		break;
	
	case "insert":
	@$id = $_GET['id'];
	@$nama = $_GET['nama'];
    @$email = $_GET['email'];
    @$image = $_GET['image'];
    @$password = $_GET['password'];
        

	$query_insert_data = mysqli_query($con, "INSERT INTO user (id,nama,email,image,password)   VALUES('$id','$nama','$email','$image','$password')");

	if ($query_insert_data) {
		echo "Data Berhasil Disimpan";
	}
	else {
		echo "Maaf Insert Ke Dalam Database Error" . mysqli_error($con);
	}
	
	break;
	
	case "get_user_by_id":
	@$id =(int)$_GET['id'];
	$query_tampil_user = mysqli_query($con, "SELECT * FROM user WHERE id='$id'") or die (mysqli_error($con));
	$data_array = array();
	$data_array = mysqli_fetch_assoc($query_tampil_user);
	echo "[" .json_encode($data_array) . "]";
	break;

	case "update":
	@$nama = $_GET['nama'];
        @$alamat = $_GET['alamat'];
        @$email = $_GET['email'];
        @$image = $_GET['image'];
	@$id = $_GET['id'];

	$query_update_user = mysqli_query($con, "UPDATE user SET nama ='$nama', alamat ='$alamat', email ='$email', image ='$image' WHERE id='$id'");

	if ($query_update_user) {
		echo "Update Data Berhasil";
	}
	else {
         echo mysqli_error($con);
	}
		break;

	case "delete":
	@$id = $_GET['id'];
	$query_delete_user = mysqli_query($con, "DELETE FROM user WHERE id='$id'");
	if ($query_delete_user) {
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