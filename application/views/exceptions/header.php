<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */
?>

<div class="span9">
    <div class="alert alert-error" id="loadFailAlert" style="display: none;">
        <button type="button" class="close">&times;</button>
        <h4>Error:</h4>
        Could not change the exception's status. Maybe you are not
        logged in anymore or you don't have the rights to change this status.
    </div>

    <div class="modal hide fade" id="deleteModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Delete this exception?</h3>
        </div>
        <div class="modal-body">
            <p>Do you really want to delete this exception? Please keep in mind that this action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-danger">Yes</a>
            <a href="#" class="btn closebtn">No</a>
        </div>
    </div>

    <div class="page-header">
        <h1>
            <?php echo $custom['headLine']; ?>
            <?php   if(!$custom['multi']){
                        if($custom['exception'][0]['Public'] == "1") echo '<small>Public</small>';
                    }
            ?>
        </h1>

        <div class="pull-right <?php if(!$custom['multi'] && $user['UserLevel'] >= 1){ ?>exceptionGrouping<?php }else{ ?>singleExceptionGrouping<?php } ?> btn-toolbar">
            <?php if(!$custom['multi'] && $user['UserLevel'] >= 1){ ?>
            <div class="btn-group optionsPane">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    Actions
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" id="singleExceptionActions">
                    <li><a href="#" id="permaException" title="If you want to give a link to this exception to a friend or post it in a forum. Please mind that everybody can see the details of this exception once the permalink was generated. If you want to undo this, just click on 'Remove Permalink'.">Generate permalink</a></li>
                    <li><a href="#" id="embedException" title="If you want to, you can embed this exception in a forum, on your blog or somewhere else. Please mind that everybody can see the details of this exception once it's embedded. If you want to undo this, just click on 'Remove Permalink'.">Embed this exception</a></li>
                    <li><a href="#" id="unpublishException" title="If you don't want other people to see this exception anymore, you can just remove the permalink.">Remove permalink</a></li>
                    <li class="divider"></li>
                    <li><a href="#" id="deleteException" title="This will delete the exception from the database. Please keep in mind that this cannot be undone.">Delete this exception</a></li>
                </ul>
            </div>
            <?php } ?>

            <div class="btn-group statusSwitcher">
                <a class="btn dropdown-toggle"
                   <?php if($user['UserLevel'] >= 1) {?>data-toggle="dropdown" href="#"<?php } ?> id="statusBtn">
                   <span id="statusCaption"><?php
                       if($custom['multi']){
                           if(count($custom['exception']['Fixed']) == 1) {
                               $fields = array('Unfixed', 'Fixed', 'Marked');
                               echo $fields[$custom['exception']['Fixed'][0]];
                           }else{
                               echo ($user['UserLevel'] >= 1) ? "Set status" : "Multiple values";
                           }
                       }else{
                           $fields = array('Unfixed', 'Fixed', 'Marked');
                           echo $fields[$custom['exception'][0]['Fixed']];
                       }
                       ?></span>
                    <?php if($user['UserLevel'] >= 1) {?><span class="caret"></span><?php } ?>
                </a>
                <?php if($user['UserLevel'] >= 1) {?>
                <ul class="dropdown-menu" id="singleExceptionStatus">
                    <li><a href="#">Unfixed</a></li>
                    <li><a href="#">Marked</a></li>
                    <li><a href="#">Fixed</a></li>
                </ul>
                <?php } ?>
            </div>
        </div>

        <script>
            var exceptionID = "<?php
                if($custom['multi']){
                    echo html_entity_decode(urldecode($custom['subLine']));
                }else{
                    echo $custom['exception'][0][$custom['groupField']];
                }
                 ?>";
            var groupField = "<?php echo $custom['groupField']; ?>";
            var btnText = "";


            function changeStatusColor(text, doChange) {
                switch (text) {
                    case 'Fixed':
                        $("#statusBtn").addClass("btn-success");
                        if(doChange) ajaxChange('1');
                        break;
                    case 'Unfixed':
                        $("#statusBtn").addClass("btn-danger");
                        if(doChange) ajaxChange('0');
                        break;
                    case 'Marked':
                        $("#statusBtn").addClass("btn-warning");
                        if(doChange) ajaxChange('2');
                        break;
                }
            }

            function ajaxChange(status){
                var url = "<?php echo site_url('/api/changeStatus'); ?>";

                $.ajax({
                    type: "POST",
                    "url": url,
                    data: {field: groupField, filter: exceptionID, newStatus: status}
                }).done(
                    function(msg){
                        if(msg != '1'){
                            $('#loadFailAlert').fadeOut(0).fadeIn();
                        }else{

                        }
                    }
                ).error(function(e){
                    $('#loadFailAlert').fadeOut(0).fadeIn();
                });

                return false;
            }

            $(document).ready(function () {
                changeStatusColor($("#statusCaption").text(), false);

                $("#singleExceptionStatus li a").click(function () {
                    $("#statusCaption").text($(this).text());
                    $("#statusBtn").removeClass("btn-danger btn-warning btn-success");
                    changeStatusColor($(this).text(), true);
                    $('#singleExceptionStatus').dropdown('toggle');
                    return false;
                });

                $('#deleteException').click(function(){
                    $("#deleteModal").modal("show");
                });

                $('.closebtn').click(function(){
                    $(this).parent().parent().modal("hide");
                })

                $(".close").click(function(e){
                    $('#loadFailAlert').fadeOut();
                    return false;
                });
            });
        </script>
    </div>
</div>
