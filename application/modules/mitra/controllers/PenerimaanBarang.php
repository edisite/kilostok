<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenerimaanBarang extends Admin_Controller {
	private $any_error = array();
	// Define Main Table
	public $tbl = 't_penerimaan_barang';

	public function __construct() {
        parent::__construct();
	}

	public function index(){
		$this->view();
	}

	public function Gudang(){
            $this->mPageTitlePrefix = 'Gudang - ';
            $this->mPageTitle = "Barang Masuk";
            $this->render('penerimaan-barang/V_penerimaan_barang');		
	}
	public function Pembelian(){
		$this->check_session();
		if ($type == 1) {
			$priv = $this->cekUser(31);
			$data = array(
				'aplikasi'		=> $this->app_name,
				'title_page' 	=> 'Gudang',
				'title_page2' 	=> 'Penerimaan Barang',
				'priv_add'		=> $priv['create']
				);
			if($priv['read'] == 1)
			{
				$this->open_page('penerimaan-barang/V_penerimaan_barang', $data);
			}
			else
			{
				$this->load->view('layout/V_404', $data);
			}
		} else if ($type == 2) {
			$data = array(
				'aplikasi'		=> $this->app_name,
				'title_page' 	=> 'Pembelian',
				'title_page2' 	=> 'Penerimaan Barang',
				'priv_add'		=> ''
				);

			$this->open_page('penerimaan-barang/V_penerimaan_barang2', $data);
		}		
	}

	public function loadData($type){
		// $priv = $this->cekUser(31);
		$select = '*';
		//LIMIT
		$limit = array(
			'start'  => $this->input->get('start'),
			'finish' => $this->input->get('length')
		);
		//WHERE LIKE
		$where_like['data'][] = array(
			'column' => 'project_nama, penerimaan_barang_nomor, order_nomor, penerimaan_barang_tanggal, penerimaan_barang_status_nama',
			'param'	 => $this->input->get('search[value]')
		);
		//ORDER
		$index_order = $this->input->get('order[0][column]');
		$order['data'][] = array(
			'column' => $this->input->get('columns['.$index_order.'][name]'),
			'type'	 => $this->input->get('order[0][dir]')
		);

		$query_total = $this->mod->select($select, 'v_penerimaan_barang');
		$query_filter = $this->mod->select($select, 'v_penerimaan_barang', NULL, NULL, NULL, $where_like, $order);
		$query = $this->mod->select($select, 'v_penerimaan_barang', NULL, NULL, NULL, $where_like, $order, $limit);

		$response['data'] = array();
		if ($query<>false) {
			$no = $limit['start']+1;
			foreach ($query->result() as $val) {

				if ($type == 1) {
					$button = '
					<a href="'.base_url().'Gudang/Penerimaan-Barang/Form/'.$val->penerimaan_barang_id.'">
					<button class="btn blue-ebonyclay" type="button" title="Lihat BPB">
						<i class="icon-eye text-center"></i>
					</button>
					</a>
					<a href="'.base_url().'Gudang/Penerimaan-Barang/print-BPB/'.$val->penerimaan_barang_id.'">
					<button class="btn green-jungle" type="button" title="Print PDF">
						<i class="icon-printer text-center"></i>
					</button>
					</a>';
				} else if ($type == 2) {
					$button = '
					<a href="'.base_url().'Pembelian/Penerimaan-Barang/Form/'.$val->penerimaan_barang_id.'">
					<button class="btn blue-ebonyclay" type="button" onclick="checkStatusBPB('.$val->penerimaan_barang_id.')"  title="Lihat BPB">
						<i class="icon-eye text-center"></i>
					</button>
					</a>
					<a href="'.base_url().'Gudang/Penerimaan-Barang/print-BPB/'.$val->penerimaan_barang_id.'">
					<button class="btn green-jungle" type="button" title="Print PDF">
						<i class="icon-printer text-center"></i>
					</button>
					</a>';
				}

				$response['data'][] = array(
					$no,
					$val->cabang_nama,
					$val->penerimaan_barang_nomor,
					$val->order_nomor,
					date("d/m/Y",strtotime($val->penerimaan_barang_tanggal)),
					$val->penerimaan_barang_status_nama,
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

	public function getForm1($id = null){
		$data = array(
			'aplikasi'		=> $this->app_name,
			'title_page' 	=> 'Gudang',
			'title_page2' 	=> 'Penerimaan Barang',
			'id'			=> $id
		);
		$this->open_page('penerimaan-barang/V_form_penerimaan_barang', $data);
	}

	public function getForm2($id = null){
		$data = array(
			'aplikasi'		=> $this->app_name,
			'title_page' 	=> 'Pembelian',
			'title_page2' 	=> 'Penerimaan Barang',
			'id'			=> $id
		);
		$this->open_page('penerimaan-barang/V_form_penerimaan_barang2', $data);
	}

	public function loadDataWhere($type){
		$select = '*';
		$where['data'][] = array(
			'column' => 'penerimaan_barang_id',
			'param'	 => $this->input->get('id')
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where);
		if ($query<>false) {

			foreach ($query->result() as $val) {
				if($val->penerimaan_barang_jenis == 1){
					// CARI DETAIL SPAREPART
					$select = '*';
					$join_brg['data'][] = array(
						'table' => 'm_sparepart b',
						'join'	=> 'b.sparepart_id = a.m_barang_id',
						'type'	=> 'left'
					);
				} else if($val->penerimaan_barang_jenis == 2){
					// CARI DETAIL BARANG
					$select = 'a.*, b.*, c.*, d.*';
					$join_brg['data'][] = array(
						'table' => 'm_barang b',
						'join'	=> 'b.barang_id = a.m_barang_id',
						'type'	=> 'left'
					);
					$join_brg['data'][] = array(
						'table' => 'm_jenis_barang c',
						'join'	=> 'c.jenis_barang_id = b.m_jenis_barang_id',
						'type'	=> 'left'
					);
					$join_brg['data'][] = array(
						'table' => 'm_satuan d',
						'join'	=> 'd.satuan_id = b.m_satuan_id',
						'type'	=> 'left'
					);
				}
				$where_brg['data'][] = array(
					'column' => 't_penerimaan_barang_id',
					'param'	 => $val->penerimaan_barang_id
				);
				$query_brg = $this->mod->select($select, 't_penerimaan_barangdet a', $join_brg, $where_brg);
				$response['val2'] = array();
				if ($query_brg) {
					foreach ($query_brg->result() as $val2) {
						// CARI REFAKSI
						$where_refaksi['data'][] = array(
							'column' => 't_penerimaan_barangdet_id',
							'param'	 => $val2->penerimaan_barangdet_id
						);
						$query_refaksi = $this->mod->select('*', 't_refaksi', NULL, $where_refaksi);
						$hasil_refaksi['val2'] = array();
						if ($query_refaksi) {
							foreach ($query_refaksi->result() as $val3) {
								$hasil_refaksi['val2'][] = array(
									'id' 	=> $val3->refaksi_id,
									'angka' 	=> $val3->refaksi_angka,
									'alasan' 	=> $val3->refaksi_alasan
								);
							}
						}
						// END CARI REFAKSI

						// CARI ORDER DET
						if (@$where_det['data']) {
							unset($where_det['data']);
						}
						if (@$join_det['data']) {
							unset($join_det['data']);
						}
						$where_det['data'][] = array(
							'column' => 'order_id',
							'param'	 => $val->t_order_id
						);
						$join_det['data'][] = array(
							'table' => 't_orderdet b',
							'join'	=> 'b.t_order_id = a.order_id',
							'type'	=> 'left'
						);
						$query_det = $this->mod->select('*', 't_order a', $join_det, $where_det);
						$hasil_det['val2'] = array();
						if ($query_det) {
							foreach ($query_det->result() as $val3) {
								$hasil_det['val2'][] = array(
									'id' 			=> $val3->orderdet_id,
									'order_bahan'	=> $val3->order_bahan,
								);
							}
						}
						// END CARI ORDER DET
						// $array_refaksi = array();
						// if($val2->penerimaan_barangdet_refaksi_angka != null){
						// 	$array_refaksi = json_decode($val2->penerimaan_barangdet_refaksi_angka);
						// }
						// $refaksi_angka['val2'] = array();
						// for ($i = 0; $i < sizeof($array_refaksi); $i++) { 
						// 	$refaksi_angka['val2'][] = array(
						// 		'text' 	=> $array_refaksi[$i]
						// 	);
						// }
						if($val->penerimaan_barang_jenis == 1){
							$response['val2'][] = array(
								'penerimaan_barangdet_id'			=> $val2->penerimaan_barangdet_id,
								't_penerimaan_barang'				=> $val2->t_penerimaan_barang_id,
								't_orderdet_id'						=> $hasil_det,
								'm_barang_id'						=> $val2->m_barang_id,
								'barang_kode'						=> $val2->sparepart_nomor,
								'barang_uraian'						=> $val2->sparepart_nama,
								'satuan_nama'						=> 'Tidak Ada Satuan',
								'penerimaan_barangdet_refaksi_angka'=> $hasil_refaksi,
								'penerimaan_barangdet_qty'			=> $val2->penerimaan_barangdet_qty,
								'penerimaan_barangdet_netto'		=> $val2->penerimaan_barangdet_netto,
								'penerimaan_barangdet_verifikasi'	=> $val2->penerimaan_barangdet_verifikasi,
								'penerimaan_barangdet_harga_satuan'	=> $val2->penerimaan_barangdet_harga_satuan,
								'penerimaan_barangdet_potongan'		=> $val2->penerimaan_barangdet_potongan,
								'penerimaan_barangdet_total'		=> $val2->penerimaan_barangdet_total,
								'penerimaan_barangdet_keterangan'	=> $val2->penerimaan_barangdet_keterangan,
							);
						}
						if($val->penerimaan_barang_jenis == 2){
							$response['val2'][] = array(
								'penerimaan_barangdet_id'			=> $val2->penerimaan_barangdet_id,
								't_penerimaan_barang'				=> $val2->t_penerimaan_barang_id,
								't_orderdet_id'						=> $hasil_det,
								'm_barang_id'						=> $val2->m_barang_id,
								'barang_kode'						=> $val2->barang_kode,
								'barang_uraian'						=> $val2->barang_nama.'('.$val2->jenis_barang_nama.')',
								'jenis_barang_nama'					=> $val2->jenis_barang_nama,
								'satuan_nama'						=> $val2->satuan_nama,
								'penerimaan_barangdet_refaksi_angka'=> $hasil_refaksi,
								'penerimaan_barangdet_qty'			=> $val2->penerimaan_barangdet_qty,
								'penerimaan_barangdet_netto'		=> $val2->penerimaan_barangdet_netto,
								'penerimaan_barangdet_verifikasi'	=> $val2->penerimaan_barangdet_verifikasi,
								'penerimaan_barangdet_harga_satuan'	=> $val2->penerimaan_barangdet_harga_satuan,
								'penerimaan_barangdet_potongan'		=> $val2->penerimaan_barangdet_potongan,
								'penerimaan_barangdet_total'		=> $val2->penerimaan_barangdet_total,
								'penerimaan_barangdet_keterangan'	=> $val2->penerimaan_barangdet_keterangan,
							);
						}
					}
				}

				// PEMERIKSA
				$where1['data'][] = array(
					'column' => 'karyawan_id',
					'param'	 => $val->penerimaan_barang_pemeriksa
				);
				$query1 = $this->mod->select('*', 'm_karyawan', NULL, $where1);
				$hasil1['val2'] = array();
				if ($query1) {
					foreach ($query1->result() as $val2) {
						$hasil1['val2'][] = array(
							'id' 	=> $val2->karyawan_id,
							'text' 	=> $val2->karyawan_nama
						);
					}
				}
				// PENYETUJU
				$where2['data'][] = array(
					'column' => 'karyawan_id',
					'param'	 => $val->penerimaan_barang_penyetuju
				);
				$query2 = $this->mod->select('*', 'm_karyawan', NULL, $where2);
				$hasil2['val2'] = array();
				if ($query2) {
					foreach ($query2->result() as $val2) {
						$hasil2['val2'][] = array(
							'id' 	=> $val2->karyawan_id,
							'text' 	=> $val2->karyawan_nama
						);
					}
				}
				// GUDANG
				$where3['data'][] = array(
					'column' => 'gudang_id',
					'param'	 => $val->m_gudang_id
				);
				$query3 = $this->mod->select('*', 'm_gudang', NULL, $where3);
				$hasil3['val2'] = array();
				if ($query3) {
					foreach ($query3->result() as $val2) {
						$hasil3['val2'][] = array(
							'id' 	=> $val2->gudang_id,
							'text' 	=> $val2->gudang_nama
						);
					}
				}
				// NO ORDER
				$where4['data'][] = array(
					'column' => 'order_id',
					'param'	 => $val->t_order_id
				);
				$query4 = $this->mod->select('*', 't_order', NULL, $where4);
				$hasil4['val2'] = array();
				if ($query4) {
					foreach ($query4->result() as $val2) {
						$hasil4['val2'][] = array(
							'id' 		=> $val2->order_id,
							'text' 		=> $val2->order_nomor,
							'subtotal' 	=> $val2->order_subtotal,
							'ppn' 		=> $val2->order_ppn,
							'total' 	=> $val2->order_total
						);
					}
				}

				$response['val'][] = array(
					'kode' 									=> $val->penerimaan_barang_id,
					'penerimaan_barang_nomor' 				=> $val->penerimaan_barang_nomor,
					'penerimaan_barang_jenis' 				=> $val->penerimaan_barang_jenis,
					'penerimaan_barang_tanggal'				=> date("d/m/Y",strtotime($val->penerimaan_barang_tanggal)),
					'penerimaan_barang_tanggal_terima'		=> date("d/m/Y",strtotime($val->penerimaan_barang_tanggal_terima)),
					'penerimaan_barang_pemeriksa'			=> $hasil1,
					'penerimaan_barang_penyetuju'			=> $hasil2,
					'm_gudang_id'							=> $hasil3,
					'penerimaan_barang_sj'	 				=> $val->penerimaan_barang_sj,
					't_order_id'							=> $hasil4,
					'penerimaan_barang_status' 				=> $val->penerimaan_barang_status,
					'penerimaan_barang_catatan'				=> $val->penerimaan_barang_catatan,
					'penerimaan_barang_subtotal'			=> $val->penerimaan_barang_subtotal,
					'penerimaan_barang_ppn'					=> $val->penerimaan_barang_ppn,
					'penerimaan_barang_total'				=> $val->penerimaan_barang_total,
					'penerimaan_barang_status_pembayaran'	=> $val->penerimaan_barang_status_pembayaran,
					'penerimaan_barang_nominal_pembayaran'	=> $val->penerimaan_barang_nominal_pembayaran,
					'penerimaan_barang_kekurangan'			=> floatval(floatval($val->penerimaan_barang_total) - floatval($val->penerimaan_barang_nominal_pembayaran)),
				);
			}

			echo json_encode($response);
		}
	}

	public function checkStatus(){
		$id = $this->input->get('id');
		$select = '*';
		$where['data'][] = array(
			'column' => 'penerimaan_barang_id',
			'param'	 => $id
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where);
		if ($query<>false) {
			foreach ($query->result() as $row) {
				if ($row->penerimaan_barang_status == 1) {
					$data = $this->general_post_data(3, $id);
					$where['data'][] = array(
						'column' => 'penerimaan_barang_id',
						'param'	 => $id
					);
					$update = $this->mod->update_data_table($this->tbl, $where, $data);
					// INSERT LOG);
					$data_log = array(
						'referensi_id' 								=> $id,
						'penerimaan_baranglog_status_dari' 			=> 1,
						'penerimaan_baranglog_status_ke' 			=> 2,
						'penerimaan_baranglog_status_update_date' 	=> date('Y-m-d H:i:s'),
						'penerimaan_baranglog_status_update_by'		=> $this->session->userdata('user_username'),
					);
					$insert_log = $this->mod->insert_data_table('t_penerimaan_baranglog', NULL, $data_log);
					$response['status'] = '200';
				} else {
					$response['status'] = '204';
				}
			}
		} else {
			$response['status'] = '204';
		}
		echo json_encode($response);
	}

	public function loadData_select(){
		$param = $this->input->get('q');
		if ($param!=NULL) {
			$param = $this->input->get('q');
		} else {
			$param = "";
		}
		$select = '*';
		$where['data'][] = array(
			'column' => 'penerimaan_barang_status',
			'param'	 => 3
		);
		$where_like['data'][] = array(
			'column' => 'penerimaan_barang_nomor',
			'param'	 => $this->input->get('q')
		);
		$order['data'][] = array(
			'column' => 'penerimaan_barang_nomor',
			'type'	 => 'ASC'
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where, NULL, $where_like, $order);
		$response['items'] = array();
		if ($query<>false) {
			foreach ($query->result() as $val) {
				$response['items'][] = array(
					'id'	=> $val->penerimaan_barang_id,
					'text'	=> $val->penerimaan_barang_nomor
				);
			}
			$response['status'] = '200';
		}

		echo json_encode($response);
	}



	public function loadData_selectPembayaran(){
		$param = $this->input->get('q');
		if ($param!=NULL) {
			$param = $this->input->get('q');
		} else {
			$param = "";
		}
		$select = 'a.*, b.*';
		$join['data'][] = array(
			'table' => 't_order b',
			'join'	=> 'b.order_id = a.t_order_id',
			'type'	=> 'left'
		);
		// $where['data'][] = array(
		// 	'column' => 'a.penerimaan_barang_jenis',
		// 	'param'	 => 0
		// );
		$where['data'][] = array(
			'column' => 'a.penerimaan_barang_status',
			'param'	 => 3
		);
		$where['data'][] = array(
			'column' => 'a.penerimaan_barang_status_pembayaran',
			'param'	 => 1
		);
		$where['data'][] = array(
			'column' => 'b.m_supplier_id',
			'param'	 => $this->input->get('idsup')
		);
		$where['data'][] = array(
			'column' => 'b.order_type',
			'param'	 => 0
		);
		$where_like['data'][] = array(
			'column' => 'a.penerimaan_barang_nomor',
			'param'	 => $this->input->get('q')
		);
		$order['data'][] = array(
			'column' => 'a.penerimaan_barang_nomor',
			'type'	 => 'ASC'
		);
		$query = $this->mod->select($select, 't_penerimaan_barang a', $join, $where, NULL, $where_like, $order);
		$response['items'] = array();
		if ($query<>false) {
			foreach ($query->result() as $val) {
				$response['items'][] = array(
					'id'	=> $val->penerimaan_barang_id,
					'text'	=> $val->penerimaan_barang_nomor
				);
			}
			$response['status'] = '200';
		}

		echo json_encode($response);
	}

	// Function Insert & Update
	public function postData($type){
		$id = $this->input->post('kode');
		$response['test'] = $type;
		if (strlen($id)>0) {
			if ($type == 2) {
				//UPDATE
				$data = $this->general_post_data(3, $id);
				$where['data'][] = array(
					'column' => 'penerimaan_barang_id',
					'param'	 => $id
				);
				$update = $this->mod->update_data_table($this->tbl, $where, $data);
				if($update->status) {
					$response['status'] = '200';
					// INSERT DETAIL
					for ($i = 0; $i < sizeof($this->input->post('penerimaan_barangdet_id', TRUE)); $i++) {
						$data_det = $this->general_post_data2(2, $id, $i, $this->input->post('penerimaan_barangdet_id', TRUE)[$i]);
						if (@$where_det['data']) {
							unset($where_det['data']);
						}
						$where_det['data'][] = array(
							'column' => 'penerimaan_barangdet_id',
							'param'	 => $this->input->post('penerimaan_barangdet_id', TRUE)[$i]
						);
						// print_r($data_det);
						$update_det = $this->mod->update_data_table('t_penerimaan_barangdet', $where_det, $data_det);
						if($update_det->status) {
							$response['status'] = '200';
							// UPDATE HPP PERBARANG
							if (@$where_brg['data']) {
								unset($where_brg['data']);
							}
							if (@$join_brg['data']) {
								unset($join_brg['data']);
							}
							$join_brg['data'][] = array(
								'table' => 't_penerimaan_barang b',
								'join'	=> 'b.penerimaan_barang_id = a.t_penerimaan_barang_id',
								'type'	=> 'inner'
							);
							$where_brg['data'][] = array(
								'column' => 'b.penerimaan_barang_status >=',
								'param'	 => 2
							);
							$where_brg['data'][] = array(
								'column' => 'b.penerimaan_barang_jenis',
								'param'	 => $this->input->post('order_bahan', TRUE)[$i]
							);
							$where_brg['data'][] = array(
								'column' => 'a.m_barang_id',
								'param'	 => $this->input->post('m_barang_id', TRUE)[$i]
							);
							// if($this->input->post('order_bahan', TRUE)[$i] == 2) {
							// } else if($this->input->post('order_bahan', TRUE)[$i] == 2) {
							// 	$where_brg['data'][] = array(
							// 		'column' => 'a.m_sparepart_id',
							// 		'param'	 => $this->input->post('m_barang_id', TRUE)[$i]
							// 	);
							// }
							// OPTION 1
							$query = $this->mod->select('SUM(a.`penerimaan_barangdet_qty`) AS total_barang, a.`m_barang_id`, SUM(a.`penerimaan_barangdet_qty` * a.`penerimaan_barangdet_harga_satuan` - a.`penerimaan_barangdet_potongan`) AS total_harga', 't_penerimaan_barangdet a', $join_brg, $where_brg);
							$hpp = 0;
							$total_barang = 0;
							$total_harga  = 0;
							if($query) {
								// OPTION 1
								foreach ($query->result() as $row) {
									$total_barang	= $row->total_barang;
									$total_harga	= $row->total_harga;
								}
								// foreach ($query->result() as $row) {
								// 	$total_barang += $row->penerimaan_barangdet_qty;
								// 	$total_harga  += $row->penerimaan_barangdet_qty * $row->penerimaan_barangdet_harga_satuan;
								// }
								if($total_barang > 0) {
									$hpp = $total_harga / $total_barang;
								}
								$response['hpp'] = $hpp;
								if (@$where_hpp['data']) {
									unset($where_hpp['data']);
								}
								if($this->input->post('order_bahan', TRUE)[$i] == 2) {
									//BARANG
									$where_hpp['data'][] = array(
										'column' => 'barang_id',
										'param'	 => $this->input->post('m_barang_id', TRUE)[$i]
									);
									$data_hpp = array(
										'barang_hpp' => $hpp,
									);
									$update_brg = $this->mod->update_data_table('m_barang', $where_hpp, $data_hpp);
									$response['query'] = $update_brg;
								} else if($this->input->post('order_bahan', TRUE)[$i] == 1) {
									//SPAREPART
									$where_hpp['data'][] = array(
										'column' => 'sparepart_id',
										'param'	 => $this->input->post('m_barang_id', TRUE)[$i]
									);
									$data_hpp = array(
										'sparepart_hpp' => $hpp,
									);
									$update_brg = $this->mod->update_data_table('m_sparepart', $where_hpp, $data_hpp);
									$response['query'] = $update_brg;
								}
									// print_r($response);
							}
						} else {
							$response['status'] = '204';
						}
					}
					// CEK VERIFIKASI TIAP ORDERDET
					if (@$where_podet['data']) {
						unset($where_podet['data']);
					}
					$where_podet['data'][] = array(
						'column' => 't_penerimaan_barang_id',
						'param'	 => $id
					);
					$query_podet = $this->mod->select('*', 't_penerimaan_barangdet', NULL, $where_podet);
					$flag1 = 0;
					$flag2 = 0;
					if ($query_podet) {
						foreach ($query_podet->result() as $row) {
							$flag1++;
							if ($row->penerimaan_barangdet_verifikasi == 1) {
								$flag2++;
							}
						}
					}
					// CEK verifikasi = 1 SEMUA
					if ($flag1 == $flag2) {
						// UPDATE STATUS t_penerimaan_barang
						$data2 = $this->general_post_data(2, $id);
						// $where['data'][] = array(
						// 	'column' => 'penerimaan_barang_id',
						// 	'param'	 => $id
						// );
						$update2 = $this->mod->update_data_table($this->tbl, $where, $data2);
						// END UPDATE STATUS t_penerimaan_barang
					}
				} else {
					$response['status'] = '204';
				}
			}
		} else {
			//INSERT
			$data = $this->general_post_data(1);
			$insert = $this->mod->insert_data_table($this->tbl, NULL, $data);
			if($insert->status) {
				$response['status'] = '200';
				// INSERT DETAIL BARANG
				for ($i = 0; $i < sizeof($this->input->post('m_barang_id', TRUE)); $i++) {

					$data_det = $this->general_post_data2(1, $insert->output, $i);
					// $response['data'] = $data_det;
					$insert_det = $this->mod->insert_data_table('t_penerimaan_barangdet', NULL, $data_det);
					if($insert_det->status) {
						$response['status'] = '200';
						//REFAKSI
						for ($j = 0; $j < sizeof($this->input->post('penerimaan_barangdet_refaksi_angka'.($i+1), TRUE)); $j++) {
							if($this->input->post('penerimaan_barangdet_refaksi_angka'.($i+1), TRUE)[$j] > 0){
								$data_refaksi = array(
									't_penerimaan_barangdet_id'	=> $insert_det->output,
									'm_barang_id' 				=> $data_det['m_barang_id'],
									'refaksi_angka' 			=> $this->input->post('penerimaan_barangdet_refaksi_angka'.($i+1), TRUE)[$j],
									'refaksi_alasan'	 		=> $this->input->post('penerimaan_barangdet_refaksi_alasan'.($i+1), TRUE)[$j],
									'refaksi_created_date'		=> date('Y-m-d H:i:s'),
									'refaksi_created_by' 		=> $this->session->userdata('user_username'),
									'refaksi_revised' 			=> 0,
								);
								$response['data_refaksi'] = $data_refaksi;
								$insertrefaksi = $this->mod->insert_data_table('t_refaksi', NULL, $data_refaksi);
								if($insertrefaksi->status){ $response['refaksi'] = '200'; }
							}
						}
						//END REFAKSI
						// STOK GUDANG DAN KARTU STOK
						$where_gudang2['data'] = array();
						if ($where_gudang2['data']) {
							unset($where_gudang2['data']);
						}
						// PENAMBAHAN STOK GUDANG
						if($data['penerimaan_barang_jenis'] == 1){
							// SPAREPART
							$where_gudang2['data'][] = array(
								'column' => 'm_sparepart_id',
								'param'	 => $this->input->post('m_barang_id', TRUE)[$i]
							);
							$where_gudang2['data'][] = array(
								'column' => 'm_gudang_id',
								'param'	 => $data['m_gudang_id']
							);
						} else if($data['penerimaan_barang_jenis'] == 2){
							$where_gudang2['data'][] = array(
								'column' => 'm_barang_id',
								'param'	 => $this->input->post('m_barang_id', TRUE)[$i]
							);
							$where_gudang2['data'][] = array(
								'column' => 'm_gudang_id',
								'param'	 => $data['m_gudang_id']
							);
						}
						$query_gudang2 = $this->mod->select('*', 't_stok_gudang', NULL, $where_gudang2);
						$qty_terima = $this->input->post('penerimaan_barangdet_qty', TRUE)[$i];
						$qty_masuk_gudang = $this->input->post('penerimaan_barangdet_netto', TRUE)[$i];
						// $qty_masuk_gudang = floatval($qty_terima) - floatval($qty_retur);
						if($query_gudang2){
							foreach ($query_gudang2->result() as $rowStok) {
								// PENAMBAHAN KARTU STOK
								if($data['penerimaan_barang_jenis'] == 1){
									$dataKStok2 = array(
										'm_gudang_id' 				=> $data['m_gudang_id'],
										'm_sparepart_id'			=> $this->input->post('m_barang_id', TRUE)[$i],
										'kartu_stok_tanggal' 		=> date('Y-m-d H:i:s'),
										'kartu_stok_referensi' 		=> $data['penerimaan_barang_nomor'],
										'kartu_stok_saldo' 			=> $rowStok->stok_gudang_jumlah,
										'kartu_stok_masuk' 			=> $qty_masuk_gudang,
										'kartu_stok_keluar' 		=> 0,
										'kartu_stok_penyesuaian'	=> 0,
										'kartu_stok_keterangan' 	=> "Penerimaan Barang",
										'kartu_stok_created_date'	=> date('Y-m-d H:i:s'),
										'kartu_stok_created_by' 	=> $this->session->userdata('user_username'),
										'kartu_stok_revised' 		=> 0,
									);
									$insertKStok2 = $this->mod->insert_data_table('t_kartu_stok', NULL, $dataKStok2);
								} else if($data['penerimaan_barang_jenis'] == 2){
									$dataKStok2 = array(
										'm_gudang_id' 				=> $data['m_gudang_id'],
										'm_barang_id' 				=> $this->input->post('m_barang_id', TRUE)[$i],
										'kartu_stok_tanggal' 		=> date('Y-m-d H:i:s'),
										'kartu_stok_referensi' 		=> $data['penerimaan_barang_nomor'],
										'kartu_stok_saldo' 			=> $rowStok->stok_gudang_jumlah,
										'kartu_stok_masuk' 			=> $qty_masuk_gudang,
										'kartu_stok_keluar' 		=> 0,
										'kartu_stok_penyesuaian'	=> 0,
										'kartu_stok_keterangan' 	=> "Penerimaan Barang",
										'kartu_stok_created_date'	=> date('Y-m-d H:i:s'),
										'kartu_stok_created_by' 	=> $this->session->userdata('user_username'),
										'kartu_stok_revised' 		=> 0,
									);
									$insertKStok2 = $this->mod->insert_data_table('t_kartu_stok', NULL, $dataKStok2);
								}
								// END PENAMBAHAN KARTU STOK
								// UPDATE STOK
								$update_stok_gudangjumlah = $rowStok->stok_gudang_jumlah + $qty_masuk_gudang;
								if (@$whereStok2['data']) {
									unset($whereStok2['data']);
								}
								$whereStok2['data'][] = array(
									'column' => 'stok_gudang_id',
									'param'	 => $rowStok->stok_gudang_id
								);
								$dataStok2 = array(
									'stok_gudang_jumlah' 		=> $update_stok_gudangjumlah,
									'stok_gudang_update_date'	=> date('Y-m-d H:i:s'),
									'stok_gudang_update_by'		=> $this->session->userdata('user_username'),
									'stok_gudang_revised' 		=> $rowStok->stok_gudang_revised + 1,
								);
								$updateStok2 = $this->mod->update_data_table('t_stok_gudang', $whereStok2, $dataStok2);
								// END UPDATE STOK
							}
						}
						else{
							// INSERT STOK
							if($data['penerimaan_barang_jenis'] == 1){
								$dataStokGudang = array(
									'm_gudang_id' 					=> $data['m_gudang_id'],
									'm_sparepart_id' 				=> $this->input->post('m_barang_id', TRUE)[$i],
									'stok_gudang_jumlah' 			=> $qty_masuk_gudang,
									'stok_gudang_created_date'		=> date('Y-m-d H:i:s'),
									'stok_gudang_created_by' 		=> $this->session->userdata('user_username'),
									'stok_gudang_revised' 			=> 0,
								);
								$insertStokGudang = $this->mod->insert_data_table('t_stok_gudang', NULL, $dataStokGudang);
								$dataKStok2 = array(
									'm_gudang_id' 				=> $data['m_gudang_id'],
									'm_sparepart_id' 			=> $this->input->post('m_barang_id', TRUE)[$i],
									'kartu_stok_tanggal' 		=> date('Y-m-d H:i:s'),
									'kartu_stok_referensi' 		=> $data['penerimaan_barang_nomor'],
									'kartu_stok_saldo' 			=> 0,
									'kartu_stok_masuk' 			=> $qty_masuk_gudang,
									'kartu_stok_keluar' 		=> 0,
									'kartu_stok_penyesuaian'	=> 0,
									'kartu_stok_keterangan' 	=> "Penerimaan Barang",
									'kartu_stok_created_date'	=> date('Y-m-d H:i:s'),
									'kartu_stok_created_by' 	=> $this->session->userdata('user_username'),
									'kartu_stok_revised' 		=> 0,
								);
								$insertKStok2 = $this->mod->insert_data_table('t_kartu_stok', NULL, $dataKStok2);
							}
							else if($data['penerimaan_barang_jenis'] == 2){
								$dataStokGudang = array(
									'm_gudang_id' 					=> $data['m_gudang_id'],
									'm_barang_id' 					=> $this->input->post('m_barang_id', TRUE)[$i],
									'stok_gudang_jumlah' 			=> $qty_masuk_gudang,
									'stok_gudang_created_date'		=> date('Y-m-d H:i:s'),
									'stok_gudang_created_by' 		=> $this->session->userdata('user_username'),
									'stok_gudang_revised' 			=> 0,
								);
								$insertStokGudang = $this->mod->insert_data_table('t_stok_gudang', NULL, $dataStokGudang);
								$dataKStok2 = array(
									'm_gudang_id' 				=> $data['m_gudang_id'],
									'm_barang_id' 				=> $this->input->post('m_barang_id', TRUE)[$i],
									'kartu_stok_tanggal' 		=> date('Y-m-d H:i:s'),
									'kartu_stok_referensi' 		=> $data['penerimaan_barang_nomor'],
									'kartu_stok_saldo' 			=> 0,
									'kartu_stok_masuk' 			=> $qty_masuk_gudang,
									'kartu_stok_keluar' 		=> 0,
									'kartu_stok_penyesuaian'	=> 0,
									'kartu_stok_keterangan' 	=> "Penerimaan Barang",
									'kartu_stok_created_date'	=> date('Y-m-d H:i:s'),
									'kartu_stok_created_by' 	=> $this->session->userdata('user_username'),
									'kartu_stok_revised' 		=> 0,
								);
								$insertKStok2 = $this->mod->insert_data_table('t_kartu_stok', NULL, $dataKStok2);
							}
							// END INSERT STOK
						}
						// END PENAMBAHAN STOK GUDANG
						// END STOK GUDANG DAN KARTU STOK

						// PO
						$orderdet_id = $this->input->post('orderdet_id', TRUE)[$i];
						if($orderdet_id > 0){
							if (@$where_po2['data']) {
								unset($where_po2['data']);
							}
							$where_po2['data'][] = array(
								'column' => 'orderdet_id',
								'param'	 => $this->input->post('orderdet_id', TRUE)[$i]
							);
							$query_po2 = $this->mod->select('*', 't_orderdet', NULL, $where_po2);
							if ($query_po2) {
								foreach ($query_po2->result() as $row) {
									$status_orderdet = 0;
									if($qty_terima >= $row->orderdet_qty){
										$status_orderdet = 1;
									}
									$data_po2 = array(
										'orderdet_status'			=> $status_orderdet,
										'orderdet_qty_realisasi' 	=> ($row->orderdet_qty_realisasi + $qty_masuk_gudang),
										'orderdet_update_by'		=> $this->session->userdata('user_username'),
										'orderdet_update_date'		=> date('Y-m-d H:i:s'),
										'orderdet_revised' 			=> $row->orderdet_revised + 1,
									);
									$update_po2 = $this->mod->update_data_table('t_orderdet', $where_po2, $data_po2);
								}
							}
						}
						// STATUS HDR
						if (@$where_po['data']) {
							unset($where_po['data']);
						}
						$where_po['data'][] = array(
							'column' => 'order_id',
							'param'	 => $data['t_order_id']
						);
						if (@$where_podet['data']) {
							unset($where_podet['data']);
						}
						$where_podet['data'][] = array(
							'column' => 't_order_id',
							'param'	 => $data['t_order_id']
						);
						$query_podet = $this->mod->select('*', 't_orderdet', NULL, $where_podet);
						$flag1 = 0;
						$flag2 = 0;
						if ($query_podet) {
							foreach ($query_podet->result() as $row) {
								$flag1++;
								if ($row->orderdet_status == 1) {
									$flag2++;
								}
							}
						}
						// CEK orderdet_status = 1 SEMUA
						if ($flag1 == $flag2) {
							// UPDATE STATUS t_order
							$data_po = array(
								'order_status' 			=> 7,
								'order_status_date' 	=> date('Y-m-d H:i:s'),
							);
							$update_po = $this->mod->update_data_table('t_order', $where_po, $data_po);
							// END UPDATE STATUS t_order
						} else {
							// UPDATE STATUS t_order
							$data_po = array(
								'order_status' 			=> 6,
								'order_status_date' 	=> date('Y-m-d H:i:s'),
							);
							$update_po = $this->mod->update_data_table('t_order', $where_po, $data_po);
							// END UPDATE STATUS t_order
						}
						// END PO

					} else {
						$response['status'] = '204';
					}
				}
				// END INSERT DETAIL BARANG
			} else {
				$response['status'] = '204';
			}
		}
		
		echo json_encode($response);
	}

	public function cetakPDF($id) {
		$this->load->library('pdf');
		$name = '';
		$select = '*';
		$where['data'][] = array(
			'column' => 'penerimaan_barang_id',
			'param'	 => $id
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where);
		if ($query<>false) {

			foreach ($query->result() as $val) {
				// CARI DETAIL
				$where_det['data'][] = array(
					'column' => 't_penerimaan_barang_id',
					'param'	 => $val->penerimaan_barang_id
				);
				$query_det = $this->mod->select('*','t_penerimaan_barangdet',NULL,$where_det);
				$response['val2'] = array();
				if ($query_det) {
					foreach ($query_det->result() as $val2) {
						// CARI BARANG DAN STOK
						if (@$join_brg['data']) {
							unset($join_brg['data']);
						}
						if (@$where_brg['data']) {
							unset($where_brg['data']);
						}
						if($val->penerimaan_barang_jenis == 1){
							$where_brg['data'][] = array(
								'column' => 'sparepart_id',
								'param'	 => $val2->m_barang_id
							);
							$hasil_refaksi['val2'] = array();
							$query_brg = $this->mod->select('*','m_sparepart',null,$where_brg);
							if ($query_brg) {
								foreach ($query_brg->result() as $val3) {
									$response['val2'][] = array(
										'penerimaan_barangdet_id'			=> $val2->penerimaan_barangdet_id,
										'm_barang_id'						=> $val2->m_barang_id,
										'barang_kode'						=> $val3->sparepart_nomor,
										'barang_nama'						=> $val3->sparepart_nama,
										'refaksi_angka'						=> $hasil_refaksi,
										'jenis_barang_nama'					=> 'Sparepart',
										'satuan_nama'						=> 'Tidak Ada Satuan',
										'penerimaan_barangdet_qty'			=> $val2->penerimaan_barangdet_qty,
										'penerimaan_barangdet_netto'		=> $val2->penerimaan_barangdet_netto,
										'penerimaan_barangdet_verifikasi'	=> $val2->penerimaan_barangdet_verifikasi,
										'penerimaan_barangdet_harga_satuan'	=> $val2->penerimaan_barangdet_harga_satuan,
										'penerimaan_barangdet_potongan'		=> $val2->penerimaan_barangdet_potongan,
										'penerimaan_barangdet_total'		=> $val2->penerimaan_barangdet_total,
										'penerimaan_barangdet_keterangan'	=> $val2->penerimaan_barangdet_keterangan,
									);
								}
							}
						} else if($val->penerimaan_barang_jenis == 2){
							$refaksi_angka = 0;
							$refaksi_alasan = "";
							$where_refaksi['data'][] = array(
								'column' => 't_penerimaan_barangdet_id',
								'param'	 => $val2->penerimaan_barangdet_id
							);
							$query_refaksi = $this->mod->select('*', 't_refaksi', NULL, $where_refaksi);
							$hasil_refaksi['val2'] = array();
							if ($query_refaksi) {
								foreach ($query_refaksi->result() as $val3) {
									$hasil_refaksi['val2'][] = array(
										'id' 		=> $val3->refaksi_id,
										'angka' 	=> $val3->refaksi_angka,
										'alasan' 	=> $val3->refaksi_alasan
									);
									$refaksi_angka = $val3->refaksi_angka;
									$refaksi_alasan = $val3->refaksi_alasan;
								}
							}
							// CARI DETAIL BARANG
							$join_brg['data'][] = array(
								'table' => 'm_jenis_barang c',
								'join'	=> 'c.jenis_barang_id = a.m_jenis_barang_id',
								'type'	=> 'left'
							);
							$join_brg['data'][] = array(
								'table' => 'm_satuan d',
								'join'	=> 'd.satuan_id = a.m_satuan_id',
								'type'	=> 'left'
							);
							$where_brg['data'][] = array(
								'column' => 'a.barang_id',
								'param'	 => $val2->m_barang_id
							);
							$query_brg = $this->mod->select('a.*, c.jenis_barang_nama, d.satuan_nama','m_barang a',$join_brg,$where_brg);
							if ($query_brg) {
								foreach ($query_brg->result() as $val3) {
									$response['val2'][] = array(
										'penerimaan_barang_id'				=> $val2->penerimaan_barangdet_id,
										'barang_kode'						=> $val3->barang_kode,
										'barang_nama'						=> $val3->barang_nama,
										'refaksi_angka'						=> $hasil_refaksi,
										'barang_nomor'						=> $val3->barang_nomor,
										'jenis_barang_nama'					=> $val3->jenis_barang_nama,
										'satuan_nama'						=> $val3->satuan_nama,
										'penerimaan_barangdet_qty'			=> $val2->penerimaan_barangdet_qty,
										'penerimaan_barangdet_netto'		=> $val2->penerimaan_barangdet_netto,
										'penerimaan_barangdet_harga_satuan'	=> $val2->penerimaan_barangdet_harga_satuan,
										'penerimaan_barangdet_total'		=> $val2->penerimaan_barangdet_total,
										'penerimaan_barangdet_keterangan'	=> $val2->penerimaan_barangdet_keterangan,
										'm_barang_id'						=> $val2->m_barang_id,
									);
								}
							}
						}
						// CARI BARANG DAN STOK
					}
				}
				// END CARI DETAIL
				// CARI PENYETUJU
				$hasil4['val2'] = array();
				$where_penyetuju['data'][] = array(
					'column' => 'karyawan_id',
					'param'	 => $val->penerimaan_barang_penyetuju
				);
				$query_penyetuju = $this->mod->select('*','m_karyawan',NULL,$where_penyetuju);
				if ($query_penyetuju) {
					foreach ($query_penyetuju->result() as $val2) {
						$hasil4['val2'][] = array(
							'id' 	=> $val2->karyawan_id,
							'text' 	=> $val2->karyawan_nama
						);
					}
				}
				// END CARI PENYETUJU
				// CARI PENERIMA
				$hasil5['val2'] = array();
				$where_penerima['data'][] = array(
					'column' => 'karyawan_id',
					'param'	 => $val->penerimaan_barang_pemeriksa
				);
				$query_penerima = $this->mod->select('*','m_karyawan',NULL,$where_penerima);
				if ($query_penerima) {
					foreach ($query_penerima->result() as $val2) {
						$hasil5['val2'][] = array(
							'id' 	=> $val2->karyawan_id,
							'text' 	=> $val2->karyawan_nama
						);
					}
				}
				// END CARI PENERIMA
				// CARI SUPPLIER
				$hasil6['val2'] = array();
				$join_supp['data'][] = array(
					'table' => 'm_partner c',
					'join'	=> 'c.partner_id = a.m_supplier_id',
					'type'	=> 'left'
				);
				$where_supp['data'][] = array(
					'column' => 'a.order_id',
					'param'	 => $val->t_order_id
				);
				$query_supp = $this->mod->select('a.*, c.partner_nama','t_order a',$join_supp,$where_supp);
				if ($query_supp) {
					foreach ($query_supp->result() as $val3) {
						$hasil6['val2'][] = array(
							'id' 	=> $val3->order_nomor,
							'supplier' 	=> $val3->partner_nama
						);
					}
				}
				// END CARI SUPLLIER
				// CARI CABANG
				$hasil7['val2'] = array();
				$where_cabang['data'][] = array(
					'column' => 'cabang_id',
					'param'	 => $val->m_cabang_id
				);
				$query_cabang = $this->mod->select('*','m_cabang',NULL,$where_cabang);
				if ($query_cabang) {
					foreach ($query_cabang->result() as $val2) {
						// CARI KOTA
						$hasil8['val2'] = array();
						$where_kota['data'][] = array(
							'column' => 'id',
							'param'	 => $val2->cabang_kota
						);
						$query_kota = $this->mod->select('*','regencies',NULL,$where_kota);
						if ($query_kota) {
							foreach ($query_kota->result() as $val3) {
								$hasil8['val3'][] = array(
									'id' 		=> $val3->id,
									'text' 		=> $val3->name,
								);
							}
						}
						// END CARI KOTA
						$hasil7['val2'][] = array(
							'id' 	=> $val2->cabang_id,
							'text' 	=> $val2->cabang_nama,
							'alamat'=> $val2->cabang_alamat,
							'kota'	=> $hasil8,
							'telp'  => json_decode($val2->cabang_telepon)
						);
					}
				}
				// END CARI CABANG
				$response['val'][] = array(
					'kode' 										=> $val->penerimaan_barang_id,
					'penerimaan_barang_nomor' 					=> $val->penerimaan_barang_nomor,
					'penerimaan_barang_jenis' 					=> $val->penerimaan_barang_jenis,
					'penerimaan_barang_sj' 						=> $val->penerimaan_barang_sj,
					'penerimaan_barang_ppn' 					=> $val->penerimaan_barang_ppn,
					'penerimaan_barang_tanggal'					=> date("d/m/Y",strtotime($val->penerimaan_barang_tanggal)),
					'penerimaan_barang_tanggal_terima'			=> date("d/m/Y",strtotime($val->penerimaan_barang_tanggal_terima)),
					'penerimaan_barang_catatan' 				=> $val->penerimaan_barang_catatan,
					'penerimaan_barang_status' 					=> $val->penerimaan_barang_status,
					'penerimaan_barang_penyetuju' 				=> $hasil4,
					'penerimaan_barang_pemeriksa' 				=> $hasil5,
					'penerimaan_barang_pembuat' 				=> $val->penerimaan_barang_created_by,
					'penerimaan_barang_supplier' 				=> $hasil6,
					'cabang'									=> $hasil7
				);
			}
		}
		$response['title'][] = array(
			'aplikasi'		=> $this->app_name,
			'title_page' 	=> 'Penerimaan Barang',
			'title_page2' 	=> 'Print BPB',
		);
		// echo json_encode($response);
		$this->pdf->load_view('print/P_bpb', $response);
		$this->pdf->render();
		$this->pdf->stream($name,array("Attachment"=>false));
	}

	/* Saving $data as array to database */
	function general_post_data($type, $id = null){
		// 1 Insert, 2 Update, 3 Delete / Non Aktif
		$arrDate = explode('/', $this->input->post('penerimaan_barang_tanggal', TRUE));
		$arrDate2 = explode('/', $this->input->post('penerimaan_barang_tanggal_terima', TRUE));
		$where['data'][] = array(
			'column' => 'penerimaan_barang_id',
			'param'	 => $id
		);
		$queryRevised = $this->mod->select('penerimaan_barang_status, penerimaan_barang_revised', $this->tbl, NULL, $where);
		if ($queryRevised) {
			$revised = $queryRevised->row_array();
			$rev = $revised['penerimaan_barang_revised'] + 1;
			$status = $revised['penerimaan_barang_status'];
		}
		if ($type == 1) {
			if($this->input->post('order_bahan', TRUE) == 2) {
				$penerimaan_barang_nomor = $this->get_kode_transaksi($arrDate[1]);
			}
			else if($this->input->post('order_bahan', TRUE) == 1) {
				$penerimaan_barang_nomor = $this->get_kode_transaksi2($arrDate[1]);
			}
			$data = array(
				'm_cabang_id' 							=> $this->session->userdata('cabang_id'),
				'penerimaan_barang_nomor' 				=> $penerimaan_barang_nomor,
				'penerimaan_barang_tanggal'				=> $arrDate[2]."-".$arrDate[1]."-".$arrDate[0],
				'penerimaan_barang_tanggal_terima'		=> $arrDate2[2]."-".$arrDate2[1]."-".$arrDate2[0],
				'penerimaan_barang_sj' 					=> $this->input->post('penerimaan_barang_sj', TRUE),
				't_order_id'							=> $this->input->post('t_order_id', TRUE),
				'penerimaan_barang_pemeriksa' 			=> $this->input->post('penerimaan_barang_pemeriksa', TRUE),
				'penerimaan_barang_penyetuju'			=> $this->input->post('penerimaan_barang_penyetuju', TRUE),
				'penerimaan_barang_jenis'				=> $this->input->post('order_bahan', TRUE),
				'm_gudang_id'							=> $this->input->post('m_gudang_id', TRUE),
				'penerimaan_barang_catatan'				=> $this->input->post('penerimaan_barang_catatan', TRUE),
				//harus insert subtotal, ppn, total (ambil dr po)
				'penerimaan_barang_subtotal'			=> $this->input->post('t_order_subtotal', TRUE),
				'penerimaan_barang_ppn'					=> $this->input->post('t_order_ppn', TRUE),
				'penerimaan_barang_total'				=> $this->input->post('t_order_total', TRUE),
				'penerimaan_barang_status' 				=> 1,
				'penerimaan_barang_status_date'			=> date('Y-m-d H:i:s'),
				'penerimaan_barang_created_date'		=> date('Y-m-d H:i:s'),
				'penerimaan_barang_update_date'			=> date('Y-m-d H:i:s'),
				'penerimaan_barang_created_by'			=> $this->session->userdata('user_username'),
				'penerimaan_barang_revised' 			=> 0,
			);
		} else if ($type == 2) {
			$data = array(
				'penerimaan_barang_status' 		=> 3,
				'penerimaan_barang_subtotal'	=> $this->input->post('penerimaan_barang_subtotal', TRUE),
				'penerimaan_barang_ppn' 		=> $this->input->post('penerimaan_barang_ppn', TRUE),
				'penerimaan_barang_total' 		=> $this->input->post('penerimaan_barang_total', TRUE),
				'penerimaan_barang_update_date'	=> date('Y-m-d H:i:s'),
				'penerimaan_barang_update_by'	=> $this->session->userdata('user_username'),
				'penerimaan_barang_revised' 	=> $rev,
			);
		} else if ($type == 3) {
			$data = array(
				'penerimaan_barang_status'		=> 2,
				'penerimaan_barang_subtotal'	=> $this->input->post('penerimaan_barang_subtotal', TRUE),
				'penerimaan_barang_ppn' 		=> $this->input->post('penerimaan_barang_ppn', TRUE),
				'penerimaan_barang_total' 		=> $this->input->post('penerimaan_barang_total', TRUE),
				'penerimaan_barang_status_date'	=> date('Y-m-d H:i:s'),
				'penerimaan_barang_update_date'	=> date('Y-m-d H:i:s'),
				'penerimaan_barang_update_by'	=> $this->session->userdata('user_username'),
				'penerimaan_barang_revised' 	=> $rev,
			);
		} 

		return $data;
	}

	function general_post_data2($type, $idHdr, $seq, $id = null){
		// 1 Insert, 2 Update, 3 Delete / Non Aktif
		$where['data'][] = array(
			'column' => 'penerimaan_barangdet_id',
			'param'	 => $id
		);
		$queryRevised = $this->mod->select('penerimaan_barangdet_revised', 't_penerimaan_barangdet', NULL, $where);
		if ($queryRevised) {
			$revised = $queryRevised->row_array();
			$rev = $revised['penerimaan_barangdet_revised'] + 1;
		}
		if ($type == 1) {
			$refaksi_angka = json_encode($this->input->post('penerimaan_barangdet_refaksi_angka'.($seq+1), TRUE));
			// if ($this->input->post('penerimaan_barangdet_verifikasi', TRUE)[$seq]) {
			// 	$verifikasi = 1;
			// } else {
			// 	$verifikasi = 0;
			// }
			$data = array(
				't_penerimaan_barang_id' 				=> $idHdr,
				'm_barang_id' 							=> $this->input->post('m_barang_id', TRUE)[$seq],
				'penerimaan_barangdet_qty' 				=> $this->input->post('penerimaan_barangdet_qty', TRUE)[$seq],
				'penerimaan_barangdet_netto'			=> $this->input->post('penerimaan_barangdet_netto', TRUE)[$seq],
				'penerimaan_barangdet_verifikasi'		=> 0,
				// 'penerimaan_barangdet_refaksi_angka'	=> $refaksi_angka,
				// harus insert harga satuan, total, potongan (dari po)
				'penerimaan_barangdet_harga_satuan'	 	=> $this->input->post('orderdet_harga_satuan', TRUE)[$seq],
				'penerimaan_barangdet_total'			=> $this->input->post('orderdet_total', TRUE)[$seq],
				'penerimaan_barangdet_status'			=> 1,
				'penerimaan_barangdet_status_date'		=> date('Y-m-d H:i:s'),
				'penerimaan_barangdet_created_date'		=> date('Y-m-d H:i:s'),
				'penerimaan_barangdet_created_by'		=> $this->session->userdata('user_username'),
				'penerimaan_barangdet_update_date'		=> date('Y-m-d H:i:s'),
				'penerimaan_barangdet_revised' 			=> 0,
			);
		} else if ($type == 2) {
			if ($this->input->post('status_verifikasi', TRUE)[$seq] == 1) {
				$verifikasi = 1;
			} else {
				$verifikasi = 0;
			}
			$data = array(
				'penerimaan_barangdet_verifikasi'	=> $verifikasi,
				't_penerimaan_barang_id' 			=> $idHdr,
				'm_barang_id' 						=> $this->input->post('m_barang_id', TRUE)[$seq],
				'penerimaan_barangdet_harga_satuan' => $this->input->post('penerimaan_barangdet_harga_satuan', TRUE)[$seq],
				'penerimaan_barangdet_potongan' 	=> $this->input->post('penerimaan_barangdet_potongan', TRUE)[$seq],
				'penerimaan_barangdet_total'		=> $this->input->post('penerimaan_barangdet_total', TRUE)[$seq],
				'penerimaan_barangdet_keterangan'	=> $this->input->post('penerimaan_barangdet_keterangan', TRUE)[$seq],
				'penerimaan_barangdet_update_by'	=> $this->session->userdata('user_username'),
				'penerimaan_barangdet_update_date'	=> date('Y-m-d H:i:s'),
				'penerimaan_barangdet_revised' 		=> $rev,
			);
		}

		return $data;
	}

	function get_kode_transaksi($bulan){
		$bln = $bulan;
		$thn = substr(date('Y'), 1);
		$select = 'MID(penerimaan_barang_nomor,10,5) as id';
		$where['data'][] = array(
			'column' => 'MID(penerimaan_barang_nomor,1,9)',
			'param'	 => 'BPB'.$thn.'0'.$bln
		);
		$order['data'][] = array(
			'column' => 'penerimaan_barang_nomor',
			'type'	 => 'DESC'
		);
		$limit = array(
			'start'  => 0,
			'finish' => 1
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where, NULL, NULL, $order, $limit);
		$kode_baru = $this->format_kode_transaksi('BPB',$query,$bln);
		return $kode_baru;
	}

	function get_kode_transaksi2($bulan){
		$bln = $bulan;
		$thn = substr(date('Y'), 1);
		$select = 'MID(penerimaan_barang_nomor,11,5) as id';
		$where['data'][] = array(
			'column' => 'MID(penerimaan_barang_nomor,1,10)',
			'param'	 => 'BPBS'.$thn.'0'.$bln
		);
		$order['data'][] = array(
			'column' => 'penerimaan_barang_nomor',
			'type'	 => 'DESC'
		);
		$limit = array(
			'start'  => 0,
			'finish' => 1
		);
		$query = $this->mod->select($select, $this->tbl, NULL, $where, NULL, NULL, $order, $limit);
		$kode_baru = $this->format_kode_transaksi('BPBS',$query,$bln);
		return $kode_baru;
	}
	/* end Function */

}
