<?php $this->load->view('shared/header'); ?>
      
<h1>
	Heading for a micropost.....
</h1>

<div id="content">

	
	<?=$this->load->view("shared/flash");?>
	
    <p><?= anchor(site_url("microposts/create"), "create a micropost", 'title="create a micropost"'); ?></p>
    
	 <?php foreach ($microposts as $micropost): ?>
    
        <h2><?php echo $micropost->title ?></h2>
        <div id="main">
            <?php echo $micropost->content ?>
        </div>
        <p>
        	<a href="microposts/show/<?php echo $micropost->id ?>">show </a> 
            <a href="microposts/edit/<?php echo $micropost->id ?>">edit </a> 
        	<a href="microposts/delete/<?php echo $micropost->id ?>">delete </a> 
        </p>
    
    <?php endforeach ?>


</div><!-- /#content -->

<?php 
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');		
?>