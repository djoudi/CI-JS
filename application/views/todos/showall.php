<?php $this->load->view('shared/header'); ?>
      
<h1>
	<?= $title; ?>
</h1>

<div id="content">

	
	<?=$this->load->view("shared/flash");?>
	
    <?=$this->load->view("todos/create");?>
	
    
    <ul id="todo_list" class="todos todo_list">
	 <?php foreach ($todos as $todo): ?>
    
        <li class="todo">
			<span><?php echo $todo->title ?></span>
        	<a href="todos/show/<?php echo $todo->id ?>">show </a> 
            <a href="todos/edit/<?php echo $todo->id ?>">edit </a> 
        	<a href="todos/delete/<?php echo $todo->id ?>">delete </a> 
        </li>
    
    <?php endforeach ?>
	<ul>

</div><!-- /#content -->

<?php 
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');		
?>