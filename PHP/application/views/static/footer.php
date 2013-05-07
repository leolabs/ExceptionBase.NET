<hr style="clear: both;">

<footer>
    <p class="pull-left">Developed by <a href="http://leolabs.org" target="_blank">leolabs.org</a></p>

    <p class="pull-right"><a href="http://exceptionbase.net/manual/" target="_blank">Manual</a></p>
</footer>

</div><!--/.fluid-container-->

<script src="<?php echo base_url(); ?>res/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $(".alert .close").click(function(){
            $(this).parent().fadeOut();
        });
    });
</script>
</body>
</html>