<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

	public function index()
	{		
			$data = "";
			$getdata =	$this->project->ProjectShowFunder();
			if($getdata){
				foreach ($getdata as $val) {
					

					$data .= '<div class="col-lg-4 col-md-12">
					<div class="card">
						<div class="card-content bg-warning">
							
							<div class="card-body">
											<h3>'.$val->project_nama.'</h3>                        
								<div class="card bg-warning">
											<p class="text-uppercase">'.$val->mitra_nama.'</p>
											<p>
											'.$val->project_detail.'	
											</p>                                   
								</div>
								
								<h3 class="py-2">IDR '.								
									$val->project_nilai
									.
								
								'</h3>
								<div class="media-body">
									<h6 class="list-group-item-heading">Masa Pinjaman <span class="sucess float-right"> 4 Bulan</span></h6>       
								</div>
								<div class="media-body">
									<h6 class="list-group-item-heading">Batas Funding <span class="sucess float-right"> 2 Hari Lagi</span></h6>       
								</div>
							</div>
						</div>
						
						<div class="card-footer text-muted">
							<div class="sales pr-2">
								<div class="sales-today mb-1">
									<p class="m-0">In Funding <span class="sucess float-right"> 6.89%</span></p>
									<div class="progress mt-1 mb-0" style="height: 20px;">
										<div class="progress-bar bg-green" role="progressbar" style="width: 18%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<button type="button" class="btn btn-outline-green pull-right round "><i class="ft-shopping-cart"></i> Ajukan Pendanaan</button>
						</div>
					</div>
				</div> ';
				}
				
			}
			$this->mViewData['data']	= $data;
            $this->render('home');
	}
}
