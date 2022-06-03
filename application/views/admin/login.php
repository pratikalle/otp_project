<html>
    <head>
        <title>Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    <div class="col-md-12">
		<div class="form_main">
            <h4 class="heading"><strong>Quick </strong> Contact <span></span></h4>
            <div class="form">
                <form  id="login_form" name="login_form" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="Please input your Username" value="" name="uname" class="txt">
                    <input type="password" placeholder="Please input your Password" value="" name="password" class="txt">
                    <input type="submit" value="submit" name="submit_data" id="submit_data" class="txt2">
                    <br>
                    <span id="login_msg"></span>
                </form>
            </div>
            </div>
        </div>
	</div>
</div>
<script>
$( document ).ready(function() {
    
    $("form#login_form").submit(function(e){
        e.preventDefault();
        var data = new FormData($("#login_form")[0]);
        $.ajax({
            type:'post',
            dataType:'json',
            processData: false,
            cache: false,
            contentType: false,
            url:"<?php echo base_url('admin/login/validate_login'); ?>",
            data: data,
            beforeSend: function() {
                $("#login_msg").html('');
                $('#submit_data').prop("disabled",true);
            },
            success: function(response){
                $('#submit_data').prop("disabled",false);
                $("#login_msg").html(response.msg);
                
                if(response.status == 200)
                window.location.href="<?php echo base_url('admin/dashboard');  ?>";
            }
        });
        
    });
});
</script>
    </body>
</html>