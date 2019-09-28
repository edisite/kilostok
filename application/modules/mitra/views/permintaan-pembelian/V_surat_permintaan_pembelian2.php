<!-- Server-side processing -->
<section id="server-processing">
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">List Permintaan Pembelian Barang</h4>
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
                            <a href="<?php echo base_url(); ?>mitra/PermintaanPembelian/getFormPembelian">
                                <button id="inlineForm" class="btn btn-outline-success mr-1 mb-1 ladda-button"><i class="ft-plus"></i>&nbsp; Tambah Baru</button>
                            </a>
                                <table class="table table-striped table-bordered server-side responsive" id="pembelian-permintaan-pembelian-barang">
		                	<thead>
                                            <tr>
                                                <th> No </th>
                                                <th> Project </th>
                                                <th> No SPP </th>
                                                <th> Jenis SPP </th>
                                                <th> Tanggal SPP </th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th> No </th>
                                                <th> Project </th>
                                                <th> No SPP </th>
                                                <th> Jenis SPP </th>
                                                <th> Tanggal SPP </th>
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