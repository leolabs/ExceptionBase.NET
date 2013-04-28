<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

function createSearchLinks($text){
    echo '<a href="http://google.com/search?q=.net+' . $text . '">Google</a>, ';
    echo '<a href="http://social.msdn.microsoft.com/Search/de-DE?query=' . $text . '">MSDN</a>';
}
?>

<div class="span9">
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
                        echo $custom['exception'][0]['Version'];
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
                        echo $custom['exception'][0]['NETFramework'];
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
                        echo $custom['exception'][0]['InstalledOS'];
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
                        $dateArray = explode(" ", $custom['exception'][0]['Date']);
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
                        echo $custom['exception'][0]['Architecture'];
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
                        echo $custom['exception'][0]['NumCores'];
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
                        $memFree = $custom['exception'][0]['MemoryFree'];

                        if ($memFree != -1) {
                            echo round($memFree / 1024, 2) . " MB";
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
                        $memTotal = $custom['exception'][0]['MemoryTotal'];

                        if ($memFree != -1) {
                            echo round($memTotal / 1024, 2) . " MB";
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

    <h3>Exception message (<?php createSearchLinks($custom['exception'][0]['ExceptionMessage']) ?>)</h3>
    <pre><?php echo ($custom['exception'][0]['ExceptionMessage'] != "") ? $custom['exception'][0]['ExceptionMessage'] : "N/A"; ?></pre>
    <h3>User description</h3>
    <pre><?php echo ($custom['exception'][0]['UserDescription'] != "") ? $custom['exception'][0]['UserDescription'] : "N/A"; ?></pre>
    <h3>Exception method (<?php createSearchLinks($custom['exception'][0]['ErrorMethod']) ?>)</h3>
    <pre><?php echo ($custom['exception'][0]['ErrorMethod'] != "") ? $custom['exception'][0]['ErrorMethod'] : "N/A"; ?></pre>
    <h3>Inner exception message (<?php createSearchLinks($custom['exception'][0]['ExceptionInner']) ?>)</h3>
    <pre><?php echo ($custom['exception'][0]['ExceptionInner'] != "") ? $custom['exception'][0]['ExceptionInner'] : "N/A"; ?></pre>
    <h3>Stack trace (<?php createSearchLinks($custom['exception'][0]['StackTrace']) ?>)</h3>
    <pre><?php echo ($custom['exception'][0]['StackTrace'] != "") ? $custom['exception'][0]['StackTrace'] : "N/A";; ?></pre>
</div>