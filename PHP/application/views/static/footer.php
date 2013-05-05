<hr style="clear: both;">

<footer>
    <p class="pull-left">&copy; <a href="http://leolabs.org" target="_blank">leolabs.org</a> 2012-<?php echo date("Y"); ?></p>

    <p class="pull-right"><a href="http://exceptionbase.net/manual/" target="_blank">Documentation and Manual</a></p>
</footer>

</div><!--/.fluid-container-->

<script src="<?php echo base_url(); ?>res/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $("#searchOptions li a").click(function () {
            $("#searchCaption").text($(this).text());
            $("#searchFields").val($(this).text());
            $('#searchOptions').dropdown('toggle');
            return false;
        });

        $('.searchField').keypress(function(e){
            if(e.keyCode == 13)
            {
                document.location = "<?php echo site_url('/search/'); ?>/" + $('#searchFields').val() + "/" + $(".searchField").val();
                return false;
            }
        });

        $(".alert .close").click(function(){
            $(this).parent().fadeOut();
        });
    });
</script>
</body>
</html>