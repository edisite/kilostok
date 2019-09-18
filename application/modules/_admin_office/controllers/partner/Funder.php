<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funder extends Admin_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 'mitra_akun';

	public function __construct() {
        parent::__construct();
            $this->mPageTitlePrefix ='Funder - ';
	}

	public function index(){
		$this->view();
	}

	public function view(){
                $crud = $this->generate_crud($this->tbl);
                $crud->columns('mitra_nama', 'mitra_kode', 'mitra_regkode', 'mitra_inisial','mitra_email_bisnis','mitra_aktivasi');
                $crud->display_as('periode_id', 'Kode');
                $crud->display_as('mitra_nama', 'Nama');
                $crud->display_as('mitra_kode', 'Kode');
                $crud->display_as('mitra_regkode', 'RegKode');
                $crud->display_as('mitra_inisial', 'Inisiasi');
                $crud->display_as('mitra_email_bisnis', 'Email');
                $crud->display_as('mitra_aktivasi', 'Aktivasi');
                $this->mPageTitle = 'Daftar Funder';
                $crud->set_subject('Mitra');       
                $crud->unset_add();
                $crud->unset_delete();
                $crud->add_action('Photos', 's', '','ui-icon-image',array($this,'just_a_test'));
                
		$this->render_crud();
	}
	function just_a_test($primary_key , $row)
        {
            return site_url('demo/action/action_photos').'?country='.$row->mitra_id;
        }

}
