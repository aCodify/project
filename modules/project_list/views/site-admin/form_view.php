<?php echo $error = ( ! empty( $error ) ) ? $error : '' ; ?>

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
				  <label class="control-label">Title</label>
				  <div class="controls">
					 <input name='title' type="text" value="<?php echo $title = ( ! empty( $show_data['title'] ) ) ? $show_data['title'] : '' ; ?>" class="span6 m-wrap" />
				  </div>
			   </div>

			   <div class="control-group">
				  <label class="control-label">Detail</label>
				  <div class="controls">
					 <textarea class="span12 ckeditor this_ckeditor m-wrap" name="detail" rows="6"><?php echo $detail = ( ! empty( $show_data['detail'] ) ) ? $show_data['detail'] : '' ; ?></textarea>
				  </div>
			   </div>

			   <div class="control-group">
				  <label class="control-label">Year</label>
				  <div class="controls">

					 <select name="year" class="span2 chosen" data-placeholder="Choose.." tabindex="1">
						
						<option value=""></option>

						<?php $year_array = range( date("Y")+1 , 1950  ) ?>

						<?php $year = ( ! empty( $show_data['year'] ) ) ? $show_data['year'] : '' ; ?>

                        <?php foreach ( $year_array as $key => $info ): ?>   
							
							<?php if ( in_array( $info , $data_year ) ): ?>
								<?php continue; ?>
							<?php endif ?>
                            <?php $hover = ( $year == $info ) ? 'selected="selected"' : '' ; ?>
				            <option <?php echo $hover ?> value="<?php echo $info ?>"><?php echo $info ?></option>
						
						<?php endforeach ?>
						
					 </select>
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

















