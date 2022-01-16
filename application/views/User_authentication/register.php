<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/register.css'); ?>">
</head>
<body>
<?php  echo form_open("Control/register_auth", array(
    "method" => "post",
    "enctype" => "multipart/form-data")); ?>
    <div class="wrapper">
            <div class="logo">
                <h3 class="title">Create an Account</h3>
            </div>
        <div class="form">
            <div class="sideblue">

            </div>
            <div class="upcs">
                    <div id="div2" class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" value="<?php echo set_value("username_txt") ?>" name="username_txt" placeholder="Enter username">
                        <?php  echo form_error("username_txt","<div class='error'>","</div>"); ?>

                    </div>
                    <div id="div2" class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control" value="<?php echo set_value("password1_txt") ?>" name="password1_txt" id="exampleInputPassword1" placeholder="Enter password">
                        <?php  echo form_error("password1_txt","<div class='error'>","</div>"); ?>
                    </div>
                    <div id="div2" class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control" name="password2_txt" value="<?php echo set_value("password2_txt") ?>" id="exampleInputPassword1" placeholder="Confirm your password">
                        <?php  echo form_error("password2_txt","<div class='error'>","</div>"); ?>
                    </div>
                    <?php if($this->session->flashdata("not_equal")) { 
                    ?>
                    <div class="error">
                        <?php echo $this->session->flashdata("not_equal") ?>
                    </div>
                    <?php 
                    }
                    ?>

                    <button id="signup" type="submit" class="btn btn-primary">Sign Up</button>
                    <?php echo form_close(); ?>
                   
                    
             </div>
        </div>
    </div>
</body>
</html>