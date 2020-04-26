<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'PagesController/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


/* PAGES */
$route['home'] = 'PagesController/home';
$route['kontak'] = 'PagesController/kontak';
$route['produk'] = 'PagesController/produk';
$route['produk/(:any)'] = 'PagesController/produk_kategori/$1';
$route['tambah-keranjang/(:any)'] = 'PagesController/tambah_keranjang/$1';
$route['keranjang-belanja'] = 'PagesController/keranjang_belanja';
$route['update-keranjang/(:any)'] = 'PagesController/update_keranjang/$i';
$route['hapus-keranjang'] = 'PagesController/hapus_keranjang';
$route['pembayaran'] = 'PagesController/pembayaran';
$route['selesai-belanja'] = 'PagesController/selesai_belanja';
$route['cetak-invoice'] = 'PagesController/cetak_invoice';
$route['produk/(:any)/(:any)'] = 'PagesController/show_produk/$1/$2';

$route['login'] = 'AuthController/login';
$route['cekLogin'] = 'AuthController/cekLogin';
$route['register'] = 'AuthController/register';
$route['logout'] = 'AuthController/logout';


/*===================================================================================================*/
/* USER */
/*===================================================================================================*/
/* DASHBOARD */
$route['dashboard'] = 'user/DashboardUser/index';
$route['dashboard/(:any)'] = 'user/DashboardUser/index';

/*PESANAN*/
$route['pesanan'] = 'user/Pesanan/index';
$route['pesanan/(:any)'] = 'user/Pesanan/read/$1';

/*Konfirmasi Pembayaran*/
$route['konfirmasi-pembayaran'] = 'user/KonfirmasiPembayaran/cek_invoice';
$route['konfirmasi-pembayaran/cek-invoice'] = 'user/KonfirmasiPembayaran/konfirmasi_pembayaran';
$route['konfirmasi-pembayaran/proses'] = 'user/KonfirmasiPembayaran/prosesKonfirmasi';



/*===================================================================================================*/
/* ADMIN */
/*===================================================================================================*/
/* MANAGE */
$route['manage'] = 'admin/DashboardAdmin/index';
/* Data Admin */
$route['manage/data-admin'] = 'admin/DataAdmin/index';
$route['manage/data-admin/create'] = 'admin/DataAdmin/create';
$route['manage/data-admin/read/(:any)'] = 'admin/DataAdmin/read/$1';
$route['manage/data-admin/edit/(:any)'] = 'admin/DataAdmin/edit/$1';
$route['manage/data-admin/update/(:any)'] = 'admin/DataAdmin/update/$1';
$route['manage/data-admin/delete/(:any)'] = 'admin/DataAdmin/delete/$1';

/* Data User */
$route['manage/data-user'] = 'admin/DataUser/index';
$route['manage/data-user/tambah'] = 'admin/DataUser/create';
$route['manage/data-user/read/(:any)'] = 'admin/DataUser/read/$1';
$route['manage/data-user/edit/(:any)'] = 'admin/DataUser/edit/$1';
$route['manage/data-user/update/(:any)'] = 'admin/DataUser/update/$1';
$route['manage/data-user/delete/(:any)'] = 'admin/DataUser/delete/$1';

/* Data Kategori */
$route['manage/data-kategori'] = 'admin/DataKategori/index';
$route['manage/data-kategori/tambah'] = 'admin/DataKategori/create';
$route['manage/data-kategori/read/(:any)'] = 'admin/DataKategori/read/$1';
$route['manage/data-kategori/edit/(:any)'] = 'admin/DataKategori/edit/$1';
$route['manage/data-kategori/update/(:any)'] = 'admin/DataKategori/update/$1';
$route['update/kategori/(:any)'] = 'admin/DataKategori/update_kategori/$1';
$route['manage/data-kategori/delete/(:any)'] = 'admin/DataKategori/delete/$1';

/* Data Produk */
$route['manage/data-produk'] = 'admin/DataProduk/index';
$route['manage/data-produk/tambah'] = 'admin/DataProduk/create';
$route['manage/data-produk/read/(:any)'] = 'admin/DataProduk/read/$1';
$route['manage/data-produk/edit/(:any)'] = 'admin/DataProduk/edit/$1';
$route['manage/data-produk/update/(:any)'] = 'admin/DataProduk/update/$1';
$route['manage/data-produk/delete/(:any)'] = 'admin/DataProduk/delete/$1';
$route['tambah-foto/(:any)'] = 'admin/DataProduk/tambah_foto/$1';
$route['tambah-foto/(:any)/store'] = 'admin/DataProduk/store_foto/$1';
$route['tambah-foto/hapus-semua/(:any)'] = 'admin/DataProduk/hapus_semua/$1';


/* Data Pesanan */
$route['manage/data-pesanan'] = 'admin/DataPesanan/index';
$route['manage/data-pesanan/tambah'] = 'admin/DataPesanan/create';
$route['manage/data-pesanan/read/(:any)'] = 'admin/DataPesanan/read/$1';
$route['manage/data-pesanan/edit/(:any)'] = 'admin/DataPesanan/edit/$1';
$route['manage/data-pesanan/update/(:any)'] = 'admin/DataPesanan/update/$1';
$route['manage/data-pesanan/delete/(:any)'] = 'admin/DataPesanan/delete/$1';
$route['manage/data-pesanan/cetak'] = 'admin/DataPesanan/cetak';


/* Data Kota */
$route['manage/data-kota'] = 'admin/DataKota/index';
$route['manage/data-kota/tambah'] = 'admin/DataKota/create';
$route['manage/data-kota/read/(:any)'] = 'admin/DataKota/read/$1';
$route['manage/data-kota/edit/(:any)'] = 'admin/DataKota/edit/$1';
$route['manage/data-kota/update/(:any)'] = 'admin/DataKota/update/$1';
$route['manage/data-kota/delete/(:any)'] = 'admin/DataKota/delete/$1';

/* Verifikasi Pembayaran */
$route['manage/verifikasi-pembayaran'] = 'admin/VerifikasiPembayaran/index';
$route['manage/verifikasi-pembayaran/tambah'] = 'admin/VerifikasiPembayaran/create';
$route['manage/verifikasi-pembayaran/verifikasi/(:any)'] = 'admin/VerifikasiPembayaran/verifikasi/$1';
$route['verifikasi-pembayaran/proses/(:any)'] = 'admin/VerifikasiPembayaran/prosesVerifikasi/$1';
$route['manage/verifikasi-pembayaran/read/(:any)'] = 'admin/VerifikasiPembayaran/read/$1';
$route['manage/verifikasi-pembayaran/edit/(:any)'] = 'admin/VerifikasiPembayaran/edit/$1';
$route['manage/verifikasi-pembayaran/update/(:any)'] = 'admin/VerifikasiPembayaran/update/$1';
$route['manage/verifikasi-pembayaran/delete/(:any)'] = 'admin/VerifikasiPembayaran/delete/$1';
