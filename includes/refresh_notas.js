function test(){
	$.ajax({
		url:"notas.php",
		cache: false})
		.done(function(html){$(nota).html(html);})
}
setInterval('test()', 2000);