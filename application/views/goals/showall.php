<?php $this->load->view('shared/header'); ?>
      
<h1>
	<?= $title; ?>
</h1>

<div id="content">

	
	<?=$this->load->view("shared/flash");?>
	
    <?=$this->load->view("goals/create");?>
	
    
    <ul id="goal_list" class="goals goal_list">
	 <?php foreach ($goals as $goal): ?>
    
        <li class="goal">
			<span><?php echo $goal->title ?></span>
        	<a href="goals/show/<?php echo $goal->id ?>">show </a> 
            <a href="goals/edit/<?php echo $goal->id ?>">edit </a> 
        	<a href="goals/delete/<?php echo $goal->id ?>">delete </a> 
        </li>
    
    <?php endforeach ?>
	<ul>

</div><!-- /#content -->

<?php 
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');		
?>