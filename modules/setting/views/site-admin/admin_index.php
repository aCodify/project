<?php echo $error = ( ! empty( $error ) ) ? $error : '' ; ?>
<?php echo $form_status = ( ! empty( $form_status ) ) ? $form_status : '' ; ?>
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

                <div class="control-group hb">
                    <label class="control-label">Header image upload</label>
                        <div class="controls">
                            <span data-url="http://saha.dev/filemanager/image"  class="set_upload_file_header btn green fileinput-button">
                                <i class="icon-plus icon-white"></i>
                                <span>Add files...</span>
                            </span>
                            <span class="public_header_image">
                             
                                <?php if ( ! empty( $show_data['header_background'] ) ): ?>
                                
                                    <img class="thm_show_image" alt="" src="<?php echo base_url( $show_data['header_background'] ) ?>">
                                    <input type="hidden" value="<?php echo $show_data['header_background'] ?>" name="header_background">
                                    <br>
                                    <span class="glyphicons no-js bin cursor_pointer" title="Remove this box">
                                        <i></i>
                                        Remove
                                    </span>

                                <?php endif ?>  

                            </span>
                        </div>
                </div>

                <div class="control-group bb">
                    <label class="control-label">Background image upload</label>
                        <div class="controls">
                            <span data-url="http://saha.dev/filemanager/image"  class="set_upload_file_body btn green fileinput-button">
                                <i class="icon-plus icon-white"></i>
                                <span>Add files...</span>
                            </span>
                            <span class="public_body_backgroud">
                                
                                <?php if ( ! empty( $show_data['body_background'] ) ): ?>
                                
                                    <img class="thm_show_image bb" alt="" src="<?php echo base_url( $show_data['body_background'] ) ?>">
                                    <input type="hidden" value="<?php echo $show_data['body_background'] ?>" name="body_background">
                                    <br>
                                    <span class="glyphicons no-js bin cursor_pointer" title="Remove this box">
                                        <i></i>
                                        Remove
                                    </span>

                                <?php endif ?>  

                            </span>
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
                    <h4><i class="icon-reorder"></i>Google analytics setting <?php echo '$var' ?> </h4>
                </div>

                <div class="portlet-body-more" id="google_analytice">

                    <div class="control-group">
                        <label class="control-label">Code setting</label>
                        <div class="controls">
                            <textarea name='code_analytics' class="span6 m-wrap" rows="4"><?php echo $code_analytics = ( ! empty( $show_data['code_analytics'] ) ) ? $show_data['code_analytics'] : '' ; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">User google analytics</label>
                        <div class="controls">
                            <input name="user_analytics"  class="span6 m-wrap" type="text" value="<?php echo $user_analytics = ( ! empty( $show_data['user_analytics'] ) ) ? $show_data['user_analytics'] : '' ; ?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password google analytics</label>
                        <div class="controls">
                            <input name="password_analytics"  class="span6 m-wrap" type="password" autocomplete="off" value="<?php echo $password_analytics = ( ! empty( $show_data['password_analytics'] ) ) ? $show_data['password_analytics'] : '' ; ?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ID_Code google analytics</label>
                        <div class="controls">
                            <input name="id_code_analytics"  class="span6 m-wrap" type="text" value="<?php echo $id_code_analytics = ( ! empty( $show_data['id_code_analytics'] ) ) ? $show_data['id_code_analytics'] : '' ; ?>" >
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


    $('.set_upload_file_header').click(function(){

        set_open = window.open($(this).attr('data-url'),'popup','directories=no,titlebar=no,toolbar=no,location=on,status=no,menubar=no,scrollbars=yes,resizable=no,width=820,height=620');

        set_open.target_object = $('.public_header_image')

    })


    $('.public_header_image').on( 'getFileCallback' , function( event , file ){

      html = '<img src="'+file.url+'" class="thm_show_image" alt=""> <input type="hidden" name="header_background" value="'+file.path+'"> <br> <span class="glyphicons no-js bin cursor_pointer" title="Remove this box"> <i></i> Remove </span>';
      $(this).html( html );

    } )



    $('.set_upload_file_body').click(function(){

        set_open = window.open($(this).attr('data-url'),'popup','directories=no,titlebar=no,toolbar=no,location=on,status=no,menubar=no,scrollbars=yes,resizable=no,width=820,height=620');

        set_open.target_object = $('.public_body_backgroud')

    })

    $('.public_body_backgroud').on( 'getFileCallback' , function( event , file ){
      
      html = '<img src="'+file.url+'" class="thm_show_image bb" alt=""> <input type="hidden" name="body_background" value="'+file.path+'"> <br> <span class="glyphicons no-js bin cursor_pointer" title="Remove this box"> <i></i> Remove </span>';
      $(this).html( html );

    } )    


    $('.controls').on('click', '.bin', function(event) {
      $(this).parent().html('')
    });

});   


</script>












