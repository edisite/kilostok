<!-- BEGIN FORM-->
    <form action="#" id="formAdd" class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-body">
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
            <div class="alert alert-success display-hide">
                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
            <input type="hidden" id="url" value="Master-Data/COA/postData/">
            <div class="form-group" hidden="true">
                <label class="control-label col-md-4">Kode COA (Auto)
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="kode" readonly /> </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Master/Induk
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <select class="form-control" name="m_coa_id" id="m_coa_id" onchange="generateCoaCode()"></select> 
                    </div>
                        
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Kode COA
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control num" name="coa_kode" onchange="checkCoa()" required /> </div>
                    <p class="help-block">*Auto generate by sequence code master</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-4">Nama COA
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="coa_nama" required /> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">D/K
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="mt-radio-inline">
                        <i class="fa"></i>
                        <label class="mt-radio"> Debet
                            <input type="radio" value="D" name="coa_debit_kredit" id="debit" required />
                            <span></span>
                        </label>
                        <label class="mt-radio"> Kredit
                            <input type="radio" value="K" name="coa_debit_kredit" id="kredit"/>
                            <span></span>
                        </label> </div>
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-md-4">G/D
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="mt-radio-inline">
                        <div class="input-icon right">
                        <i class="fa"></i>
                        <label class="mt-radio"> <b>Header</b> (<i>COA tidak dapat di posting</i>)
                            <input type="radio" value="G" name="coa_gord" id="gord_g" required />
                            <span></span>
                        </label>
                        </div>
                        <div class="input-icon right">
                        <label class="mt-radio"> <b>Detail</b> (<i>COA dapat di posting</i>)
                            <input type="radio" value="D" name="coa_gord" id="gord_d"/>
                            <span></span>
                        </label> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Klasifikasi COA
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <select class="form-control select2" name="coa_keterangan" aria-required="true" aria-describedby="select-error" required>
                            <option id="aktif" value=""></option>
                            <option id="nonaktif" value="ASET"> ASET </option>
                            <option id="nonaktif" value="EKUITAS"> EKUITAS </option>
                            <option id="nonaktif" value="PENGHASILAN"> PENGHASILAN </option>
                            <option id="nonaktif" value="KEWAJIBAN"> KEWAJIBAN </option>
                            <option id="nonaktif" value="BEBAN"> BEBAN </option>
<!--                            <option id="nonaktif" value="LABA RUGI"> LABA RUGI </option>-->
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <span class="required"> noted * </span>
                    <div class="input-icon right">
                        <label class="control-label label label-info label-sm">ASET = HARTA</label>
                        <label class="control-label label label-danger label-sm">EKUITAS = HARTA</label>
                        <label class="control-label label label-success label-sm">PENGHASILAN = PENDAPATAN</label>
                        <label class="control-label label label-warning label-sm">KEWAJIBAN = KEWAJIBAN</label>
                        <label class="control-label label label-primary label-sm">BEBAN = BIAYA</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Cabang
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <select class="form-control" id="m_cabang_id" name="m_cabang_id" aria-required="true" aria-describedby="select-error" required>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-4 col-md-8 text-right">
                    <button type="submit" class="btn green-jungle">Submit</button>
                    <button type="button" class="btn default reset" onclick="reset()">Reset</button>
                </div>
            </div>
        </div>
    </form>
    <!-- END FORM-->
    <script type="text/javascript">
        $(document).ready(function(){
        });

        function check(element)
        {
            if(element.value == 1)
            {
                document.getElementById('coa_header').disabled = true;
                document.getElementById('coa_subheader').disabled = true;
            }
            else if(element.value == 2)
            {
                document.getElementById('coa_header').disabled = false;
                document.getElementById('coa_subheader').disabled = true;
            }
            else if(element.value == 3)
            {
                document.getElementById('coa_header').disabled = false;
                document.getElementById('coa_subheader').disabled = false;
            }
        }

        function generateCoaCode() {
            $.ajax({
                type : "GET",
                url  : '<?php echo base_url();?>Master-Data/COA/generateCOA/',
                data : { coa : document.getElementsByName('m_coa_id')[0].value },
                dataType : "json",
                success:function(data){                   
                     document.getElementsByName('coa_kode')[0].value = data.status;
                }
            });
        }
        function checkCoa() {
            $.ajax({
                type : "GET",
                url  : '<?php echo base_url();?>Master-Data/COA/checkCOA/',
                data : { coa : document.getElementsByName('coa_kode')[0].value },
                dataType : "json",
                success:function(data){
                    if (data.status == '204') {
                        swal({
                            title: "Alert!",
                            text: "Kode COA Sudah ada!",
                            type: "error",
                            confirmButtonClass: "btn-raised btn-danger",
                            confirmButtonText: "OK",
                        });
                        document.getElementsByName('coa_kode')[0].value = null;
                    }
                }
            });
        }
    </script>