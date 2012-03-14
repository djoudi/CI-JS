<?php 
	if(validation_errors()) {
		echo '<div class="validation">' . validation_errors() . '</div>'; 
	}
?>

<?php 
	if($this->session->flashdata('fail')) {
	
	echo '<div class="fail"><p>' . $this->session->flashdata('fail') . '</p></div>';
	
	}

	if($this->session->flashdata('success')) {
	
	echo '<div class="success"><p>' . $this->session->flashdata('success') . '</p></div>';
	
	}
	
	if($this->session->flashdata('warning')) {
	
	echo '<div class="warning"><p>' . $this->session->flashdata('warning') . '</p></div>';
	
	}

?>