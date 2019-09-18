<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_kategori extends Admin_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 'm_produk_kategori';

	public function __construct() {
        parent::__construct();
            $this->mPageTitlePrefix ='Master Data - ';
	}

	public function index(){
		$this->view();
	}

	public function view(){
                $crud = $this->generate_crud($this->tbl);
                $crud->columns('kategori_id','kategori_nama','kategori_status_aktif','kategori_create_date','kategori_create_by',
                        'kategori_update_date','kategori_update_by');
                $crud->display_as('kategori_id', 'Kode');
                $crud->display_as('kategori_nama', 'Nama');
                $crud->display_as('kategori_status_aktif', 'Status');
                $crud->display_as('kategori_create_date', 'Create Date');
                $crud->display_as('kategori_create_by', 'Create By');
                $crud->display_as('kategori_update_date', 'Update Date');
                $crud->display_as('kategori_update_by', 'Update By');
                $crud->set_subject('Produk Kategori');                
 
		$this->render_crud();
	}

}
