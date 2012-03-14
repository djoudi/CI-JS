<h1>
	{title}
</h1>

<div id="content">

 	
    <p><?= anchor(site_url("news/create"), "create new news item", 'title="create new news item"'); ?></p>
   
      
    <?php foreach ($news as $news_item): ?>
    
        <h2><?php echo $news_item['title'] ?></h2>
        <div id="main">
            <?php echo $news_item['text'] ?>
        </div>
        <p><a href="news/<?php echo $news_item['slug'] ?>">View article</a></p>
    
    <?php endforeach ?>

    
    
</div><!-- /#content -->
