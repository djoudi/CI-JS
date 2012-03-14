<?php $this->load->view('shared/header'); ?>
<h1>
	<?= $title; ?>
</h1>

<div id="content">

	<?=$this->load->view("shared/flash");?>
	
	<p><?= $content; ?></p>
    
    <?php echo validation_errors(); ?>

	<?php echo form_open('microposts/save') ?>
    
    	<ul id="microposts" class="microposts micropost_create">
        	<li>
            	<?= form_hidden('user_id', $user_id); ?>
                <label for="title">Title</label> 
		        <br />
    		    <input type="input" name="title" value="<?= $micropost['title']; ?>"/>
            </li>
            <li> 
            	<label for="content">Content</label>
        		<br />
        		<textarea name="content" rows='5' cols='75'><?= $micropost['content']; ?></textarea>
        	</li>
            <li>
            	<input type="submit" name="submit" value="Create" /> 
            </li>
        </ul>    
       
    
    </form>
    
     <p><?= anchor(site_url("microposts/"), "back to microposts", 'title="back to microposts"'); ?></p>
    
   

</div><!-- /#content -->

<?php 
	$this->load->view('shared/sidebar');
    $this->load->view('shared/footer');		
?>
	