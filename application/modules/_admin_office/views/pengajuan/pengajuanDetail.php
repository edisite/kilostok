<section id="horizontal-form-layouts">
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="horz-layout-basic">Project Info</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <li><a data-action="close"><i class="ft-x"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="card-content collpase show">
	                <div class="card-body">
						<div class="card-text">
							<p>This is the basic horizontal form with labels on left and form controls on right in one line. Add <code>.form-horizontal</code> class to the form tag to have horizontal form styling. To define form sections use <code>form-section</code> class with any heading tags.</p>
						</div>
	                    <form class="form form-horizontal">
	                    	<div class="form-body">
	                    		<h4 class="form-section"><i class="ft-user"></i>Data Mitra</h4>
			                    <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Nama Mitra</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput1" class="form-control" name="fname" value="<?php echo $data[0]->mitra_nama; ?>" disabled>
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput2">Kode Mitra</label>
									<div class="col-md-9">
	                            		<input type="text" id="projectinput2" class="form-control" placeholder="" name="lname" value="<?php echo $data[0]->mitra_kode; ?>" disabled>
	                            	</div>
		                        </div>
								<div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Alamat</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="5" class="form-control" name="comment" placeholder=""  disabled>
                                        <?php echo $data[0]->mitra_alamat; ?>
                                        </textarea>
									</div>
								</div>

		                        <div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput3">Project Berjalan</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput3" class="form-control" placeholder="" name="email" value="0" disabled>
		                            </div>
		                        </div>
		                        <div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput3">Rating Mitra</label>
		                            <div class="col-md-9">
		                            	<input type="text" id="projectinput3" class="form-control" placeholder="" name="email" value="0" disabled>
		                            </div>
		                        </div>

								<h4 class="form-section"><i class="ft-clipboard"></i> Data Project</h4>

		                        <div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput5">Nama Project</label>
									<div class="col-md-9">
		                            	<input type="text" id="projectinput5" class="form-control" placeholder="" name="" value="<?php echo $data[0]->project_nama; ?>" disabled>
		                            </div>
		                        </div>
                                <div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput9">Project Detail</label>
									<div class="col-md-9">
										<textarea id="projectinput9" rows="5" class="form-control" name="comment" placeholder="" disabled><?php echo $data[0]->project_detail; ?></textarea>
									</div>
								</div>
                                <div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput5">Nilai Project</label>
									<div class="col-md-9">
		                            	<input type="text" id="projectinput5" class="form-control" placeholder="" name="" value="<?php echo $data[0]->project_nilai; ?>" disabled>
		                            </div>
		                        </div>
                                <div class="form-group row">
									<label class="col-md-3 label-control" for="projectinput5">RAB</label>
									<div class="col-md-9">
		                            	<a href=''>file download</a>
		                            </div>
		                        </div>

							</div>

	                        <div class="form-actions">
	                            <button type="button" class="btn btn-danger mr-1">
	                            	<i class="ft-x"></i> Tolak / Tidak Layak
	                            </button>
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Tolak / Perbaikan
	                            </button>
	                            <button type="submit" class="btn btn-success">
	                                <i class="fa fa-check-square-o"></i> Approve
	                            </button>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
