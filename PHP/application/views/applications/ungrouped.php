<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */
?>

<div class="span9">
    <table class="exceptionTable table table-bordered table-hover">
        <thead>
        <tr>
            <th style="width: 48px">ID</th>
            <th style="width: 76px" class="hidden-phone">Date</th>
            <th>Error</th>
            <th style="width: 76px" class="hidden-phone">Version</th>
        </tr>
        </thead>
        <tbody><?php
        foreach ($custom['exceptions'] as $row) {
            echo '<tr><td>';
            echo '<a href="' . site_url('/exceptions/' . urlencode($row['ID'])) . '" title="' . html_escape($row['ID']) . '">';
            echo $row['ID'];
            echo '</a></td>';
            $date = explode(" ", $row['Date']);
            echo '<td class="hidden-phone">' . $date[0] . '</td>';
            echo '<td>' . '<a href="' . site_url('/exceptions/' . urlencode($row['ID'])) . '" title="' . html_escape($row['ID']) . '">';
            echo $row['ExceptionMessage'] . '</a></td>';
            echo '<td class="hidden-phone">' . $row['Version'] . '</td></tr>';
        }
        ?></tbody>
    </table>
</div>