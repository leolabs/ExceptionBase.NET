<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */
?>

<html lang="en"><head>
    <meta charset="utf-8">
    <title>Sign in - ExceptionBase.NET</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php echo base_url(); ?>res/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #f5f5f5;
        }

        .container {
            margin-top: 80px;
            margin-bottom: 40px;
        }

        .banner {
            text-align: center;
            margin-bottom: 80px;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

    </style>
    <link href="<?php echo base_url(); ?>res/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <div class="banner hidden-phone"><h1>ExceptionBase.NET</h1></div>

    <form class="form-signin" action="<?php echo site_url('/login/check/'); ?>" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php if(isset($tryAgain)){ ?>
            <div class="alert alert-error">
                <strong>Error:</strong> Wrong username or password. Please try again with correct login data.
            </div>
        <?php } ?>
        <input type="text" class="input-block-level" name="user" placeholder="Username">
        <input type="password" class="input-block-level" name="pass" placeholder="Password">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
    </form>

</div>
</body></html>