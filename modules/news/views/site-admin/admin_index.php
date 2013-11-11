<?php echo $form_status = ( ! empty( $form_status ) ) ? $form_status : '' ; ?>
<!-- BEGIN PAGE CONTAINER-->			
<div class="container-fluid before_show_log">
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box blue">
				<div class="portlet-title">
					<h4><i class="icon-edit"></i>News&Promotion Data Table</h4>

				</div>

	            <?php $attributes = array( 'class' => 'form-horizontal' ); ?>
				<?php echo form_open( '', $attributes); ?>

				<div class="portlet-body">
					<div class="clearfix">
						<div class="btn-group">
							<a class="btn green" href="<?php echo site_url('site-admin/news/news_add') ?>"> 
								Add New <i class="icon-plus"></i>
							</a>

							<!-- <button name="mark_sort" value="sort" type="submit" style="display:none" class="btn red mark_sort" > 
								Mark Sort <i class="icon-plus"></i>
							</button> -->
						</div>
					</div>
					<table class="table table-striped table-hover table-bordered" id="">
						<thead>
							<tr>
                                <th>Cover image</th>
                                <th>Title Name</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>hilight</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $data_list as $key => $value ): ?>
								
								<tr class="">

									<th class='list_cover'>

										<?php if ( $value->select_cover == 1 ): ?>
											
											<div class="main_c">
												<div class="tn_c">
											        <a >
											            <img title="" alt="" src="<?php echo base_url( $value->data_cover ) ?>" />
											        </a>
											    </div>
											</div>	
											<img class="logo_list_show" src="<?php echo $this->theme_path.'image/image.png' ?>" alt="">

										<?php else: ?>

											<?php $json = json_decode(file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$value->data_cover."?v=2&alt=jsonc")); ?>
											
											<div class="main_c">
												<div class="tn_c">
											        <a >
											            <img title="" alt="" src="<?php echo $json->data->thumbnail->sqDefault ?>" />
											        </a>
											    </div>
											</div>	
											<img class="logo_list_show" src="<?php echo $this->theme_path.'image/youtube.png' ?>" alt="">

										<?php endif ?>

									</th>
									<td>
										<?php echo $value->title ?>
									</td>
									<td>
										<?php echo date( 'd-m-Y' , $value->date ) ?>
									</td>
									<td>
										<?php echo $retVal = ( $value->type == 1 ) ? 'Promotion' : 'News' ; ?>
									</td>
									<td>
										<?php $retVal = ( $value->highlight == 1 ) ? 'ON' : 'OFF' ; ?>
										<b class="<?php echo $retVal; ?>" >
											<?php echo $retVal; ?>
										</b>
									</td>
									<th>
										<?php $retVal = ( $value->status == 1 ) ? 'ON' : 'OFF' ; ?>
										<b class="<?php echo $retVal; ?>" >
											<?php echo $retVal; ?>
										</b>
									</th>
									<td>
										<a class="" href="<?php echo site_url('site-admin/news/news_edit/'.$value->id) ?>">Edit</a>
									</td>
									<td><a data-url="<?php echo site_url( 'site-admin/news/news_delete/'.$value->id ) ?>" class="delete_data" href="javascript:;">Delete</a></td>

								</tr><!-- end tr -->

							<?php endforeach ?>
						</tbody>
					</table>
				</div>

				<?php echo form_close(); ?>

			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER-->


<script type="text/javascript" >

	// window.data_change = true;

	// $('.mark_sort').click(function(event) {
	// 	window.data_change = false;
	// });
	
	$(document).ready(function() {

		// $('.table-bordered').tableDnD({
		// 	onDragStart: function(table, row) {
		// 	    	$('.mark_sort').show();
		// 	    },
		// 	    dragHandle: ".dragHandle"
		// });


	});


	var oTable =  $('.table').dataTable( {
						    "aoColumns": [
						        { "sWidth": "12%" },
						        { "sWidth": "45%" },
						        { "sWidth": "7%" },
						        { "sWidth": "6%" },
						        { "sWidth": "7%" },
						        { "sWidth": "7%" },
						        { "sWidth": "7%" },
						        { "sWidth": "6%" }
						    ],
						"aaSorting": [[ 2, "desc" ]]
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
                    $('.before_show_log').before( html );    
                }
                else
                {
                    alert("Deleted Error ! , Please try again.");
                }


            }
        });

    });  

	// function beforeUnload( e )
	// {
	// 	if ( window.data_change ) 
	// 	{
	// 		var this_change = $('.mark_sort').css('display');
	// 		if ( this_change != 'none' ) 
	// 		{
	//             return e.returnValue = "You will lose the changes made in the editor.";
	// 		}
	// 	}

	// }

	// if ( window.addEventListener )
	// {
	//     window.addEventListener( 'beforeunload', beforeUnload, false );
	// }
	// else
	// {
	//     window.attachEvent( 'onbeforeunload', beforeUnload );
	// }





</script>