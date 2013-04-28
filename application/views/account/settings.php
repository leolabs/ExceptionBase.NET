<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

$userLevels = array(
    'Guest',
    'Moderator',
    'Manager',
    'Co-Administrator',
    'Administrator'
)
?>

<div class="span9">
    <div class="page-header">
        <h1>Edit Profile <small><?php echo $user['Username'] . ' -  ' . $userLevels[$user['UserLevel']]; ?></small></h1>
    </div>

    <div class="well">
        <h2>Your information</h2>
        <p>These information are needed if you want to access ExceptionBase.NET via its API. Please keep these keys secure
            don't show them to anybody as it would allow them to gain access to the database. If your password
            or your level changes, your API key will also change to keep everything secure.</p>

        <div class="row-fluid">
            <div class="control-group span8">
                <label for="accountID">Your API key</label>
                <input class="input-block-level" id="accountID" value="<?php echo $custom['apikey']; ?>" disabled type="text">
            </div>

            <div class="control-group span2">
                <label for="accountID">Your ID</label>
                <input class="input-block-level" id="accountID" value="<?php echo $user['ID']; ?>" disabled type="text">
            </div>

            <div class="control-group span2">
                <label for="accountID">Your Level</label>
                <input class="input-block-level" id="accountID" value="<?php echo $user['UserLevel']; ?>" disabled type="text">
            </div>
        </div>
    </div>

    <div class="well">
        <div class="alert alert-block alert-error" id="changeUserdataError" style="display: none;">
            <button type="button" class="close">&times;</button>
            Your userdata could not be changed for some reason. Maybe you're not logged in or something else went wrong.
            Please reload this page and try to change your userdata again. Hopefully it'll work then...
        </div>

        <div class="alert alert-block alert-success" id="changeUserdataSuccess" style="display: none;">
            <button type="button" class="close">&times;</button>
            Your userdata has been successfully changed. Please log out and log in again for them to take effect.
        </div>

        <h2>Change username and E-mail address</h2>
        <p>If you want to change your username that's used to log in to ExceptionBase.NET, or your E-mail address
            that can be used to contact you in some cases, you can do it in the form below.</p>

        <form id="changeUserdata">
            <div class="row-fluid">
                <div class="control-group span6">
                    <label for="newUsername">Change your username</label>
                    <input class="input-block-level" id="newUsername" name="newUsername" placeholder="Your new username" value="<?php echo $user['Username']; ?>" type="text">
                </div>

                <div class="control-group span6">
                    <label for="newMail">Change your E-mail address</label>
                    <input class="input-block-level" id="newMail" name="newMail" placeholder="Your new E-mail address" value="<?php echo $user['Mail']; ?>" type="email">
                </div>
            </div>

            <button type="submit" id="btnchangeUserdata" class="btn btn-primary">Save changes</button>
        </form>
    </div>

    <div class="well">
        <div class="alert alert-block alert-error" id="changePwdError" style="display: none;">
            <button type="button" class="close">&times;</button>
            The password could not be changed for some reason. Maybe you're not logged in or something else went wrong.
            Please reload this page and try to change your password again. Hopefully it'll work then...
        </div>

        <div class="alert alert-block alert-success" id="changePwdSuccess" style="display: none;">
            <button type="button" class="close">&times;</button>
            Your password has been successfully changed. You have to use it the next time you log in to ExceptionBase.NET.
        </div>

        <h2>Change password</h2>
        <p>If you want to change your password for whatever reason, you can do so in the form below.</p>

        <form id="changePassword">
            <div class="row-fluid">
                <div class="control-group span4">
                    <label for="oldPassword">1. Your old password</label>
                    <input class="input-block-level" placeholder="Your old password" name="oldPassword" id="oldPassword" type="password">
                </div>
                <div class="control-group span4">
                    <label for="newPassword">2. Your new password</label>
                    <input class="input-block-level" placeholder="Your new password" name="newPassword" id="newPassword" type="password">
                </div>
                <div class="control-group span4">
                    <label for="rePassword">3. Repeat it</label>
                    <input class="input-block-level" placeholder="Your new password again" name="rePassword" id="rePassword" type="password">
                </div>
            </div>

            <button type="submit" id="changePwd" class="btn btn-primary">Change password</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $("#btnchangeUserdata").click(function(){
                var request = $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('/api/changeUserdata'); ?>",
                    data: {newUsername: $('#newUsername').val(), newMail: $('#newMail').val()}
                });

                request.done(function(msg){
                    $('#changeUserdata .control-group').removeClass('error');

                    switch(msg){
                        case "user":
                            $("#newUsername").parent().addClass('error');
                            break;
                        case "mail":
                            $("#newMail").parent().addClass('error');
                            break;
                        case "success":
                            $("#changeUserdata input").addClass('success');
                            $("#changeUserdata button").text('Userdata changed!');
                            $('#changeUserdataSuccess').fadeIn();
                            break;
                        default:
                            $('#changeUserdataError').fadeIn();
                    }

                    console.log(msg);
                });

                request.fail(function(a, b){
                    $('#changeUserdataError').fadeIn();
                });

                return false;
            });

            $("#changePwd").click(function(){
                request = $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('/api/changePassword'); ?>",
                    data: {oldPassword: $('#oldPassword').val(), newPassword: $('#newPassword').val(), rePassword: $('#rePassword').val()}
                });

                request.done(function(msg){
                    $('#changePassword .control-group').removeClass('error');

                    switch(msg){
                        case "old":
                            $("#oldPassword").parent().addClass('error');
                            $("#oldPassword").focus();
                            break;
                        case "new":
                            $("#newPassword").parent().addClass('error');
                            $("#newPassword").focus();
                            break;
                        case "re":
                            $("#rePassword").parent().addClass('error');
                            $("#rePassword").focus();
                            break;
                        case "success":
                            $("#changePassword input").addClass('success');
                            $("#changePassword button").text('Password changed!');
                            $('#changePassword input').val('');
                            $('#changePwdSuccess').fadeIn();
                            break;
                        default:
                            $('#changePwdError').fadeIn();
                    }
                });

                request.fail(function(a, b){
                    $('#changePwdError').fadeIn();
                });

                return false;
            });

        });
    </script>
</div>
