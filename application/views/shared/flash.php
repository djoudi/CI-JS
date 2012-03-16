<?php 
	if(validation_errors()) {
		echo '<div class="flash validation">' . validation_errors() . '</div>'; 
	}
?>

<?php 
	if($this->session->flashdata('fail')) {
	
	echo '<div class="flash fail"><p>' . $this->session->flashdata('fail') . '</p></div>';
	
	}

	if($this->session->flashdata('success')) {
	
	echo '<div class="flash success"><p>' . $this->session->flashdata('success') . '</p></div>';
	
	}
	
	if($this->session->flashdata('warning')) {
	
	echo '<div class="flash warning"><p>' . $this->session->flashdata('warning') . '</p></div>';
	
	}

?>