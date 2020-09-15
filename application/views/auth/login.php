<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">
</head>

<body>
    <div class="container" style="center">
        <div class="login-form">
            <h1><?php //echo lang('login_heading'); ?></h1>
            <p><?php //echo lang('login_subheading'); ?></p>
            <div class="text-center">
                <img alt="" width="100" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg">
            </div>

            <div id="infoMessage" style="text-align: center;"><?php echo $message;?></div>
            <?php echo form_open("auth/login");?>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <?php echo form_input($identity);?>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <?php echo form_input($password);?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_submit('submit', lang('login_submit_btn'),['class'=>'btn btn-primary login-btn btn-block'],['style'=>'background-color: #882828;']);?>
            </div>

            <div class="clearfix">
            Don't have an account? <a href="<?php echo base_url('registration');?>" class="pull-right">sign up</a>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</body>

</html>