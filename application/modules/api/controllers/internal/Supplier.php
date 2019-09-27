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
class Satuan extends API_Controller{
    //put your code here
    private $any_error = array();
	// Define Main Table
    public $tbl = 'm_satuan';
    public function __construct() {
        parent::__construct();
    }
    //loaddata 
    //1. Mitra - Barang Selected
    public function loadData_select_get(){
		$param = $this->input->get('q');
		if ($param!=NULL) {
			$param = $this->input->get('q');
		} else {
			$param = "";
		}
		$select = '*';
		$where['data'][] = array(
			'column' => 'satuan_status_aktif',
			'param'	 => 'y'
		);
		$where_like['data'][] = array(
			'column' => 'satuan_nama',
			'param'	 => $this->input->get('q')
		);
		$order['data'][] = array(
			'column' => 'satuan_nama',
			'type'	 => 'ASC'
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where, NULL, $where_like, $order);
		$response['items'] = array();
		if ($query<>false) {
			foreach ($query->result() as $val) {
				$response['items'][] = array(
					'id'	=> $val->satuan_id,
					'text'	=> $val->satuan_nama
				);
			}
			$response['status'] = '200';
		}
                $this->response($response);
            
	}
    
}
