<?php $this->load->view('shared/header'); ?>
<h1>
	<?= $title; ?>
</h1>

<div id="content">

	<?=$this->load->view("shared/flash");?>
	
	<p><?= $content; ?></p>
    
    <p><?= anchor(site_url("news/"), "back to news list", 'title="back to news list"'); ?></p>
    
    

</div><!-- /#content -->


<?php
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');
?>