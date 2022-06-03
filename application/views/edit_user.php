<html>
    <head>
        <title>Edit User</title>
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
            <h4 class="heading"><strong>Edit User </strong> </h4>
            <div class="form">
                <form  id="edit_form" name="edit_form" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="<?php echo $user_data['id'];?>">
                    <label class="" style="margin-top:10px;">Name :</label>
                    <input type="text" placeholder="Please input your Name" value="<?php echo $user_data['name'];?>" name="name" id="name"><br>
                    <label class="" style="margin-top:10px;">Email :</label>
                    <input type="email" placeholder="Please input your Email" value="<?php echo $user_data['email'];?>" name="email" id="email"><br>
                    <label class="" style="margin-top:10px;">Mobile Number :</label>
                    <input type="number" placeholder="Please input your Number" value="<?php echo $user_data['phone'];?>" name="number" id="number"><br>
                    <label class="" style="margin-top:10px;">Address :</label>
                    <input type="text" placeholder="Please input your Address" value="<?php echo $user_data['address'];?>" name="address" id="address"><br>
                    <label class="" style="margin-top:10px;">Profile Picture (optional):</label>
                    <input type="file"  value="" name="profile_pic" class="" style="margin-top:10px;"><br>
                    
                    <input type="submit" value="submit" name="submit_data" id="submit_data">
                    <br>
                    <span id="register_msg"></span>
                </form>
            </div>
            </div>
        </div>
	</div>
</div>
<script>
$(function(){
    
    $("form#edit_form").submit(function(e){
        //alert('in');
        e.preventDefault();
        var data = new FormData($("#edit_form")[0]);
        $.ajax({
            type:'post',
            dataType:'json',
            url:"http://localhost/codeigniter/register/update_register_data", 
            data: data,
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: function() {
                
            },
            success: function(response){
                $('#submit_data').prop("disabled",false);
                $("#register_msg").html(response.msg);
                
                if(response.status == 200)
                {
                 window.location.href = "http://localhost/codeigniter/listing";
                }
                
            }
        });
        
    });
});
</script>
    </body>
</html>