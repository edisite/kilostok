<!-- Server-side processing -->
<section id="server-processing">
	<div class="row">
	    <div class="col-12">
        
            <?php
                $this->load->view('barang/V_form_barang');
            ?>
                    
	        <div class="card">
	            <div class="card-header bg-danger">
	                <h4 class="card-title">List Barang</h4>
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
	                <div class="card-body card-dashboard">
                            <a href="<?php echo base_url(); ?>mitra/barang/getform">
                                <button id="inlineForm" class="btn btn-outline-success mr-1 mb-1 ladda-button"><i class="ft-plus"></i>&nbsp; Tambah Baru</button>
                            </a>
                                <table class="table table-striped table-bordered server-side responsive" id="barang-server-side">
		                	<thead>
                                            <tr>
                                                <th> No </th>
                                                <th> Kode Barang </th>
                                                <th> Nama Barang </th>
                                                <th> Kategori Barang </th>
                                                <th> Jenis Barang </th>
                                                <th> Minimum Stok </th>
                                                <th> Satuan Barang </th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th> No </th>
                                                <th> Kode Barang </th>
                                                <th> Nama Barang </th>
                                                <th> Kategori Barang </th>
                                                <th> Jenis Barang </th>
                                                <th> Minimum Stok </th>
                                                <th> Satuan Barang </th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </tfoot>
                                </table>
                        </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>