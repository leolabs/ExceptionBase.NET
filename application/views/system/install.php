<?php
/**
 * Created by Leo Bernard. More at leolabs.org
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Installation - ExceptionBase.NET</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="<?php echo base_url() ?>res/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 20px;
            padding-bottom: 40px;
        }

            /* Custom container */
        .container-narrow {
            margin: 0 auto;
            max-width: 700px;
        }
        .container-narrow > hr {
            margin: 30px 0;
        }

            /* Main marketing message and sign up button */
        .jumbotron {
            margin: 30px 0;
            text-align: center;
        }
        .jumbotron h1 {
            font-size: 72px;
            line-height: 1;
            margin-bottom: 32px;
        }
        .jumbotron .btn {
            font-size: 21px;
            padding: 14px 24px;
        }

            /* Supporting marketing content */
        .marketing {
            margin: 60px 0;
        }
        .marketing p + h4 {
            margin-top: 28px;
        }
    </style>
    <link href="<?php echo base_url() ?>res/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
    <div class="container-narrow">

        <div class="masthead">
            <h3 class="muted" style="display: inline-block; margin-bottom: 0">Install ExceptionBase.NET</h3>

            <h4 class="pull-right muted hidden-phone" style="display: inline-block; margin-top: 20px; margin-bottom: 0;">Step <?php echo $step; ?> of <?php echo $maxstep; ?></h4>
        </div>

        <hr>

        <div class="jumbotron">
            <h1 class="hidden-phone">ExceptionBase.NET</h1>
            <?php switch($step){case 1: ?>
                <p class="lead">Welcome to ExceptionBase.NET! Before you can log in, we'll have to set some things up.
                    In just a few steps you'll be able to track, manage and fix exceptions more easily. Let's begin
                    with the database connection. Please enter your database details in the form and we'll test
                    if the connection works</p>

                <div class="alert alert-block alert-error" id="dbConnFail" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Couldn't connect to the database</h4>
                    <p>For some reason I couldn't connect to your database. Please check the data you entered,
                        maybe there's a typo somewhere in there.</p>
                </div>

                <div class="alert alert-block alert-error" id="dbSiteFail" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Couldn't connect to the site</h4>
                    <p>For some reason I couldn't connect to myself. Please try reloading this page, maybe it'll work
                        then. If that doesn't work, please see the manual on how to create the configuration files
                        manually and come back when you're done.</p>
                </div>

                <div class="alert alert-block alert-error" id="conDataMissing" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Some fields are missing</h4>
                    <p>Please check that you've entered everything into the fields and try again.</p>
                </div>

                <div class="alert alert-block alert-error" id="conCreateFail" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>The configuration file could not be created</h4>
                    <p>Please make sure that I have write access to the config folder. If that doesn't work,
                        please see the manual on how to create the configuration files
                        manually and come back when you're done.</p>
                </div>

                <div class="alert alert-block alert-success" id="dbSuccess" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>That looks good</h4>
                    <p>I could successfully connect to your database. In the next step, I'm going to create all the
                        configuration files and setup the database. Please click on the button to continue.</p>
                </div>

                <form id="dbForm" class="well" action="<?php echo site_url('/install/installSetupConfig'); ?>" method="post">
                    <div class="row-fluid">
                        <div class="span6 control-group">
                            <label for="databaseAddress">Database Address:</label>
                            <input type="text" class="input-block-level" id="databaseAddress" name="host" placeholder="e.g. 'localhost' or 'mysql.test.com'">
                        </div>

                        <div class="span6 control-group">
                            <label for="databaseName">Database Name:</label>
                            <input type="text" class="input-block-level" id="databaseName" name="name" placeholder="The name of your database">
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span6 control-group" style="margin-bottom: 0">
                            <label for="databaseUser">Database User:</label>
                            <input type="text" class="input-block-level" id="databaseUser" name="user" placeholder="Your database user">
                        </div>

                        <div class="span6 control-group" style="margin-bottom: 0">
                            <label for="databasePass">Database Password:</label>
                            <input type="password" class="input-block-level" id="databasePass" name="pass" placeholder="Your password">
                        </div>
                    </div>
                </form>
                <a class="btn btn-large btn-success" id="testDBConnection" href="#">Test database connection</a>

            <?php break; case 2: ?>
                <p class="lead">Now that I have successfully setup your database, there's just one more thing to do.
                    Please enter your desired login info into the form below. You'll be able to create more users once
                    you're logged in.</p>

                <div class="alert alert-block alert-success" id="userSuccess" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Everything's done!</h4>
                    <p>ExceptionBase.NET is now completely configured! Now you can log in and register your first
                        application. Just go ahead and click on the button to get to the login screen. If you've got
                        any questions, you can take a look in the <a href="http://exceptionbase.net/manual/">
                            ExceptionBase.NET manual</a></p>
                </div>

                <div class="alert alert-block alert-error" id="userSysFail" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Please fill out all fields correctly</h4>
                    <p>It seems like there are some fields that aren't filled out correctly. Please check if you've
                        filled out everything and try it again.</p>
                </div>

                <div class="alert alert-block alert-error" id="userFail" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Looks like something went wrong</h4>
                    <p>Something went wrong when I tried to create your user. Please try reloading this page and enter
                        your data again. If that doesn't work, please read the manual on how to create a user manually.</p>
                </div>

                <form id="userForm" class="well">
                    <div class="row-fluid">
                        <div class="span6 control-group" style="margin-bottom: 0">
                            <label for="databaseUser">Username:</label>
                            <input type="text" class="input-block-level" id="userName" name="user" placeholder="Your database user">
                        </div>

                        <div class="span6 control-group" style="margin-bottom: 0">
                            <label for="databasePass">E-mail address:</label>
                            <input type="email" class="input-block-level" id="userMail" name="mail" placeholder="Your password">
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span6 control-group" style="margin-bottom: 0">
                            <label for="databaseUser">Password:</label>
                            <input type="password" class="input-block-level" id="userPass" name="pass" placeholder="Your desired password">
                        </div>

                        <div class="span6 control-group" style="margin-bottom: 0">
                            <label for="databasePass">Repeat:</label>
                            <input type="password" class="input-block-level" id="userRePass" name="repass" placeholder="Repeat your password">
                        </div>
                    </div>
                </form>

                <a class="btn btn-large btn-success" id="setupUser" href="#">Create user and finish installation &raquo;</a>
            <?php } ?>

        </div>

        <hr>

        <div class="footer">
            <p>&copy; leolabs.org 2012-<?php echo date('Y') ?></p>
        </div>

    </div> <!-- /container -->

    <script src="<?php echo base_url() ?>res/js/jquery.js"></script>
    <script>
        var successfullyConnected = false;
        var userCreated = false;

        $(document).ready(function(){
           var hashNum = document.location.href.split("#")[1];

            if(hashNum == "10"){
                $("#conDataMissing").fadeIn();
            }else if(hashNum == "20"){
                $("#dbConnFail").fadeIn();
            }else if(hashNum == "30"){
                $("#conCreateFail").fadeIn();
            }

            /* ========================================================
                  STEP 1 Code
               ======================================================== */

            $('#dbForm input').keyup(function(e){
                if(e.which == 13){
                    $("#testDBConnection").trigger('click');
                }
            });

            $('#testDBConnection').click(function(){
                if(!successfullyConnected){
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('/install/installCheckDBConnection'); ?>",
                        data: {host: $('#databaseAddress').val(), name: $('#databaseName').val(),
                            user: $('#databaseUser').val(), pass: $('#databasePass').val()}
                    }).done(function(msg){
                        if(msg == "1"){
                            $("#dbSuccess").fadeIn();
                            $("#testDBConnection").html("Setup Database &raquo;");
                            successfullyConnected = true;
                        }else{
                            $("#dbConnFail").fadeIn();
                        }
                    }).fail(function(msg){
                            $("#dbSiteFail").fadeIn();
                    });

                    return false;
                }else{
                    $("#dbForm").submit();
                }
            });

            /* ========================================================
                  STEP 2 Code
               ======================================================== */

            $('#userForm input').keyup(function(e){
                if(e.which == 13){
                    $("#setupUser").trigger('click');
                }
            });

            $("#setupUser").click(function(){
                if(!userCreated){
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('/install/createFirstUser'); ?>",
                        data: {user: $('#userName').val(), mail: $('#userMail').val(),
                            pass: $('#userPass').val(), repass: $('#userRePass').val()}
                    }).done(function(msg){
                        if(msg == "1"){
                            $("#userSuccess").fadeIn();
                            $("#userForm").slideUp();
                            $("#setupUser").html("Log in &raquo;");
                            userCreated = true;
                        }else if(msg == "2"){
                            $("#userSysFail").fadeIn();
                        }else{
                            $("#userFail").fadeIn();
                        }
                    }).fail(function(msg){
                            $("#userFail").fadeIn();
                    });
                }else{
                    document.location = "<?php echo site_url('/login/'); ?>";
                }
            });

            /* ========================================================
                  Alert boxes Code
               ======================================================== */

            $(".alert .close").click(function(){
                $(this).parent().fadeOut();
            });
        });
    </script>
</body>
</html>