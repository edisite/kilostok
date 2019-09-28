            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1><?php if(isset($title_page)) echo $title_page;?>
                                <small><?php if(isset($title_page2)) echo $title_page2;?></small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="<?php echo base_url();?>"> Dashboard </a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="#"> <?php if(isset($title_page)) echo $title_page;?> </a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active"><?php if(isset($title_page2)) echo $title_page2;?></span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-doc font-dark"></i> &nbsp;&nbsp;
                                        <span class="caption-subject font-dark sbold uppercase">Form  <?php if(isset($title_page2)) echo $title_page2;?></span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                <!-- BEGIN FORM-->
                                <form action="#" id="formAdd" class="form-horizontal" method="post">
                                    <div class="form-body">
                                        <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                        <div class="alert alert-success display-hide">
                                            <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                            <?php
                                                if(isset($edit))
                                                {
                                                    echo '<input type="hidden" id="url" value="Pembelian/Purchase-Order/postData/3">';
                                                }
                                                else
                                                {
                                                    echo '<input type="hidden" id="url" value="Pembelian/Purchase-Order/postData/">';
                                                }
                                            ?>
                                        
                                        <input type="hidden" id="url_data" value="Pembelian/Purchase-Order">
                                        <input type="hidden" name="order_status" value="0">
                                        <input type="hidden" name="order_type" value="0">
                                        <div class="form-group" id="kode" hidden="true">
                                            <label class="control-label col-md-4">ID Order (Auto)
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="kode" value="<?php if(isset($id)) echo $id;?>" readonly /> </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="order_nomor" hidden="true">
                                            <label class="control-label col-md-4">Kode Order (Auto)
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="order_nomor" readonly /> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Tanggal Order
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <div class=" input-group">
                                                        <input name="order_tanggal" type="text" value="<?php echo date('d/m/Y');?>" class="form-control" readonly>
                                                        <span class="input-group-addon" style="">
                                                            <span class="icon-calendar"></span>
                                                        </span>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Nama Sales
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="order_nama_sales" /> </div>
                                            </div>
                                        </div>
                                        <div class="form-group" hidden="true">
                                            <label class="control-label col-md-4">Alamat Kirim
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <textarea class="form-control" rows="3" name="order_alamat_dikirim"></textarea> </div>
                                            </div>
                                        </div>
                                        <div class="form-group" hidden="true">
                                            <label class="control-label col-md-4">Telp/Fax Kirim
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <textarea class="form-control" rows="3" name="order_hp_fax"></textarea> </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="kolomJenisPO">
                                            <label class="control-label col-md-4">Jenis PO
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <label class="mt-radio"> Penawaran
                                                        <input type="radio" value="1" name="purchase-order-type" id="penawaran" onchange="ubahKeBarang(this)" required />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio"> Tanpa Penawaran
                                                        <input type="radio" value="2" name="purchase-order-type" id="tanpa_penawaran" onchange="ubahKeBarang(this)" />
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Nama Supplier
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="m_supplier_id" name="m_supplier_id" aria-required="true" aria-describedby="select-error" onchange="checkPenawaran()" required>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="kolomPenawaran">
                                            <label class="control-label col-md-4">Nomor Penawaran
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="order_referensi_id" name="order_referensi_id" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" id="btnAddPenawaran" class="btn sbold dark" onclick="addPenawaran()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group" id="kolomPPN">
                                            <label class="control-label col-md-4">PPN
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <label class="mt-radio"> Ya
                                                        <input type="radio" value="1" name="po_ppn" id="po_ppn1" onchange="getPPN(1)"/>
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio"> Tidak
                                                        <input type="radio" value="2" name="po_ppn" id="po_ppn2" onchange="getPPN(2)" />
                                                        <span></span>
                                                    </label> </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="kolomPembelian">
                                            <label class="control-label col-md-4">Pembelian
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <label class="mt-radio"> Sparepart
                                                        <input type="hidden" value="1" name="order_bahan" value="1" />
                                                        <input type="radio" value="1" name="order_bahan_pilihan" id="sparepart" onchange="ubahPembelian(this)" />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio"> Selain Sparepart
                                                        <input type="radio" value="2" name="order_bahan_pilihan" id="selain_sparepart" onchange="ubahPembelian(this)" />
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="kolomJenisBarang">
                                            <label class="control-label col-md-4">Jenis Barang
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="m_jenis_barang_id" name="m_jenis_barang_id" aria-required="true" aria-describedby="select-error">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="kolomBarang">
                                            <label class="control-label col-md-4">Barang
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="m_barang_id" name="m_barang_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" id="btnAddBarang" class="btn sbold dark" onclick="addBarang()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group" id="kolomSparepart">
                                            <label class="control-label col-md-4">Barang
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="m_sparepart_id" name="m_sparepart_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" id="btnAddSparepart" class="btn sbold dark" onclick="addSparepart()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group" id="tblInsert">
                                            <div class="col-md-12">
                                                <input type="hidden" name="jml_itemBarang" id="jml_itemBarang" value="0" />
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="default-table">
                                                    <thead id="thead1">
                                                        <tr>
                                                            <th> No </th>
                                                            <th> Kode Barang </th>
                                                            <th> Uraian dan Spesifikasi Barang/Jasa </th>
                                                            <th> Qty </th>
                                                            <th> Satuan </th>
                                                            <th> Harga Satuan </th>
                                                            <th> Total </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody1">
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="6" class="text-right"> Sub Total </th>
                                                            <th>
                                                                <input type="text" class="form-control money" id="order_subtotal" name="order_subtotal" value="0" required readonly />
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="6" class="text-right"> PPH % </th>
                                                            <th>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control num2" id="order_pph" name="order_pph" value="0" onchange="sumSubTotal()" required />
                                                                    <span class="input-group-addon" style="">
                                                                        % 
                                                                    </span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="6" class="text-right"> PPN % <span>
                                                                <label id="tipe_ppn0">Exclude</label>
                                                                <label id="tipe_ppn1">Include</label>
                                                                </span></th>
                                                            <th>
                                                                <div class="input-group">
                                                                    <input type="hidden" class="form-control decimal" id="order_tipe_ppn" name="order_tipe_ppn" value="0" />
                                                                    <input type="text" class="form-control num2" id="order_ppn" name="order_ppn" value="0" onkeypress="cekPPN(this)" onchange="sumTotal()" required readonly />
                                                                    <span class="input-group-addon" style="">
                                                                        % 
                                                                    </span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="6" class="text-right"> Total </th>
                                                            <th>
                                                                <input type="text" class="form-control money" id="order_total" name="order_total" value="0" required readonly />
                                                            </th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Tanggal Kirim
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <div class="input-group date datepicker" data-date-format="dd/mm/yyyy" data-date-start-date="+0d">
                                                        <input type="text" class="form-control" name="order_tanggal_kirim" required>
                                                        <span class="input-group-addon" style="">
                                                            <span class="icon-calendar"></span>
                                                        </span>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Pembayaran 
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="form-control" id="order_pembayaran" name="order_pembayaran" aria-required="true" aria-describedby="select-error" required>
                                                    <option id="tunai" value="0"> Tunai </option>
                                                    <option id="kredit" value="1"> Kredit </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-4 col-md-8 text-right">
                                                <button type="submit" id="submit" class="btn green-jungle">Simpan</button>
                                                <a href="<?php echo base_url();?>Pembelian/Purchase-Order">
                                                <button type="button" class="btn default">Kembali</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM -->
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->

        <?php $this->load->view('layout/V_footer');?>

        <script type="text/javascript">
            $(document).ready(function(){
                rules();
                itemBarang = 0;
                idBarang = [];
                document.getElementById('penawaran').checked = true;
                $("#formAdd").submit(function(event){
                  if ($("#formAdd").valid() == true) {
                    actionData2();
                  }
                  return false;
                });
                $('#m_supplier_id').css('width', '100%');
                $('#order_referensi_id').css('width', '100%');
                selectList_supplier("#m_supplier_id");
                selectList_jenisBarang();
                $("#kolomPPN").hide();
                $("#tipe_ppn0").hide();
                $("#tipe_ppn1").hide();
                $("#kolomPembelian").hide();
                $("#kolomJenisBarang").hide();
                $("#kolomBarang").hide();
                $("#kolomSparepart").hide();
                if (document.getElementsByName("kode")[0].value != null) {
                    editData(document.getElementsByName("kode")[0].value 
                        <?php 
                            if(isset($edit))
                            {
                                echo ', '.$edit;
                            } 
                        ?>
                    );
                }
            });

            $('#m_jenis_barang_id').on('select2:select', function (evt) {
                $("#m_barang_id").select2();
                $("#m_barang_id").select2('destroy');
                $("#m_barang_id").empty();
                id_jenis = $(evt.currentTarget).find("option:selected").val();
                selectList_barang2("#m_barang_id", id_jenis);
                document.getElementsByName("m_jenis_barang_id")[0].value = id_jenis;
            });

            function cekPPN(element)
            {
                var ppn = element.value;
                if(ppn > 10)
                {
                    event.preventDefault();
                }
            }

            function getPPN(id) {
                if(id == 1){
                    $("#po_ppn1").removeAttr('hidden');
                    document.getElementById('order_ppn').value = "10.00";
                    document.getElementsByName('order_tipe_ppn')[0].value = 0;
                    $("#tipe_ppn0").show();
                    $("#tipe_ppn1").hide();
                } else {
                    $("#po_ppn2").attr('hidden', 'hidden');
                    document.getElementById('order_ppn').value = "10.00";
                    document.getElementsByName('order_tipe_ppn')[0].value = 1;
                    $("#tipe_ppn0").hide();
                    $("#tipe_ppn1").show();
                }
                sumTotal();
            }

            function checkPenawaran() {
                $('#order_referensi_id').select2();
                $('#order_referensi_id').select2('destroy');
                $('#order_referensi_id').empty();
                $.ajax({
                  type : "GET",
                  url  : '<?php echo base_url();?>Pembelian/Penawaran-Harga/loadDataSelect2/',
                  data : { id : document.getElementById('m_supplier_id').value },
                  dataType : "json",
                  success:function(data){
                    for(var i=0; i<data.items.length;i++){
                        $("#order_referensi_id").append('<option value="'+data.items[i].id+'">'+data.items[i].text+'</option>');
                    }
                    $('#order_referensi_id').select2();
                  }
                });
            }

            function addPenawaran() {
                var id = document.getElementsByName('order_referensi_id')[0].value;
                var id_supplier = document.getElementById('m_supplier_id')[0].value;
                if (id.length > 0) {
                    getDetailPenawaran(id, id_supplier);
                }
            }

            function ubahKeBarang(element) {
                document.getElementsByName('order_tipe_ppn')[0].value = 0;
                document.getElementsByName('order_ppn')[0].value = "0.00";
                document.getElementsByName('order_pph')[0].value = "0.00";
                document.getElementsByName('order_subtotal')[0].value = "0.00";
                document.getElementsByName('order_total')[0].value = "0.00";
                if(element.id == 'penawaran') {
                    //pakai penawaran
                    $("#m_supplier_id").select2('destroy');
                    selectList_supplier("#m_supplier_id");
                    itemBarang = 0;
                    idBarang = [];
                    $("#default-table tbody").empty();
                    $("#default-table thead").empty();
                    //no referensi
                    $("#kolomPenawaran").show();
                    $("#order_referensi_id").attr('required', 'required');
                    //ppn
                    $("#kolomPPN").hide();
                    $("#order_ppn").attr('readonly', 'readonly');
                    $("#po_ppn1").removeAttr('required');
                    $("#po_ppn2").removeAttr('required');
                    //sparepart
                    $("#kolomPembelian").hide();
                    $("#sparepart").removeAttr('required');
                    $("#selain_sparepart").removeAttr('required');
                    $("#kolomSparepart").hide();
                    $("#m_sparepart_id").removeAttr('required');
                    //jenis barang
                    $("#kolomJenisBarang").hide();
                    $("#m_jenis_barang_id").removeAttr('required');
                    //barang
                    $("#kolomBarang").hide();
                    $("#m_barang_id").removeAttr('required');

                    $("#order_tanggal_kirim").attr('readonly', 'readonly');
                    $("#default-table thead").append('\
                        <tr>\
                            <th>No</th>\
                            <th>Kode Barang</th>\
                            <th>Uraian dan Spesifikasi Barang</th>\
                            <th>Qty</th>\
                            <th>Satuan</th>\
                            <th>Harga Satuan</th>\
                            <th>Total</th>\
                        </tr>\
                    ');
                }
                else {
                    $("#m_supplier_id").select2('destroy');
                    selectList_supplier("#m_supplier_id");
                    itemBarang = 0;
                    idBarang = [];
                    $("#default-table tbody").empty();
                    $("#default-table thead").empty();
                    //no referensi
                    $("#kolomPenawaran").hide();
                    $("#order_referensi_id").removeAttr('required');
                    //ppn
                    $("#kolomPPN").show();
                    $("#po_ppn1").attr('required', 'required');
                    $("#po_ppn2").attr('required', 'required');
                    //sparepart
                    $("#kolomPembelian").show();
                    $("#sparepart").attr('required', 'required');
                    $("#selain_sparepart").attr('required', 'required');
                    //jenis barang
                    $("#kolomJenisBarang").show();
                    $("#m_jenis_barang_id").attr('required', 'required');
                    //barang
                    $("#kolomBarang").show();
                    $("#m_barang_id").attr('required', 'required');

                    $("#order_tanggal_kirim").removeAttr('readonly');
                    $("#default-table thead").append('\
                        <tr>\
                            <th>No</th>\
                            <th>Kode Barang</th>\
                            <th>Uraian dan Spesifikasi Barang</th>\
                            <th>Qty</th>\
                            <th>Satuan</th>\
                            <th>Harga Satuan</th>\
                            <th>Total</th>\
                            <th>Action</th>\
                        </tr>\
                    ');
                }
            }

            function ubahPembelian(element) {
                document.getElementsByName('order_tipe_ppn')[0].value = 0;
                document.getElementsByName('order_ppn')[0].value = "0.00";
                document.getElementsByName('order_pph')[0].value = "0.00";
                document.getElementsByName('order_subtotal')[0].value = "0.00";
                document.getElementsByName('order_total')[0].value = "0.00";
                $("#tipe_ppn0").hide();
                $("#tipe_ppn1").hide();
                document.getElementsByName("order_bahan")[0].value = element.value;
                if(element.id == 'sparepart') {
                    //pembelian sparepart
                    itemBarang = 0;
                    idBarang = [];
                    $("#default-table tbody").empty();
                    $("#default-table thead").empty();
                    //sparepart
                    $("#kolomSparepart").show();
                    $("#m_sparepart_id").attr('required', 'required');
                    //jenis barang
                    $("#kolomJenisBarang").hide();
                    $("#m_jenis_barang_id").removeAttr('required');
                    //barang
                    $("#kolomBarang").hide();
                    $("#m_barang_id").removeAttr('required');
                    //select list sparepart
                    selectList_sparepart("#m_sparepart_id");
                    $("#default-table thead").append('\
                        <tr>\
                            <th>No</th>\
                            <th>Kode Barang</th>\
                            <th>Uraian dan Spesifikasi Barang</th>\
                            <th>Qty</th>\
                            <th hidden="true">Satuan</th>\
                            <th colspan="2">Harga Satuan</th>\
                            <th>Total</th>\
                            <th>Action</th>\
                        </tr>\
                    ');
                }
                else {
                    itemBarang = 0;
                    idBarang = [];
                    $("#default-table tbody").empty();
                    $("#default-table thead").empty();
                    //sparepart
                    $("#kolomSparepart").hide();
                    $("#m_sparepart_id").removeAttr('required');
                    //jenis barang
                    $("#kolomJenisBarang").show();
                    $("#m_jenis_barang_id").attr('required', 'required');
                    //barang
                    $("#kolomBarang").show();
                    $("#m_barang_id").attr('required', 'required');
                    $("#default-table thead").append('\
                        <tr>\
                            <th>No</th>\
                            <th>Kode Barang</th>\
                            <th>Uraian dan Spesifikasi Barang</th>\
                            <th>Qty</th>\
                            <th>Satuan</th>\
                            <th>Harga Satuan</th>\
                            <th>Total</th>\
                            <th>Action</th>\
                        </tr>\
                    ');
                }
            }

            function addBarang() {
                $("#tipe_ppn0").hide();
                $("#tipe_ppn1").hide();
                id = document.getElementById('m_barang_id').value;
                $.ajax({
                  type : "GET",
                  url  : '<?php echo base_url();?>Master-Data/Barang/loadDataWhere/',
                  data : "id="+id,
                  dataType : "json",
                  success:function(data){
                    // $("#default-table tbody").empty();

                    itemBarang++;
                    $("#jml_itemBarang").val(itemBarang);

                    for(var i = 0; i < data.val.length; i++){
                        $("#default-table tbody").append('\
                            <tr id="detail'+itemBarang+'">\
                                <td id="td0'+itemBarang+'">\
                                    '+itemBarang+'\
                                </td>\
                                <td id="td1'+itemBarang+'">\
                                    <input type="hidden" name="m_barang_id[]" value="'+data.val[i].kode+'"/>\
                                    '+data.val[i].barang_kode+'\
                                </td>\
                                <td id="td2'+(i+1)+'">\
                                    '+data.val[i].barang_nama+'('+data.val[i].m_jenis_barang_id.val2[0].text+')\
                                </td>\
                                <td id="td3'+(i+1)+'">\
                                    <input type="text" class="form-control num2" id="orderdet_qty'+data.val[i].kode+'" name="orderdet_qty[]" value="0" onchange="sumSubTotal()" required/>\
                                </td>\
                                <td id="td4'+(i+1)+'">\
                                    '+data.val[i].m_satuan_id.val2[0].text+'\
                                </td>\
                                <td id="td5'+(i+1)+'">\
                                    <input type="text" class="form-control money" id="orderdet_harga_satuan'+data.val[i].kode+'" name="orderdet_harga_satuan[]" value="0" onchange="sumSubTotal()" required/>\
                                </td>\
                                <td id="td6'+itemBarang+'">\
                                    <input type="text" class="form-control money" id="orderdet_total'+data.val[i].kode+'" name="orderdet_total[]" value="0" required readonly/>\
                                </td>\
                                <td id="td7'+itemBarang+'">\
                                    <buttonf type="button" id="removeBtn'+itemBarang+'" class="btn red-thunderbird" onclick="removeBarang('+itemBarang+')">\
                                        <i class="icon-close"></i>\
                                    </button>\
                                </td>\
                            </tr>\
                        ');
                        idBarang.push(data.val[i].kode);
                        $('.num2').number( true, 2, '.', ',' );
                        $('.num2').css('text-align', 'right');
                        $('.money').number( true, 2, '.', ',' );
                        $('.money').css('text-align', 'right');
                    }
                  }
                });
            }

            function addSparepart() {
                id = document.getElementById('m_sparepart_id').value;
                $.ajax({
                  type : "GET",
                  url  : '<?php echo base_url();?>Master-Data/Sparepart/loadDataWhere/',
                  data : "id="+id,
                  dataType : "json",
                  success:function(data){
                    // $("#default-table tbody").empty();

                    itemBarang++;
                    $("#jml_itemBarang").val(itemBarang);

                    for(var i = 0; i < data.val.length; i++){
                        $("#default-table tbody").append('\
                            <tr id="detail'+itemBarang+'">\
                                <td id="td0'+itemBarang+'">\
                                    '+itemBarang+'\
                                </td>\
                                <td id="td1'+itemBarang+'">\
                                    <input type="hidden" name="m_sparepart_id[]" value="'+data.val[i].kode+'"/>\
                                    '+data.val[i].sparepart_nomor+'\
                                </td>\
                                <td id="td2'+(i+1)+'">\
                                    '+data.val[i].sparepart_nama+'\
                                </td>\
                                <td id="td3'+(i+1)+'" colspan="2">\
                                    <input type="text" class="form-control num2" id="orderdet_qty'+data.val[i].kode+'" name="orderdet_qty[]" value="0" onchange="sumSubTotal()" required/>\
                                </td>\
                                <td id="td4'+(i+1)+'" hidden="true"></td>\
                                <td id="td5'+(i+1)+'">\
                                    <input type="text" class="form-control money" id="orderdet_harga_satuan'+data.val[i].kode+'" name="orderdet_harga_satuan[]" value="0" onchange="sumSubTotal()" required/>\
                                </td>\
                                <td id="td6'+itemBarang+'">\
                                    <input type="text" class="form-control money" id="orderdet_total'+data.val[i].kode+'" name="orderdet_total[]" value="0" required readonly/>\
                                </td>\
                                <td id="td7'+itemBarang+'">\
                                    <buttonf type="button" id="removeBtn'+itemBarang+'" class="btn red-thunderbird" onclick="removeBarang('+itemBarang+')">\
                                        <i class="icon-close"></i>\
                                    </button>\
                                </td>\
                            </tr>\
                        ');
                        idBarang.push(data.val[i].kode);
                        $('.num2').number( true, 2, '.', ',' );
                        $('.num2').css('text-align', 'right');
                        $('.money').number( true, 2, '.', ',' );
                        $('.money').css('text-align', 'right');
                    }
                  }
                });
            }

            function removeBarang(itemSeq) {
                var parent = document.getElementById("tbody1");
                for (var i = 1; i <= itemBarang; i++) {
                  if (i >= itemSeq && i < itemBarang) {
                    document.getElementById("td1"+i).innerHTML = document.getElementById("td1"+(i+1)).innerHTML;
                    document.getElementById("td2"+i).innerHTML = document.getElementById("td2"+(i+1)).innerHTML;
                    document.getElementById("orderdet_qty"+i).value = document.getElementById("orderdet_qty"+(i+1)).value;
                    document.getElementById("td4"+i).innerHTML = document.getElementById("td4"+(i+1)).innerHTML;
                    document.getElementById("orderdet_harga_satuan"+i).value = document.getElementById("orderdet_harga_satuan"+(i+1)).value;
                    document.getElementById("orderdet_total"+i).value = document.getElementById("orderdet_total"+(i+1)).value;
                    document.getElementById("td7"+i).innerHTML = document.getElementById("td7"+(i+1)).innerHTML;
                  };
                };
                for (var i = 1; i <= itemBarang; i++) {
                  if (i == itemSeq) {
                    var child = document.getElementById("detail"+i);
                    parent.removeChild(child);
                  };
                };
                itemBarang--;
                // sumSubTotal();
            }

            function getDetailPenawaran(id, id_supplier) {
                document.getElementsByName('order_tipe_ppn')[0].value = 0;
                document.getElementsByName('order_ppn')[0].value = "0.00";
                document.getElementsByName('order_pph')[0].value = "0.00";
                document.getElementsByName('order_subtotal')[0].value = "0.00";
                document.getElementsByName('order_total')[0].value = "0.00";
                // id_supplier = document.getElementById("m_supplier_id").value;
                $.ajax({
                  type : "GET",
                  url  : '<?php echo base_url();?>Pembelian/Penawaran-Harga/loadDataWhere/',
                  data : "id="+id+", id_supplier="+id_supplier,
                  dataType : "json",
                  success:function(data){
                    $("#default-table tbody").empty();
                    document.getElementById('order_subtotal').value = 0;
                    $('.money').number( true, 0, ',', '.' );
                    sumTotal();

                    itemBarang = data.step1.length;
                    $("#jml_itemBarang").val(itemBarang);

                    for(var i = 0; i < data.step1.length; i++){
                        $("#default-table tbody").append('\
                            <tr id="detail'+(i+1)+'">\
                                <td id="td0'+(i+1)+'">\
                                    '+(i+1)+'\
                                </td>\
                                <td id="td1'+(i+1)+'">\
                                    <input type="hidden" name="orderdet_ppn[]" id="orderdet_ppn'+data.step1[i].m_barang_id+'" value="0"/>\
                                    <input type="hidden" name="m_barang_id[]" value="'+data.step1[i].m_barang_id+'"/>\
                                    '+data.step1[i].barang_kode+'\
                                </td>\
                                <td id="td2'+(i+1)+'">\
                                    '+data.step1[i].barang_uraian+'\
                                </td>\
                                <td id="td3'+(i+1)+'">\
                                    <input type="text" class="form-control num2" id="orderdet_qty'+data.step1[i].m_barang_id+'" name="orderdet_qty[]" value="'+data.step5[i].penawaran_barang_qty_ditawarkan+'" onchange="sumSubTotal()" required readonly/>\
                                </td>\
                                <td id="td4'+(i+1)+'">\
                                    '+data.step1[i].satuan_nama+'\
                                </td>\
                                <td id="td5'+(i+1)+'">\
                                    <input type="text" class="form-control money" id="orderdet_harga_satuan'+data.step1[i].m_barang_id+'" name="orderdet_harga_satuan[]" value="'+data.step5[i].penawaran_barang_harga_nominal+'" onchange="sumSubTotal()" readonly required/>\
                                </td>\
                                <td id="td6'+(i+1)+'">\
                                    <input type="text" class="form-control money" id="orderdet_total'+data.step1[i].m_barang_id+'" name="orderdet_total[]" value="0" required readonly/>\
                                </td>\
                            </tr>\
                        ');
                        idBarang.push(data.step1[i].m_barang_id);
                        $('.num2').number( true, 2, '.', ',' );
                        $('.num2').css('text-align', 'right');
                        $('.money').number( true, 2, '.', ',' );
                        $('.money').css('text-align', 'right');
                    }

                    for(var i = 0; i < data.step1.length; i++){
                        for(var j = 0; j < data.step2.length; j++){
                            if (data.step2[j].m_partner_id == document.getElementsByName('m_supplier_id')[0].value) {
                                ppn = 0;
                                document.getElementsByName("order_tanggal_kirim")[0].value = data.step2[j].penawaran_supplier_tanggal_kirim;
                                if(data.step2[j].penawaran_supplier_ppn != null)
                                {
                                    ppn = data.step2[j].penawaran_supplier_ppn;
                                }
                                document.getElementsByName("order_ppn")[0].value = ppn;
                                for(var k = 0; k < data.step5.length; k++){
                                    if (data.step5[k].t_penawaran_supplier_id == data.step2[j].penawaran_supplier_id && data.step5[k].t_penawaran_barang_id == data.step1[i].penawaran_barang_id) {
                                        document.getElementById('orderdet_qty'+data.step1[i].m_barang_id).value = data.step5[k].penawaran_harga_qty_ditawarkan;
                                        document.getElementById('orderdet_harga_satuan'+data.step1[i].m_barang_id).value = data.step5[k].penawaran_harga_nominal;
                                        document.getElementById('orderdet_ppn'+data.step1[i].m_barang_id).value = data.step5[k].penawaran_harga_ppn;
                                        document.getElementsByName("order_tipe_ppn")[0].value = data.step5[k].penawaran_harga_ppn;
                                        document.getElementsByName("order_bahan")[0].value = 2;
                                        if(data.step5[k].penawaran_harga_ppn == 0 || data.step5[k].penawaran_harga_ppn == 1) {
                                            document.getElementsByName("order_ppn")[0].value = 10;
                                        } else if(data.step5[k].penawaran_harga_ppn == 2) {
                                            document.getElementsByName("order_ppn")[0].value = 0;
                                        }
                                        $('.money').number( true, 2, '.', ',' );
                                        $('.money').css('text-align', 'right');
                                        $('.num2').number( true, 2, '.', ',' );
                                        $('.num2').css('text-align', 'right');
                                        sumSubTotal();
                                    }
                                }
                            }
                        }
                    }
                  }
                });
            }

            function sumSubTotal() {
                subTotal = 0;
                for (var i = 1; i <= itemBarang; i++) {
                    // alert(idBarang);
                    qty = parseFloat(document.getElementById('orderdet_qty'+idBarang[i-1]).value.replace(/\,/g, ""));
                    hrg = parseFloat(document.getElementById('orderdet_harga_satuan'+idBarang[i-1]).value.replace(/\,/g, ""));
                    document.getElementById('orderdet_total'+idBarang[i-1]).value = qty * hrg;
                    subTotal += qty * hrg;
                }
                document.getElementById('order_subtotal').value = subTotal;
                $('.money').number( true, 2, '.', ',' );
                $('.money').css('text-align', 'right');
                sumTotal();
            }

            function sumTotal() {
                subTotal = parseFloat(document.getElementById('order_subtotal').value.replace(/\,/g, ""));
                ppn = parseFloat(document.getElementById('order_ppn').value.replace(/\,/g, ""));
                pph = parseFloat(document.getElementById('order_pph').value.replace(/\,/g, ""));
                if(document.getElementsByName("order_tipe_ppn")[0].value == 1){
                    // INCLUDE
                    // total + PPH dari dpp
                    $("#tipe_ppn0").hide();
                    $("#tipe_ppn1").show();
                    document.getElementById('order_subtotal').value = subTotal / 1.1;
                    document.getElementById('order_total').value = subTotal / 1.1 + subTotal / 1.1 * (pph+ppn) / 100;
                    // alert(subTotal);
                } else {
                    // EXCLUDE & TANPA
                    $("#tipe_ppn0").show();
                    $("#tipe_ppn1").hide();
                    document.getElementById('order_total').value = subTotal + (subTotal * (pph + ppn) / 100);
                }
                // document.getElementById('order_total').value = subTotal + (subTotal * ppn / 100);
                $('.money').number( true, 2, '.', ',' );
                $('.money').css('text-align', 'right');
            }

            function editData(id, edit = null) {
                $.ajax({
                  type : "GET",
                  url  : '<?php echo base_url();?>Pembelian/Purchase-Order/loadDataWhere/',
                  data : "id="+id,
                  dataType : "json",
                  success:function(data){
                    var read = '';
                    var disable = '';
                    for(var i=0; i<data.val.length;i++){
                      document.getElementsByName("kode")[0].value = data.val[i].kode;
                      document.getElementsByName("order_nomor")[0].value = data.val[i].order_nomor;
                      document.getElementsByName("order_tanggal")[0].value = data.val[i].order_tanggal;
                      document.getElementsByName("order_tanggal_kirim")[0].value = data.val[i].order_tanggal_kirim;
                      document.getElementsByName("order_tanggal_kirim")[0].disabled = true;
                      document.getElementsByName("order_status")[0].value = data.val[i].order_status;
                      document.getElementsByName("order_type")[0].value = data.val[i].order_type;
                      document.getElementsByName("order_nama_sales")[0].value = data.val[i].order_nama_sales;
                      // document.getElementsByName("order_alamat_dikirim")[0].value = data.val[i].order_alamat_dikirim;
                      document.getElementsByName("order_hp_fax")[0].value = data.val[i].order_hp_fax;
                      document.getElementsByName("order_subtotal")[0].value = data.val[i].order_subtotal;
                      document.getElementsByName("order_pph")[0].value = data.val[i].order_pph;
                      document.getElementsByName("order_ppn")[0].value = data.val[i].order_ppn;
                      document.getElementsByName("order_total")[0].value = data.val[i].order_total;

                      if(data.val[i].order_tipe_ppn == 0){
                        document.getElementById('po_ppn1').checked = true;
                        $("#tipe_ppn0").show();
                        $("#tipe_ppn1").hide();
                      } else{
                        document.getElementById('po_ppn2').checked = true;
                        $("#tipe_ppn0").hide();
                        $("#tipe_ppn1").show();
                      }

                      
                      
                      // $("#order_pembayaran").select2('destroy');
                      if (data.val[i].order_pembayaran == 0) {
                        document.getElementById("tunai").selected = true;
                      } else {
                        document.getElementById("kredit").selected = true;
                      }
                      // $("#order_pembayaran").select2();
                      
                      $("#m_supplier_id").select2('destroy');
                      for(var j=0; j<data.val[i].m_supplier_id.val2.length; j++){
                        $("#m_supplier_id").append('<option value="'+data.val[i].m_supplier_id.val2[j].id+'" selected>'+data.val[i].m_supplier_id.val2[j].text+'</option>');
                      }
                      $("#m_supplier_id").select2();
                      document.getElementById('m_supplier_id').disabled = true;

                      if(data.val[i].order_referensi_id.val2 != '') {
                        read = 'readonly';
                        for(var j=0; j<data.val[i].order_referensi_id.val2.length; j++){
                            $("#order_referensi_id").append('<option value="'+data.val[i].order_referensi_id.val2[j].id+'"  selected>'+data.val[i].order_referensi_id.val2[j].text+'</option>');
                        }
                        $("#order_referensi_id").select2();
                        document.getElementById('order_referensi_id').disabled = true;
                        document.getElementById('penawaran').checked = true;
                        document.getElementById('penawaran').disabled = true;
                        document.getElementById('tanpa_penawaran').disabled = true;

                        $("#kolomPenawaran").show();
                        $("#kolomBarang").hide();
                        $("#order_ppn").attr('readonly', 'readonly');
                        $("#order_tanggal_kirim").attr('readonly', 'readonly');
                        $("#m_jenis_barang_id").removeAttr('required');
                        $("#m_barang_id").removeAttr('required');
                        $("#order_referensi_id").attr('required', 'required');
                      }
                      else {
                        document.getElementById('tanpa_penawaran').checked = true;
                        document.getElementById('penawaran').disabled = true;
                        document.getElementById('tanpa_penawaran').disabled = true;
                        $("#kolomPenawaran").hide();
                        $("#kolomPPN").show();
                        $("#kolomPembelian").show();
                        if(data.val[i].order_bahan == 1){
                            document.getElementById('sparepart').checked = true;
                          } else{ document.getElementById('selain_sparepart').checked = true;}
                        document.getElementById('sparepart').disabled = true;
                        document.getElementById('selain_sparepart').disabled = true;
                        $("#order_tanggal_kirim").removeAttr('readonly');
                        $("#order_referensi_id").removeAttr('required');
                        $("#m_jenis_barang_id").removeAttr('required');
                        document.getElementById('btnAddBarang').disabled = true;
                      }
                      
                      $("#order_nomor").attr("hidden", false);

                      if(edit == null)
                      {
                        $("#submit").hide();
                        document.getElementsByName('order_nama_sales')[0].disabled = true;
                        // document.getElementsByName('order_alamat_dikirim')[0].disabled = true;
                        document.getElementsByName('order_hp_fax')[0].disabled = true;
                        document.getElementsByName('m_supplier_id')[0].disabled = true;
                        document.getElementsByName('order_referensi_id')[0].disabled = true;
                        document.getElementsByName('order_pembayaran')[0].disabled = true;
                        document.getElementsByName('order_ppn')[0].disabled = true;
                        document.getElementById('po_ppn1').disabled = true;
                        document.getElementById('po_ppn2').disabled = true;
                        document.getElementById('btnAddPenawaran').disabled = true;
                      }
                      
                    }

                    itemBarang = data.val2.length;
                    $("#jml_itemBarang").val(itemBarang);

                    for(var i = 0; i < data.val2.length; i++){
                        id = "";
                        name = "";
                        kode = "";
                        uraian = "";
                        satuan = "";
                        if(edit == null) {
                            if(data.val2[i].m_barang_id != null){
                                name = "m_barang_id[]";
                                id = data.val2[i].m_barang_id;
                                kode = data.val2[i].barang_kode;
                                uraian = data.val2[i].barang_uraian;
                                satuan = data.val2[i].satuan_nama;
                            } else if (data.val2[i].m_sparepart_id != null){
                                name = "m_sparepart_id[]";
                                id = data.val2[i].m_sparepart_id;
                                kode = data.val2[i].sparepart_kode;
                                uraian = data.val2[i].sparepart_nama;
                                satuan = "Tidak Ada Satuan";
                            }
                            $("#default-table tbody").append('\
                                <tr id="detail'+(i+1)+'">\
                                    <td id="td0'+(i+1)+'">\
                                        '+(i+1)+'\
                                    </td>\
                                    <td id="td1'+(i+1)+'">\
                                        <input type="hidden" name="'+name+'" value="'+id+'"/>\
                                        '+kode+'\
                                    </td>\
                                    <td id="td2'+(i+1)+'">\
                                        '+uraian+'\
                                    </td>\
                                    <td id="td3'+(i+1)+'">\
                                        <input type="text" class="form-control money" id="orderdet_qty'+id+'" name="orderdet_qty[]" value="'+data.val2[i].orderdet_qty+'" required '+read+'/>\
                                    </td>\
                                    <td id="td4'+(i+1)+'">\
                                        '+satuan+'\
                                    </td>\
                                    <td id="td5'+(i+1)+'">\
                                        <input type="text" class="form-control money" id="orderdet_harga_satuan'+id+'" name="orderdet_harga_satuan[]" value="'+data.val2[i].orderdet_harga_satuan+'" onchange="sumSubTotal()" required readonly/>\
                                    </td>\
                                    <td id="td6'+(i+1)+'">\
                                        <input type="text" class="form-control money" id="orderdet_total'+(i+1)+'" name="orderdet_total[]" value="'+data.val2[i].orderdet_total+'" required readonly/>\
                                    </td>\
                                </tr>\
                            ');
                            idBarang.push(id);
                        }
                        else
                        {
                            if(data.val2[i].m_barang_id != null){
                                name = "m_barang_id[]";
                                id = data.val2[i].m_barang_id;
                                kode = data.val2[i].barang_kode;
                                uraian = data.val2[i].barang_uraian;
                                satuan = data.val2[i].satuan_nama;
                            } else if (data.val2[i].m_sparepart_id != null){
                                name = "m_sparepart_id[]";
                                id = data.val2[i].m_sparepart_id;
                                kode = data.val2[i].sparepart_kode;
                                uraian = data.val2[i].sparepart_nama;
                                satuan = "Tidak Ada Satuan";
                            }
                            $("#default-table tbody").append('\
                                <tr id="detail'+(i+1)+'">\
                                    <td id="td0'+(i+1)+'">\
                                        '+(i+1)+'\
                                    </td>\
                                    <td id="td1'+(i+1)+'">\
                                        <input type="hidden" name="'+name+'" value="'+id+'"/>\
                                        '+kode+'\
                                    </td>\
                                    <td id="td2'+(i+1)+'">\
                                    <input type="hidden" name="orderdet_id[]" value="'+data.val2[i].orderdet_id+'"/>\
                                        '+uraian+'\
                                    </td>\
                                    <td id="td3'+(i+1)+'">\
                                        <input type="text" class="form-control money" id="orderdet_qty'+id+'" name="orderdet_qty[]" value="'+data.val2[i].orderdet_qty+'" required '+read+' onchange="sumSubTotal()"/>\
                                    </td>\
                                    <td id="td4'+(i+1)+'">\
                                        '+satuan+'\
                                    </td>\
                                    <td id="td5'+(i+1)+'">\
                                        <input type="text" class="form-control money" id="orderdet_harga_satuan'+id+'" name="orderdet_harga_satuan[]" value="'+data.val2[i].orderdet_harga_satuan+'" onchange="sumSubTotal()" required '+read+'/>\
                                    </td>\
                                    <td id="td6'+(i+1)+'">\
                                        <input type="text" class="form-control money" id="orderdet_total'+id+'" name="orderdet_total[]" value="'+data.val2[i].orderdet_total+'" required readonly/>\
                                    </td>\
                                </tr>\
                            ');
                            idBarang.push(id);
                        }
                        $('.num2').number( true, 2, '.', ',' );
                        $('.num2').css('text-align', 'right');
                        $('.money').number( true, 2, '.', ',' );
                        $('.money').css('text-align', 'right');
                    }
                  }
                });
                
            }
        </script>

    </body>

</html>