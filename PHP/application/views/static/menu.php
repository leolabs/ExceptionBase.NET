<?php
/**
 * Displays a menu entry only when the user has the sufficient rights to access it
 *
 * @param string $title the title of the link
 * @param string $url the address of the link
 * @param array $user the user variable
 * @param int $userLevel the required userLevel
 */
function conditionMenuEntry($title, $url, $user, $userLevel)
{
    if ($user['UserLevel'] >= $userLevel) {
        echo '<li><a href="' . site_url($url) . '" title="' . $title . '">';
        echo $title;
        echo '</a></li>';
    }
}
?>

<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header">Logged in as <?php echo $user['Username']; ?></li>
            <li><a href="<?php echo site_url('/account/logout/'); ?>" title="log out">Log Out</a></li>
            <li><a href="<?php echo site_url('/account/settings/'); ?>" title="Edit Profile">Edit Profile</a></li>

            <li class="nav-header">Applications</li>
            <?php

            if(count($applist) == 0){
                echo '<li><a href="' . site_url('applications/manage') . '">Register an Application</a></li>';
            }

            // Apps im Menü ausgeben
            foreach ($applist as $row) {
                echo "<li";
                $urlArray = explode('/', uri_string());
                if (count($urlArray) == 4) {
                    if ($row['ID'] == $urlArray[2] && $urlArray[1] == 'applications') {
                        echo " class=\"active\"";
                    }
                }

                echo "><a href=\"" . site_url('/applications/' . $row['ID']) . "\">";

                echo utf8_encode($row['Name']);
                if($row['ErrorCount'] > 0)
                    echo '<span class="badge badge-info pull-right">' . $row['ErrorCount'] . '</span>';

                if($row['MarkedCount'] > 0)
                    echo '<span class="badge badge-warning pull-right" style="margin-right: 4px">' . $row['MarkedCount'] . '</span>';

                echo '</a></li>';
            }

            ?>

            <?php if ($user['UserLevel'] >= 2) { ?><li class="nav-header">Settings</li><?php } ?>
            <?php conditionMenuEntry('Manage Applications', '/applications/manage/', $user, 2); ?>
            <?php conditionMenuEntry('Manage Users', '/account/manage/', $user, 3); ?>
            <?php conditionMenuEntry('System Settings', '/sys/settings/', $user, 4); ?>
        </ul>
    </div>
    <!--/.well -->
</div><!--/span-->