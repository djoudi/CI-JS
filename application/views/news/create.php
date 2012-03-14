<?php $this->load->view('shared/header'); ?>
<h1>
	<?= $title; ?>
</h1>

<div id="content">

	<?=$this->load->view("shared/flash");?>
	
    <p><?= $content; ?></p>
	    
    <?php echo validation_errors(); ?>

	<?php echo form_open('news/create') ?>
    
        <label for="title">Title</label> 
        <input type="input" name="title" /><br />
    
        <label for="text">Text</label>
        <textarea name="text"></textarea><br />
        
        <input type="submit" name="submit" value="Create news item" /> 
    
    </form>
    
     <p><?= anchor(site_url("news/"), "back to news list", 'title="back to news list"'); ?></p>
    
   

</div><!-- /#content -->

<?php
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');
?>
	