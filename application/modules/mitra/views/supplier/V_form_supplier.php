	<div class="row">
		<div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="horz-layout-icons">Form Tambah Barang</h4>
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
	                    <form id="formAdd" class="form-horizontal">
	                    	<div class="form-body">
                                        <input type="hidden" id="url" value="mitra/barang/postdata">
                                        <input type="hidden" id="url_data" value="mitra/barang">
                                        <div id="success"> </div>                                      
                                        <div></div>
                                        <div class="form-group row">
                                                <label class="col-md-4 label-control" for="timesheetinput1">Nama Barang</label>
                                                <div class="col-md-8">			                            
                                                    <input type="text" class="form-control" name="barang_nama" placeholder="" required data-validation-required-message="Nama Barang Wajib di isi" />                                                        
                                                </div>
		                        </div>
                                        <div class="form-group row">
                                                <label class="col-md-4 label-control" for="timesheetinput1">Nama Kategori Barang</label>
                                                <div class="col-md-8">			                            
                                                    <div class="input-icon right">                                                   
                                                    <select class="form-control" id="m_kategori_barang_id" name="m_kategori_barang_id" required></select>
                                                </div>
                                                </div>
		                        </div>
                                        <div class="form-group row">
                                                <label class="col-md-4 label-control" for="timesheetinput1">Satuan Barang</label>
                                                <div class="col-md-8">			                            
                                                    <div class="input-icon right">                                                   
                                                    <select class="select2-data-ajax form-control" id="m_satuan_barang_id" name="m_satuan_barang_id"  required></select>
                                                </div>
                                                </div>
		                        </div>
                                        <div class="form-group row">
                                                <label class="col-md-4 label-control" for="timesheetinput1">Status Barang</label>
                                                <div class="col-md-8">			                            
                                                    <div class="input-icon right">                                                   
                                                        <select class="form-control select2" name="barang_status_aktif" aria-required="true" aria-describedby="select-error" required>
                                                        <option id="aktif" value="y"> Aktif </option>
                                                        <option id="nonaktif" value="n"> Non Aktif </option>
                                                    </select>
                                                    </div>
                                                </div>
		                        </div>
                                </div>

	                        <div class="form-actions right">
	                            <button type="button" class="btn btn-warning mr-1" onclick="reset()">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
                                    <button type="submit" class="btn btn-primary" id="barangbtn">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
	                        </div>
	                    </form>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
