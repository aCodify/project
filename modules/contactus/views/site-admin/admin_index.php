<?php echo $error = ( ! empty( $error ) ) ? $error : '' ; ?>
<?php echo $form_status = ( ! empty( $form_status ) ) ? $form_status : '' ; ?>
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN EXTRAS PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i>Detail in Contact us</h4>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->

				<?php $attributes = array( 'class' => 'form-horizontal' ); ?>
				<?php echo form_open( '', $attributes); ?>

				<div class="control-group">
					<label class="control-label">Map Google Code</label>
					<div class="controls">
						<textarea name="google_map_code" class="span6 m-wrap" rows="5"><?php echo $google_code = ( ! empty( $show_data['google_code'] ) ) ? $show_data['google_code'] : '' ; ?></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Address</label>
					<div class="controls">
						<input name='address' type="text" value="<?php echo $address = ( ! empty( $show_data['address'] ) ) ? $show_data['address'] : '' ; ?>" class="span6 m-wrap" />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Office hours</label>
					<div class="controls">
						<input name='work_time' type="text" value="<?php echo $work_time = ( ! empty( $show_data['work_time'] ) ) ? $show_data['work_time'] : '' ; ?>" class="span6 m-wrap" />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Travel</label>
					<div class="controls">
						<input name='travel' type="text" value="<?php echo $travel = ( ! empty( $show_data['travel'] ) ) ? $show_data['travel'] : '' ; ?>" class="span6 m-wrap" />
					</div>
				</div>		

				<div class="control-group">
					<label class="control-label">Phone</label>
					<div class="controls">
						<input name='phone' type="text" value="<?php echo $phone = ( ! empty( $show_data['phone'] ) ) ? $show_data['phone'] : '' ; ?>" class="span6 m-wrap" />
					</div>
				</div>												
				
				<div class="portlet-title-more">
					<h4><i class="icon-reorder"></i>SEO setting</h4>
				</div>
				
				<div class="portlet-body-more">

					<div class="control-group">
						<label class="control-label">Url slug</label>
						<div class="controls">
							<input name='slug' type="text" value="<?php echo $slug = ( ! empty( $show_data['slug'] ) ) ? $show_data['slug'] : '' ; ?>" class="span6 m-wrap" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tag keywords</label>
						<div class="controls">
							<input name='tag_keywords' type="text" value="<?php echo $tag_keywords = ( ! empty( $show_data['tag_keywords'] ) ) ? $show_data['tag_keywords'] : '' ; ?>" class="span6 m-wrap" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tag description</label>
						<div class="controls">
							<input name='tag_description' type="text" value="<?php echo $tag_description = ( ! empty( $show_data['tag_description'] ) ) ? $show_data['tag_description'] : '' ; ?>" class="span6 m-wrap" />
						</div>
					</div>

				</div>	


                <div class="portlet-title-more orange">
                    <h4><i class="icon-reorder"></i>Other setting</h4>
                </div>
                
                <div class="portlet-body-more">

					<div class="control-group">
						<label class="control-label">Email system</label>
						<div class="controls">
							<textarea name="email" placeholder="Example : admin@example.com , member@example.com" class="span6 m-wrap email tag_email" rows="2"><?php echo $email = ( ! empty( $show_data['email'] ) ) ? $show_data['email'] : '' ; ?></textarea>
						</div>
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




<script type="text/javascript" >
	
	$(function() {


		$('.set_upload_file').click(function(){

			set_open = window.open($(this).attr('data-url'),'popup','directories=no,titlebar=no,toolbar=no,location=on,status=no,menubar=no,scrollbars=yes,resizable=no,width=820,height=620');

			set_open.target_object = $('.upload_img')

		})

		$('.upload_img').on( 'getFileCallback' , function( event , file ){
			console.log(file);
		} )

		$('textarea').autosize();  

	});   


</script>












