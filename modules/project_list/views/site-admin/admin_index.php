<?php echo $form_status = ( ! empty( $form_status ) ) ? $form_status : '' ; ?>

<!-- BEGIN PAGE CONTAINER-->			
<div class="container-fluid before_show_log">
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box blue">
				<div class="portlet-title">
					<h4><i class="icon-edit"></i>Project list Data Table</h4>

				</div>

				<div class="portlet-body">
					<div class="clearfix">
						<div class="btn-group">
							<a class="btn green" href="<?php echo site_url('site-admin/project_list/project_add') ?>"> 
								Add New <i class="icon-plus"></i>
							</a> 
						</div>
					</div>
					<table class="table table-striped table-hover table-bordered" id="">
						<thead>
							<tr>
								<th>Year</th>
								<th>Title Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $data_list as $key => $info ): ?>
								
								<tr class="">
									<td>
										<?php echo $info->year ?>
										<input type="hidden" name="<?php echo $info->id ?>" value="1234">
									</td>
									<td><?php echo $info->title ?></td>
									<td><a class="" href="<?php echo site_url( 'site-admin/project_list/project_list_edit/'.$info->id ) ?>">Edit</a></td>
									<td><a data-url="<?php echo site_url('site-admin/project_list/project_list_delete/'.$info->id) ?>" class="delete_data" href="javascript:;">Delete</a></td>
								</tr>
								
							<?php endforeach ?>


						</tbody>
					</table>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER-->


<script type="text/javascript" >

	var oTable = $('.table').dataTable();
	

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




</script>