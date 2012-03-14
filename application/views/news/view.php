<?php $this->load->view('shared/header'); ?>
<h1>
	<?= $news_item['title'] ?>
</h1>

<div id="content">
	
	<?=$this->load->view("shared/flash");?>
	
	<p><?= $news_item['text']; ?></p>

</div><!-- /#content -->


<?php
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');
?>	