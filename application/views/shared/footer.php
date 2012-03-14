<?php 
	$this->benchmark->mark('code_end');
?>	
    <div class="clear"></div>
    	
	</div><!-- /#inner-wrapper -->
	
    
	
	<div id="footer">
    	<p>Page rendered in <strong><?= $this->benchmark->elapsed_time('code_start', 'code_end'); ?></strong> seconds</p>
    </div>

</div><!-- /#container -->



<script type="text/javascript" src="<?= base_url()?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url()?>public/js/script.js"></script>


</body>
</html>