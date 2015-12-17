// JavaScript Document
$(document).ready(function(e) {
	
    
	$('#form_questoes').cycle({ 
    fx:      'fade', 
    timeout:50,
	next:'#next',
	prev:'#prev',
	pager:'#pager',
	speed:500, 
    cleartypeNoBg:true 
});
})
