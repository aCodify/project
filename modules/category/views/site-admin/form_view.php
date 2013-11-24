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
				<label class="control-label">Name Category</label>
				<div class="controls">
					<input name='category_name' type="text" value="<?php echo $category_name = ( ! empty( $show_data['category_name'] ) ) ? $show_data['category_name'] : '' ; ?>" class="span6 m-wrap" />
				</div>
			</div>

			<?php $sub_id = ( ! empty( $sub_id )  ) ? $sub_id : '' ; ?>

			<div class="control-group">
				<label class="control-label">Parent</label>
				<div class="controls">

			 	<select name="sub_id" class="span6 chosen" data-placeholder="Choose.." tabindex="1">
					
					<option value=""></option>

				    <?php foreach ( $category_name_list as $key => $info ): ?>   
						
				        <?php $hover = ( $sub_id == $info->sub_id ) ? 'selected="selected"' : '' ; ?>
				        <option <?php echo $hover ?> value="<?php echo $info->sub_id ?>"><?php echo $info->category_name ?></option>
					<?php endforeach ?>
					
			 	</select>
				</div>
			</div>



			<div class="control-group">
				<label class="control-label">Title Category</label>
				<div class="controls">
					<input name='category_title' type="text" value="<?php echo $category_title = ( ! empty( $show_data['category_title'] ) ) ? $show_data['category_title'] : '' ; ?>" class="span6 m-wrap" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Detail Category</label>
				<div class="controls">
					<input name='category_detail' type="text" value="<?php echo $category_detail = ( ! empty( $show_data['category_detail'] ) ) ? $show_data['category_detail'] : '' ; ?>" class="span6 m-wrap" />
				</div>
			</div>

            <div class="control-group">
                <label class="control-label">Cover image upload</label>
                    <div class="controls">
                        <span data-url="<?php echo site_url( 'filemanager/image' ) ?>"  class="set_upload_image_cover btn green fileinput-button">
                            <i class="icon-plus icon-white"></i>
                            <span>Add files...</span>
                        </span>
                        <div class="upload_img_cover">
                            
                            <?php if ( ! empty( $show_data['image_name_cover'] ) ): ?>
                                
                                <div class="main_c">
                                    <div class="tn_c">
                                        <a href="url">
                                            <img src="<?php echo base_url( $show_data['image_name_cover'] ) ?>" alt="" title="">
                                        </a>
                                    </div>
                                    <input type="hidden" value="003.jpg" name="image_name_cover">
                                </div>

                            <?php endif ?>
                        </div> 
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
			        <label class="control-label">Status</label>
			        <div class="controls">
			            <div class="basic-toggle-button">
			                <input name="status" type="checkbox" class="toggle" <?php echo $status = ( ! empty( $show_data['status'] ) ) ? 'checked="checked"' : '' ; ?> value="1" />
			            </div>
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



<script>
	
jQuery(document).ready(function($) {
	
    /**
    *
    * Block comment image cover 
    *
    **/
    $('.set_upload_image_cover').click(function(){

        set_open = window.open($(this).attr('data-url'),'popup','directories=no,titlebar=no,toolbar=no,location=on,status=no,menubar=no,scrollbars=yes,resizable=no,width=820,height=620');

        set_open.target_object = $('.upload_img_cover')

    })

    $('.upload_img_cover').on( 'getFileCallback' , function( event , file ){

        detail_img = '<div class="main_c"> <div class="tn_c"> <a href="url"> <img title="" alt="" src="'+file.url+'" /> </a> </div> <input type="hidden" name="image_name_cover" value="'+file.path+'"> </div>';

        $(this).html( detail_img );

    } )

    // end file cover 


});


</script>















