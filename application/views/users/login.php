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

?>
<h1>
	{title}
</h1>

<div id="content">

	<p>{content}</p>
    
		<?php echo validation_errors(); ?>
    
        <?php echo form_open('users/login') ?>
        	<ul>
            	<li>
            		<?= form_label("Choose a username.", 'username'); ?>
            		<br />
                	<?= form_input($input_username); ?>
            	</li>
                <li>
             		<?= form_label("Choose a password:", 'password'); ?>
           			<br />
                 	<?= form_password($input_password); ?>
           		</li>
        	</ul>
                   
             
             
            <?= form_submit('userLogin', 'Login!'); ?>
            
       <?= form_close(); ?>     
		
        <br />
        <br />
        
        <?= anchor(site_url("users/register"), "create a new account?", 'title="register to create an account"'); ?>


</div><!-- /#content -->