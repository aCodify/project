<?php echo $form_status = ( ! empty( $form_status ) ) ? $form_status : '' ; ?>

<!-- BEGIN PAGE CONTAINER-->			
<div class="container-fluid before_show_log">
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->

			<!-- Start form mark sort -->
            <?php $attributes = array( 'class' => 'form_intro_page' , 'title' => "table-content" ); ?>
            <?php echo form_open( site_url('site-admin/category/mark_sort') , $attributes); ?>

			<div class="portlet box blue">
				<div class="portlet-title">
					<h4><i class="icon-edit"></i>Category Data Table</h4>

				</div>

				<div class="portlet-body">
					<div class="clearfix">
						<div class="btn-group">
							<a class="btn green" href="<?php echo site_url('site-admin/category/category_add') ?>"> 
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
								<th>Name</th>
								<th>Edit</th>
								<th>Delete</th>
								<th>Sort</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $data_list as $key => $value ): ?>
								
								<tr class="">
									<td>
										<?php echo $value->category_name ?>
									</td>
									<td><a class="" href="<?php echo site_url( 'site-admin/category/category_edit/'.$value->id ) ?>">Edit</a></td>
									<td><a data-url="<?php echo site_url('site-admin/category/category_delete/'.$value->id) ?>" class="delete_data" href="javascript:;">Delete</a></td>
									<td class="dragHandle"> <input type="hidden" class="array_id" name="id[]" value="<?php echo $value->id ?>"> </td>
								</tr>
								
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

// var oTable = $('.table').dataTable();


$('.table a.delete_data').live('click', function (e) {
    
    e.preventDefault();


    if (confirm("Are you sure to delete this row ? ") == false) 
    {
        return;
    }

    set_url = window.location.origin;

    data_url = $(this).attr( 'data-url' );

    var c_this = $(this);

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
                $('.before_show_log').before( html );    
            }
            else
            {
                alert("Deleted Error ! , Please try again.");
            }


        }
    });

});   


$(document).ready(function() {

    var table = document.getElementById('mark_sort');
    var tableDnD = new TableDnD();
    tableDnD.init(table);

    tableDnD.onDrop = function( table , row ) {
        $('.mark_sort').show();
    }

    tableDnD.serialize('array_id');





    var oTable = $('.table').dataTable( {
            "aoColumns": [
                { "sWidth": "70%" },
                { "sWidth": "10%" },
                { "sWidth": "10%" },
                { "sWidth": "10%" },
   
            ],
            "bSort": false,


    } );



});







</script>