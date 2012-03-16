<div id="sidebar">
	<p><?= $sidebar_header; ?></p>
    <ul id="submenu">
    	<li><?= anchor(site_url("users/profile"), "user profile", 'title="user profile"'); ?></li>
    	<li><?= anchor(site_url("news/"), "news", 'title="news"'); ?></li>
		<li><?= anchor(site_url("microposts/"), "microposts", 'title="microposts"'); ?></li>
        <li><?= anchor(site_url("goals/"), "goals", 'title="goals"'); ?></li>
        <li><?= anchor(site_url("todos/"), "todos", 'title="todos"'); ?></li>
        <li><?= anchor(site_url("comments/"), "comments", 'title="comments"'); ?></li>
        
    <?php if($this->session->userdata('logged_in')) { ?>
    	<li>Greetings, <?= anchor('users/profile', $this->session->userdata('username'), 'title="my profile"'); ?></li>
        <li><?= anchor(site_url("users/update"), "update profile", 'title="update profile"'); ?></li>
		<li><?= anchor(site_url("users/logout"), "logout", 'title="logout"'); ?></li>
		
    <?php } else { ?>
		<li><?= anchor(site_url("users/"), "login?", 'title="login"'); ?></li>
	<?php } ?>
    	
    </ul>
	
    
    

</div>