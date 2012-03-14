<?php 
	$profile_attributes = array(
						'class' 	=> 'user_profile',
						'id'		=>	'user_profile'
						);
?>
<h1>
	<?= $title; ?>
</h1>

<div id="content">

	<!-- @todo: create a helper to remove the logic from templates? -->
	<?php if($user_message) { ?>
    	<p id="user_message" class="user_message"> 
        	<?php echo $user_message; ?>
        </p>
    <?php } ?>
    
	<p><?= $content; ?></p>
    
    
    <?= ul($user, $profile_attributes); ?>
   
    
</div><!-- /#content -->


	