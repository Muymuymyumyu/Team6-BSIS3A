<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css'); ?>">
</head>
<body>
    <?php  echo form_open("Control/login_validations", array(
        "method" => "post",
        "enctype" => "multipart/form-data")); ?>

    <div class="form">
        <div class="logo">
            <div class="webname">
                <h3 class="webname1">ICU Locator</h3>
            </div>
        </div>
            <div class="uplc"> 
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Username</label>
                    <i class="fa fa-user"></i> 
                        <input type="text"  class="form-control" name="username_txt" placeholder="Enter username" value="<?php echo set_value('username_txt') ?>">
                        <?php  echo form_error("username_txt","<div class='error'>","</div>"); ?>
                    

                </div>
                    <div id="div1" class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control"  name="password_txt" id="exampleInputPassword1" placeholder="Enter password" value="<?php echo set_value('password_txt') ?>">
                        <?php  echo form_error("password_txt","<div class='error'>","</div>"); ?>
                    </div>
                        <?php if($this->session->flashdata("wrong")) { 
                    ?>
                    <div class="error">
                        <?php echo $this->session->flashdata("wrong") ?>
                    </div>
                    <?php 
                    }
                    ?>

                    <?php if($this->session->flashdata("registered")) { 
                    ?>
                    <div class="success">
                        <?php echo $this->session->flashdata("registered") ?>
                    </div>
                    <?php 
                    }
                    ?>

                    <button id="login" type="submit" class="btn btn-primary">Login</button>
                    <?php echo form_close(); ?>
                    <div id="div1">
                        <!-- <span>No account yet?</span> -->
                        <a class="create" href= "<?php echo site_url("Control/register") ?>" > Create an Account </a>
                    </div>
            </div> 
                <div class="sideblue">

                </div>

        
    </div>
</body>
</html>