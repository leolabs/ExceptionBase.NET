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
        <h1>Manage Users <small><?php echo count($custom['userlist']) . ' Users'; ?></small></h1>

        <div class="pull-right singleExceptionGrouping btn-toolbar">
            <div class="btn-group">
                <button class="btn dropdown-toggle" id="registerUser">Register user</button>
            </div>
        </div>
    </div>

    <div class="alert alert-error alert-block" id="progressError" style="display: none;">
        <button type="button" class="close">&times;</button>
        <h4>Error:</h4>
        The changes you tried to make could not be applied because of some error that occured. Maybe you're not logged
        in anymore or there's an error in the system. Try reloading this page, maybe it'll work then.
    </div>

    <div class="modal hide fade" id="deleteModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Delete <span class="userName">User</span></h3>
        </div>
        <div class="modal-body">
            <p>Are you sure that you want to delete <span class="userName">the application</span>? All the exceptions
                that belong to this application will also be deleted. This action cannot be undone, so please be careful.</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="appDeleteLink btn btn-danger">Yes</a>
            <a href="#" class="cancelLink btn">No</a>
        </div>
    </div>

    <div class="modal hide fade" id="registerModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Register new user</h3>
        </div>

        <div class="modal-body">
            <form id="registerForm" method="post" action="<?php echo site_url('/account/registerUser/'); ?>" style="margin-bottom: 0;">
                <div class="well" style="padding-bottom: 4px;">
                    <h4 style="margin-top: 0">Username and E-mail</h4>

                    <div class="row-fluid">
                        <div class="span4 control-group">
                            <label for="newUserName">Username:</label>
                            <input id="newUserName" name="newUserName" type="text" class="input-block-level">
                        </div>

                        <div class="span4 control-group">
                            <label for="newUserMail">E-mail:</label>
                            <input id="newUserMail" name="newUserMail" type="email" class="input-block-level">
                        </div>

                        <div class="span4 control-group">
                            <label for="newUserLevel">Level:</label>
                            <select id="newUserLevel" name="newUserLevel" class="input-block-level">
                                <option value="0">Guest</option>
                                <option value="1">Moderator</option>
                                <option value="2">Manager</option>
                                <option value="3">Co-Administrator</option>
                                <?php if($user['UserLevel'] == 4){?><option value="4">Administrator</option><?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="well" style="margin-bottom: 0; padding-bottom: 4px;">
                    <h4 style="margin-top: 0">Password</h4>

                    <div class="row-fluid">
                        <div class="span6 control-group">
                            <label for="newUserPassword">Password:</label>
                            <input id="newUserPassword" name="newUserPassword" type="password" class="input-block-level">
                        </div>

                        <div class="span6 control-group">
                            <label for="newUserPasswordRe">Repeat password:</label>
                            <input id="newUserPasswordRe" type="password" class="input-block-level">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <a href="#" class="userRegisterLink btn btn-primary">Register user</a>
            <a href="#" class="cancelLink btn">Cancel</a>
        </div>
    </div>

    <div class="modal hide fade" id="editModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Edit <span class="userName">User</span></h3>
        </div>

        <div class="modal-body">
            <form id="editForm" method="post" action="<?php echo site_url('/account/editUser/'); ?>" style="margin-bottom: 0">
                <input type="hidden" id="changeUserID" name="changeUserID" value="">
                <div class="well" style="padding-bottom: 16px;">
                    <h4 style="margin-top: 0">Change username and E-mail</h4>

                    <div class="row-fluid">
                        <div class="span4">
                            <label for="changeUserName">Username:</label>
                            <input id="changeUserName" name="changeUserName" type="text" class="input-block-level">
                        </div>

                        <div class="span4">
                            <label for="changeUserMail">E-mail:</label>
                            <input id="changeUserMail" name="changeUserMail" type="email" class="input-block-level">
                        </div>

                        <div class="span4">
                            <label for="changeUserLevel">Level:</label>
                            <select id="changeUserLevel" name="changeUserLevel" class="input-block-level">
                                <option value="0">Guest</option>
                                <option value="1">Moderator</option>
                                <option value="2">Manager</option>
                                <option value="3">Co-Administrator</option>
                                <?php if($user['UserLevel'] == 4){?><option value="4">Administrator</option><?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="well" style="margin-bottom: 0; padding-bottom: 4px;">
                    <h4 style="margin-top: 0">Change <span class="userName">the user</span>'s password</h4>

                    <div class="row-fluid">
                        <div class="span6 control-group">
                            <label for="changeUserPassword">New password:</label>
                            <input id="changeUserPassword" name="changeUserPassword" type="password" class="input-block-level">
                        </div>

                        <div class="span6 control-group">
                            <label for="changeUserPasswordRe">Repeat new password:</label>
                            <input id="changeUserPasswordRe" name="changeUserPasswordRe" type="password" class="input-block-level">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <a href="#" class="userEditLink btn btn-primary">Apply changes</a>
            <a href="#" class="cancelLink btn">Cancel</a>
        </div>
    </div>

    <table class="exceptionTable table table-bordered table-hover">
        <thead>
        <tr>
            <th style="width: 32px; text-align: center;" class="hidden-phone">ID</th>
            <th>Name</th>
            <th class="hidden-phone">E-mail</th>
            <th style="width: 120px; text-align: center;" class="hidden-phone">Level</th>
            <th style="width: 89px; text-align: center;">Functions</th>
        </tr>
        </thead>
        <tbody><?php
        foreach ($custom['userlist'] as $row) {
            echo '<tr>';
            echo '<td style="text-align: center;" class="hidden-phone">' . $row['ID'] . '</td>';
            echo '<td>' . $row['Username'] . '</td>';
            echo '<td class="hidden-phone">' . $row['Mail'] . '</td>';
            echo '<td style="text-align: center;" class="hidden-phone">' . $userLevels[$row['UserLevel']] . '</td>';
            echo '<td>';

            if(!($user['UserLevel'] < 4 && $row['UserLevel'] == 4)){
                echo '<div class="btn-group">';
                if(count($custom['userlist']) > 1) echo '<button class="btn btn-danger btn-mini delete" data-id="' . $row['ID'] . '" data-name="' . $row['Username'] . '"><i class="icon-trash"></i></button>';
                echo '<button class="btn btn-info btn-mini edit" data-id="' . $row['ID'] . '" data-name="' . $row['Username'] . '" data-mail="' . $row['Mail'] . '" data-level="' . $row['UserLevel'] . '"><i class="icon-pencil"></i></button>';
                echo '</div>';
            }else{
                echo '<div style="text-align: center;">Not available</div>';
            }

            echo '</td>';
            echo '</tr>';
        }
        ?></tbody>
    </table>
</div>

<script>
    var editUserID = 0;
    var editUserName = "Dummy User";
    var editUserMail = "dummy@mail.com";
    var editUserLevel = "0";

    $(document).ready(function(){
        // Errors
        var ht = document.location.href.split("#")[1];
        if(ht == 10 || ht == 20 || ht == 30){
            $("#progressError").fadeIn();
        }

        $(".delete").click(function(){
            $('#deleteModal .userName').text($(this).attr('data-name'));
            $('#deleteModal .appDeleteLink').attr('href', "<?php echo site_url('/account/deleteUser/'); ?>/" + $(this).attr('data-id'));
            $('#deleteModal').modal('show');
        });

        $(".edit").click(function(){
            editUserID = $(this).attr('data-id');
            editUserName = $(this).attr('data-name');
            editUserMail = $(this).attr('data-mail');
            editUserLevel = $(this).attr('data-level');

            $('#editModal .userName').text(editUserName);
            $('#editModal #changeUserName').val(editUserName);
            $('#editModal #changeUserLevel').val(editUserLevel);
            $('#editModal #changeUserMail').val(editUserMail);

            $('#editModal').modal('show');
        });

        $("#registerUser").click(function(){
            $('#registerModal').modal('show');
        });

        $(".userRegisterLink").click(function(){
            $('#registerModal input').parent().removeClass('error');

            if($("#registerModal #newUserName").val() == "" || $('.exceptionTable tr > td:first-child + td:contains(' +
                $("#registerModal #newUserName").val() + ')').filter(function(){return !!($(this).text() === $("#registerModal #newUserName").val());}).length > 0)
            {
                $('#registerModal #newUserName').parent().addClass('error');
                $('#registerModal #newUserName').focus();
                return false;
            }
            if($("#registerModal #newUserMail").val() == ""){
                $('#registerModal #newUserMail').parent().addClass('error');
                $('#registerModal #newUserMail').focus();
                return false;
            }
            if($("#registerModal #newUserPassword").val() == ""){
                $('#registerModal #newUserPassword').parent().addClass('error');
                $('#registerModal #newUserPassword').focus();
                return false;
            }

            if($('#registerModal #newUserPassword').val() == $('#registerModal #newUserPasswordRe').val()){
                $('#registerForm').submit();
            }else{
                $('#registerModal #newUserPasswordRe').parent().addClass('error');
                $('#registerModal #newUserPasswordRe').focus();
            }

            return false;
        });

        $(".userEditLink").click(function(){
            $('#editModal input').parent().removeClass('error');

            if($("#editModal #changeUserName").val() == ""){
                $('#editModal #changeUserName').parent().addClass('error');
                $('#editModal #changeUserName').focus();
                return false;
            }
            if($("#editModal #changeUserMail").val() == ""){
                $('#editModal #changeUserMail').parent().addClass('error');
                $('#editModal #changeUserMail').focus();
                return false;
            }
            if($("#editModal #newUserPassword").val() == ""){
                $('#editModal #newUserPassword').parent().addClass('error');
                $('#editModal #newUserPassword').focus();
                return false;
            }

            if($('#editModal #changeUserPassword').val() == "" ||
                $('#editModal #changeUserPassword').val() == $('#editModal #changeUserPasswordRe').val())
            {
                $('#editForm #changeUserID').val(editUserID);
                $('#editForm').submit();
            }else{
                $('#editModal #changeUserPasswordRe').parent().addClass('error');
                $('#editModal #changeUserPasswordRe').focus();
            }

            return false;
        });

        $(".cancelLink").click(function(){
            $(this).parent().parent().modal('hide');
            $('input').val("");
            return false;
        });

        $('#registerModal').on('shown', function () {
            $('#newUserName').focus();
        });

        $('#editModal').on('shown', function () {
            $('#changeUserName').focus();
        });

        $('#registerModal input').keypress(function (e) {
            if (e.which == 13) {
                $('.userRegisterLink').trigger('click');
            }
        });

        $('#editModal input').keypress(function (e) {
            if (e.which == 13) {
                $('.userEditLink').trigger('click');
            }
        });
    });
</script>