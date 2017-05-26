$(document).ready(function(){
	$("#tambah_img").attr('disabled','disabled');
	
	$("form").keyup(function(){
	
	//To disable submit button
	$("#tambah_img").attr('disabled','disabled');

	//Validating Fields
	var name=$("#images").val();
	var email=$("#email").val();
	var message=$("#message").val();
	var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

	if(!(images==""))
	{
	
	
	//To enable submit button 
	$("#submit").removeAttr('disabled');
	$("#submit").css({"cursor":"pointer","box-shadow":"1px 0px 6px #333"});
	}
});


});