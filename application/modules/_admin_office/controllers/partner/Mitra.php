<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends Admin_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 'mitra_akun';

	public function __construct() {
        parent::__construct();
            $this->mPageTitlePrefix ='Mitra - ';
	}

	public function index(){
		$this->view();
	}

	public function view(){
                $crud = $this->generate_crud($this->tbl);
                
                $crud->columns('mitra_nama', 'mitra_email_bisnis', 'mitra_kode', 'mitra_regkode', 'mitra_inisial','mitra_aktivasi');
                $crud->display_as('periode_id', 'Kode');
                $crud->display_as('periode_nama', 'Nama');
                $crud->display_as('periode_status_aktif', 'Status');
                $crud->display_as('periode_create_date', 'Create Date');
                $crud->display_as('periode_create_by', 'Create By');
                $crud->display_as('periode_update_date', 'Update Date');
                $crud->display_as('periode_update_by', 'Update By');
                $this->mPageTitle = 'Daftar Mitra';
                $crud->set_subject('Mitra');                
                
		$this->render_crud();
	}
	

}
