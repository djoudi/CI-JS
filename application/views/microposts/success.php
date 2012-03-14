<?php $this->load->view('shared/header'); ?>
<h1>
	<?= $title; ?>
</h1>

<div id="content">
 	
	<?=$this->load->view("shared/flash");?>
	
	<p><?= $content; ?></p>
    
    <p><?= anchor(site_url("microposts/showall"), "back to microposts", 'title="back to microposts"'); ?></p>
    
    

</div><!-- /#content -->

<?php 
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');		
?>