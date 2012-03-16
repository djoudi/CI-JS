<div id="todo_create">
	
	<?php echo form_open('todos/save') ?>
    
    	<ul id="todo" class="todo todo_fields">
        	<li>
            	<?= form_hidden('user_id', $user_id); ?>
                <label for="title">What would you like to add to your todo list?</label>  <br />
                <input type="input" name="title" />  <input type="submit" name="submit" value="Create" /> 
            </li>
          
        </ul>    
       
    
    </form>
    
</div><!-- /#todo_create -->