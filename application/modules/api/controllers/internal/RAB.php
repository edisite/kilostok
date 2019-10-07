<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KategoriBarang
 *
 * @author edisite
 */
class RAB extends API_Controller{
    //put your code here
    private $any_error = array();
	// Define Main Table
    public $tbl = 'mitra_rab';
    public function __construct() {
        parent::__construct();
    }
    //loaddata 
    //1. Mitra - Barang Selected
    public function loadData_select_get(){
		$param 			= $this->input->get('q');
		$mitra_project 	= $this->input->get('mitra_project_kode');
		$mitra_id 		= $this->input->get('mitra_id');

		if ($param!=NULL) {
			$param = $this->input->get('q');
		} else {
			$param = "";
		}
		$select = '*';
		// $where['data'][] = array(
		// 	'column' => 'mitra_id',
		// 	'param'	 => $mitra_id
		// );
		// $where_like['data'][] = array(
		// 	'column' => 'mitra_project_kode',
		// 	'param'	 => $mitra_project
		// );
		$order['data'][] = array(
			'column' => 'rab_id',
			'type'	 => 'ASC'
		);
		$query = $this->mod->select($select, $this->tbl, NULL, null, NULL, null, $order);
		$response['items'] = array();
		if ($query<>false) {
			foreach ($query->result() as $val) {
				$response['items'][] = array(
					'id'	=> $val->rab_id,
					'text'	=> $val->rab_nama
				);
			}
			$response['status'] = '200';
		}
                $this->response($response);
	}
	public function GenCOA_get(){
		$coa = $this->input->get('coa', TRUE);
                
//                $response['status'] = '555555555';
//                    echo json_encode($response);
//                    return;
		$select = '*';
//		$where['data'][] = array(
//			'column' => 'KODE_INDUK',
//			'param'	 => $coa
//		);
		$this->load->helper('string');
		$this->db->where('rab_induk',$coa);
		$this->db->limit(1);
		$this->db->order_by('rab_id','DESC');
		$query = $this->mod->select($select, $this->tbl, NULL);
		if ($query<>false) {
                    foreach ($query->result() as $v) {
                        $response['status'] = increment_string($v->rab_id);
                    }			
		} else {
			$response['status'] = $coa.'_01';
		}   
                
		$response['status'] = '01000';
		echo json_encode($response);
	}
    
}
