<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */
?>
<div class="hero-unit span9 well">
    <h2 class="hidden-phone" style="margin-top: 0;">ExceptionBase.NET</h2>
    <?php if (count($applist) == 0 && $user['UserLevel'] >= 2) { ?>
        <p>
            Welcome to ExceptionBase.NET! You don't seem to have any applications registered yet. In order to track your
            application's exceptions, register an application in the sidebar menu or start by reading the
            <a href="http://exceptionbase.net/manual/">manual</a>.
        </p>

        <p>
            <a href="<?php echo site_url('/applications/manage/'); ?>" class="btn btn-primary btn-large">Register an
                application</a>
            <a href="http://exceptionbase.net/manual/" class="btn btn-large">Read the manual</a>
        </p>
    <?php } elseif (count($applist) == 0 && $user['UserLevel'] < 2) { ?>
        <p>
            Welcome to ExceptionBase.NET! You don't seem to have any application registered yet but you don't have the
            permissions to register an application, so please ask an administrator to do it for you. Anyway, you
            can start by reading the <a href="http://exceptionbase.net/manual/">ExceptionBase.NET manual</a>.
        </p>
        <p>
            <a href="http://exceptionbase.net/manual/" class="btn btn-large">Read the manual</a>
        </p>
    <?php } else { ?>
        <p>
            Welcome to ExceptionBase.NET! You currently have <b><?php echo $custom['errorCount']; ?></b> unfixed errors.
            If you want to get detailed information about them, just select one of your apps in the sidebar.
        </p>
    <?php } ?>
</div>