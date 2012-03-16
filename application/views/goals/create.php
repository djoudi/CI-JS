<div id="goal_create">
	
	<?php echo form_open('goals/save') ?>
    
    	<ul id="goal" class="goal goal_fields">
        	<li>
            	<?= form_hidden('user_id', $user_id); ?>
                <label for="title">Make a new goal:</label>  <br />
                <input type="input" name="title" />  <input type="submit" name="submit" value="Create" /> 
            </li>
        </ul>    
       
    
    </form>
    
</div><!-- /#goal_create -->