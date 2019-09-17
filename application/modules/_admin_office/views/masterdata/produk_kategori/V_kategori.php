<!-- Base style - compact table -->
<section id="compact-style">
	<div class="row">
            <div class="col-12">
                    <div class="card">
                            <div class="card-header">
                                    
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
                            <div class="card-content">
                                            <div class="col-md-6">
                                                <div class="btn-group">
<!--                                                 <button id="modalAdd-btn" class="btn sbold dark" data-toggle="modal" onclick="openFormCoa(),reset()"><i class="icon-plus"></i>&nbsp; Tambah Data-->
                                                 <button id="modalAdd-btn" class="btn sbold dark" data-toggle="modal"><i class="icon-plus"></i>&nbsp; Tambah Data
                                                      </button>                                                   
                                                    
                                                </div>
                               
                                            </div>
                                            
                            </div>
                            <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table id="ajax-bidang-show" class="table table-striped table-bordered ajax-kategori-produk-show">
                                            <thead>
                                                <tr>
                                                    <th> Kode Bidang </th>
                                                    <th> Nama Bidang </th>
                                                    <th> Status </th>
                                                    <th> Create Date </th>
                                                    <th> Create By </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
                <!-- BEGIN PAGE LEVEL PLUGINS -->
        
        <script type="text/javascript">
//                $('#ajax-sourced').DataTable( {
//                    "ajax": "<?php echo base_url();?>masterdata/bidang/loadData/"
//                } );
            function deleteData(id) {
                // CEK STOK BARANG
                $.ajax({
                  url: '<?php echo base_url();?>Inventory/Stok-Gudang/loadDataStok4/',
                  data: 'id='+id,
                  type: 'GET',
                  dataType: 'json',
                  success: function (data) {
                    if (data.total_stok == 0 || data.total_stok == null) {
                      // TIDAK BOLEH NON-AKTIFKAN BARANG JIKA ADA STOK
                      swal({
                        title: "Apakah anda yakin?",
                        text: "Data akan dinonaktifkan !",
                        type: "warning",
                        showCancelButton: true,
                        cancelButtonClass: "btn-raised btn-warning",
                        cancelButtonText: "Batal!",
                        confirmButtonClass: "btn-raised btn-danger",
                        confirmButtonText: "Ya!",
                        closeOnConfirm: false
                      }, function() {
                        $.ajax({
                          url: '<?php echo base_url();?>Master-Data/Barang/deleteData/',
                          data: 'id='+id,
                          type: 'POST',
                          dataType: 'json',
                          success: function (data) {
                            if (data.status=='200') {
                              alert_success_nonaktif();
                              searchData();
                            } else if (data.status=='204') {
                              alert_fail_nonaktif();
                            }
                          }
                        });
                      })
                    } else {
                      swal({
                          title: "Alert!",
                          text: "Barang tersebut tidak bisa di-nonaktif-kan karena jumlah stok adalah "+data.total_stok,
                          type: "error",
                          confirmButtonClass: "btn-raised btn-danger",
                          confirmButtonText: "OK",
                      });
                    }
                  }
                });
              }
            function searchData() { 
                $('#server-side').DataTable({
                    destroy: true,
                    "processing": true,
                    "serverSide": true,
                    ajax: {
                      url: '<?php echo base_url();?>masterdata/bidang/loadData'
                    },
                    "columns": [
                      {"name": "no","orderable": false,"searchable": false,  "className": "text-center", "width": "5%"},
                      {"name": "coa_kode"},
                      {"name": "coa_nama"},
                      {"name": "coa_kode_induk"},
                      {"name": "coa_dk"},
                      {"name": "coa_tipe"},
                      {"name": "action","orderable": false,"searchable": false, "className": "text-center", "width": "15%"}
                    ],
                    // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                    "language": {
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        },
                        "emptyTable": "No data available in table",
                        "info": "Showing _START_ to _END_ of _TOTAL_ records",
                        "infoEmpty": "No records found",
                        "infoFiltered": "(filtered1 from _MAX_ total records)",
                        "lengthMenu": "Show _MENU_",
                        "search": "Search:",
                        "zeroRecords": "No matching records found",
                        "paginate": {
                            "previous":"Prev",
                            "next": "Next",
                            "last": "Last",
                            "first": "First"
                        }
                    },

                    // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                    // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
                    // So when dropdowns used the scrollable div should be removed. 
                    //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

                    "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                    "pagingType": "bootstrap_extended",

                    "lengthMenu": [
                        [10, 25, 50, 100, 200, 500],
                        [10, 25, 50, 100, 200, 500] // change per page values here
                    ],
                    // set the initial value
                    "pageLength": 10,
                    "columnDefs": [{  // set default column settings
                        'orderable': false,
                        'targets': [0]
                    }, {
                        "searchable": false,
                        "targets": [0]
                    }],
                    "order": [
                        [2, "asc"]
                    ],
                    "iDisplayLength": 10
                });
            }

            function editData(id) {
              $.ajax({
                type : "GET",
                url  : '<?php echo base_url();?>Master-Data/COA/loadDataWhere/',
                data : "id="+id,
                dataType : "json",
                success:function(data){
                  for(var i=0; i<data.val.length;i++){
                    document.getElementsByName("kode")[0].value = data.val[i].kode;
                    document.getElementsByName("coa_kode")[0].value = data.val[i].coa_kode;
                    document.getElementsByName("coa_nama")[0].value = data.val[i].coa_nama;
                    document.getElementsByName("coa_keterangan")[0].value = data.val[i].coa_keterangan;
                    if (data.val[i].coa_tipe == 1) {
                      document.getElementById('header').checked = true;
                    } else if (data.val[i].coa_tipe == 2) {
                      document.getElementById('subheader').checked = true;
                    } else if (data.val[i].coa_tipe == 3) {
                      document.getElementById('nama_perkiraan').checked = true;
                    }
                    for(var j=0; j<data.val[i].coa_header.val2.length; j++){
                      $("#coa_header").append('<option value="'+data.val[i].coa_header.val2[j].id+'" selected>'+data.val[i].coa_header.val2[j].text+'</option>');
                      $("#coa_header").select2();
                    }
                    for(var j=0; j<data.val[i].coa_subheader.val2.length; j++){
                      $("#coa_subheader").append('<option value="'+data.val[i].coa_subheader.val2[j].id+'" selected>'+data.val[i].coa_subheader.val2[j].text+'</option>');
                      $("#coa_subheader").select2();
                    }
                    if (data.val[i].coa_debit_kredit == 1) {
                      document.getElementById('debit').checked = true;
                    } else if (data.val[i].coa_tipe == 2) {
                      document.getElementById('kredit').checked = true;
                    }
                    // $("#m_cabang_id").select2('destroy');
                    for(var j=0; j<data.val[i].m_cabang_id.val2.length; j++){
                        $("#m_cabang_id").append('<option value="'+data.val[i].m_cabang_id.val2[j].id+'" selected>'+data.val[i].m_cabang_id.val2[j].text+'</option>');
                        $("#m_cabang_id").select2();
                    }
                    // $("#m_cashflow_id").select2('destroy');
                    for(var j=0; j<data.val[i].m_cashflow_id.val2.length; j++){
                        $("#m_cashflow_id").append('<option value="'+data.val[i].m_cashflow_id.val2[j].id+'" selected>'+data.val[i].m_cashflow_id.val2[j].text+'</option>');
                        $("#m_cashflow_id").select2();
                    }
                  }
                }
              });
            }

        </script>

    </body>

</html>