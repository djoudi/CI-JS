<?php $this->load->view('shared/header'); ?>
      
<h1>
	<?= $title; ?>
</h1>

<div id="content">

	
	<?=$this->load->view("shared/flash");?>
	
    <?=$this->load->view("todos/create");?>
	
    
	 <?php foreach ($todos as $todo): ?>
    
        <h2><?php echo $todo->title ?></h2>
        <div id="main">
            <?php echo $todo->content ?>
        </div>
        <p>
        	<a href="todos/show/<?php echo $todo->id ?>">show </a> 
            <a href="todos/edit/<?php echo $todo->id ?>">edit </a> 
        	<a href="todos/delete/<?php echo $todo->id ?>">delete </a> 
        </p>
    
    <?php endforeach ?>


</div><!-- /#content -->

<?php 
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');		
?>