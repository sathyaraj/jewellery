<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tourpal | Admin</title>
       
      <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/home.css'?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/formvalidation/formValidation.min.css'?>">
        
        <!-- Favicon and touch icons --
        <link rel="shortcut icon" href="form-1/assets/ico/favicon.png">------>
    
</head>
<body class="md-home">
<div class="grandParentContaniner">
<div class="parentContainer">
<div id="container">
    <h1 class="md-title">Tourpal Super Administrator</h1>

    <div class="login-form">
    <form action="" method="post" id="admin_login">
        <div class="avatar"><i class="fa fa-user"></i>
            <!--<img src="/examples/images/avatar.png" alt="Avatar">-->
        </div>
        <h2 class="text-center">Admin Login</h2>   
        <div class="form-group col-md-12 p-0">
            <input type="text" class="form-control" autocomplete="off" name="username" placeholder="Username" >
        </div>
        <div class="form-group col-md-12 p-0">
            <input type="password" class="form-control" autocomplete="off" name="password" placeholder="Password" >
        </div>        
        <div class="form-group col-md-12 p-0">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </div>
        <div class="clearfix">
           <!--- <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>--->
        </div>
        <div class="suc">
            <p >Login Success</p>
        </div>  
        <div class="err">
            <p ><?php 
            echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
                ?> </p>
        </div> 
    </form>
</div>
</div>
</div>
</div>
<!-----<div id="container">
    <h1 class="md-title">Tourpal Administration</h1>

    <div class="login-form">
    <form action="php" method="post">
        <div class="avatar"><i class="fa fa-user"></i>
            <!--<img src="/examples/images/avatar.png" alt="Avatar">--
        </div>
        <h2 class="text-center">Admin Login</h2>   
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href='<?php echo base_url(); ?>index.php/login';" >Sign in</button>
        </div>
        <div class="clearfix">
           <!--- <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>---
        </div>
    </form>
    
</div>

    
</div>-------->



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

     $('#admin_login')
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
          url:"<?=base_url('home/admin_login_check') ?>",
          method:"POST",
          data:new FormData(this),
          cache: false,
          contentType: false,
          processData: false,
          success:function(data){
            
            if (data.response=="success") {
              $('.err').css('display','none');
              $('.suc').css('display','block');
            
              setTimeout(function() { window.location.href= '<?=base_url('admin')?>' },1500);

            }
            else{
                
              $('.err').css('display','block');
              setTimeout(function() { window.location.href= '<?=base_url('home/admin_login')?>' },3500);
           }
           
            }
        });
    });
           
  });
</script>

</body>
</html>