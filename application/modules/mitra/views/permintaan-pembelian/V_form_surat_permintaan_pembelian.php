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
                        <form id="formAdd" class="form-horizontal">
	                <div class="card-body">    
	                    	<div class="form-body">
                                        <input type="hidden" id="url" value="mitra/barang/postdata">
                                        <input type="hidden" id="url_data" value="mitra/barang">
                                        <div id="success"> </div>                                      
                                        <div></div>
                                        <div class="form-group row">
                                                <label class="col-md-4 label-control" for="timesheetinput1">Tanggal Permintaan Pembelian</label>
                                                <div class="col-md-8">			                            
                                                    <input type="text" class="form-control" name="barang_nama" placeholder="" required data-validation-required-message="Nama Barang Wajib di isi" />                                                        
                                                </div>
		                        </div>
                                        <div class="form-group row">
                                                <label class="col-md-4 label-control" for="timesheetinput1">Tanggal Dibutuhkan</label>
                                                <div class="col-md-8">			                            
                                                    <input type="text" class="form-control" name="barang_nama" placeholder="" required data-validation-required-message="Nama Barang Wajib di isi" />                                                        
                                                </div>
		                        </div>
                                        <div class="form-group row">
                                                <label class="col-md-4 label-control" for="timesheetinput1">Alasan Permintaan Pembelian </label>
                                                <div class="col-md-8">			                            
                                                    <textarea id="projectinput9" rows="5" class="form-control" name="permintaan_pembelian_alasan" placeholder=""></textarea>                
                                                </div>
		                        </div>
                                        <div class="form-group row">
                                                <label class="col-md-4 label-control" for="timesheetinput1">Catatan Permintaan Pembelian  </label>
                                                <div class="col-md-8">			                            
                                                    <textarea id="projectinput9" rows="5" class="form-control" name="permintaan_pembelian_catatan" placeholder=""></textarea>                
                                                </div>
		                        </div>
                                        

                                </div>
                        </div>
                        <div class="card-body">
                                <div class="repeater-default" id="form-repeater">
                                    <div data-repeater-list="car">
                                        <div data-repeater-item>
                                                <div class="form-group mb-1 col-sm-12 col-md-2">
                                                    <label for="email-addr">No</label>
                                                    <br>
                                                    <input type="email" class="form-control" id="email-addr" placeholder="Enter email">
                                                </div>
                                                <div class="form-group mb-1 col-sm-12 col-md-2">
                                                    <label for="pass">Kode Barang</label>
                                                    <br>
                                                    <input type="password" class="form-control" id="pass" placeholder="Password">
                                                </div>
                                                <div class="form-group mb-1 col-sm-12 col-md-2">
                                                    <label for="bio" class="cursor-pointer">Uraian dan Spesifikasi Barang</label>
                                                    <br>
                                                    <textarea class="form-control" id="bio" rows="2"></textarea>
                                                </div>
                                                <div class="skin skin-flat form-group mb-1 col-sm-12 col-md-2">
                                                    <label for="tel-input">Qty</label>
                                                    <br>
                                                    <input class="form-control" type="tel" value="1-(555)-555-5555" id="tel-input">
                                                </div>
                                                <div class="form-group mb-1 col-sm-12 col-md-2">
                                                    <label for="profession">Satuan</label>
                                                    <br>
                                                    <select class="form-control" id="profession">
                                                      <option>Select Option</option>
                                                      <option>Option 1</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                    <button type="button" class="btn btn-danger" data-repeater-delete> <i class="ft-x"></i> Delete</button>
                                                </div>
                  
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="form-group overflow-hidden">
                                        <div class="col-12">
                                            <button data-repeater-create class="btn btn-primary">
                                                <i class="ft-plus"></i> Add
                                            </button>
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
