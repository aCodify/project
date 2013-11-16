<?php echo $error_validation = ( ! empty( $error_validation ) ) ? $error_validation : '' ; ?>

<div class="row-fluid">
   <div class="span12">
	  <!-- BEGIN EXTRAS PORTLET-->
	  <div class="portlet box blue">
		 <div class="portlet-title">
			<h4><i class="icon-reorder"></i>Detail in about</h4>
		 </div>
		 <div class="portlet-body form">
			<!-- BEGIN FORM-->
			
            <?php $attributes = array( 'class' => 'form-horizontal' ); ?>
			<?php echo form_open( '', $attributes); ?>

			<div class="control-group">
				<label class="control-label">Porject Name</label>
				<div class="controls">
					<input name='project_name' type="text" value="<?php echo $project_name = ( ! empty( $show_data['project_name'] ) ) ? $show_data['project_name'] : '' ; ?>" class="span6 m-wrap" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Link file</label>
				<div class="controls">
					<input name='link_file' type="text" value="<?php echo $link_file = ( ! empty( $show_data['link_file'] ) ) ? $show_data['link_file'] : '' ; ?>" class="span6 m-wrap" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Advance Date Ranges</label>
				<div class="controls">
					<div id="form-date-range" class="btn">
						<i class="icon-calendar"></i>
						&nbsp;
						<span>
							<?php if ( ! empty( $show_data['start_date'] ) OR ! empty( $show_data['end_date'] ) ): ?>
								<?php echo $start_date = date( 'd-m-Y' , $show_data['start_date'] ) ?> To <?php echo $end_date = date( 'd-m-Y' , $show_data['end_date'] )  ?>
							<?php endif ?>
						</span> 
						<b class="caret"></b>
					</div>
					<span id='input_date_range' style="display:none;" >
						<input type="hidden" value="<?php echo $start_date = ( ! empty( $start_date ) ) ? reset_format_date( $start_date , '-' , '/' , 'd-m-y' , 'd-m-y' ) : '' ; ?>" name="start_date">
						<input type="hidden" value="<?php echo $end_date = ( ! empty( $end_date ) ) ? reset_format_date( $end_date , '-' , '/' , 'd-m-y' , 'd-m-y' ) : '' ; ?>" name="end_date">
					</span>
				</div>
			</div>

			<hr>

			<div class="control-group">
				<label class="control-label">User Name Proejct</label>
				<div class="controls">
					<input name='user_name' type="text" value="<?php echo $user_name = ( ! empty( $show_data['user_name'] ) ) ? $show_data['user_name'] : '' ; ?>" class="span6 m-wrap" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Password</label>
				<div class="controls">
					<input name='password' type="text" value="<?php echo $password = ( ! empty( $show_data['password'] ) ) ? $show_data['password'] : '' ; ?>" class="span6 m-wrap" />
				</div>
			</div>



			   <div class="form-actions">
				  <button type="submit" class="btn blue">Submit</button>
                  <a class="btn" href="<?php echo site_url('site-admin/about') ?>">Cancel</a>
			   </div>
			<?php echo form_close(); ?>
			<!-- END FORM-->
		 </div>
	  </div>
	  <!-- END EXTRAS PORTLET-->
   </div>
</div>

















