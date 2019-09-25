<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'Mitra Panel',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),
	
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(

		),
		'foot'	=> array(
                        'app-assets/vendors/js/vendors.min.js',
			'app-assets/vendors/js/ui/jquery.sticky.js',
			'app-assets/vendors/js/tables/datatable/datatables.min.js',
			'app-assets/vendors/js/charts/jquery.sparkline.min.js',
			'app-assets/vendors/js/forms/icheck/icheck.min.js',
			'app-assets/js/core/app-menu.js',
			'app-assets/js/core/app.js',
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
                        'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700',
			'app-assets/css/vendors.css',
			'app-assets/vendors/css/forms/icheck/icheck.css',
			'app-assets/vendors/css/forms/icheck/custom.css',
			'app-assets/css/app.css',
                        'app-assets/css/app.min.css',
			'assets/css/style.css',
			'app-assets/css/core/menu/menu-types/horizontal-top-icon-menu.css',
		)
	),

	// Default CSS class for <body> tag
	'body_class' => 'navbar-light',
	
	// Multilingual settings
	'languages' => array(
	),

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> 'home',
			'icon'		=> 'icon-home',
		),
		'makun' => array(
			'name'		=> 'Akun Mitra',
			'url'		=> 'akun',
			'icon'		=> 'fa fa-users',
		),
                'master' => array(
			'name'		=> 'Master',
			'url'		=> '',
			'icon'		=> 'fa fa-medium',
			'children'  => array(
				'Barang'			=> 'barang',
				'Supplier'			=> 'supplier',
				'Pelanggan'			=> 'pelanggan',
				'Gudang'			=> 'gudang',
			)
		),
                'project' => array(
			'name'		=> 'Project',
			'url'		=> 'project',
			'icon'		=> 'fa fa-medium',
		),
                'mpembelian' => array(
			'name'		=> 'Pembelian',
			'url'		=> '',
			'icon'		=> 'fa fa-medium',
			'children'  => array(
				'Order Pembelian'			=> '',
				'Request Pembelian Produk'			=> '',
			)
		),
                'rpembelian' => array(
			'name'		=> 'Report Pembelian',
			'url'		=> '',
			'icon'		=> 'fa fa-medium',
			'children'  => array(
				'Report Pembelian'			=> 'tes/tes',
			)
		),
                'mgudang' => array(
			'name'		=> 'Gudang',
			'url'		=> '',
			'icon'		=> 'fa fa-medium',
			'children'  => array(
				'Request Pembelian Produk'			=> 'tes/tes',
				'Barang Masuk'			=> 'tes/tes',
				'Barang Keluar'			=> 'tes/tes',
			)
		),
                'mpenjualan' => array(
			'name'		=> 'Penjualan',
			'url'		=> '',
			'icon'		=> 'fa fa-medium',
			'children'  => array(
				'Transaksi Penjualan'			=> 'tes/tes',
				'Pelanggan'			=> 'tes/tes',
			)
		),
                'rpenjualan' => array(
			'name'		=> 'Report Penjualan',
			'url'		=> '',
			'icon'		=> 'fa fa-medium',
			'children'  => array(
				'Report Jual Detail Produk'			=> 'tes/tes',
				'Laporan Jual per Transaksi'			=> 'tes/tes',
				'Cetak Transaksi Penjualan'			=> 'tes/tes',
			)
		),
                'mkeuangan' => array(
			'name'		=> 'Keuangan',
			'url'		=> '',
			'icon'		=> 'fa fa-medium',
			'children'  => array(
				'Jurnal Transaksi'			=> 'tes/tes',
				'Laporan Keuangan'			=> 'tes/tes',
				'Kelola Permintaan Modal'			=> 'tes/tes',
			)
		),
                'msdm' => array(
			'name'		=> 'SDM',
			'url'		=> '',
			'icon'		=> 'fa fa-medium',
			'children'  => array(
				'Kelola Karyawan'			=> 'tes/tes',
				'Kelola Gaji'			=> 'tes/tes',
				'Kelola Absensi'			=> 'tes/tes',
			)
		),

	),

	// Login page
	'login_url' => 'mitra/login',

	// Restricted pages
	'page_auth' => array(
		'user/create'				=> array('webmaster', 'admin', 'manager'),
		'user/group'				=> array('webmaster', 'admin', 'manager'),
		'panel'						=> array('webmaster'),
		'panel/admin_user'			=> array('webmaster'),
		'panel/admin_user_create'               => array('webmaster'),
		'panel/admin_user_group'                => array('webmaster'),
		'util'						=> array('webmaster'),
		'util/list_db'				=> array('webmaster'),
		'util/backup_db'			=> array('webmaster'),
		'util/restore_db'			=> array('webmaster'),
		'util/remove_db'			=> array('webmaster'),
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'navbar-light',
			'admin'		=> '',
			'manager'	=> '',
			'staff'		=> '',
		)
	),


	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'kilostok_session_mitra';