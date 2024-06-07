<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo __('Admin Login'); ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo asset('public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo asset('public/backend/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo asset('public/backend/bower_components/Ionicons/css/ionicons.min.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo asset('public/backend/dist/css/AdminLTE.min.css'); ?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo asset('public/backend/plugins/iCheck/square/blue.css'); ?>">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page" style="
    background-image: url(public/profile_picture/bgold.jpg); background-size: cover;">
       
        <div class="login-box">
            <div class="login-logo">
                <a><b><?php echo __('PAY HOURS'); ?></b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg"><?php echo __('Sign in to start your session'); ?></p>
                <form action="<?php echo route('login'); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="form-group<?php echo $errors->has('email') ? ' has-error' : ''; ?> has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="<?php echo __('email'); ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo $errors->first('email'); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?php echo $errors->has('password') ? ' has-error' : ''; ?> has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="<?php echo __('Password'); ?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo $errors->first('password'); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-5" style="margin-left: 29%;">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo __('Login'); ?></button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery 3 -->
        <script src="<?php echo asset('public/backend/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo asset('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
        <!-- iCheck -->
        <script src="<?php echo asset('public/backend/plugins/iCheck/icheck.min.js'); ?>"></script>
        <script>
        $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
        });
        });
        </script>
    </body>
</html>