    <!-- Horizontal navigation-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-bordered navbar-shadow" role="navigation" data-menu="menu-wrapper">
      <!-- Horizontal menu content-->
      <div class="navbar-container main-menu-content" data-menu="menu-container">
        <!-- include ../../../includes/mixins-->
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
	<?php foreach ($menu as $parent => $parent_params): ?>

		<?php if ( empty($page_auth[$parent_params['url']]) || $this->ion_auth->in_group($page_auth[$parent_params['url']]) ): ?>
		<?php if ( empty($parent_params['children']) ): ?>

			<?php $active = ($current_uri==$parent_params['url'] || $ctrler==$parent); ?>
			<li class='dropdown nav-item <?php if ($active) echo 'active'; ?> data-menu="dropdown"'>
				<a href='<?php echo $parent_params['url']; ?>' class="dropdown nav-link">
                                    <i class='<?php echo $parent_params['icon']; ?>'></i><span data-i18n="nav.dash.main"> <?php echo $parent_params['name']; ?></span>
				</a>
			</li>

		<?php else: ?>

			<?php $parent_active = ($ctrler==$parent); ?>
			<li class='dropdown nav-item <?php if ($parent_active) echo 'active'; ?>' data-menu="dropdown">
                            <a href='#' class="dropdown-toggle nav-link" data-toggle="dropdown">
					<i class='<?php echo $parent_params['icon']; ?>'></i> 
                                        <span data-i18n="nav.dash.main"><?php echo $parent_params['name']; ?></span> 
<!--                                        <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>-->
				</a>
				<ul class='dropdown-menu'>
					<?php foreach ($parent_params['children'] as $name => $url): ?>
						<?php if ( empty($page_auth[$url]) || $this->ion_auth->in_group($page_auth[$url]) ): ?>
						<?php $child_active = ($current_uri==$url); ?>
						<li <?php if ($child_active) echo 'class="active"'; ?> data-menu="">
							<a class="dropdown-item" href='<?php echo $url; ?>' data-toggle="dropdown"><i class='fa fa-circle-o'></i> <?php echo $name; ?></a>
						</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</li>

		<?php endif; ?>
		<?php endif; ?>

	<?php endforeach; ?>
<!--	
         <li class="dropdown nav-item" data-menu="dropdown">
              <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown">
                  <i class="icon-home"></i><span data-i18n="nav.dash.main">Dashboard</span></a>
            <ul class="dropdown-menu">
              <li class="active" data-menu=""><a class="dropdown-item" href="dashboard-fitness.html" data-toggle="dropdown">Fitness</a>
              </li>
              <li data-menu=""><a class="dropdown-item" href="dashboard-project.html" data-toggle="dropdown">Project</a>
              </li>
              <li data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html" data-toggle="dropdown">eCommerce</a>
              </li>
              <li data-menu=""><a class="dropdown-item" href="dashboard-analytics.html" data-toggle="dropdown">Analytics</a>
              </li>
              <li data-menu=""><a class="dropdown-item" href="dashboard-crm.html" data-toggle="dropdown">CRM</a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="icon-note"></i><span data-i18n="nav.templates.main">Templates</span></a>
            <ul class="dropdown-menu">
              <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Vertical</a>
                <ul class="dropdown-menu">
                  <li data-menu=""><a class="dropdown-item" href="../vertical-menu-template" data-toggle="dropdown">Classic Menu</a>
                  </li>
                  <li data-menu=""><a class="dropdown-item" href="../vertical-compact-menu-template" data-toggle="dropdown">Compact Menu</a>
                  </li>
                  <li data-menu=""><a class="dropdown-item" href="../vertical-content-menu-template" data-toggle="dropdown">Content Menu</a>
                  </li>
                  <li data-menu=""><a class="dropdown-item" href="../vertical-overlay-menu-template" data-toggle="dropdown">Overlay Menu</a>
                  </li>
                  <li data-menu=""><a class="dropdown-item" href="../vertical-multi-level-menu-template" data-toggle="dropdown">Multi-level Menu</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Horizontal</a>
                <ul class="dropdown-menu">
                  <li data-menu=""><a class="dropdown-item" href="../horizontal-menu-template" data-toggle="dropdown">Classic</a>
                  </li>
                  <li data-menu=""><a class="dropdown-item" href="../horizontal-top-icon-menu-template" data-toggle="dropdown">Top Icon</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>-->
        </ul>
      </div>
      <!-- /horizontal menu content-->
    </div>
    <!-- Horizontal navigation-->

