<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project extends Admin_Controller
{
	public $tbl 	= 'mitra_project';
    function __construct()
    {
		parent::__construct();  
		$screen = array(
			'app-assets/css/pages/project.css',
			'app-assets/css/pages/timeline.css',
		);      
		$files = array(
			'app-assets/js/scripts/pages/timeline.js',
		);      
                $this->add_script($files);  
                $this->add_stylesheet($screen);

    }

    public function index()
    {
        $this->mPageTitle = 'Project';
        $this->render('project/project_list');
    } 
    public function Create() {
        $this->mPageTitle = 'Project';
        $this->render('project/project_create');
	}
	public function Detail($kode_project = '', $project_id = '') {
        $this->mPageTitle = 'Project';
        $this->render('project/project_detail');
    }
    
    // Function Insert & Update
    public function postData(){
		$id = $this->input->post('kode');
		if (strlen($id)>0) {
			//UPDATE
			$data = $this->general_post_data(2, $id);
			$where['data'][] = array(
				'column' => 'barang_id',
				'param'	 => $id
			);
			$update = $this->mod->update_data_table($this->tbl, $where, $data);
			if($update->status) {
				$response['status'] = '200';
				$queryKonversi = $this->mod->select('*', 'm_konversi', null, $where);
				if($queryKonversi) {
					for($i = 0; $i < sizeof($this->input->post('konversi_akhir_satuan', TRUE)); $i++) {
						$dataKonversi = $this->general_post_data3(2, $val->konversi_id, $i, $id);
						if(@$where_det['data']) {
							unset($where_det['data']);
						}
						$where_det['data'][] = array(
							'column'	=> 'jenis_produksidet_id',
							'param'		=> $this->input->post('jenis_produksidet_id', TRUE)[$i]
						);
						$update_det = $this->mod->update_data_table('m_konversi', $where, $dataKonversi);
						if($update_det->status) {
							$response['status'] = '200';
						} else {
							$response['status'] = '204';
						}
					}
					foreach ($queryKonversi->result() as $val) {
						$whereKonversi['data'][] = array(
							'column' => 'konversi_id',
							'param'	 => $val->konversi_id
						);
						$updateKonversi = $this->mod->update_data_table('m_konversi', $whereKonversi, $dataKonversi);
					}
				}
				else
				{
					$dataKonversi = $this->general_post_data3(1, null, $id);
					$insert = $this->mod->insert_data_table('m_konversi', NULL, $dataKonversi);
				}
				if($data['barang_status_aktif'] == 'n')
				{
					$updateAttr = $this->nonaktif_atribut($id);
				}
			} else {
				$response['status'] = '204';
			}
		} 
			else {
			//INSERT
			$this->load->helper('string');
			$getproject_kode = $this->project->SelectByMitraID($this->session->userdata('mitra_id'));
			if($getproject_kode){
				foreach ($getproject_kode as $val) {
					$lastkodemitra = $val->project_kode;
				}
				$lastkodemitra  = increment_string($lastkodemitra);
			}else{
				$lastkodemitra	= "P_190001";
			}
			$data = array(
                            'project_mitra_id'  	=> $this->session->userdata('mitra_id'),
                            'project_kode'  		=> $lastkodemitra,
                            'project_nama'  		=> $this->input->post('project_nama'),
                            'project_detail'  		=> $this->input->post('project_detail'),
                            'project_create_date'  	=> date('Y-m-d H:i:s'),
                            'project_create_by'  	=> $this->session->userdata('identity'),
                            'project_status'  		=> '0',
                        );
                        
			$insert = $this->mod->insert_data_table('mitra_project', NULL, $data);
                        var_dump($this->session->userdata());
			if($insert->status) {
//				$response['status'] = '200';
//				for ($i = 0; $i < sizeof($this->input->post('konversi_akhir_satuan', TRUE)); $i++) {
//					$data_konversi = $this->general_post_data3(1, $insert->output, $i, null);
//					$insert_konversi = $this->mod->insert_data_table('m_konversi', NULL, $data_konversi);
//					if($insert_konversi->status) {
//					} else {
//						$response['status'] = '204';
//					}
//				}
                                $response['status'] = '200';
			} else {
				$response['status'] = '204';
			}
		}
		
		echo json_encode($response);
	}
	public function loadData(){
		$select = '*';
		//LIMIT
		$limit = array(
			'start'  => $this->input->get('start') ?: 0,
			'finish' => $this->input->get('length') ?: 10
		);
		$where['data'][] = array(
			'column' => 'project_mitra_id',
			'param'	 => $this->session->userdata('mitra_id')
		);
		//WHERE LIKE
		$where_like['data'][] = array(
			'column' => 'project_kode, project_nama, project_status',
			'param'	 => $this->input->get('search[value]')
		);
		//ORDER
		$index_order = $this->input->get('order[0][column]');
		$order['data'][] = array(
			'column' => $this->input->get('columns['.$index_order.'][name]'),
			'type'	 => $this->input->get('order[0][dir]')
		);

		$query_total = $this->mod->select($select, $this->tbl);
		$query_filter = $this->mod->select($select, $this->tbl, NULL, $where, NULL, $where_like, $order);
		$query = $this->mod->select($select, $this->tbl, NULL, $where, NULL, $where_like, $order, $limit);

		$response['data'] = array();
		if ($query<>false) {
			$no = $limit['start']+1;
			
			foreach ($query->result() as $val) {
				$button = '';
				if ($val->project_status == 'y') {
					$status = '<span class="text-success"> Aktif </span>';
					
						$button = $button.'<button class="btn mr-1 mb-1 btn-outline-primary btn-sm" type="button" onclick="openFormBarang('.$val->project_id.')" title="Edit" data-toggle="modal" href="#modaladd">
											<i class="icon-pencil text-center"></i>
										</button>';
								// <button class="btn blue-soft" type="button" onclick="openFormValueBarang('.$val->barang_id.')" title="Edit Value" data-toggle="modal" href="#modaladd">
								// 	<i class="icon-notebook text-center"></i>
								// </button>';
					
						$button = $button.'
									<button class="btn mr-1 mb-1 btn-outline-danger btn-sm" type="button" onclick="deleteData('.$val->project_id.')" title="Non Aktifkan">
							<i class="icon-power text-center"></i>
						</button>';
					
					
				} else {
					$status = '<span class="text-danger"> Non Aktif </span>';

						$button = $button.'<button class="btn mr-1 mb-1 btn-outline-primary btn-sm" type="button" onclick="openFormBarang('.$val->project_id.')" title="Edit" data-toggle="modal" href="#modaladd" disabled>
											<i class="icon-pencil text-center"></i>
										</button>';
								// <button class="btn blue-soft" type="button" onclick="openFormValueBarang('.$val->produk_kode.')" title="Edit Value" data-toggle="modal" href="#modaladd" disabled>
								// 	<i class="icon-notebook text-center"></i>
								// </button>';

						$button = $button.'<button class="btn mr-1 mb-1 btn-outline-success btn-sm" type="button" onclick="aktifData('.$val->project_id.')" title="Aktifkan">
						<i class="icon-power text-center"></i>
						</button>';
					
					
				}
				$projectnama = "
					<a href='".base_url()."mitra/project/detail/".$val->project_kode."/".$val->project_id."' class='text-bold-600'>".$val->project_nama."</a>
					<p class='text-muted font-small-2'>".substr($val->project_detail,0,30)."...</p>
				";
				$response['data'][] = array(
					$no,
					$val->project_kode,
					$projectnama,
					$val->project_create_date,
					$status,
					$button
				);
				$no++;
			}
		}

		$response['recordsTotal'] = 0;
		if ($query_total<>false) {
			$response['recordsTotal'] = $query_total->num_rows();
		}
		$response['recordsFiltered'] = 0;
		if ($query_filter<>false) {
			$response['recordsFiltered'] = $query_filter->num_rows();
		}

		echo json_encode($response);
	}


}

/* End of file Project.php */
/* Location: ./application/controllers/Project.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-20 11:43:43 */
/* http://harviacode.com */