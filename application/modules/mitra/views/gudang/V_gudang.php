<!-- Server-side processing -->
<section id="server-processing">
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">List Gudang</h4>
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
                            <button id="addRow" class="btn btn-primary mb-2"><i class="ft-plus"></i>&nbsp; Tambah Baru</button>
                                <table class="table table-striped table-bordered gudang-server-side responsive" id="gudang-server-side">
		                	<thead>
                                            <tr>
                                                <th> No </th>
                                                <th> Nama Gudang </th>
                                                <th> Nama Cabang </th>
                                                <th> Jenis Gudang </th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th> No </th>
                                                <th> Nama Gudang </th>
                                                <th> Nama Cabang </th>
                                                <th> Jenis Gudang </th>
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