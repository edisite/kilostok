<!-- BEGIN FORM-->
    <form action="#" id="formAdd" class="form-horizontal" method="post">
        <div class="form-body">
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
            <div class="alert alert-success display-hide">
                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
            <input type="hidden" id="url" value="Master-Data/Barang/postData/">
            <div class="form-group" hidden="true">
                <label class="control-label col-md-4">ID Barang (Auto)
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="kode" readonly /> </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Kode Barang
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control kode" name="barang_kode" id="barang_kode" onchange="cekKode()" required /> </div>
                </div>
            </div>
            <div class="form-group" hidden="true">
                <label class="control-label col-md-4">Nomor Barang
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="barang_nomor" /> </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Nama Barang
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="barang_nama" required /> </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Nama Kategori Barang
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <select class="form-control" id="m_kategori_barang_id" name="m_kategori_barang_id" aria-required="true" aria-describedby="select-error" required>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Nama Jenis Barang
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <select class="form-control" id="m_jenis_barang_id" name="m_jenis_barang_id" aria-required="true" aria-describedby="select-error" required>
                        </select>
                    </div>
                </div>
            </div>            
            <div class="form-group">
                <label class="control-label col-md-4">Minimum Stok
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control num" name="barang_minimum_stok" required /> </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Satuan Utama
                    <span class="required"> * </span>
                </label>
                <input type="hidden" name="satuan_utama" id="satuan_utama" value="" />
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <select class="form-control" id="m_satuan_id" name="m_satuan_id" aria-required="true" aria-describedby="select-error" required>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" id="kolom_konversi">
                <label class="control-label col-md-4">Satuan Lain
                    <span class="required"> * </span>
                </label>
                <input type="hidden" name="jml_itemOption" id="jml_itemOption" value="1" />
                <div id="default_value">
                </div>
            </div>
            <div id="default_value2">
            </div>
            <div class="form-group hidden" id="button_tambahOption">
                <div class="col-md-offset-6 col-md-6 text-right">
                    <div class="btn-group">
                        <button type="button" id="modalAddOption" class="btn sbold dark"><i class="icon-plus"></i>&nbsp; Tambah Satuan Lain
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Status Barang
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <select class="form-control select2" name="barang_status_aktif" aria-required="true" aria-describedby="select-error" required>
                            <option id="aktif" value="y"> Aktif </option>
                            <option id="nonaktif" value="n"> Non Aktif </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-4 col-md-8 text-right">
                    <button type="submit" class="btn green-jungle" id="submit">Submit</button>
                    <button type="button" class="btn default reset" onclick="reset()">Reset</button>
                </div>
            </div>
        </div>
    </form>
    <!-- END FORM -->
    <script type="text/javascript">
        $(document).ready(function(){
            satuan = "";
            defaultValue();
            itemOption = parseInt($("#jml_itemOption").val());
            $('#modalAddOption').on('click', function() {
              generateItemOption();
            });
        });

        function cekKode() {
            kode = $("#barang_kode").val();
            $.ajax({
              type : "GET",
              url  : '<?php echo base_url();?>Master-Data/Barang/loadDataSelectKode/',
              data : "q="+kode,
              dataType : "json",
              success:function(data){
                if(data.items.length > 0){
                    $("#barang_kode").closest('.form-group').addClass('has-error');
                    document.getElementById('submit').disabled = true;
                } else {
                    $("#barang_kode").closest('.form-group').removeClass('has-error');
                    document.getElementById('submit').disabled = false;
                }
              }
            });
        }

        $('#m_satuan_id').on('select2:select', function (evt) {
            id_satuan = $(evt.currentTarget).find("option:selected").val();
            $.ajax({
              type : "GET",
              url  : '<?php echo base_url();?>Master-Data/Satuan/loadDataWhere/',
              data : "id="+id_satuan,
              dataType : "json",
              success:function(data){
                satuan = data.val[0].satuan_nama;
                $("#satuan_utama").val(satuan);
                defaultValue();
              }
            });
        });

        function defaultValue() {
            $("#default_value").empty();
            $("#default_value2").empty();
            $("#jml_itemOption").val(1);
            itemOption = parseInt($("#jml_itemOption").val());
            $("#default_value").append('\
                <div class="col-md-4">\
                    <div class="input-group right>\
                        <i class="fa"></i>\
                        <span class="input-group-addon" style="font-size:12px; width=10px;">1</span>\
                        <select class="form-control" name="konversi_akhir_satuan[]" id="konversi_akhir_satuan1"> </select></div>\
                </div>\
                <div class="col-md-3">\
                    <div class="input-group right">\
                        <i class="fa"></i>\
                        <input type="text" class="form-control num num2" name="konversi_akhir[]" id="konversi_akhir'+itemOption+'" /><span class="input-group-addon" style="font-size:12px; width=10px;">'+satuan+'</span>\
                    </div>\
                </div>\
                <div class="col-md-1">\
                    <button class="btn red-thunderbird" type="button" title="Remove Satuan" id="removeItemOption'+itemOption+'" onclick="removeItemOption('+itemOption+')">\
                        <i class="icon-close"></i>\
                    </button>\
                </div>\
            ');
            setTimeout(function(){
                $('#konversi_akhir_satuan1').css('width', '100%');
                selectList_Satuan('#konversi_akhir_satuan1');
            }, 500);
            $('.num2').number( true, 2, '.', ',' );
            $('.num2').css('text-align', 'right');
            $("#button_tambahOption").removeClass("hidden");
            $(".num").keydown(function(event) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(event.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                     // Allow: Ctrl+A, Command+A
                    (event.keyCode === 65 && (event.ctrlKey === true || event.metaKey === true)) || 
                     // Allow: home, end, left, right, down, up
                    (event.keyCode >= 35 && event.keyCode <= 40)) {
                         // let it happen, don't do anything
                         return;
                }
                // Ensure that it is a number and stop the keypress
                if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
                    event.preventDefault();
                }
              });
        }

        function generateItemOption() {
            itemOption++;
            $("#jml_itemOption").val(itemOption);
            $("#default_value2").append('\
                <div id="detail'+itemOption+'">\
                <div class="form-group">\
                    <div class="col-md-offset-4 col-md-4">\
                        <div class="input-group right>\
                            <i class="fa"></i>\
                            <span class="input-group-addon" style="font-size:12px; width=10px;">1</span>\
                            <select class="form-control" name="konversi_akhir_satuan[]" id="konversi_akhir_satuan'+itemOption+'" required /> </select></div>\
                    </div>\
                    <div class="col-md-3">\
                        <div class="input-group right">\
                            <i class="fa"></i>\
                            <input type="text" class="form-control num num2" name="konversi_akhir[]" id="konversi_akhir'+itemOption+'" required /><span class="input-group-addon" style="font-size:12px; width=10px;">'+satuan+'</span>\
                        </div>\
                    </div>\
                    <div class="col-md-1">\
                        <button class="btn red-thunderbird" type="button" title="Remove Satuan" onclick="removeItemOption('+itemOption+')">\
                            <i class="icon-close"></i>\
                        </button>\
                    </div>\
                </div>\
                </div>\
            ');
            $('.num2').number( true, 2, '.', ',' );
            $('.num2').css('text-align', 'right');
            selectList_Satuan('#konversi_akhir_satuan'+itemOption);
            $(".num").keydown(function(event) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(event.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                     // Allow: Ctrl+A, Command+A
                    (event.keyCode === 65 && (event.ctrlKey === true || event.metaKey === true)) || 
                     // Allow: home, end, left, right, down, up
                    (event.keyCode >= 35 && event.keyCode <= 40)) {
                         // let it happen, don't do anything
                         return;
                }
                // Ensure that it is a number and stop the keypress
                if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
                    event.preventDefault();
                }
              });
        }
        function generateItemOption2(seq, satuan2) {
            $("#jml_itemOption").val(seq);
            $("#default_value2").append('\
                <div id="detail'+seq+'">\
                <div class="form-group">\
                    <div class="col-md-offset-4 col-md-4">\
                        <div class="input-group right>\
                            <i class="fa"></i>\
                            <span class="input-group-addon" style="font-size:12px; width=10px;">1</span>\
                            <select class="form-control" name="konversi_akhir_satuan[]" id="konversi_akhir_satuan'+seq+'" required /> </select></div>\
                    </div>\
                    <div class="col-md-3">\
                        <div class="input-group right">\
                            <i class="fa"></i>\
                            <input type="text" class="form-control num num2" name="konversi_akhir[]" id="konversi_akhir'+seq+'" required />\
                            <span class="input-group-addon" style="font-size:12px; width=10px;">'+satuan2+'</span>\
                        </div>\
                    </div>\
                    <div class="col-md-1">\
                        <button class="btn red-thunderbird" type="button" title="Remove Telepon" onclick="removeItemOption('+seq+')">\
                            <i class="icon-close"></i>\
                        </button>\
                    </div>\
                </div>\
                </div>\
            ');
            $('.num2').number( true, 2, '.', ',' );
            $('.num2').css('text-align', 'right');
            // selectList_Satuan('#konversi_akhir_satuan'+seq);
            $(".num").keydown(function(event) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(event.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                     // Allow: Ctrl+A, Command+A
                    (event.keyCode === 65 && (event.ctrlKey === true || event.metaKey === true)) || 
                     // Allow: home, end, left, right, down, up
                    (event.keyCode >= 35 && event.keyCode <= 40)) {
                         // let it happen, don't do anything
                         return;
                }
                // Ensure that it is a number and stop the keypress
                if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
                    event.preventDefault();
                }
              });
        }
    </script>