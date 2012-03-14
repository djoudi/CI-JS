<?php 
	
	$input_username = array(
						'name' 		=>	'username',
						'value'		=>	$user['username'],
						'size' 		=>	'50',
						'id' 		=>	'username',
						'disabled' 	=>	'DISABLED',
						'class'		=>	'disabled'
						);
	$input_password = array(
						'name' 	=>	'password',
						'value'	=>	'',
						'size' 	=>	'50',
						'id' 	=>	'password'
						);	
	$input_password_confirm = array(
						'name' 	=>	'password_confirm',
						'value'	=>	'',
						'size' 	=>	'50',
						'id' 	=>	'password_confirm'
						);										

?>
<h1>
	<?= $title; ?>
</h1>

<div id="content">

	<p><?= $content; ?></p>
    
		<?php echo validation_errors(); ?>
        

    
        <?php echo form_open('users/create') ?>
        	
            <?php //form_hidden() ?>
            
        	<ul id="user_edit" class="user_profile user_edit">
          		<li>
               	 	<?= form_label("What is your first name?", 'first_name'); ?>
                    <br />
            		<?= form_input("first_name", $user['first_name']); ?>
                </li>
          		<li>
                	<?= form_label("What is your last name?", 'last_name'); ?>
		            <br />
					<?= form_input("last_name", $user['last_name']); ?>
                </li>
          		<li>
            		<?= form_label("*username cannot be changed.", 'username'); ?>
            		<br />
                	<?= form_input($input_username); ?>
            	</li>
                
                <li>
                	<?= form_label("What is your email address?", 'email'); ?>
		            <br />
					<?= form_input("email", $user['email']); ?>
                </li>
          		<li>
             		<?= form_label("Choose a password:", 'password'); ?>
           			<br />
                 	<?= form_password($input_password); ?>
           		</li>
          		<li>
        	        <?= form_label("Confirm password:", 'password_confirm'); ?>
		            <br />
					<?= form_password($input_password_confirm); ?>
                </li>
  				<li>
                	 <br />
					 <?= form_submit('userCreate', 'Update'); ?>
                </li>
        	</ul>
  
            
       <?= form_close(); ?>     

        <br />
        <br />
        
	   <?= anchor(site_url("users/"), "return to login page?", 'title="return to login page?"'); ?>



</div><!-- /#content -->