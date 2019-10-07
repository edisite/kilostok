<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Panel management, includes: 
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class Mitra extends Admin_Controller {
	public $tbl = 'v_project_list';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
                $this->mPageTitlePrefix ='Admin Panel - ';
	}
	public function Peganjuan()
	{
		# code...
		$crud = $this->generate_crud('mitra_project');
		$crud->set_theme('datatables');
               $crud->columns('project_kode', 
				'project_nama', 
				'project_detail', 
				'project_nilai', 
				'project_create_date', 
				'project_create_by',
				'project_status'
				);
                $crud->display_as('project_kode', 'Kode');
                $crud->display_as('project_nama', 'Nama');
                $crud->display_as('project_nilai', 'Nilai Project');
                $crud->display_as('project_create_date', 'Create Date');
                $crud->display_as('project_create_by', 'Create By');
                $crud->display_as('project_lampiran', 'Lampiran');
                $crud->display_as('project_status', 'Status');
				$this->mPageTitle = 'Daftar Pengajuan Project';
				$crud->add_action('Pilih', 'Pilih', '_admin_office/mitra/PengajuanDetail', '');
				$crud->unset_add();
                $crud->set_subject('Project');                
                
		$this->render_crud();
	}
	public function PengajuanDetail($var = null)
	{
		# code...
		$select = '*';
		//LIMIT
		$limit = array(
			'start'  => $this->input->get('start') ?: 0,
			'finish' => $this->input->get('length') ?: 1
		);

		$where['data'][] = array(
			'column' => 'project_id',
			'param'	 => $var
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where, NULL, null, null, $limit);
		$this->mViewData['data']		= $query->result();

		$this->render('pengajuan/pengajuanDetail');
	}
	
}
