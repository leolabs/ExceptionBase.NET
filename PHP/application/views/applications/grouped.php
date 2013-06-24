<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */
?>

<div class="span9">
    <table class="exceptionTable table table-bordered table-hover">
        <thead>
        <tr>
            <th><?php echo $custom['groupField']; ?></th>
            <th style="width: 48px;">Count</th>
        </tr>
        </thead>
        <tbody><?php
        foreach ($custom['exceptions'] as $row) {
            echo '<tr><td><a href="' . site_url('/exceptions/by/' . urlencode($custom['groupField']) . '/' . urlencode($row[0])) . '/Fixed/' . $custom['fixedField'] . '" title="' . html_escape($row[0]) . '">';
            echo html_escape($row[0]) . '</td><td>' . $row[1] . '</a></td></tr>';
        }
        ?></tbody>
    </table>
</div>