<?php $this->load->view('shared/header'); ?>
<h1>
	<?= $title; ?>
</h1>

<div id="content">

	 <?=$this->load->view("shared/flash");?>
	
	<p><?= $content; ?></p>
   
    <h2><?php echo $micropost['title']; ?></h2>
    <div id="main">
        <?php echo $micropost['content']; ?>
    </div>
    <p>
        <a href="microposts/edit/<?php echo $micropost['id']; ?>">edit </a>
        <a href="microposts/delete/<?php echo $micropost['id']; ?>">delete </a>
        <a href="microposts/showall/">return</a>
    </p>
    
  

</div><!-- /#content -->

<?php 
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');		
?>