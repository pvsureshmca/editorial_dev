<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">

    <title>Login</title>

    <!--Core CSS -->
    <link href="<?php echo base_url(); ?>assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" id="loginform" action="" method="post">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <div class="user-login-info">
               <input id="user_name" class="form-control" type="text" name="user_name" value="<?php echo set_value('user_name');?>" placeholder="User Name" autofocus required/>
  
 <input id="password" type="password" class="form-control"  name="password" value="" placeholder="Password"  required/>

            </div>
            <label class="checkbox">
                <input type="checkbox" id="remember_me" value="remember-me"> Remember me
                <span class="pull-right" id="forgetpass">
                    <a data-toggle="modal"  href="#myModal"> Forgot Password?</a>

                </span>
            </label>
           <button class="btn btn-lg btn-login btn-block" name="action" value="Signin" type="submit">Sign in</button>
      	<?php if($ErrorMessages!=''){ ?>
      	<div  style="clear:both; text-align:center; margin:15px 0 -5px; color:#C70505;">
                      <?php echo $ErrorMessages; ?>
        </div>
        <?php } ?>
        <?php if ($this->session->flashdata('forgotpasssuccess')!='') { ?>
      	<div  style="clear:both; text-align:center; margin:15px 0 -5px; color:#0BA90E;">
                      <?php echo $this->session->flashdata('forgotpasssuccess'); ?>
        </div>
        <?php } ?> 
            <!-- <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div> -->

        </div>
</form>
          <!-- Modal -->
         <form class="form-signin" id="loginform" action="" method="post"> 
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="email" class="form-control placeholder-no-fix" name="email" id="email" value="<?php echo set_value('password'); ?>"   placeholder="Email" autocomplete="off" required 
                            >
                          

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" name="action" value="ForgotPassword" type="submit" >Submit</button>
                      <?php if($ErrorMessagesFP!=''){ ?>
      	<div  style="clear:both; text-align:center; margin:15px 0 -5px; color:#C70505;">
                      <?php echo $ErrorMessagesFP; ?>
        </div>
        <?php } ?> 
         
        
        </div>
                     
                  </div>
              </div>
          </div> 
          </form>
          <!-- modal -->

     

    </div>





    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/bs3/js/bootstrap.min.js"></script>
    <?php if($ErrorMessagesFP!=''){ ?>
<script>
$('#forgetpass a').trigger('click');
</script>
<?php } ?> 

<script>
            $(function() {
 
            	if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember_me').attr('checked', 'checked');
                    $('#user_name').val(localStorage.usrname);
                    $('#password').val(localStorage.pass);
                } else {
                    $('#remember_me').removeAttr('checked');
                    $('#user_name').val('');
                    $('#password').val('');
                }
 
                $('#remember_me').click(function() {
 
                    if ($('#remember_me').is(':checked')) {
                        // save username and password
                        localStorage.usrname = $('#user_name').val();
                        localStorage.pass = $('#password').val();
                        localStorage.chkbx = $('#remember_me').val();
                    } else {
                        localStorage.usrname = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }
                });
            });
 
        </script>
  </body>
</html>



