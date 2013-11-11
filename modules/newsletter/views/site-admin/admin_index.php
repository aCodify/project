<!-- BEGIN PAGE CONTAINER-->            
<div class="container-fluid before_show_log">
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <h4><i class="icon-edit"></i>Newsletter Data Table</h4>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Date Add</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ( $data_list as $key => $value ): ?>
                                
                            <tr class="">
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $retVal = ( ! empty( $value->start_date ) ) ? getDateFull($value->start_date) : 'No time' ; ?></td>
                                <td><a data-url="<?php echo site_url( 'site-admin/newsletter/newsletter_delete/'.$value->id ) ?>" class="delete_data" href="javascript:;">Delete</a></td>
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
    

    var oTable = $('.table').dataTable( {
                                "aoColumns": [
                                    { "sWidth": "20%" },
                                    { "sWidth": "10%" },
                                    { "sWidth": "1%" }
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