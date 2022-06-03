<html>
    <head>
        <title>Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" >
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <style type="text/css">
            form_main {
                width: 100%;
            }
            .form_main h4 {
                font-family: roboto;
                font-size: 20px;
                font-weight: 300;
                margin-bottom: 15px;
                margin-top: 20px;
                text-transform: uppercase;
            }
            .heading {
                border-bottom: 1px solid #fcab0e;
                padding-bottom: 9px;
                position: relative;
            }
            .heading span {
                background: #9e6600 none repeat scroll 0 0;
                bottom: -2px;
                height: 3px;
                left: 0;
                position: absolute;
                width: 75px;
            }   
            .form {
                border-radius: 7px;
                padding: 6px;
            }
            .txt[type="text"] {
                border: 1px solid #ccc;
                margin: 10px 0;
                padding: 10px 0 10px 5px;
                width: 100%;
            }
            .txt_3[type="text"] {
                margin: 10px 0 0;
                padding: 10px 0 10px 5px;
                width: 100%;
            }
            .txt2[type="submit"] {
                background: #242424 none repeat scroll 0 0;
                border: 1px solid #4f5c04;
                border-radius: 25px;
                color: #fff;
                font-size: 16px;
                font-style: normal;
                line-height: 35px;
                margin: 10px 0;
                padding: 0;
                text-transform: uppercase;
                width: 30%;
            }
            .txt2:hover {
                background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                color: #5793ef;
                transition: all 0.5s ease 0s;
            }

        </style>
    </head>
    <body>
    <div class="container">
	<div class="row">
    <a href='<?php echo base_url(); ?>admin/dashboard/export_overall_user_details' style='height:31px;' id='download_csv_link' class='btn-sm btn-success float-right'>Download Csv</a>
    <table id="user_details" class="table table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email ID</th>
                <th>DOB</th>
                <th>Profile Picture</th>
                <th>Action</th>
            </tr>
        </thead>
    <tbody>
    </tbody>
</table>
</div>
<script>
			
		var colindx;
			$(function()
			{
			    var colindx;
				colindx = $('#user_details').DataTable(
				{
					dom: 'Bf<"clear"><"top"ip<"clear">>rt<"bottom"ip<"clear">>',
					"ordering":false,
					fixedHeader: true,
					buttons: 
					[
						{
							extend: 'colvis',
							text: 'Show/Hide Columns'
						}
					],
					"pageLength": 10,
					"processing": true,
					
					"serverSide": true,
					"ajax": 
					{
					    url: "<?php echo base_url('admin/dashboard/get_overall_user_datatable'); ?>",
						type: "post"
					}
				});
				
			

			});
			
			

		</script>
    </body>
</html>