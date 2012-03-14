<?php
	// JUST MESSING, BUT GET THIS OUT OF THE VIEW!
 	$this->benchmark->mark('code_start');  

	$meta = array(
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'description', 'content' => 'An exercise in good coding practices using CodeIgniter as a framwork. 
							Exploring concepts such as MVC, OOP, Active Record & ORM.  And hopefully making it a bit pretty too.'),
        array('name' => 'keywords', 'content' => 'love, passion, intrigue, deception'),
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
    );
	
	doctype('html5');
?>
<head>
	<?= meta($meta) ?>
    <?= link_tag('public/css/style.css', 'stylesheet', 'text/css', '', 'all') ?>
    <?= link_tag('public/css/typography.css', 'stylesheet', 'text/css', '', 'all') ?>
    <?= link_tag('public/css/css3.css', 'stylesheet', 'text/css', '', 'all') ?>
    
    <!--[if IE]>
    <?= link_tag('public/css/ie.css', 'stylesheet', 'text/css', '', 'all') ?>
    <![endif]-->

	<base href="<?= site_url() ?>/index.php" />

	<title><?php $title ?></title>

	
</head>
<body>
<div id="container">
	<div id="inner-wrapper">