$(document).ready(function(e) {
	
    
	$('#slider').cycle({ 
    fx:      'fade', 
    timeout:5000,
	next:'#next',
	prev:'#prev',
	pager:'#pager',
	speed:500, 
    cleartypeNoBg:true 
});
})
