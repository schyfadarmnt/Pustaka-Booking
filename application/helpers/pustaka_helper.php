<?php

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
        redirect('autentifikasi');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}

function cek_user() 
{ 
	$ci = get_instance(); 
	$role_id = $ci->session->userdata('role_id'); 
	if ($role_id != 2) { 
		$ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses tidak diizinkan </div>'); redirect('home'); 
	} 
}
