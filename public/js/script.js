// JavaScript Document


// Username 
$('#username').focus(function(){
	if(this.value=='username...') 
	{
	    this.value=''
	}    
});
$('#username').blur(function(){
	if(this.value=='') 
	{
	    this.value='username...'
	}    
});


// Password 
$('#password').focus(function(){
	if(this.value=='password...') 
	{
	    this.value=''
	}    
});
$('#password').blur(function(){
	if(this.value=='') 
	{
	    this.value='password...'
	}    
});


// Password confirm
$('#password_confirm').focus(function(){
	if(this.value=='password...') 
	{
	    this.value=''
	}    
});
$('#password_confirm').blur(function(){
	if(this.value=='') 
	{
	    this.value='password...'
	}    
});