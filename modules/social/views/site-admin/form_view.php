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
					<label class="control-label">Link url</label>
					<div class="controls">
						<input name='link_url' type="text" value="<?php echo $link_url = ( ! empty( $show_data['link_url'] ) ) ? $show_data['link_url'] : '' ; ?>" class="span10 m-wrap" />
					</div>
				</div>

				<!-- IMAGE COVER -->
                <div class="control-group">
                    <label class="control-label">Cover image upload</label>
                        <div class="controls">
                            <span data-url="http://saha.dev/filemanager/image"  class="set_upload_file_cover btn green fileinput-button">
                                <i class="icon-plus icon-white"></i>
                                <span>Add files image...</span>
                            </span>
                            <div class="upload_img_cover">
                                
                                <?php if ( ! empty( $show_data['image'] ) ): ?>
                                    
                                    <div class="main_c">
                                        <div class="tn_c">
                                            <a href="url">
                                                <img src="<?php echo base_url( $show_data['image'] ) ?>" alt="" title="">
                                            </a>
                                        </div>
                                        <input type="hidden" value="<?php echo $show_data['image'] ?>" name="image">
                                    </div>

                                <?php endif ?>
                            </div>
                        </div>
                </div>
				<!-- END IMAGE COVER -->


				<div class="control-group">
                    <label class="control-label">Option open page</label>
                    <?php $show_data['open_this_page'] = ( empty( $show_data['open_this_page'] ) ) ? 1 : $show_data['open_this_page'] ; ?>
                    <div class="controls">
                        <label class="radio">
                            <input type="radio" class='open_this_page' name="open_this_page" <?php echo $retVal = ( $show_data['open_this_page'] == 1 ) ? 'checked="checked"' : '' ; ?> value="1" />
                            Open this page
                        </label>
                        <label class="radio">
                            <input type="radio" class='open_this_page' name="open_this_page" <?php echo $retVal = ( $show_data['open_this_page'] == 2 ) ? 'checked="checked"' : '' ; ?> value="2" />
                            Open new page
                        </label>  
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
					<a class="btn" href="<?php echo site_url('site-admin/social') ?>">Cancel</a>
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


    /**
    *
    * set delete all youtube url
    *
    **/
    $('.set_bin').live('click', function(event) {
        $(this).parent().remove();
    });
    // end delete all youtube url


    /**
    *
    * Block comment file cover 
    *
    **/
    $('.set_upload_file_cover').click(function(){

        set_open = window.open($(this).attr('data-url'),'popup','directories=no,titlebar=no,toolbar=no,location=on,status=no,menubar=no,scrollbars=yes,resizable=no,width=820,height=620');

        set_open.target_object = $('.upload_img_cover')

    })

    $('.upload_img_cover').on( 'getFileCallback' , function( event , file ){

        detail_img = '<div class="main_c"> <div class="tn_c"> <a href="url"> <img title="" alt="" src="'+file.url+'" /> </a> </div> <input type="hidden" name="image" value="'+file.path+'"> </div>';

        $(this).html( detail_img );

    } )

    // end file cover 


	$('.hover_video').fancybox({
		
			padding: 0,
			openEffect : 'elastic',
			openSpeed  : 150,
			scrolling : "no",
			closeEffect : 'elastic',
			closeSpeed  : 150,

	});


});   

</script>












