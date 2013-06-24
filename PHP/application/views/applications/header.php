<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

function groupFilterLink($custom, $groupField)
{
    $urlArray = explode("/", uri_string());

    if (count($urlArray) >= 6) {
        if ($urlArray[4] == 'Fixed') {
            return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID'] .
                '/grouped/' . $groupField . '/Fixed/' . $urlArray[5]) . '">' . $groupField . '</a>';
        }
    } elseif (count($urlArray) >= 4) {
        if ($urlArray[2] == 'Fixed') {
            return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID'] .
                '/grouped/' . $groupField . '/Fixed/' . $urlArray[3]) . '">' . $groupField . '</a>';
        } else {
            return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID'] .
                '/grouped/' . $groupField) . '">' . $groupField . '</a>';
        }
    } else {
        return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID'] .
            '/grouped/' . $groupField) . '">' . $groupField . '</a>';
    }
}

function noGroupFilterLink($custom)
{
    $urlArray = explode("/", uri_string());
    $groupField = 'Don\'t group';

    if (count($urlArray) >= 6) {
        if ($urlArray[4] == 'Fixed') {
            return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID'] .
                '/Fixed/' . $urlArray[5]) . '">' . $groupField . '</a>';
        }
    } elseif (count($urlArray) >= 4) {
        if ($urlArray[2] == 'Fixed') {
            return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID'] .
                '/Fixed/' . $urlArray[3]) . '">' . $groupField . '</a>';
        } else {
            return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID']) . '">' . $groupField . '</a>';
        }
    } else {
        return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID']) . '">' . $groupField . '</a>';
    }
}

function filterLink($custom, $statusID, $status)
{
    $urlArray = explode("/", uri_string());

    if (count($urlArray) >= 4) {
        if ($urlArray[2] == 'grouped') {
            return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID'] . '/grouped/' . $urlArray[3] .
                '/Fixed/' . $statusID) . '">' . $status . '</a>';
        }else{
            return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID'] .
                '/Fixed/' . $statusID) . '">' . $status . '</a>';
        }
    } else {
        return '<a href="' . site_url('/applications/' . $custom['appinfo'][0]['ID'] .
            '/Fixed/' . $statusID) . '">' . $status . '</a>';
    }
}

?>

<div class="span9">
    <div class="page-header">
        <h1><?php echo $applist[$custom['appinfo'][0]['ID']]['Name']; ?>
            <small>
                <?php echo $applist[$custom['appinfo'][0]['ID']]['ErrorCount']; ?> unfixed errors
            </small>
        </h1>

        <div class="pull-right exceptionGrouping btn-toolbar">
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php if ($custom['fixedField'] == false) {
                        echo "Unfixed";
                    } else {
                        $fields = array('Unfixed', 'Fixed', 'Marked');

                        echo $fields[$custom['fixedField']];
                    } ?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><?php echo filterLink($custom, 0, "Unfixed"); ?></li>
                    <li><?php echo filterLink($custom, 2, "Marked"); ?></li>
                    <li><?php echo filterLink($custom, 1, "Fixed"); ?></li>
                </ul>
            </div>

            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php if (!isset($custom['groupField'])) {
                        echo "Group by";
                    } else {
                        echo $custom['groupField'];
                    } ?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><?php echo noGroupFilterLink($custom); ?></li>
                    <li class="divider"></li>
                    <li><?php echo groupFilterLink($custom, "ExceptionMessage"); ?></li>
                    <li><?php echo groupFilterLink($custom, "ExceptionInner"); ?></li>
                    <li><?php echo groupFilterLink($custom, "StackTrace"); ?></li>
                    <li><?php echo groupFilterLink($custom, "ErrorMethod"); ?></li>
                    <li><?php echo groupFilterLink($custom, "UserDescription"); ?></li>
                    <li><?php echo groupFilterLink($custom, "Version"); ?></li>
                    <li><?php echo groupFilterLink($custom, "NETFramework"); ?></li>
                    <li><?php echo groupFilterLink($custom, "InstalledOS"); ?></li>
                    <li><?php echo groupFilterLink($custom, "Architecture"); ?></li>
                    <li><?php echo groupFilterLink($custom, "NumCores"); ?></li>
                    <li><?php echo groupFilterLink($custom, "MemoryFree"); ?></li>
                    <li><?php echo groupFilterLink($custom, "MemoryTotal"); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>