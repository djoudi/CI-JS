<h1>
	{title}
</h1>

<div id="content">

	<p>{content}</p>
   
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
