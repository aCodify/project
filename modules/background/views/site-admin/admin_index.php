<?php echo $form_status = ( ! empty( $form_status ) ) ? $form_status : '' ; ?>
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN EXTRAS PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i>Set Image Background</h4>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->

				<?php $attributes = array( 'class' => 'form-horizontal' ); ?>
				<?php echo form_open( '', $attributes); ?>

                <div class="control-group hb">
                    <label class="control-label">Header Background</label>
                    <div class="controls">
                        <span data-url="http://saha.dev/filemanager/image"  class="set_upload_file_header btn green fileinput-button">
                            <i class="icon-plus icon-white"></i>
                            <span>Add files...</span>
                        </span>
                    	<div class="upload_img_header">
                    		<?php if ( ! empty( $show_data['header_background'] ) ): ?>
                    		
								<img class="thm_show_image" alt="" src="<?php echo base_url( $show_data['header_background'] ) ?>">
								<input type="hidden" value="<?php echo $show_data['header_background'] ?>" name="header_background">
								<br>
								<span class="glyphicons no-js bin cursor_pointer" title="Remove this box">
									<i></i>
									Remove
								</span>

                			<?php endif ?>	

                    	</div>
                    </div>
                </div>

                <div class="control-group bb">
                    <label class="control-label">Body Background</label>
                    <div class="controls">
                        <span data-url="http://saha.dev/filemanager/image"  class="set_upload_file_body btn green fileinput-button">
                            <i class="icon-plus icon-white"></i>
                            <span>Add files...</span>
                        </span>
                        <div class="upload_img_body">
                        	<?php if ( ! empty( $show_data['body_background'] ) ): ?>
                        		
								<img class="thm_show_image bb" alt="" src="<?php echo base_url( $show_data['body_background'] ) ?>">
								<input type="hidden" value="<?php echo $show_data['body_background'] ?>" name="body_background">
								<br>
								<span class="glyphicons no-js bin cursor_pointer" title="Remove this box">
									<i></i>
									Remove
								</span>


                        	<?php endif ?>
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

		// upload head background
		$('.set_upload_file_header').click(function(){

			set_open = window.open($(this).attr('data-url'),'popup','directories=no,titlebar=no,toolbar=no,location=on,status=no,menubar=no,scrollbars=yes,resizable=no,width=820,height=620');
			set_open.target_object = $('.upload_img_header')

		})

		$('.upload_img_header').on( 'getFileCallback' , function( event , file ){
			html = '<img src="'+file.url+'" class="thm_show_image" alt=""> <input type="hidden" name="header_background" value="'+file.path+'"> <br> <span class="glyphicons no-js bin cursor_pointer" title="Remove this box"> <i></i> Remove </span>';
			$(this).html( html );

		} )

		// upload body background
		$('.set_upload_file_body').click(function(){

			set_open = window.open($(this).attr('data-url'),'popup','directories=no,titlebar=no,toolbar=no,location=on,status=no,menubar=no,scrollbars=yes,resizable=no,width=820,height=620');
			set_open.target_object = $('.upload_img_body')

		})

		$('.upload_img_body').on( 'getFileCallback' , function( event , file ){
			html = '<img src="'+file.url+'" class="thm_show_image bb" alt=""> <input type="hidden" name="body_background" value="'+file.path+'"> <br> <span class="glyphicons no-js bin cursor_pointer" title="Remove this box"> <i></i> Remove </span>';
			$(this).html( html );
		} )


		$('.controls').on('click', '.bin', function(event) {
			$(this).parent().html('')
		});



	});   


</script>











