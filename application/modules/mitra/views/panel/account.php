<?php echo $form1->messages(); ?>

<section id="basic-form-layouts">
	<div class="row match-height">

	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"><i class="ft-user"></i>Account Info</h4>
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
			<div class="card-content collapse show">
                                <div class="card-body">
                                    <?php echo $form1->open(); ?>
                                            <?php echo $form1->bs3_text('First Name', 'first_name', $user->first_name); ?>
                                            <?php echo $form1->bs3_text('Last Name', 'last_name', $user->last_name); ?>
                                            <?php echo $form1->bs3_submit('Update'); ?>
                                    <?php echo $form1->close(); ?>
                                </div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
            <div class="card">
		<div class="card-header">
                        <h4 class="card-title" id="basic-layout-form"><i class="ft-user"></i>Change Password</h4>
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
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="card-text">
                            <p><code>Mohon ganti password secara berkala</code></p>
                        </div>
                        <?php echo $form2->open(); ?>
                                <?php echo $form2->bs3_password('New Password', 'new_password'); ?>
                                <?php echo $form2->bs3_password('Retype Password', 'retype_password'); ?>
                                <?php echo $form2->bs3_submit(); ?>
                        <?php echo $form2->close(); ?>
                    </div>
                </div>
            </div>
	</div>
	
</div>
</section>