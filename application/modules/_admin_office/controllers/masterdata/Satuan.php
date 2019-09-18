<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends Admin_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 'm_satuan';

	public function __construct() {
        parent::__construct();
            $this->mPageTitlePrefix ='Master Data - ';
	}

	public function index(){
		$this->view();
	}

	public function view(){
                $crud = $this->generate_crud($this->tbl);
                $crud->columns('satuan_id','satuan_nama','satuan_status_aktif','satuan_create_date','satuan_create_by',
                        'satuan_update_date','satuan_update_by');
                $crud->display_as('satuan_id', 'Kode');
                $crud->display_as('satuan_nama', 'Nama');
                $crud->display_as('satuan_status_aktif', 'Status');
                $crud->display_as('satuan_create_date', 'Create Date');
                $crud->display_as('satuan_create_by', 'Create By');
                $crud->display_as('satuan_update_date', 'Update Date');
                $crud->display_as('satuan_update_by', 'Update By');
                $this->mPageTitle = 'Satuan';
                $crud->set_subject('Satuan');
                
		$this->render_crud();
	}
	

}
