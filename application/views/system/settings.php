<?php
/**
 * Created by Leo Bernard. More at leolabs.org
 */
?>

<div class="span9">
    <div class="well">
        <h2>System Status</h2>
        <div class="row-fluid">
            <div class="span4">
                <table class="singleException table table-bordered ">
                    <thead>
                    <tr>
                        <th>Database Size</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php
                            echo $custom['dbSize'];
                            ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="span4">
                <table class="singleException table table-bordered ">
                    <thead>
                    <tr>
                        <th><abbr title="Checks if the root folder of ExceptionBase.NET is writeable. This is needed for the updater to work.">Root folder</abbr></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                            if(is_writable("../")){
                                echo '<td class="success">Writable</td>';
                            }else{
                                echo '<td class="error">Not writable</td>';
                            }
                        ?>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="span4">
                <table class="singleException table table-bordered ">
                    <thead>
                    <tr>
                        <th>Installed Build</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php
                            echo EBN_VERSION;
                            ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>