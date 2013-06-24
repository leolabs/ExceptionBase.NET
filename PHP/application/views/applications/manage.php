<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */
?>

<div class="span9">
    <div class="page-header">
        <h1>Manage Applications <small><?php echo count($applist) . ' Apps'; ?></small></h1>

        <div class="pull-right singleExceptionGrouping btn-toolbar">
            <div class="btn-group">
                <button class="btn dropdown-toggle" id="registerApplication">Register application</button>
            </div>
        </div>
    </div>

    <div class="alert alert-error alert-block" id="progressError" style="display: none;">
        <button type="button" class="close">&times;</button>
        <h4>Error:</h4>
        The changes you tried to make could not be applied because of some error that occured. Maybe you're not logged
        in anymore or there's an error in the system. Try reloading this page, maybe it'll work then.
    </div>

    <div class="modal hide fade" id="cleanupModal" style="z-index: 1100;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Delete <span class="cleanupName">Application</span></h3>
        </div>
        <div class="modal-body">
            <p>Are you sure that you want to delete all <span class="cleanupName">these</span> exceptions
                in <span class="appName">your application</span>? Please keep in mind that this action <b>cannot be undone</b>.</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="appCleanLink btn btn-danger">Yes</a>
            <a href="#" class="cancelLink btn">No</a>
        </div>
    </div>

    <div class="modal hide fade" id="deleteModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Delete <span class="appName">Application</span></h3>
        </div>
        <div class="modal-body">
            <p>Are you sure that you want to delete <span class="appName">the application</span>? All the exceptions
                that belong to this application will also be deleted. This action cannot be undone, so please be careful.</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="appDeleteLink btn btn-danger">Yes</a>
            <a href="#" class="cancelLink btn">No</a>
        </div>
    </div>

    <div class="modal hide fade" id="registerModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Register a new Application</h3>
        </div>
        <div class="modal-body">
            <p>Here you can register a new application. Please enter the name of your new application.</p>
            <input id="newAppName" class="input-block-level" type="text">
        </div>
        <div class="modal-footer">
            <a href="#" class="appRegisterLink btn btn-primary">Register Application</a>
            <a href="#" class="cancelLink btn">Cancel</a>
        </div>
    </div>

    <div class="modal hide fade" id="editModal" style="z-index: 1050">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Edit <span class="appName">Application</span></h3>
        </div>

        <div class="modal-body">
            <div class="well">
                <p>If you want to change your application's name, you can do so in this window.</p>
                <label for="changeAppName">Change the name of <span class="appName">your application</span>:</label>
                <input id="changeAppName" type="text" class="input-block-level">
            </div>

            <div class="well hidden-phone" style="margin-bottom: 0;">
                <p>If you want to clean up your database, you can delete all fixed, marked or unfixed exceptions that
                    belong to <span class="appName">this application</span>. Please mind that you cannot undo this.</p>
                <div class="row-fluid">
                    <div class="span4">
                        <a href="#" class="btn btn-success delfixed btn-block">Delete fixed</a>
                    </div>

                    <div class="span4">
                        <a href="#" class="btn btn-warning delmarked btn-block">Delete marked</a>
                    </div>

                    <div class="span4">
                        <a href="#" class="btn btn-danger delunfixed btn-block">Delete unfixed</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <a href="#" class="appChangeLink btn btn-primary">Apply changes</a>
            <a href="#" class="cancelLink btn">Cancel</a>
        </div>
    </div>

    <table class="exceptionTable table table-bordered table-hover">
        <thead>
        <tr>
            <th style="width: 32px; text-align: center;" class="hidden-phone">ID</th>
            <th>Name</th>
            <th style="width: 68px; text-align: center;" class="hidden-phone">Unfixed</th>
            <th style="width: 68px; text-align: center;" class="hidden-phone">Marked</th>
            <th style="width: 68px; text-align: center;" class="hidden-phone">Fixed</th>
            <th style="width: 89px; text-align: center;">Functions</th>
        </tr>
        </thead>
        <tbody><?php
        foreach ($applist as $row) {
            echo '<tr>';
            echo '<td style="text-align: center;" class="hidden-phone">' . $row['ID'] . '</td>';
            echo '<td>' . $row['Name'] . '</td>';
            echo '<td style="text-align: center;" class="hidden-phone">' . $row['ErrorCount'] . '</td>';
            echo '<td style="text-align: center;" class="hidden-phone">' . $row['MarkedCount'] . '</td>';
            echo '<td style="text-align: center;" class="hidden-phone">' . $row['FixedCount'] . '</td>';
            echo '<td>';

            echo '<div class="btn-group">';
            echo '<button class="btn btn-danger btn-mini delete" data-id="' . $row['ID'] . '" data-name="' . $row['Name'] . '"><i class="icon-trash"></i></button>';
            echo '<button class="btn btn-info btn-mini edit" data-id="' . $row['ID'] . '" data-name="' . $row['Name'] . '"><i class="icon-pencil"></i></button>';
            echo '</div>';

            echo '</td>';
            echo '</tr>';
        }
        ?></tbody>
    </table>
