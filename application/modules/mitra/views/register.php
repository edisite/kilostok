    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-12 col-12 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0 pb-0">
                    <div class="card-title text-center">
                        <img src="<?php echo base_url(); ?>app-assets/images/logo/kilostok.png" alt="kilostok logo">
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"></h6>
                    <span>Silahkan Mengisi Form dibawah ini, untuk melakukan pendaftaran di website kami</span>
                </div>
                    
                        <div class="card-content collapse show">                        
                        <div class="card-body pt-0">
                            <div class="form-body">
                                
                            <?php echo $form->open(); ?>    
                                <div class="row">
                                    <div class="form-group col-md-4 mb-2">
                                        <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                                            <?php echo $form->bs3_text('Nama Perusahaan <label class="label">(Ex. <span class="blue">UKM Seribukilo</span>)</label>', 'nama_perusahaan'); ?>
                                            <?php echo $form->bs3_email('Email', 'email'); ?>
                                            <?php echo $form->bs3_text('Nama Depan', 'first_name'); ?>
                                            <?php echo $form->bs3_text('Nama Belakang', 'last_name'); ?>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                            <h4 class="form-section"><i class="fa fa-retweet"></i> Password</h4>
                                            <?php echo $form->bs3_password('Password', 'password'); ?>
                                            <?php echo $form->bs3_password('Retype Password', 'retype_password'); ?>
                                                
                                            <div class="text-center text-sm-left">
                                                <?php echo $form->messages(); ?>
                                            <fieldset>
                                                <br>
                                             <?php echo $form->bs3_submit('Register','btn btn-warning pull-left'); ?>
                                            
                                            </fieldset>
                                            </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <h3 class="section__title section__title--narrowspace">Ada masalah lainnya ?</h3>
                                        <p>Jika Anda masih mengalami permasalahan dengan senang hati Kami akan membantu menyelesaikannya</p>

                                        <label>Telepon</label>
                                        <p class="bold-blue">021-29784888</p>

                                        <label>Email</label>
                                        <p class="bold-blue"><a href="mailto:kilostok.info@gmail.com">kilostok.info@gmail.com</a></p>
                                    </div>
                                </div>
                                
                            <?php echo $form->close(); ?>
                            </div>
			</div>
                    <div class="card-footer pb-0">
                        <p class="text-center"><a href="recover-password.html" class="card-link"> Lupa Password? </a> |  
                       Sudah Pernah mendaftar sebelumnya?<a href="login" class="card-link">Login ke akun Anda</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->