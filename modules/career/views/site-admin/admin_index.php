<?php echo $form_status = ( ! empty( $form_status ) ) ? $form_status : '' ; ?>

<!-- BEGIN PAGE CONTAINER-->            
<div class="container-fluid before_show_log">
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            <!-- Start form Titie Header Page -->
            <?php $attributes = array( 'class' => 'form_career' ); ?>
            <?php echo form_open( '', $attributes); ?>

            <div class="portlet gray">
                <div class="portlet-title">
                    <h4><i class="icon-cogs"></i>Titie Header Page</h4>
                    <span class="show_textarea_edit"></span>
                    <div class="tools">
                        <button class="btn blue btn_header mark_change">Save</button>
                    </div>
                    <div class="tools">
                        <a title="Hide" href="javascript:;" class="collapse tooltips"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="well">
                       <div class="control-group">
                          <div class="controls">
                             <textarea class="ckeditor this_ckeditor_career " name="title_detail" rows="6"><?php echo $title_detail = ( ! empty( $show_data['title_detail'] ) ) ? $show_data['title_detail'] : '' ; ?></textarea>
                          </div>
                       </div>
                    </div>
                </div>
            </div>

            <div class="portlet gray">
                <div class="portlet-title">
                    <h4><i class="icon-cogs"></i>Titie Header Page</h4>
                    <span class="show_textarea_edit"></span>

                    <div class="tools">
                        <a title="Hide" href="javascript:;" class="collapse tooltips"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="well">
                       <div class="control-group">
                          <div class="controls">

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

                          </div>
                       </div>
                    </div>
                </div>
            </div>

            <?php echo form_close(); ?>
            <!-- End Form Titie Header Page -->

            <!-- Start form mark sort -->
            <?php $attributes = array( 'class' => 'form_career' , 'title' => "table-content" ); ?>
            <?php echo form_open( site_url('site-admin/career/mark_sort') , $attributes); ?>

            <div class="portlet box blue">
                <div class="portlet-title">
                    <h4><i class="icon-edit"></i>Career Data Table</h4>
                </div>
                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a class="btn green" href="<?php echo site_url('site-admin/career/career_add') ?>"> 
                                Add New <i class="icon-plus"></i>
                            </a>

                            <button name="mark_sort" value="sort" type="submit" style="display:none" class="btn red mark_sort" > 
                                Mark Sort <i class="icon-plus"></i>
                            </button>

                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="mark_sort">
                        <thead>
                            <tr>
                                <th style="display:none" >id</th>
                                <th>Title Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Status</th>
                                <td>Sort</td>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- // setting value -->
                            <?php $index_id = 1 ?>
                            <?php foreach ( $data_list as $key => $value ): ?>
            

                                <tr class="">
                                    <td style="display:none" ><?php echo $value->order_sort ?></td>
                                    <td><?php echo $value->title ?></td>
                                    <td><a class="" href="<?php echo site_url( 'site-admin/career/career_edit/'.$value->id ) ?>">Edit</a></td>
                                    <td><a data-url="<?php echo site_url( 'site-admin/career/career_delete/'.$value->id ) ?>" class="delete_data" href="javascript:;">Delete</a></td>
                                    <td>
                                        <?php $retVal = ( $value->status == 1 ) ? 'ON' : 'OFF' ; ?>
                                        <b class="<?php echo $retVal ?>"> <?php echo $retVal ?> </b>
                                    </td>    
                                    <td class="dragHandle"> <input type="hidden" class="array_id" name="id[]" value="<?php echo $value->id ?>"> </td>
                                </tr>

                                <!-- // set index value -->
                                <?php $index_id++ ?>

                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <?php echo form_close(); ?>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER-->


<script type="text/javascript" >

$(document).ready(function() {

    // $('.table-bordered').tableDnD({
    //  onDragStart: function(table, row) {
    //          $('.mark_sort').show();
    //          console.log( $.tableDnD.serialize() );
    //      },
    //      dragHandle: ".dragHandle"
    // });
    var table = document.getElementById('mark_sort');
    var tableDnD = new TableDnD();
    tableDnD.init(table);

    tableDnD.onDrop = function( table , row ) {
        $('.mark_sort').show();
    }

    tableDnD.serialize('array_id');

});

$(function() {

    window.data_change = true;

    window.input_change = false;

    // check input change has change value
    $('input[name*="slug"]').keyup(function () { 
        window.input_change = true;
    });
    $('input[name*="tag_keywords"]').keyup(function () { 
        window.input_change = true;
    });
    $('input[name*="tag_description"]').keyup(function () { 
        window.input_change = true;
    });
    // end check input


    $('.mark_change').click(function(event) {
        window.data_change = false;
    });


    
    var oTable = $('.table').dataTable( {
            "aoColumns": [
                { "sWidth": "1%" },
                { "sWidth": "64%" },
                { "sWidth": "10%" },
                { "sWidth": "10%" },
                { "sWidth": "10%" },
                { "sWidth": "5%" }
            ]
    } );

    $('.table a.delete_data').live('click', function (e) {
        
        e.preventDefault();

        if (confirm("Are you sure to delete this row ? ") == false) 
        {
            return;
        }

        set_url = window.location.origin;

        data_url = $(this).attr( 'data-url' );

        var c_this = $(this);

        var nRow = c_this.parents('tr')[0];
        oTable.fnDeleteRow(nRow);

        $.ajax({
            type: "GET",
            url: data_url,
            success: function(data) 
            {  
                if ( data == 1 ) 
                {
                    var nRow = c_this.parents('tr')[0];
                    oTable.fnDeleteRow(nRow);                    
                    // alert("Deleted Success !");
                    html = ''; 
                    html += '<div class="alert alert-success">';
                    html += '<button class="close" data-dismiss="alert"></button>';
                    html += '<strong>Success! </strong>';
                    html += 'The page has been save success.';
                    html += '</div>';
                    $('.portlet.box.blue').before( html );    
                }
                else
                {
                    alert("Deleted Error ! , Please try again.");
                }


            }
        });

    });  


/*-----  End of Section comment datatable  ------*/


    CKEDITOR.replace('title_detail', {
        filebrowserBrowseUrl : '../filemanager/image',
        height:300,
        enterMode: 2,
        toolbar : [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
            { name: 'netclub', items: [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
            { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
            { name: 'styles', items: [ 'Styles', 'Format' ,'Font','FontSize','TextColor','BGColor'] },
            { name: 'tools', items: [ 'Maximize' ] },
            { name: 'others', items: [ '-' ] },
            { name: 'career', items: [ 'career' ] }
        ]
    });


    function beforeUnload( e )
    {
     if ( window.data_change ) 
     {

        if ( CKEDITOR.instances.title_detail.checkDirty() )
        {
            return e.returnValue = "You will lose the changes made in the editor.";
        }

        if ( window.input_change ) 
        {
            return e.returnValue = "You will lose the changes made in the editor.";
        }

     }

    }

    if ( window.addEventListener )
    {
        window.addEventListener( 'beforeunload', beforeUnload, false );
    }
    else
    {
        window.attachEvent( 'onbeforeunload', beforeUnload );
    }

});

</script>