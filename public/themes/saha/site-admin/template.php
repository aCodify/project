<?php $this->load->view( 'site-admin/inc_html_head' ); ?>  

	<!-- SET DATA Indispensable -->
	<?php  
  
	$hover_menu = ( ! empty( $hover_menu ) ) ? $hover_menu : '' ;
   $hover_menu_sub = ( ! empty( $hover_menu_sub ) ) ? $hover_menu_sub : '' ;

	?>
	<!-- END SET DATA Indispensable -->		

   <div class="header navbar navbar-inverse navbar-fixed-top">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
         <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="<?php echo site_url('site-admin') ?>">
            	<img style="width: 22px; padding-right: 8px;" src="<?php echo $this->theme_path; ?>image/lastfm256.png" alt=""><span style="font-size: 13px;" >Project Management</span>
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
            <img src="<?php echo $this->theme_path; ?>assets/img/menu-toggler.png" alt="" />
            </a>          
            <!-- END RESPONSIVE MENU TOGGLER -->            
            <!-- BEGIN TOP NAVIGATION MENU -->              
            <ul class="nav pull-right">
               <!-- BEGIN USER LOGIN DROPDOWN -->
               <li class="dropdown user">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img alt="" src="http://www.gravatar.com/avatar/33a7889951d9dc27adbccfb7db58a144?s=26&d=mm" />
                  <span class="username">Admin</span>
                  <i class="icon-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu">
                     <li><a href="<?php echo site_url('site-admin/account/edit/1') ?>"><i class="icon-user"></i> My Profile</a></li>
                     <li class="divider"></li>
                     <li><a href="<?php echo site_url('site-admin/logout') ?>"><i class="icon-key"></i> Log Out</a></li>
                  </ul>
               </li>
               <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU --> 
         </div>
      </div>
      <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->

   <!-- BEGIN CONTAINER -->
   <div class="page-container row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar nav-collapse collapse">
         <!-- BEGIN SIDEBAR MENU -->         
         <ul>
            <li>
               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
               <div class="sidebar-toggler hidden-phone"></div><br>
               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
               <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
               <!-- <form class="sidebar-search">
                  <div class="input-box">
                     <a href="javascript:;" class="remove"></a>
                     <input type="text" placeholder="Search..." />            
                     <input type="button" class="submit" value=" " />
                  </div>
               </form> -->
               <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start <?php echo $hover = ( $hover_menu == 'Dashboard' ) ? 'active' : '' ; ?>" >
               <a href="<?php echo site_url('site-admin') ?>">
               <i class="icon-home"></i> 
               <span class="title">Dashboard</span>
               </a>
            </li>
            <?php if ( $this->modules_model->is_activated( 'about' ) ): ?> 
               <li class="<?php echo $hover = ( $hover_menu == 'About' ) ? 'active' : '' ; ?>"> <!--  active -->
                  <a href="<?php echo site_url('site-admin/about') ?>">
                  <i class="icon-bookmark-empty"></i> 
                  <span class="title">About</span>
                  </a>
               </li>
            <?php endif ?>
            <?php if ( $this->modules_model->is_activated( 'news' ) ): ?>
               <li class="has-sub <?php echo $hover = ( $hover_menu == 'News&Promotion' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/news') ?>">
                  <i class="icon-rss"></i> 
                  <span class="title">News&Promotion</span>
                  </a>
               </li>
            <?php endif ?>
            <?php if ( $this->modules_model->is_activated( 'sahadatabase' ) ): ?>
               <li class="has-sub <?php echo $hover = ( $hover_menu == 'Saha Database' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/sahadatabase') ?>">
                  <i class="icon-th-list"></i> 
                  <span class="title">Saha Database</span>
                  </a>
               </li>
            <?php endif ?>
            <?php if ( $this->modules_model->is_activated( 'career' ) ): ?>
               <li class="has-sub <?php echo $hover = ( $hover_menu == 'Career' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/career') ?>">
                  <i class="icon-briefcase"></i> 
                  <span class="title">Career</span>
                  </a>
               </li>
            <?php endif ?>
            <?php if ( $this->modules_model->is_activated( 'contactus' ) ): ?>
               <li class="has-sub <?php echo $hover = ( $hover_menu == 'Contact Us' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/contactus') ?>">
                  <i class="icon-map-marker"></i> 
                  <span class="title">Contact Us</span>
                  </a>
               </li>
            <?php endif ?>
            <?php if ( $this->modules_model->is_activated( 'background' ) ): ?>
               <li class="has-sub <?php echo $hover = ( $hover_menu == 'Background' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/background') ?>">
                     <i class="icon-picture"></i> 
                     <span class="title">Background</span>
                  </a>
               </li>
            <?php endif ?>
            <?php if ( $this->modules_model->is_activated( 'member' ) ): ?>
               <li class="<?php echo $hover = ( $hover_menu == 'Member' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/member') ?>">
                     <i class="icon-user"></i> 
                     <span class="title">Member</span>
                  </a>
               </li>
            <?php endif ?>
            <?php if ( $this->modules_model->is_activated( 'newsletter' ) ): ?>
               <li class="<?php echo $hover = ( $hover_menu == 'Newsletter' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/newsletter') ?>">
                     <i class="icon-envelope-alt"></i> 
                     <span class="title">Newsletter</span>
                  </a>
               </li>
            <?php endif ?>
            <?php if ( $this->modules_model->is_activated( 'intro_page' ) ): ?>
               <li class="<?php echo $hover = ( $hover_menu == 'Intro Page' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/intro_page') ?>">
                     <i class="icon-bookmark-empty"></i>
                     <span class="title">Intro Page</span>
                  </a>
               </li>
            <?php endif ?>  
            <?php if ( $this->modules_model->is_activated( 'social' ) ): ?>
               <li class="<?php echo $hover = ( $hover_menu == 'Social' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/social') ?>">
                     <i class="icon-bookmark-empty"></i>
                     <span class="title">Social</span>
                  </a>
               </li>
            <?php endif ?>  
            <?php if ( $this->modules_model->is_activated( 'setting' ) ): ?>
               <li class="<?php echo $hover = ( $hover_menu == 'Setting' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/setting') ?>">
                     <i class="icon-cogs"></i> 
                     <span class="title">Setting</span>
                  </a>
               </li>
            <?php endif ?>

            <?php if ( $this->modules_model->is_activated( 'project_list' ) ): ?>
               <li class="<?php echo $hover = ( $hover_menu == 'Project List' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/project_list') ?>">
                     <i class="icon-cogs"></i> 
                     <span class="title">Project List</span>
                  </a>
               </li>
            <?php endif ?>

            <?php if ( $this->modules_model->is_activated( 'category' ) ): ?>
               <li class="<?php echo $hover = ( $hover_menu == 'Category' ) ? 'active' : '' ; ?>">
                  <a href="<?php echo site_url('site-admin/category') ?>">
                     <i class="icon-cogs"></i> 
                     <span class="title">Category</span>
                  </a>
               </li>
            <?php endif ?>

            <!-- SET ECHO MENU MODULE -->
            <?php //echo $this->modules_model->load_admin_nav(); ?> 
         </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div class="page-content">
         <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <div id="portlet-config" class="modal hide">
            <div class="modal-header">
               <button data-dismiss="modal" class="close" type="button"></button>
               <h3>portlet Settings</h3>
            </div>
            <div class="modal-body">
               <p>Here will be a configuration form</p>
            </div>
         </div>
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <h3 class="page-title">
                    	<?php echo $this_title_page = ( ! empty( $this_title_page ) ) ? $this_title_page : '' ; ?>
                  </h3>
                  <ul class="breadcrumb">
<!--                      <li>
                        <i class="icon-home"></i>
                        <a href="index.html">Home</a> 
                        <span class="icon-angle-right"></span>
                     </li>
                     <li>
                        <a href="#">Form Stuff</a>
                        <span class="icon-angle-right"></span>
                     </li>
                     <li><a href="#">Form Components</a></li> -->
					<?php if ( ! empty( $this_breadcrumb_page ) ): ?>
						<?php foreach ( $this_breadcrumb_page as $key => $value ): ?>
														
							<li>
								<?php if ( $key == 'Home' ): ?>
								<i class="icon-home"></i>
								<?php endif ?>
								<a href="<?php echo $value ?>"><?php echo $key ?></a>
								<?php if ( end( $this_breadcrumb_page ) != $value ): ?>
									<span class="icon-angle-right"></span>
								<?php endif ?>

			
							</li>								
								
						<?php endforeach ?>
					<?php endif ?>

                  </ul>
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
			<?php if ( isset( $page_content ) ) {echo $page_content;} ?> 

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div class="footer">
      2013 &copy; , Bizidea Co.,Ltd. All Rights Reserved.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-angle-up"></i></span>
      </div>
   </div>
		
<?php $this->load->view( 'site-admin/inc_html_foot' ); ?>