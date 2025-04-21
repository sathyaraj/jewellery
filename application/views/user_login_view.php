<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>JEWELLERY</title>
       
      <!-- CSS -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/home.css'?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/formvalidation/formValidation.min.css'?>">
		
		<!-- Favicon and touch icons --
        <link rel="shortcut icon" href="form-1/assets/ico/favicon.png">------>
	
</head>
<body class="md-admin">
<div class="grandParentContaniner col-md-12">
<div class="parentContainer">
<div id="container" >

	
<div class="row">
<div class="col-md-8 col-md-offset-4 col-sm-10 col-sm-offset-1">
<div class="row">
 <div class="col-md-6">
 <h1 align="center" style="color:#e9ce12">GOLD JEWELLERY</h1>
  <div class="userlogin-form">
    <form action="<?php echo base_url('product/login'); ?>" method="post" id="insert_form">
        <h3 class="mdad-title text-center">User Log in</h3>       
        <div class="form-group col-md-12">
          
            <input type="email" name="username" class="form-control" placeholder="Username" >
          
        </div>
        <div class="form-group col-md-12">
          
            <input type="password" name="password" class="form-control" placeholder="Password" >
          
        </div>
        <div class="form-group col-md-12">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" 
       value="<?php echo $this->security->get_csrf_hash(); ?>" />
            <button type="submit" class="btn btn-default btn-co-purple btn-block"  >Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline" style="color:#fff;"><input type="checkbox" > Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div> 
        <div class="suc">
            <p >Login Success</p>
        </div>  
        <div class="err">
            <p >Username and  Password Invalid</p>
        </div>       
    </form>
   
</div>
  </div>

  </div>
  </div>
 
</div>



</div>

  
</div>

	
</div>
</div>
</div>




<!---footer scripts--------->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/formvalidation/formValidation.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/formvalidation/bootstrap.min.js'?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    
   var username = {
            row: '.col-md-12',   // The title is placed inside a <div class="col-xs-4"> element
            validators: {
                notEmpty: {
                    message: 'Username is required'
                }
            }
        },password = {
            row: '.col-md-12',   // The title is placed inside a <div class="col-xs-4"> element
            validators: {
                notEmpty: {
                    message: 'password is required'
                }
            }
        }
    
       
        bookIndex = 0;

     $('#insert_form')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
        'username':username,
        'password':password
                
            }
        })

        .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            $.ajax({
          url:"<?=base_url('home/user_login');?>",
          method:"POST",
          data:new FormData(this),
          cache: false,
          contentType: false,
          processData: false,
          success:function(result){
            if (result.response =="success") {
              $('.err').css('display','none');
              $('.suc').css('display','block');
              //window.location.href = '<?=base_url('User_dash')?>';
             setTimeout(function() { window.location.href= '<?=base_url("Product/index")?>' },1500);

            }
            else{
              $('.err').css('display','block');
             setTimeout(function() { window.location.href= '<?=base_url()?>' },3500);
           }
           
            }
        });
    });  
  });
</script>
</body>
</html>