<?php 
	
	$input_username = array(
						'name' 	=>	'username',
						'value'	=>	'username...',
						'size' 	=>	'50',
						'id' 	=>	'username'
						);
	$input_password = array(
						'name' 	=>	'password',
						'value'	=>	'password...',
						'size' 	=>	'50',
						'id' 	=>	'password'
						);	
	$input_password_confirm = array(
						'name' 	=>	'password_confirm',
						'value'	=>	'password...',
						'size' 	=>	'50',
						'id' 	=>	'password_confirm'
						);										
	

?>
<h1>
	{title}
</h1>

<div id="content">

	<p>{content}</p>
    
		<?php echo validation_errors(); ?>
        

    
        <?php echo form_open('users/create') ?>
        	
            <?php //form_hidden() ?>
            
        	<ul id="user_create" class="user_profile user_create">
          		<li>
               	 	<?= form_label("What is your first name?", 'first_name'); ?>
                    <br />
            		<?= form_input("first_name", ''); ?>
                </li>
          		<li>
                	<?= form_label("What is your last name?", 'last_name'); ?>
		            <br />
					<?= form_input("last_name", ''); ?>
                </li>
          		<li>
            		<?= form_label("Choose a username.", 'username'); ?>
            		<br />
                	<?= form_input($input_username); ?>
            	</li>
                
                <li>
                	<?= form_label("What is your email address?", 'email'); ?>
		            <br />
					<?= form_input("email", ''); ?>
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
        	</ul>
  
            <?= form_submit('userCreate', 'Create an account'); ?>
            
       <?= form_close(); ?>     

        <br />
        <br />
        
	   <?= anchor(site_url("users/"), "return to login page?", 'title="return to login page?"'); ?>



</div><!-- /#content -->