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
	'site_name' => 'Admin Panel',

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
			'app-assets/vendors/js/charts/jquery.sparkline.min.js',
			'app-assets/vendors/js/tables/datatable/datatables.min.js',
			'app-assets/vendors/js/forms/icheck/icheck.min.js',
//			'app-assets/vendors/js/extensions/jquery.knob.min.js',
//			'app-assets/vendors/js/charts/raphael-min.js',
//			'app-assets/vendors/js/charts/morris.min.js',
//			'app-assets/vendors/js/extensions/unslider-min.js',
//			'app-assets/vendors/js/charts/echarts/echarts.js',
			'app-assets/js/core/app-menu.js',
			'app-assets/js/core/app.js',
			'app-assets/js/scripts/ui/breadcrumbs-with-stats.js',
//			'app-assets/js/scripts/pages/dashboard-fitness.js',
//                        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
                        'app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js'
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
                        'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700',
			'app-assets/css/vendors.css',
                        'app-assets/vendors/css/tables/datatable/datatables.min.css',
			'app-assets/vendors/css/forms/icheck/icheck.css',
			'app-assets/vendors/css/forms/icheck/custom.css',
			'app-assets/css/app.css',
			'app-assets/css/core/menu/menu-types/horizontal-top-icon-menu.css',
			'app-assets/css/core/colors/palette-climacon.css',
			'app-assets/css/pages/users.css',
			'assets/css/style.css'
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
		'masterdata1' => array(
			'name'		=> 'Master Data',
			'url'		=> '',
			'icon'		=> 'fa fa-medium',
			'children'  => array(
				'Bidang'			=> 'masterdata/bidang',
				'Kategori Produk'               => 'masterdata/produk_kategori',
				'Periode'			=> 'masterdata/periode',
				'Satuan'			=> 'masterdata/satuan',
				'Daftar Bank'			=> 'masterdata/bank',
				'Daftar Provinsi'			=> 'masterdata/provinsi',
				'Daftar Kab. Kota'			=> 'masterdata/regensi',
			)
		),
		'mitra' => array(
			'name'		=> 'Mitra',
			'url'		=> 'mitra',
			'icon'		=> 'fa fa-address-card',
			'children'  => array(
				'List Mitra'							=> 'partner/mitra',
				'Pengajuan Pinjaman'                  	=> 'mitra/peganjuan',
			)
		),
		'funder' => array(
			'name'		=> 'Funder',
			'url'		=> 'funder',
			'icon'		=> 'fa fa-address-card-o',
			'children'  => array(
				'List Funder'                   => 'partner/funder',
				'Create Funder'                 => '',
			)
		),
		'panel' => array(
			'name'		=> 'Admin Panel',
			'url'		=> 'panel',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'Admin Users'			=> 'panel/admin_user',
				'Create Admin User'		=> 'panel/admin_user_create',
				'Admin User Groups'		=> 'panel/admin_user_group',
			)
		),
		'util' => array(
			'name'		=> 'Utilities',
			'url'		=> 'util',
			'icon'		=> 'fa fa-cogs',
			'children'  => array(
				'Database Versions'		=> 'util/list_db',
			)
		),
		'logout' => array(
			'name'		=> 'Logout',
			'url'		=> 'panel/logout',
			'icon'		=> 'fa fa-sign-out',
			
		),
	),

	// Login page
	'login_url' => '_admin_office/login',

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
			'webmaster'	=> 'navbar-dark',
			'admin'		=> '',
			'manager'	=> '',
			'staff'		=> '',
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Frontend Website',
			'url'		=> '',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		),
		array(
			'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'API Site',
			'url'		=> 'api',
			'target'	=> '_blank',
			'color'		=> 'text-orange'
		),
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Github Repo',
			'url'		=> '',
			'target'	=> '_blank',
			'color'		=> 'text-green'
		),
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
$config['sess_cookie_name'] = 'kilostok_session_admin_office';