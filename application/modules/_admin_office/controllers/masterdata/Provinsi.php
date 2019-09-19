<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends Admin_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 'm_provinces';

	public function __construct() {
        parent::__construct();
            $this->mPageTitlePrefix ='Master Data - ';
	}

	public function index(){
		$this->view();
	}

	public function view(){
                $crud = $this->generate_crud($this->tbl);
                $crud->columns('provinces_id','provinces_nama','provinces_status_aktif','provinces_create_date','provinces_create_by',
                        'provinces_update_date','provinces_update_by');
                $crud->display_as('provinces_id', 'Kode');
                $crud->display_as('provinces_nama', 'Nama');
                $crud->display_as('provinces_status_aktif', 'Status');
                $crud->display_as('provinces_create_date', 'Create Date');
                $crud->display_as('provinces_create_by', 'Create By');
                $crud->display_as('provinces_update_date', 'Update Date');
                $crud->display_as('provinces_update_by', 'Update By');
                $this->mPageTitle = 'Daftar Provinsi';
                $crud->set_subject('Provinsi');
                
		$this->render_crud();
	}
	

}
