<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-star font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 info float-right">50.879.000,00</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Saldo Investasi</span>
                                    <span class="info float-right"><i class="ft-arrow-up info"></i> 0%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-user font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 danger float-right">30.000.000,00</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Saldo Projek Berjalan</span>
                                    <span class="danger float-right"><i class="ft-arrow-up danger"></i> 0%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-shuffle font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 success float-right">400.000,00</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Saldo Hasil</span>
                                    <span class="success float-right"><i class="ft-arrow-down success"></i> 100%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-wallet font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 warning float-right">600.000.000,00</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Saldo Akun</span>
                                    <span class="warning float-right"><i class="ft-arrow-up warning"></i> 0%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Sales stats -->

<div class="row">

	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/box_open', 'Shortcuts'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-user', 'Account', 'panel/account'); ?>
                            <?php echo modules::run('adminlte/widget/app_btn', 'fa fa-sign-out', 'Logout', 'panel/logout'); ?>
		<?php echo modules::run('adminlte/widget/box_close'); ?>
	</div>


	
</div>