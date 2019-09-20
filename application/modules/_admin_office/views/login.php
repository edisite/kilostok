    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-md-6 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center">
                                <div class="p-1"><img src="<?php echo base_url(); ?>app-assets/images/logo/kilostok.png" alt="branding logo"></div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>login page administrator</span></h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <h2 class="_title font-bold">Halo, Selamat datang kembali!</h2>
                                    <p class="nomargin">Masukan username dan kata sandi Anda pada form di bawah. </p>
                                <?php echo $form->open(); ?>                                
                                <?php echo $form->messages(); ?>                                
                                <form class="form-horizontal" action="index.html">
                                        <?php echo $form->bs3_text('Username', 'username', ENVIRONMENT==='development' ? 'webmaster' : ''); ?>
                                        <?php echo $form->bs3_password('Password', 'password', ENVIRONMENT==='development' ? 'webmaster' : ''); ?>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12 text-center text-sm-left">
                                            <fieldset>
                                                <input type="checkbox" id="remember-me" name="remember" class="chk-remember">
                                                <label for="remember-me"> Remember Me</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-border"><i class="ft-unlock"></i> Login</button>
                                </form>
                            </div>
                            <?php echo $form->close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
