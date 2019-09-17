<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends MY_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 'm_bidang';

	public function __construct() {
        parent::__construct();
	}

	public function index(){
		$this->view();
	}

	public function view(){
			$this->render('masterdata/bidang/V_bidang');
	}
	public function loadData(){

		$select = '*';
		//LIMIT
		$limit = array(
			'start'  => $this->input->get('start'),
			'finish' => $this->input->get('length')
		);
		//WHERE LIKE
		$where_like['data'][] = array(
			'column' => '`bidang_id`, `bidang_nama`, `bidang_status_aktif`, `bidang_create_date`, `bidang_create_by`, `bidang_update_date`, `bidang_update_by`',
			'param'	 => $this->input->get('search[value]')
		);
		//ORDER
		$index_order = $this->input->get('order[0][column]');
		$order['data'][] = array(
			'column' => $this->input->get('columns['.$index_order.'][name]'),
			'type'	 => $this->input->get('order[0][dir]')
		);

		$query = $this->mod->select($select, $this->tbl, NULL, NULL, NULL, $where_like, $order, $limit);

		$response['data'] = array();
		if ($query<>false) {
			$no = $limit['start']+1;
			foreach ($query->result() as $val) {
				$button = '';
                                $button .= '<button class="btn btn-info" type="button" onclick="openFormCoa('.$val->bidang_id.')" title="Edit" data-toggle="modal" href="#modaladd">
                                                        <i class="fa fa-pencil text-center"></i>
                                                 </button>';
                                $button .= '
                                                        <button class="btn btn-danger" type="button" onclick="deleteData('.$val->bidang_id.')" title="Hapus Bidang">
                                        <i class="icon-power text-center"></i>
                                </button>';
				$response['data'][] = array(			
					$val->bidang_id,
					$val->bidang_nama,
					$val->bidang_status_aktif,
					$val->bidang_create_date,
					$val->bidang_create_by,
					$button
				);
				$no++;
			}
		}

		echo json_encode($response);
	}
	public function getForm(){
		$this->check_session();
		$this->load->view("coa/V_form_coa");
	}

	public function loadDataWhere(){
		$select = '*';
		$where['data'][] = array(
			'column' => 'KODE_PERK',
			'param'	 => $this->input->get('id')
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where);
		if ($query<>false) {

			foreach ($query->result() as $val) {
				$hasil['val2'] = array();
				if ($val->coa_header != 0) {
					$where_coa['data'][] = array(
						'column' => 'coa_id',
						'param'	 => $val->coa_header
					);
					$query_coa = $this->mod->select('*',$this->tbl,NULL,$where_coa);
					foreach ($query_coa->result() as $val2) {
						$hasil['val2'][] = array(
							'id' 	=> $val2->coa_id,
							'text' 	=> $val2->coa_kode . " - " . $val2->coa_nama
						);
					}
				}

				$hasil2['val2'] = array();
				if ($val->coa_subheader != 0) {
					$where_coa2['data'][] = array(
						'column' => 'coa_id',
						'param'	 => $val->coa_subheader
					);
					$query_coa2 = $this->mod->select('*',$this->tbl,NULL,$where_coa2);
					foreach ($query_coa2->result() as $val2) {
						$hasil2['val2'][] = array(
							'id' 	=> $val2->coa_id,
							'text' 	=> $val2->coa_kode . " - " . $val2->coa_nama
						);
					}
				}

				$hasil3['val2'] = array();
//				$where_cashflow['data'][] = array(
//					'column' => 'cashflow_id',
//					'param'	 => $val->m_cashflow_id
//				);
//				$query_chasflow = $this->mod->select('*','m_cashflow',NULL,$where_cashflow);
//				foreach ($query_chasflow->result() as $val2) {
//					$hasil3['val2'][] = array(
//						'id' 	=> $val2->cashflow_id,
//						'text' 	=> $val2->cashflow_nama
//					);
//				}

				$hasil4['val2'] = array();
				$where_cabang['data'][] = array(
					'column' => 'cabang_id',
					'param'	 => $val->m_cabang_id
				);
				$query_cabang = $this->mod->select('*','m_cabang',NULL,$where_cabang);
				foreach ($query_cabang->result() as $val2) {
					$hasil4['val2'][] = array(
						'id' 	=> $val2->cabang_id,
						'text' 	=> $val2->cabang_nama
					);
				}

				$response['val'][] = array(
					'kode' 				=> $val->coa_id,
					'm_cabang_id'		=> $hasil4,
					'coa_header' 		=> $hasil,
					'coa_subheader' 	=> $hasil2,
					'coa_kode' 			=> $val->coa_kode,
					'coa_nama' 			=> $val->coa_nama,
					'coa_tipe' 			=> $val->coa_tipe,
					'coa_debit_kredit' 	=> $val->coa_debit_kredit,
					'm_cashflow_id' 	=> $hasil3,
					'coa_keterangan' 	=> $val->coa_keterangan,
				);
			}

			echo json_encode($response);
		}
	}

	public function checkCOA(){
		$coa = $this->input->get('coa', TRUE);
                if(empty($coa)){
                    $response['status'] = '204';
                    echo json_encode($response);
                    return;
                }
		$select = '*';
		$where['data'][] = array(
			'column' => 'KODE_PERK',
			'param'	 => $coa
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where);
		if ($query<>false) {
			$response['status'] = '204';
		} else {
			$response['status'] = '200';
		}               

		echo json_encode($response);
	}
        public function checkCOAMaster(){
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
                $this->db->where('KODE_PERK',$coa);
                $this->db->limit(1);
                $this->db->order_by('KODE_PERK','DESC');
		$query = $this->mod->select($select, $this->tbl, NULL);
		if ($query<>false) {
                    foreach ($query->result() as $v) {
                        if($v->G_OR_D == 'G'){
                            $sts = '204';
                        }else{
                            $sts ='100';
                        }
                        $response['status'] = $sts;
                    }			
		} else {
			$response['status'] = '101';
		}   
                

		echo json_encode($response);
	}
        public function GenCOA(){
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
                $this->db->where('KODE_INDUK',$coa);
                $this->db->limit(1);
                $this->db->order_by('KODE_PERK','DESC');
		$query = $this->mod->select($select, $this->tbl, NULL);
		if ($query<>false) {
                    foreach ($query->result() as $v) {
                        $response['status'] = increment_string($v->KODE_PERK, '.', 2);
                    }			
		} else {
			$response['status'] = $coa.'.01';
		}   
                

		echo json_encode($response);
	}
	public function loadData_select($type){
		$param = $this->input->get('q');
		$cabangid = $this->input->get('cabang_id');
		if ($param!=NULL) {
			$param = $this->input->get('q');
		} else {
			$param = "";
		}
//                var_dump(is_numeric($param));
//                return;
                $select = '*';
                        if($type == 1){			
                            $where['data'][] = array(
                                    'column' => 'CABANG_ID',
                                    'param'	 => $cabangid
                            );
                        }else{
                            $where = NULL;
                        }
                        if(is_numeric($param) == true)
                        {
                            $this->db->like('KODE_PERK',$param,'after');
                            $where_like =  null;
                        }
                        else
                        {
                            $where_like['data'][] = array(
				'column' => 'NAMA_PERK, KODE_PERK',
				'param'	 => $this->input->get('q')
                            );
                        }
			
			$order['data'][] = array(
				'column' => 'KODE_PERK',
				'type'	 => 'ASC'
			);

		$query = $this->mod->select($select, $this->tbl, NULL, $where, NULL, $where_like, $order);
		$response['items'] = array();
		if ($query<>false) {
			foreach ($query->result() as $val) {
                                if($val->G_OR_D == "D"){
                                    $gord	= $val->KODE_PERK . ' - ' . ucwords(strtolower($val->NAMA_PERK));
                                }else{
                                    $gord	= $val->KODE_PERK . ' - ' . $val->NAMA_PERK;
                                }
				$response['items'][] = array(
					'id'	=> $val->KODE_PERK,                                        
					'text'	=> $gord
                                        
				);
			}
			$response['status'] = '200';
		}

		echo json_encode($response);
	}

	// Function Insert & Update
	public function postData(){
		$id = $this->input->post('kode');
		if (strlen($id)>0) {
			//UPDATE
			$data = $this->general_post_data(2, $id);
			$where['data'][] = array(
				'column' => 'coa_id',
				'param'	 => $id
			);
			$update = $this->mod->update_data_table($this->tbl, $where, $data);
			if($update->status) {
				$response['status'] = '200';
			} else {
				$response['status'] = '204';
			}
		} else {
			//INSERT
			$data = $this->general_post_data(1);
			$insert = $this->mod->insert_data_table($this->tbl, NULL, $data);
			if($insert->status) {
				$response['status'] = '200';
			} else {
				$response['status'] = '204';
			}
		}
		
		echo json_encode($response);
	}

	/* Saving $data as array to database */
	function general_post_data($type, $id = null){
		// 1 Insert, 2 Update, 3 Delete / Non Aktif
		if ($type == 1) {
//			if ($this->input->post('coa_header', TRUE)) {
//				$header = $this->input->post('coa_header', TRUE);
//			} else {
//				$header = 0;
//			}
//
//			if ($this->input->post('coa_subheader', TRUE)) {
//				$subheader = $this->input->post('coa_subheader', TRUE);
//			} else {
//				$subheader = 0;
//			}
                        $level_perk = 1;

			$data = array(
				'KODE_PERK' 		=> $this->input->post('coa_kode', TRUE),
				'NAMA_PERK' 		=> $this->input->post('coa_nama', TRUE),
				'KODE_INDUK' 		=> $this->input->post('m_coa_id', TRUE),
				'LEVEL_PERK' 		=> $level_perk,
				'G_OR_D' 		=> $this->input->post('coa_gord',TRUE),                            
				'D_OR_K' 		=> $this->input->post('coa_debit_kredit', TRUE),
				'TYPE_PERK'	=> $this->input->post('coa_keterangan', TRUE),
			);
		} else if ($type == 2) {
			if ($this->input->post('coa_header', TRUE)) {
				$header = $this->input->post('coa_header', TRUE);
			} else {
				$header = 0;
			}

			if ($this->input->post('coa_subheader', TRUE)) {
				$subheader = $this->input->post('coa_subheader', TRUE);
			} else {
				$subheader = 0;
			}

			$data = array(
				'm_cabang_id' 		=> $this->session->userdata('cabang_id'),
				'coa_kode' 			=> $this->input->post('coa_kode', TRUE),
				'coa_header' 		=> $header,
				'coa_subheader' 	=> $subheader,
				'coa_nama' 			=> $this->input->post('coa_nama', TRUE),
				'coa_tipe' 			=> $this->input->post('coa_tipe', TRUE),
				'coa_keterangan'	=> $this->input->post('coa_keterangan', TRUE),
				'coa_debit_kredit'	=> $this->input->post('coa_debit_kredit', TRUE),
				'm_cashflow_id'		=> $this->input->post('m_cashflow_id', TRUE),
			);
		}

		return $data;
	}
	/* end Function */

}
