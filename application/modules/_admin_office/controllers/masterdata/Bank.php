<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends Admin_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 'm_daftar_bank';

	public function __construct() {
        parent::__construct();
            $this->mPageTitlePrefix ='Master Data - ';
	}

	public function index(){
		$this->view();
	}

	public function view(){
                $crud = $this->generate_crud($this->tbl);
                $crud->columns('kode_bank','nama_bank','biaya_adm','status','keterangan');
                $crud->display_as('kode_bank', 'Kode');
                $crud->display_as('nama_bank', 'Nama');
                $crud->display_as('status', 'Status');
                $crud->display_as('biaya_adm', 'Biaya Admin');
                $crud->display_as('keterangan', 'Keterangan');
                $this->mPageTitle = 'Daftar Bank';
                $crud->set_subject('Bank');
                
                
		$this->render_crud();
	}
	

}
