<html>
<head>
<title>Verify OTP</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>

<div class="container">
  <form method="post" action="<?php echo base_url('login/verify_otp') ?>">
    <div class="mb-3">
      <label for="mobile" class="form-label">Enter OTP</label>
      <input type="hidden" name="mobile" value="<?php echo $mobile; ?>"  />
      <input type="text" class="form-control" id="otp" name="otp">
    </div>
    <button type="submit" name="verify" id="verify" onclick="" class="btn btn-primary">Verify</button>
  </form>
</div>
</body>
</html>