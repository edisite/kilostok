<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regensi extends Admin_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 'm_regencies';

	public function __construct() {
        parent::__construct();
            $this->mPageTitlePrefix ='Master Data - ';
	}

	public function index(){
		$this->view();
	}

	public function view(){
                $crud = $this->generate_crud($this->tbl);
                $crud->columns('regenci_id','regenci_name','regenci_status_aktif','regenci_create_date','regenci_create_by',
                        'regenci_update_date','regenci_update_by');
                $crud->display_as('regenci_id', 'Kode');
                $crud->display_as('regenci_name', 'Nama');
                $crud->display_as('regenci_status_aktif', 'Status');
                $crud->display_as('regenci_create_date', 'Create Date');
                $crud->display_as('regenci_create_by', 'Create By');
                $crud->display_as('regenci_update_date', 'Update Date');
                $crud->display_as('regenci_update_by', 'Update By');
                $this->mPageTitle = 'Daftar Kab. Kota';
                $crud->set_subject('Regensi');
                
		$this->render_crud();
	}
	

}
