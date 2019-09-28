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
                                        <input type="hidden" id="url" value="Gudang/Penerimaan-Barang/postData/">
                                        <input type="hidden" id="url_data" value="Gudang/Penerimaan-Barang">
                                        <input type="hidden" name="penerimaan_barang_status" value="0">
                                        <div class="form-group" hidden="true">
                                            <label class="control-label col-md-4">ID BPB (Auto)
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="kode" value="<?php if(isset($id)) echo $id;?>" readonly /> </div>
                                            </div>
                                        </div>
                                        <div class="form-group" hidden="true" id="KodeBPB">
                                            <label class="control-label col-md-4">Kode BPB (Auto)
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="penerimaan_barang_nomor" readonly /> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Tanggal BPB
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <div class=" input-group date datepicker" data-date-format="dd/mm/yyyy">
                                                        <input name="penerimaan_barang_tanggal" type="text" value="<?php echo date('d/m/Y');?>" class="form-control" required>
                                                        <span class="input-group-addon" style="">
                                                            <span class="icon-calendar"></span>
                                                        </span>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Tanggal Terima BPB
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <div class="input-group date datepicker" data-date-format="dd/mm/yyyy" data-date-start-date="+0d">
                                                        <input type="text" class="form-control" name="penerimaan_barang_tanggal_terima" required>
                                                        <span class="input-group-addon" style="">
                                                            <span class="icon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" hidden="true">
                                            <label class="control-label col-md-4">Jenis BPB
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <!-- ORDER BAHAN 2= ORDER BARANG = PENERIMAAN BARANG -->
                                                    <input type="hidden" name="order_bahan" id="order_bahan" value="0">
                                                    <label class="mt-radio"> Bukti Penerimaan Pembelian Barang
                                                        <input type="radio" value="2" name="penerimaan_barang_jenis" id="penerimaan_barang_jenis1" onchange="" required />
                                                        <span></span>
                                                    </label>
                                                    <!-- <label class="mt-radio"> Bukti Penerimaan Barang Jadi
                                                        <input type="radio" value="1" name="penerimaan_barang_jenis" id="penerimaan_barang_jenis2" onchange="getRef(this)" required />
                                                        <span></span>
                                                    </label> -->
                                                    <label class="mt-radio"> Bukti Penerimaan Pembelian Sparepart
                                                        <input type="radio" value="1" name="penerimaan_barang_jenis" id="penerimaan_barang_jenis2" onchange="" required />
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Nama Pemeriksa
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="penerimaan_barang_pemeriksa" name="penerimaan_barang_pemeriksa" aria-required="true" aria-describedby="select-error" required>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Nama Penyetuju
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="penerimaan_barang_penyetuju" name="penerimaan_barang_penyetuju" aria-required="true" aria-describedby="select-error" required>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Gudang Masuk
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="m_gudang_id" name="m_gudang_id" aria-required="true" aria-describedby="select-error" required >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Nomor SJ
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="penerimaan_barang_sj" required /> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Nomor PO
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="t_order_id" name="t_order_id" aria-required="true" aria-describedby="select-error" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" id="btnAddPO" class="btn sbold dark" onclick="addPO()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Nama Bahan Penolong </label>
                                            <div class="col-md-7">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" id="m_jenis_barang_id" name="m_jenis_barang_id" aria-required="true" aria-describedby="select-error">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" id="btnAddBahanPenolong" class="btn sbold dark" onclick="addBahanPenolong()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        <div class="form-group" id="tblInsert">
                                            <div class="col-md-12">
                                                <input type="hidden" name="jml_itemBarang" id="jml_itemBarang" value="0" />
                                                <input type="hidden" name="jml_itemBarang_retur" id="jml_itemBarang_retur" value="0" />
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="default-table">
                                                    <thead>
                                                        <tr>
                                                            <th> No </th>
                                                            <th> Kode Barang </th>
                                                            <th> Uraian Barang </th>
                                                            <!-- <th id="qty-po"> Qty </th> -->
                                                            <th> Bruto </th>
                                                            <th id="kolomRefaksi"> Refaksi </th>
                                                            <th> Netto </th>
                                                            <th> Satuan </th>
                                                            <!-- <th> Verifikasi </th> -->
                                                            <th> Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tableTbody">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Catatan
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea class="form-control" rows="3" name="penerimaan_barang_catatan"></textarea> </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-4 col-md-8 text-right">
                                                <button type="submit" id="submit" class="btn green-jungle">Simpan</button>
                                                <a href="<?php echo base_url();?>Gudang/Penerimaan-Barang">
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
                $("#formAdd").submit(function(event){
                  if ($("#formAdd").valid() == true) {
                    actionData2();
                  }
                  return false;
                });
                $('#penerimaan_barang_penyetuju').css('width', '100%');
                $('#penerimaan_barang_pemeriksa').css('width', '100%');
                $('#t_order_id').css('width', '100%');
                $('#m_gudang_id').css('width', '100%');
                selectList_karyawan("#penerimaan_barang_penyetuju");
                selectList_karyawan("#penerimaan_barang_pemeriksa");
                selectList_purchaseOrder("#t_order_id");
                selectList_gudangCabang("#m_gudang_id");
                selectList_barang2("#m_jenis_barang_id", 2);
                if (document.getElementsByName("kode")[0].value != null) {
                    editData(document.getElementsByName("kode")[0].value);
                }
            });

            function addPO() {
                var id = document.getElementsByName('t_order_id')[0].value;
                if (id.length > 0) {
                    getDetailPO(id);
                }
            }
            function addBahanPenolong() {
                var id = document.getElementById("m_jenis_barang_id")[0].value;
                if (id.length > 0) {
                    getDetailBahanPenolong(id);
                }
            }

            function getDetailBahanPenolong(id) {
                // var id_bahan_penolong = element.value;
                $.ajax({
                  type : "GET",
                  url  : '<?php echo base_url();?>Master-Data/Barang/loadDataWhere/',
                  data : "id="+id,
                  dataType : "json",
                  success:function(data){
                    // $("#default-table tbody").empty();

                    // itemBarang = data.val.length;
                    itemBarang++;
                    for(var i = 0; i < data.val.length; i++){
                        $("#tableTbody").append('\
                            <tr id="detail'+itemBarang+'">\
                                <td id="td0'+itemBarang+'">\
                                    '+itemBarang+'\
                                </td>\
                                <td id="td1'+itemBarang+'">\
                                    <input type="hidden" name="orderdet_id[]" value="0"/>\
                                    <input type="hidden" name="orderdet_harga_satuan[]" value="0"/>\
                                    <input type="hidden" name="orderdet_total[]" value="0"/>\
                                    <input type="hidden" name="m_barang_id[]" value="'+id+'"/>\
                                    '+data.val[i].barang_kode+'\
                                </td>\
                                <td id="td2'+itemBarang+'">\
                                    '+data.val[i].barang_nama+'('+data.val[i].barang_nomor+', '+data.val[i].m_jenis_barang_id.val2[i].text+')\
                                </td>\
                                <td id="td4'+itemBarang+'" class="colspan-2">\
                                    <input type="text" class="form-control num2" id="penerimaan_barangdet_qty'+(i+1)+'" name="penerimaan_barangdet_qty[]" value="0" required />\
                                </td>\
                                <td id="td5'+itemBarang+'"> <label>Tidak ada Refaksi</label>\
                                </td>\
                                <td id="td6'+itemBarang+'">\
                                    <input type="text" class="form-control num2" id="penerimaan_barangdet_netto'+(i+1)+'" name="penerimaan_barangdet_netto[]" value="0" required />\
                                </td>\
                                <td id="td7'+itemBarang+'">\
                                    '+data.val[i].m_satuan_id.val2[i].text+'\
                                </td>\
                                <td id="td8'+itemBarang+'">\
                                    <button type="button" id="removeBtn'+(i+1)+'" class="btn red-thunderbird" onclick="removePO('+itemBarang+')">\
                                        <i class="icon-close"></i>\
                                    </button>\
                                </td>\
                            </tr>\
                        ');
                    }
                    $('.num2').number( true, 2, '.', ',' );
                    $('.num2').css('text-align', 'right');
                  }
                });
                $("#jml_itemBarang").val(itemBarang);
            }

            function removePO(itemSeq) {
                var parent = document.getElementById("tableTbody");
                for (var i = 1; i <= itemBarang; i++) {
                  if (i >= itemSeq && i < itemBarang) {
                    document.getElementById("td1"+i).innerHTML = document.getElementById("td1"+(i+1)).innerHTML;
                    document.getElementById("td2"+i).innerHTML = document.getElementById("td2"+(i+1)).innerHTML;
                    // document.getElementById("td3"+i).innerHTML = document.getElementById("td3"+(i+1)).innerHTML;
                    document.getElementById("td4"+i).innerHTML = document.getElementById("td4"+(i+1)).innerHTML;
                    document.getElementById("td5"+i).innerHTML = document.getElementById("td5"+(i+1)).innerHTML;
                    document.getElementById("td6"+i).innerHTML = document.getElementById("td6"+(i+1)).innerHTML;
                    document.getElementById("td7"+i).innerHTML = document.getElementById("td7"+(i+1)).innerHTML;
                    document.getElementById("td8"+i).innerHTML = document.getElementById("td8"+(i+1)).innerHTML;
                  };
                };
                for (var i = 1; i <= itemBarang; i++) {
                  if (i==itemBarang) {
                    var child = document.getElementById("detail"+i);
                    parent.removeChild(child);
                  };
                };
                itemBarang--;
                $("#jml_itemBarang").val(itemBarang);
            }

            function getDetailPO(id) {
                $.ajax({
                  type : "GET",
                  url  : '<?php echo base_url();?>Pembelian/Purchase-Order/loadDataWhere/',
                  data : "id="+id,
                  dataType : "json",
                  success:function(data){
                    $("#default-table tbody").empty();

                    itemBarang = data.val2.length;
                    $("#jml_itemBarang").val(itemBarang);

                    for(var i = 0; i < data.val2.length; i++){
                        if (data.val2[i].orderdet_status == 0) {
                            jumlahRefaksi = 0;
                            btndisabled = '';
                            hidden = "";
                            id_barang = data.val2[i].m_barang_id;
                            kode = data.val2[i].barang_kode;
                            uraian = data.val2[i].barang_uraian;
                            satuan = data.val2[i].satuan_nama;
                            if(data.val[0].order_bahan == 2){
                                document.getElementById('penerimaan_barang_jenis1').checked = true;
                                document.getElementById('order_bahan').value = 2;
                            } else if (data.val[0].order_bahan == 1){
                                document.getElementById('penerimaan_barang_jenis2').checked = true;
                                document.getElementById('order_bahan').value = 1;
                                hidden = "hidden='true'";
                                $("#kolomRefaksi").hide();
                            }
                            $("#tableTbody").append('\
                                <tr id="detail'+(i+1)+'">\
                                    <td id="td0'+(i+1)+'">\
                                        '+(i+1)+'\
                                    </td>\
                                    <td id="td1'+(i+1)+'">\
                                        <input type="hidden" name="orderdet_id[]" value="'+data.val2[i].orderdet_id+'"/>\
                                        <input type="hidden" name="m_barang_id[]" value="'+id_barang+'"/>\
                                        <input type="hidden" name="orderdet_harga_satuan[]" value="'+data.val2[i].orderdet_harga_satuan+'"/>\
                                        <input type="hidden" name="orderdet_total[]" value="'+data.val2[i].orderdet_total+'"/>\
                                        '+kode+'\
                                    </td>\
                                    <td id="td2'+(i+1)+'">\
                                        '+uraian+'\
                                    </td>\
                                    <td id="td4'+(i+1)+'">\
                                        <input type="text" class="form-control num2" id="penerimaan_barangdet_qty'+(i+1)+'" name="penerimaan_barangdet_qty[]" value="0" onchange="sumNetto('+(i+1)+')" required />\
                                    </td>\
                                    <td id="td5'+(i+1)+'" '+hidden+'>\
                                        <input type="hidden" id="penerimaan_barangdet_jml_refaksi'+(i+1)+'" value="0"/> \
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="default-tableatr'+(i+1)+'"> \
                                            <thead> \
                                                <tr> \
                                                    <th class="text-center" style="width:30%" > % </th> \
                                                    <th class="text-center" style="width:30%" > '+satuan+' </th> \
                                                    <th class="text-center"  style="width:30%"> Alasann </th> \
                                                </tr> \
                                            </thead> \
                                            <tbody id="tableTbodyatr'+(i+1)+'"> \
                                            </tbody> \
                                            <tfoot> \
                                                <tr> \
                                                <th class="text-center">  </th>\
                                                  <th class="text-center">  \
                                                        <button type="button" id="btnAddRefaksi" class="btn default" onclick="addRefaksi('+(i+1)+')" '+btndisabled+'><i class="icon-plus"></i></button> \
                                                  </th> \
                                                </tr> \
                                            </tfoot> \
                                        </table> \
                                    </td>\
                                    <td id="td6'+(i+1)+'">\
                                        <input type="text" class="form-control num2" id="penerimaan_barangdet_netto'+(i+1)+'" name="penerimaan_barangdet_netto[]" value="0" required />\
                                    </td>\
                                    <td id="td7'+(i+1)+'">\
                                        '+satuan+'\
                                    </td>\
                                    <td id="td8'+(i+1)+'">\
                                        <button type="button" id="removeBtn'+(i+1)+'" class="btn red-thunderbird" onclick="removePO('+(i+1)+')">\
                                            <i class="icon-close"></i>\
                                        </button>\
                                    </td>\
                                </tr>\
                            ');
                            
                            // itemRefaksiBarangTemp = $("#penerimaan_barangdet_jml_refaksi"+(i+1)).val();
                            $('.num2').number( true, 2, '.', ',' );
                            $('.num2').css('text-align', 'right');
                            sumNetto((i+1));
                        }
                    }
                  }
                });
            }

            function addRefaksi(idx) {
                refaksiPerBarang = $("#penerimaan_barangdet_jml_refaksi"+idx).val();
                refaksiPerBarang++;
                $("#penerimaan_barangdet_jml_refaksi"+idx).val(refaksiPerBarang);
                $("#tableTbodyatr"+idx).append(' \
                    <tr  id="detailRefaksi'+idx+''+refaksiPerBarang+'"> \
                        <td style="width:30%" id="tdatr1'+idx+''+refaksiPerBarang+'"> \
                            <input type="text" class="form-control num2" id="penerimaan_barangdet_refaksi_persen'+idx+''+refaksiPerBarang+'" name="penerimaan_barangdet_refaksi_persen'+idx+'[]" value="0" onchange="checkAngka('+idx+', '+refaksiPerBarang+')" required/> \
                        </td> \
                        <td style="width:30%" id="tdatr2'+idx+''+refaksiPerBarang+'"> \
                            <input type="text" class="form-control num2" id="penerimaan_barangdet_refaksi_angka'+idx+''+refaksiPerBarang+'" name="penerimaan_barangdet_refaksi_angka'+idx+'[]" value="0" onchange="checkPersen('+idx+', '+refaksiPerBarang+')" required/>\
                        </td> \
                        <td style="width:30%" id="tdatr3'+idx+''+refaksiPerBarang+'"> \
                            <textarea class="form-control" id="penerimaan_barangdet_refaksi_alasan'+idx+''+refaksiPerBarang+'" name="penerimaan_barangdet_refaksi_alasan'+idx+'[]" required/>\
                        </td> \
                    </tr> \
                ');
                $('.num2').number( true, 2, '.', ',' );
                $('.num2').css('text-align', 'right');
            }

            function checkAngka(idx, refaksiPerBarang) {
                bruto = parseFloat(document.getElementById('penerimaan_barangdet_qty'+idx).value.replace(/\,/g, ""));
                refaksiPersen = parseFloat(document.getElementById('penerimaan_barangdet_refaksi_persen'+idx+''+refaksiPerBarang).value.replace(/\,/g, ""));
                document.getElementById('penerimaan_barangdet_refaksi_angka'+idx+''+refaksiPerBarang).value =  bruto * refaksiPersen / 100;
                $('.num2').number( true, 2, '.', ',' );
                $('.num2').css('text-align', 'right');
                sumNetto(idx);
            }

            function checkPersen(idx, refaksiPerBarang) {
                bruto = parseFloat(document.getElementById('penerimaan_barangdet_qty'+idx).value.replace(/\,/g, ""));
                refaksiAngka = parseFloat(document.getElementById('penerimaan_barangdet_refaksi_angka'+idx+''+refaksiPerBarang).value.replace(/\,/g, ""));
                document.getElementById('penerimaan_barangdet_refaksi_persen'+idx+''+refaksiPerBarang).value =  refaksiAngka * 100 / bruto;
                $('.num2').number( true, 2, '.', ',' );
                $('.num2').css('text-align', 'right');
                sumNetto(idx);
            }

            function sumNetto(idx) {
                    jumlahRefaksi = $("#penerimaan_barangdet_jml_refaksi"+idx).val();
                    netto = 0;
                    totalRefaksi = 0;
                    bruto = parseFloat(document.getElementById('penerimaan_barangdet_qty'+idx).value.replace(/\,/g, ""));
                    for (var j = 1; j <= jumlahRefaksi; j++) {
                        totalRefaksi += parseFloat(document.getElementById('penerimaan_barangdet_refaksi_angka'+idx+''+j).value.replace(/\,/g, ""));
                    }
                    netto = bruto - totalRefaksi;
                    document.getElementById('penerimaan_barangdet_netto'+idx).value =  netto;
                    $('.num2').number( true, 2, '.', ',' );
                    $('.num2').css('text-align', 'right');
                    $('.money').number( true, 2, '.', ',' );
                    $('.money').css('text-align', 'right');
            }

            // function getRef(element) {
            //     var id = element.id;
            //     // alert(id);
            //     if(id == 'penerimaan_barang_jenis1')
            //     {
            //     $("#t_order_id").select2();
            //     $("#t_order_id").select2('destroy');
            //     $("#t_order_id").select2();
            //     selectList_purchaseOrder("#t_order_id");
            //     }
            //     else
            //     {
            //     $("#t_order_id").select2();
            //     $("#t_order_id").select2('destroy');
            //     $("#t_order_id").select2();
            //     selectList_workOrder("#t_order_id");
            //     }
            // }

            function editData(id) {
                $.ajax({
                  type : "GET",
                  url  : '<?php echo base_url();?>Gudang/Penerimaan-Barang/loadDataWhere/',
                  data : "id="+id,
                  dataType : "json",
                  success:function(data){
                    for(var i=0; i<data.val.length;i++){
                      document.getElementsByName("kode")[0].value = data.val[i].kode;
                      document.getElementsByName("penerimaan_barang_nomor")[0].value = data.val[i].penerimaan_barang_nomor;
                      document.getElementsByName("penerimaan_barang_tanggal")[0].value = data.val[i].penerimaan_barang_tanggal;
                      document.getElementsByName("penerimaan_barang_tanggal")[0].disabled = true;
                      document.getElementsByName("penerimaan_barang_tanggal_terima")[0].value = data.val[i].penerimaan_barang_tanggal_terima;
                      document.getElementsByName("penerimaan_barang_tanggal_terima")[0].disabled = true;
                      document.getElementsByName("penerimaan_barang_status")[0].value = data.val[i].penerimaan_barang_status;
                      document.getElementsByName("penerimaan_barang_sj")[0].value = data.val[i].penerimaan_barang_sj;
                      document.getElementsByName('penerimaan_barang_sj')[0].disabled = true;
                      document.getElementsByName("penerimaan_barang_catatan")[0].value = data.val[i].penerimaan_barang_catatan;
                      document.getElementsByName('penerimaan_barang_catatan')[0].disabled = true;
                      
                      // if (data.val[i].penerimaan_barang_jenis == 0) {
                      //   document.getElementById('penerimaan_barang_jenis1').checked = true;
                      // } else if (data.val[i].penerimaan_barang_jenis == 1) {
                      //   document.getElementById('penerimaan_barang_jenis2').checked = true;
                      // }
                      // document.getElementById('penerimaan_barang_jenis1').disabled = true;
                      // document.getElementById('penerimaan_barang_jenis2').disabled = true;

                      $("#m_gudang_id").select2('destroy');
                      for(var j=0; j<data.val[i].m_gudang_id.val2.length; j++){
                        $("#m_gudang_id").append('<option value="'+data.val[i].m_gudang_id.val2[j].id+'" selected>'+data.val[i].m_gudang_id.val2[j].text+'</option>');
                      }
                      $("#m_gudang_id").select2();
                      document.getElementsByName('m_gudang_id')[0].disabled = true;

                      for(var j=0; j<data.val[i].t_order_id.val2.length; j++){
                        $("#t_order_id").append('<option value="'+data.val[i].t_order_id.val2[j].id+'" selected>'+data.val[i].t_order_id.val2[j].text+'</option>');
                      }
                      $("#t_order_id").select2();
                      document.getElementsByName('t_order_id')[0].disabled = true;

                      for(var j=0; j<data.val[i].penerimaan_barang_pemeriksa.val2.length; j++){
                        $("#penerimaan_barang_pemeriksa").append('<option value="'+data.val[i].penerimaan_barang_pemeriksa.val2[j].id+'" selected>'+data.val[i].penerimaan_barang_pemeriksa.val2[j].text+'</option>');
                      }
                      $("#penerimaan_barang_pemeriksa").select2();
                      document.getElementsByName('penerimaan_barang_pemeriksa')[0].disabled = true;

                      for(var j=0; j<data.val[i].penerimaan_barang_penyetuju.val2.length; j++){
                        $("#penerimaan_barang_penyetuju").append('<option value="'+data.val[i].penerimaan_barang_penyetuju.val2[j].id+'" selected>'+data.val[i].penerimaan_barang_penyetuju.val2[j].text+'</option>');
                      }
                      $("#penerimaan_barang_penyetuju").select2();
                      document.getElementsByName('penerimaan_barang_penyetuju')[0].disabled = true;

                      document.getElementById('submit'). disabled = true;
                      document.getElementById('btnAddPO').disabled = true;
                    }

                    itemBarang = data.val2.length;
                    $("#jml_itemBarang").val(itemBarang);
                    $("#qty-po").addClass("hidden");
                    $("#KodeBPB").attr('hidden', false);

                    for(var i = 0; i < data.val2.length; i++){
                        if (data.val2[i].penerimaan_barangdet_verifikasi == 1) {
                            var checked = "checked";
                        } else {
                            var checked = "";
                        }
                        $("#tableTbody").append('\
                            <tr id="detail'+(i+1)+'">\
                                <td id="td0'+(i+1)+'">\
                                    '+(i+1)+'\
                                </td>\
                                <td id="td1'+(i+1)+'">\
                                    <input type="hidden" name="m_barang_id[]" value="'+data.val2[i].m_barang_id+'"/>\
                                    '+data.val2[i].barang_kode+'\
                                </td>\
                                <td id="td2'+(i+1)+'">\
                                    '+data.val2[i].barang_uraian+'\
                                </td>\
                                <td id="td4'+(i+1)+'">\
                                        <input type="text" class="form-control num2" id="penerimaan_barangdet_qty'+(i+1)+'" name="penerimaan_barangdet_qty[]" value="'+data.val2[i].penerimaan_barangdet_qty+'" required readonly onchange="sumNetto('+(i+1)+')"/>\
                                </td>\
                                <td id="td5'+(i+1)+'">\
                                    <input type="hidden" id="penerimaan_barangdet_jml_refaksi'+(i+1)+'" value="'+data.val2[i].penerimaan_barangdet_refaksi_angka.val2.length+'"/> \
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="default-tableatr'+(i+1)+'"> \
                                        <thead> \
                                            <tr> \
                                                <th class="text-center"  style="width:30%"> % </th> \
                                                <th class="text-center"  style="width:30%"> '+data.val2[i].satuan_nama+' </th> \
                                                <th class="text-center"  style="width:30%"> Alasan </th> \
                                            </tr> \
                                        </thead> \
                                        <tbody id="tableTbodyatr'+(i+1)+'" width="100%"> \
                                        </tbody> \
                                        <tfoot> \
                                            <tr> \
                                            <th class="text-center">  </th>\
                                              <th class="text-center">  \
                                                    <button type="button" id="btnAddRefaksi" class="btn default" onclick="addRefaksi('+(i+1)+')" disabled><i class="icon-plus"></i></button> \
                                              </th> \
                                            </tr> \
                                        </tfoot> \
                                    </table> \
                                    <label id="refaksi'+(i+1)+'" hidden="true">Tidak Ada Refaksi</label>\
                                </td>\
                                <td id="td6'+(i+1)+'">\
                                    <input type="text" class="form-control num2" id="penerimaan_barangdet_netto'+(i+1)+'" name="penerimaan_barangdet_netto[]" value="'+data.val2[i].penerimaan_barangdet_netto+'" required readonly/>\
                                </td>\
                                <td id="td7'+(i+1)+'">\
                                    '+data.val2[i].satuan_nama+'\
                                </td>\
                                <td id="td8'+(i+1)+'">\
                                    <button type="button" id="removeBtn'+(i+1)+'" class="btn red-thunderbird" onclick="removePO('+(i+1)+')" disabled>\
                                        <i class="icon-close"></i>\
                                    </button>\
                                </td>\
                            </tr>\
                        ');
                        if (data.val2[i].penerimaan_barangdet_refaksi_angka.val2.length > 0) {
                            for(var j=0; j<data.val2[i].penerimaan_barangdet_refaksi_angka.val2.length; j++){
                                alasan = "-";
                                if(data.val2[i].penerimaan_barangdet_refaksi_angka.val2[j].alasan != null){ 
                                    alasan = data.val2[i].penerimaan_barangdet_refaksi_angka.val2[j].alasan;
                                }
                                itemAtrBarangTemp2 = $("#penerimaan_barangdet_jml_refaksi"+(i+1)).val();
                                $("#penerimaan_barangdet_refaksi_angka"+(i+1)).val(itemAtrBarangTemp2);
                                $("#tableTbodyatr"+(i+1)).append(' \
                                    <tr  id="detailRefaksi'+(i+1)+''+(j+1)+'"> \
                                        <td  style="width:30%" id="tdatr1'+(i+1)+''+(j+1)+'"> \
                                            <input type="text" class="form-control num2" id="penerimaan_barangdet_refaksi_persen'+(i+1)+''+(j+1)+'" name="penerimaan_barangdet_refaksi_persen'+(i+1)+'[]" value="0" readonly/> \
                                        </td> \
                                        <td  style="width:30%" id="tdatr2'+(i+1)+''+(j+1)+'"> \
                                            <input type="text" class="form-control num2" id="penerimaan_barangdet_refaksi_angka'+(i+1)+''+(j+1)+'" name="penerimaan_barangdet_refaksi_angka'+(i+1)+'[]" value="'+data.val2[i].penerimaan_barangdet_refaksi_angka.val2[j].angka+'"readonly/>\
                                        </td> \
                                        <td  style="width:30%" id="tdatr2'+(i+1)+''+(j+1)+'"> \
                                            <textarea class="form-control" id="penerimaan_barangdet_refaksi_alasan'+(i+1)+''+(j+1)+'" name="penerimaan_barangdet_refaksi_alasan'+(i+1)+'[]" readonly>'+alasan+'</textarea>\
                                        </td> \
                                    </tr> \
                                ');
                            }
                            for(var j=0; j<data.val2[i].penerimaan_barangdet_refaksi_angka.val2.length; j++){
                                checkPersen((i+1), (j+1));
                            }
                        } else {
                            $("#default-tableatr"+(i+1)).attr('hidden', true);
                            $("#refaksi"+(i+1)).attr('hidden', false);
                        }
                    }
                    $('.num2').number( true, 2, '.', ',' );
                    $(".num2").css('text-align', 'right');
                  }
                });
                
            }
        </script>

    </body>

</html>