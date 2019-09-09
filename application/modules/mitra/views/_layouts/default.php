<!--<div class="wrapper">-->

	<?php $this->load->view('_partials/navbar'); ?>

	<?php // Left side column. contains the logo and sidebar ?>
			<?php // (Optional) Add Search box here ?>
			<?php //$this->load->view('_partials/sidemenu_search'); ?>
			<?php $this->load->view('_partials/sidemenu'); ?>

	<?php // Right side column. Contains the navbar and content of the page ?>
                <div class="app-content content">
                    <div class="content-wrapper">                        
                        
                            <?php //$this->load->view('_partials/breadcrumb'); ?>
                        
                        <div class="content-body"><!--fitness stats-->
                            <?php $this->load->view($inner_view); ?>
                            <?php $this->load->view('_partials/back_btn'); ?>
                        </div>
                </div>
                </div>

	<?php // Footer ?>
	<?php $this->load->view('_partials/footer'); ?>
<!--
</div>-->