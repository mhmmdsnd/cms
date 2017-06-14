<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#regForm").validate({
            rules: {
                memberName: {
                    required:true
                },
                memberPass : {
                    required:true,
                    minlength:4
                },
                memberPass2 : {
                    required: true,
                    equalTo: "#memberPass"
                }
            },
            messages : {
                memberName : {
                    required : " Insert Loginname."
                },memberPass : {
                    required : " Insert Password.",
                    minlength : " Password is too short."
                },
                memberPass2 : {
                    required : " Repeat Password.",
                    equalTo : " Password is not match."
                }
            }
        });
    });
</script>
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />
<title>Registration Form</title>
<body>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Sign-up</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form id="regForm" method="post">
                        <div class="form-group">
                            <label>User Name :</label>
                            <input name="memberName" id="memberName" class="form-control" type="text" size="30" /><br>
                            <label>First Name :</label>
                            <input name="memberFName" id="memberFName" class="form-control" type="text" size="30" /><br>
                            <label>Last Name :</label>
                            <input name="memberLName" id="memberLName" class="form-control" type="text" size="30" /><br>
                            <label>Email :</label>
                            <input name="memberEmail" id="memberEmail" class="form-control" type="text" size="30" /><br>
                            <label>Password :</label>
                            <input name="memberPass" id="memberPass" class="form-control" type="password" size="30" /><br>
                            <label>Re-type Password :</label>
                            <input name="memberPass2" id="memberPass2" class="form-control" type="password" size="30" /><br>
                            <label>Phone :</label>
                            <input name="memberPhone" id="memberPhone" class="form-control" type="text" size="30" /><br>
                            <label>Address :</label>
                            <textarea name="memberAddress" id="memberAddress" class="form-control" /></textarea><br>
                            <input type="submit" id="register" name="register" class="btn btn-primary" value="Sign Up" />
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>