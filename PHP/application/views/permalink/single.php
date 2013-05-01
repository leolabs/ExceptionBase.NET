<?php
/**
 * Created by Leo Bernard. More at leolabs.org
 */

?>

<div>
    <h2>General Information</h2>

    <div class="row-fluid">
        <div class="span3">
            <table class="singleException table table-bordered">
                <thead>
                <tr>
                    <th>Version</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo $permaException['Version'];
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span3">
            <table class="singleException table table-bordered ">
                <thead>
                <tr>
                    <th>.NET Version</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo $permaException['NETFramework'];
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span6">
            <table class="singleException table table-bordered ">
                <thead>
                <tr>
                    <th>Installed OS</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo $permaException['InstalledOS'];
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span2">
            <table class="singleException table table-bordered ">
                <thead>
                <tr>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        $dateArray = explode(" ", $permaException['Date']);
                        echo $dateArray[0];
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span2">
            <table class="singleException table table-bordered ">
                <thead>
                <tr>
                    <th>Architecture</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo $permaException['Architecture'];
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span2">
            <table class="singleException table table-bordered ">
                <thead>
                <tr>
                    <th>Cores</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo $permaException['NumCores'];
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span3">
            <table class="singleException table table-bordered ">
                <thead>
                <tr>
                    <th>Memory - Free</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        $memFree = $permaException['MemoryFree'];

                        if ($memFree != -1) {
                            echo round($memFree / 1024 / 1024, 2) . " MB";
                        } else {
                            echo "N/A";
                        }

                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span3">
            <table class="singleException table table-bordered ">
                <thead>
                <tr>
                    <th>Memory - Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        $memTotal = $permaException['MemoryTotal'];

                        if ($memFree != -1) {
                            echo round($memTotal / 1024 / 1024, 2) . " MB";
                        } else {
                            echo "N/A";
                        }
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr/>
    <h2>Detailed information</h2>

    <h3>Exception message</h3>
    <pre><?php echo ($permaException['ExceptionMessage'] != "") ? $permaException['ExceptionMessage'] : "N/A"; ?></pre>
    <h3>User description</h3>
    <pre><?php echo ($permaException['UserDescription'] != "") ? $permaException['UserDescription'] : "N/A"; ?></pre>
    <h3>Exception method</h3>
    <pre><?php echo ($permaException['ErrorMethod'] != "") ? $permaException['ErrorMethod'] : "N/A"; ?></pre>
    <h3>Inner exception message</h3>
    <pre><?php echo ($permaException['ExceptionInner'] != "") ? $permaException['ExceptionInner'] : "N/A"; ?></pre>
    <h3>Stack trace</h3>
    <pre><?php echo ($permaException['StackTrace'] != "") ? $permaException['StackTrace'] : "N/A"; ?></pre>
    <?php if($permaException['MiscData'] != ""){ ?>
        <h3>Custom data</h3>

        <?php switch($permaException['MiscDataType']){case "Image": ?>
            <a href="<?php echo site_url('/content/image/' . $permaException['ID']); ?>" target="_blank">
                <img src="<?php echo site_url('/content/image/' . $permaException['ID']); ?>" title="Custom image" />
            </a>
            <?php break; case "Binary": ?>
            <a class="btn btn-primary btn-large" target="_blank" href="<?php echo site_url('/content/binary/' . $permaException['ID']); ?>">Download Binary</a>
            <?php break; case "Test": ?>
            <pre><?php echo $permaException['MiscData']; ?></pre>
            <?php break; case "XML": case "JSON": ?>
            <pre><?php echo htmlspecialchars($permaException['MiscData']); ?></pre>
            <?php break; ?>
        <?php } ?>
    <?php } ?>
    <div style="padding-bottom: 16px"></div>
</div>