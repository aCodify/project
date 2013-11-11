<?php echo $error = ( ! empty( $error ) ) ? $error : '' ; ?>

<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN EXTRAS PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i>Detail in Saha Database</h4>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->

				<?php $attributes = array( 'class' => 'form-horizontal' ); ?>
				<?php echo form_open( '', $attributes); ?>

				<div class="control-group">
					<label class="control-label">Title</label>
					<div class="controls">
						<input name='title' type="text" value="<?php echo $title = ( ! empty( $show_data['title'] ) ) ? $show_data['title'] : '' ; ?>" class="span10 m-wrap" />
					</div>
				</div>

                <div class="control-group">
                    <label class="control-label">Cover image upload</label>
                        <div class="controls">
                            <span data-url="http://saha.dev/filemanager/image"  class="set_upload_file btn green fileinput-button">
                                <i class="icon-plus icon-white"></i>
                                <span>Add files...</span>
                            </span>
                            <div class="upload_img">
                            	
                                <?php if ( ! empty( $show_data['image_cover'] ) ): ?>
                                    
                                    <div class="main_c">
                                        <div class="tn_c">
                                            <a href="url">
                                                <img src="<?php echo base_url('uploads/image/'.$show_data['image_cover']) ?>" alt="" title="">
                                            </a>
                                        </div>
                                        <input type="hidden" value="003.jpg" name="image_cover">
                                    </div>

                                <?php endif ?>
                   
                            </div>
                        </div>
                </div>


				<div class="control-group">
					<label class="control-label">Detail</label>
					<div class="controls">
						<textarea class="span12 ckeditor this_ckeditor m-wrap" name="detail" rows="6"><?php echo $detail = ( ! empty( $show_data['detail'] ) ) ? $show_data['detail'] : '' ; ?></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Product sort</label>
					<div class="controls">
						<input name='order_sort' type="text" value="<?php echo $title = ( ! empty( $show_data['order_sort'] ) ) ? $show_data['order_sort'] : '0' ; ?>" class="span2 m-wrap" />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Status</label>
					<div class="controls">
						<div class="basic-toggle-button">
							<input name="status" type="checkbox" class="toggle" <?php echo $status = ( ! empty( $show_data['status'] ) ) ? 'checked="checked"' : '' ; ?> value="1" />
						</div>
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn blue">Submit</button>
					<a class="btn" href="<?php echo site_url('site-admin/career') ?>">Cancel</a>
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

		console.log( file );

        detail_img = '<div class="main_c"> <div class="tn_c"> <a href="url"> <img title="" alt="" src="'+file.url+'" /> </a> </div> <input type="hidden" name="image_cover" value="'+file.name+'"> </div>';

        $(this).html( detail_img );

	} )


});   




</script>












