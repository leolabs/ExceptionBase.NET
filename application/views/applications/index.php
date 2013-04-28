<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */
?>
<div class="hero-unit span9 well">
    <h2 class="hidden-phone" style="margin-top: 0;">Applications</h2>
    <?php if (count($applist) == 0) { ?>
        <p>
            There are no applications registered in the database yet. Please register an application or ask
            an administrator to do it for you in order to continue.
        </p>
    <?php } else { ?>
        <p>
            Please choose one of your registered applications from the sidebar. If your application isn't registered
            yet,
            register it or ask an administrator to do it for you in order to continue.
        </p>
    <?php } ?>
</div>