</div>

<script>
    var editAppID = 0;
    var editAppName = "Dummy App";
    var editAction = "none";

    function showCleanupDialog(){
        $('#cleanupModal .appName').text(editAppName);
        $('#cleanupModal .cleanupName').text(editAction);
        $('#editModal').hide(0);
        $("#cleanupModal").modal('show');
    }

    $(document).ready(function(){

        // Errors
        var ht = document.location.href.split("#")[1];
        if(ht == 10 || ht == 20 || ht == 30 || ht == 40){
            $("#progressError").fadeIn();
        }


        $(".delete").click(function(){
            $('#deleteModal .appName').text($(this).attr('data-name'));
            $('#deleteModal .appDeleteLink').attr('href', "<?php echo site_url('/applications/deleteApp/'); ?>/" + $(this).attr('data-id'));
            $('#deleteModal').modal('show');
        });

        $(".edit").click(function(){
            $('#editModal .appName').text($(this).attr('data-name'));
            $('#editModal #changeAppName').val($(this).attr('data-name'));
            editAppID = $(this).attr('data-id');
            editAppName = $(this).attr('data-name');
            $('#editModal').modal('show');
        });

        $("#registerApplication").click(function(){
            $('#registerModal').modal('show');
        });

        $(".appRegisterLink").click(function(){
            document.location = "<?php echo site_url('/applications/registerApp/'); ?>/" + encodeURIComponent($("#newAppName").val());
            return false;
        });

        $('.appChangeLink').click(function(){
            document.location = "<?php echo site_url('/applications/changeApp/'); ?>/" + editAppID +
                "/" + $("#changeAppName").val();
            return false;
        });

        $('.appCleanLink').click(function(){
            document.location = "<?php echo site_url('/applications/cleanApp/'); ?>/" + editAppID +
                "/" + editAction;
            return false;
        });

        $('.delfixed').click(function(){
            editAction = "fixed";
            showCleanupDialog();
        });

        $('.delmarked').click(function(){
            editAction = "marked";
            showCleanupDialog();
        });

        $('.delunfixed').click(function(){
            editAction = "unfixed";
            showCleanupDialog();
        });

        $(".cancelLink").click(function(){
            $(this).parent().parent().modal('hide');
            $('input').val("");
            return false;
        });

        $('#cleanupModal').on('hide', function () {
            $('#editModal').show(0);
        });

        $('#registerModal').on('shown', function () {
            $('#newAppName').focus();
        });

        $('#editModal').on('shown', function () {
            $('#changeAppName').focus();
        });

        $('#newAppName').keypress(function (e) {
            if (e.which == 13) {
                $('.appRegisterLink').trigger('click');
            }
        });

        $('#changeAppName').keypress(function (e) {
            if (e.which == 13) {
                $('.appChangeLink').trigger('click');
            }
        });
    });
</script>