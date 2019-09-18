<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends Admin_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 'm_periode';

	public function __construct() {
        parent::__construct();
            $this->mPageTitlePrefix ='Master Data - ';
	}

	public function index(){
		$this->view();
	}

	public function view(){
                $crud = $this->generate_crud($this->tbl);
                $crud->columns('periode_id','periode_nama','periode_status_aktif','periode_create_date','periode_create_by',
                        'periode_update_date','periode_update_by');
                $crud->display_as('periode_id', 'Kode');
                $crud->display_as('periode_nama', 'Nama');
                $crud->display_as('periode_status_aktif', 'Status');
                $crud->display_as('periode_create_date', 'Create Date');
                $crud->display_as('periode_create_by', 'Create By');
                $crud->display_as('periode_update_date', 'Update Date');
                $crud->display_as('periode_update_by', 'Update By');
                $this->mPageTitle = 'Periode';
                $crud->set_subject('Periode');                
                
		$this->render_crud();
	}
	

}
