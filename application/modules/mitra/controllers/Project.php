<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
        $files = array(
                            'app-assets/js/scripts/forms/validation/form-validation.js',
                            'app-assets/vendors/js/tables/datatable/datatables.min.js',
                            'app-assets/js/scripts/tables/datatables/datatable-styling.js',
                );
                $screen = array(
                            'app-assets/css/plugins/forms/validation/form-validation.css',
                            'app-assets/vendors/css/tables/datatable/datatables.min.css'
                );
                $this->add_script($files);  
                $this->add_stylesheet($screen);
    }

    public function index()
    {
        $this->render('project/mitra_project_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Project_model->json();
    }

    public function read($id) 
    {
        $row = $this->Project_model->get_by_id($id);
        if ($row) {
            $this->mViewData = array(
		'project_id' => $row->project_id,
		'project_mitra_id' => $row->project_mitra_id,
		'project_kode' => $row->project_kode,
		'project_nama' => $row->project_nama,
		'project_detail' => $row->project_detail,
		'project_nilai' => $row->project_nilai,
		'project_lampiran' => $row->project_lampiran,
		'project_aktifasi' => $row->project_aktifasi,
		'project_create_date' => $row->project_create_date,
		'project_create_by' => $row->project_create_by,
		'project_update_date' => $row->project_update_date,
		'project_update_by' => $row->project_update_by,
	    );
            $this->render('project/mitra_project_read');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('project'));
        }
    }

    public function create() 
    {
        $this->mViewData = array(
            'button' => 'Create',
            'action' => site_url('project/create_action'),
	    'project_id' => set_value('project_id'),
	    'project_mitra_id' => set_value('project_mitra_id'),
	    'project_kode' => set_value('project_kode'),
	    'project_nama' => set_value('project_nama'),
	    'project_detail' => set_value('project_detail'),
	    'project_nilai' => set_value('project_nilai'),
	    'project_lampiran' => set_value('project_lampiran'),
	    'project_aktifasi' => set_value('project_aktifasi'),
	    'project_create_date' => set_value('project_create_date'),
	    'project_create_by' => set_value('project_create_by'),
	    'project_update_date' => set_value('project_update_date'),
	    'project_update_by' => set_value('project_update_by'),
	);
        $this->render('project/mitra_project_form');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'project_mitra_id' => $this->input->post('project_mitra_id',TRUE),
		'project_kode' => $this->input->post('project_kode',TRUE),
		'project_nama' => $this->input->post('project_nama',TRUE),
		'project_detail' => $this->input->post('project_detail',TRUE),
		'project_nilai' => $this->input->post('project_nilai',TRUE),
		'project_lampiran' => $this->input->post('project_lampiran',TRUE),
		'project_aktifasi' => $this->input->post('project_aktifasi',TRUE),
		'project_create_date' => $this->input->post('project_create_date',TRUE),
		'project_create_by' => $this->input->post('project_create_by',TRUE),
		'project_update_date' => $this->input->post('project_update_date',TRUE),
		'project_update_by' => $this->input->post('project_update_by',TRUE),
	    );

            $this->Project_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('project'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Project_model->get_by_id($id);

        if ($row) {
            $this->mViewData = array(
                'button' => 'Update',
                'action' => site_url('project/update_action'),
		'project_id' => set_value('project_id', $row->project_id),
		'project_mitra_id' => set_value('project_mitra_id', $row->project_mitra_id),
		'project_kode' => set_value('project_kode', $row->project_kode),
		'project_nama' => set_value('project_nama', $row->project_nama),
		'project_detail' => set_value('project_detail', $row->project_detail),
		'project_nilai' => set_value('project_nilai', $row->project_nilai),
		'project_lampiran' => set_value('project_lampiran', $row->project_lampiran),
		'project_aktifasi' => set_value('project_aktifasi', $row->project_aktifasi),
		'project_create_date' => set_value('project_create_date', $row->project_create_date),
		'project_create_by' => set_value('project_create_by', $row->project_create_by),
		'project_update_date' => set_value('project_update_date', $row->project_update_date),
		'project_update_by' => set_value('project_update_by', $row->project_update_by),
	    );
            $this->render('project/mitra_project_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('project'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('project_id', TRUE));
        } else {
            $data = array(
		'project_mitra_id' => $this->input->post('project_mitra_id',TRUE),
		'project_kode' => $this->input->post('project_kode',TRUE),
		'project_nama' => $this->input->post('project_nama',TRUE),
		'project_detail' => $this->input->post('project_detail',TRUE),
		'project_nilai' => $this->input->post('project_nilai',TRUE),
		'project_lampiran' => $this->input->post('project_lampiran',TRUE),
		'project_aktifasi' => $this->input->post('project_aktifasi',TRUE),
		'project_create_date' => $this->input->post('project_create_date',TRUE),
		'project_create_by' => $this->input->post('project_create_by',TRUE),
		'project_update_date' => $this->input->post('project_update_date',TRUE),
		'project_update_by' => $this->input->post('project_update_by',TRUE),
	    );

            $this->Project_model->update($this->input->post('project_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('project'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Project_model->get_by_id($id);

        if ($row) {
            $this->Project_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('project'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('project'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('project_mitra_id', 'project mitra id', 'trim|required');
	$this->form_validation->set_rules('project_kode', 'project kode', 'trim|required');
	$this->form_validation->set_rules('project_nama', 'project nama', 'trim|required');
	$this->form_validation->set_rules('project_detail', 'project detail', 'trim|required');
	$this->form_validation->set_rules('project_nilai', 'project nilai', 'trim|required|numeric');
	$this->form_validation->set_rules('project_lampiran', 'project lampiran', 'trim|required');
	$this->form_validation->set_rules('project_aktifasi', 'project aktifasi', 'trim|required');
	$this->form_validation->set_rules('project_create_date', 'project create date', 'trim|required');
	$this->form_validation->set_rules('project_create_by', 'project create by', 'trim|required');
	$this->form_validation->set_rules('project_update_date', 'project update date', 'trim|required');
	$this->form_validation->set_rules('project_update_by', 'project update by', 'trim|required');

	$this->form_validation->set_rules('project_id', 'project_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mitra_project.xls";
        $judul = "mitra_project";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Mitra Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Detail");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Nilai");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Lampiran");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Aktifasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Create By");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Update Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Project Update By");

	foreach ($this->Project_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->project_mitra_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->project_kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->project_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->project_detail);
	    xlsWriteNumber($tablebody, $kolombody++, $data->project_nilai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->project_lampiran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->project_aktifasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->project_create_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->project_create_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->project_update_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->project_update_by);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Project.php */
/* Location: ./application/controllers/Project.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-20 11:43:43 */
/* http://harviacode.com */