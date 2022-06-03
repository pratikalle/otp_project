<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<!-- <div class="container">
<h2 style="text-align : center">Login</h2>
  <form id="generate_otp_form">
      
    <div class="mb-3">
      <label for="mobile" class="form-label">Mobile Number</label>
      <input type="text" class="form-control" id="mobile" name="mobile" maxlength= "10">
    </div>
      <button type="submit" name="send_otp" id="send_otp" onclick="generate_otp()" class="btn btn-primary">Send OTP</button>
    
  </form>
</div>


</div> -->
<div class="container">
  <form id="generate_otp_form" >
    <div class="mb-3">
      <label for="mobile" class="form-label">Mobile Number</label>
      <input type="text" class="form-control" id="mobile" name="mobile" maxlength= "10">
    </div>
    <button type="submit" name="login" id="login" onclick="generate_otp();" class="btn btn-primary">Send OTP</button>
  </form>
</div>


<script>
    
    $( document ).ready(function() {
    
    $("form#generate_otp_form").submit(function(e){
        alert('in');
        e.preventDefault();
        var form_data = new FormData($("#generate_otp_form")[0]);
        $.ajax({
            ...ajax_defaults_formdata,
            url:"<?php echo base_url('login/send_otp'); ?>",
            data: form_data,
            beforeSend: function() {
                
            },
            success: function(response){
                if(response.status == 200)
                {
                    alert(response.msg);
                }
                else
                {
                  alert(response.msg);
                }
            }
        });
    });
});
</script>
</body>
</html>