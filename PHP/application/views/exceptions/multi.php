<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */
?>

<div class="span9">
    <h2>General Information</h2>

    <div class="row-fluid">
        <div class="span3">
            <table class="multiException table table-bordered">
                <thead>
                <tr>
                    <th>Versions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo implode("\n", $custom['exception']['Version']);
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span3">
            <table class="multiException table table-bordered ">
                <thead>
                <tr>
                    <th>.NET Versions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo implode("\n", $custom['exception']['NETFramework']);
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span6">
            <table class="multiException table table-bordered ">
                <thead>
                <tr>
                    <th>Installed OSs</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo implode("\n", $custom['exception']['InstalledOS']);
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span2">
            <table class="multiException table table-bordered ">
                <thead>
                <tr>
                    <th>Dates</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        $newDates = array();

                        foreach ($custom['exception']['Date'] as $date) {
                            $dateArray = explode(" ", $date);
                            array_push($newDates, $dateArray[0]);
                        }

                        echo implode("\n", $newDates);
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span2">
            <table class="multiException table table-bordered ">
                <thead>
                <tr>
                    <th>Architectures</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo implode("\n", $custom['exception']['Architecture']);
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span2">
            <table class="multiException table table-bordered ">
                <thead>
                <tr>
                    <th>Cores</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo implode("\n", $custom['exception']['NumCores']);
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span3">
            <table class="multiException table table-bordered ">
                <thead>
                <tr>
                    <th>Memory - Free</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        $memFree = array();

                        foreach ($custom['exception']['MemoryFree'] as $mem) {
                            if ($mem != -1) {
                                array_push($memFree, round($memFree / 1024 / 1024, 2) . " MB");
                            } else {
                                array_push($memFree, "N/A");
                            }
                        }

                        echo implode("\n", $memFree);
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="span3">
            <table class="multiException table table-bordered ">
                <thead>
                <tr>
                    <th>Memory - Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        $memFree = array();

                        foreach ($custom['exception']['MemoryTotal'] as $mem) {
                            if ($mem != -1) {
                                array_push($memFree, round($memFree / 1024 / 1024, 2) . " MB");
                            } else {
                                array_push($memFree, "N/A");
                            }
                        }

                        echo implode("\n", $memFree);
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr/>
    <h2>Detailed information</h2>

    <?php if(count($custom['exception']['ExceptionMessage']) > 0){ ?>
    <h3>Exception message</h3>
    <?php foreach ($custom['exception']['ExceptionMessage'] as $message) {
            echo "<pre>" . $message . "</pre>";
    }}
    ?>

    <?php if(count($custom['exception']['UserDescription']) > 0){ ?>
    <h3>User description</h3>
    <?php foreach ($custom['exception']['UserDescription'] as $message) {
        echo "<pre>" . $message . "</pre>";
    }}
    ?>

    <?php if(count($custom['exception']['ErrorMethod']) > 0){ ?>
    <h3>Exception method</h3>
    <?php foreach ($custom['exception']['ErrorMethod'] as $message) {
        echo "<pre>" . $message . "</pre>";
    }}
    ?>

    <?php if(count($custom['exception']['ExceptionInner']) > 0){ ?>
    <h3>Inner exception message</h3>
    <?php foreach ($custom['exception']['ExceptionInner'] as $message) {
        echo "<pre>" . $message . "</pre>";
    }}
    ?>

    <?php if(count($custom['exception']['StackTrace']) > 0){ ?>
    <h3>Stack trace</h3>
    <?php foreach ($custom['exception']['StackTrace'] as $message) {
        echo "<pre>" . $message . "</pre>";
    }}
    ?>
</div>