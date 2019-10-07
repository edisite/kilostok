<!-- Server-side processing -->
<section id="server-processing">
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Rencana Anggaran Biaya (RAB)</h4>
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
                        <div class="repeater-default">
                            <div data-repeater-list="car">
                                <div data-repeater-item>
                                    <form class="form row" id="formAdd" >
                                        <input type="hidden" id="url" value="mitra/project/postData_rab">
                                        <input type="hidden" id="url_data" value="mitra/project/rab/">
                                        <input type="hidden" id="project_kode" value="<?php echo $project_kode; ?>">
                                        <div class="form-group mb-1 col-sm-12 col-md-4">
                                            <label for="profession">Parent</label>
                                            <br>
                                            <select class="form-control" id="m_mitra_rab_select" name="m_mitra_rab_select"  required></select>
                                            <!-- onchange="generateCoaCode()" -->
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-2">
                                            <label for="kode-addr">Kode</label>
                                            <br>
                                            <input type="text" class="form-control" id="rab_kode" name="rab_kode" placeholder="">
                                        </div>
                                        <div class="form-group mb-1 col-sm-12 col-md-4">
                                            <label for="email-addr">Nama RAB</label>
                                            <br>
                                            <input type="text" class="form-control" id="nama_rab" placeholder="Input Nama RAB">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-2 text-left mt-2">
                                            <button type="submit" class="btn btn-primary" id="barangbtn"> <i class="fa fa-check"></i> Submit</button>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                
	                <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered server-side responsive" id="mitra-project-rab">
		                	<thead>
                                            <tr>                    
                                                <th> Kode RAB </th>
                                                <th> Nama RAB </th>
                                                <th> Kode Parent </th>
                                                <th> Saldo Rencana </th>
                                                                
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th> Kode RAB </th>
                                                <th> Nama RAB </th>
                                                <th> Kode Induk </th>
                                                <th> Saldo Rencana </th>
                                                                   
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


<!-- <script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" >
</script> -->

<script type="text/javascript">
        
        function generateCoaCode() {
        $.ajax({
            type : "GET",
            url  : $base_url + "api/internal/RAB/GenCOA/",
            data : { coa : document.getElementsByName('m_mitra_rab_select').value },
            dataType : "json",
            success:function(data){                   
                 document.getElementsByName('rab_kode').value = data.status;
            }
        });
    }
</script>