
<!-- BEGIN FORM-->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="horz-layout-icons">Tambah Barang Baru</h4>
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
                <div class="card-body"
                    <form action="#" id="formAdd" class="form-horizontal row-separator" method="post">
                        <div class="form-body">
                            <input type="hidden" id="url" value="Master-Data/Barang/postData/">
                            <div class="form-group row" hidden="true">
                                <label class="control-label col-md-4">ID Barang (Auto)
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="kode" readonly /> </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Kode Barang
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control kode" name="barang_kode" id="barang_kode" onchange="cekKode()" required /> </div>
                                </div>
                            </div>
                            <div class="form-group row" hidden="true">
                                <label class="control-label col-md-4">Nomor Barang
                                </label>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="barang_nomor" /> </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Nama Barang
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="barang_nama" required /> </div>
                                </div>
                            </div>
                            <div class="form-group row">
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
                            <div class="form-group row">
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
                            <div class="form-group row">
                                <label class="control-label col-md-4">Minimum Stok
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control num" name="barang_minimum_stok" required /> </div>
                                </div>
                            </div>
                            <div class="form-group row">
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

                            <div class="form-group row">
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
                         <div class="form-actions right">                               
                                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                                    <button type="button" class="btn btn-warning mr-1">Reset</button>
                                
                        </div>
                    </form>
                </div>
           </div>
        </div>
    </div>
</div>