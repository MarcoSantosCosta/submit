function refresh_notas(){
	$.ajax({
		url:"notas.php",
		cache: false})
		.done(function(html){$(result).html(html);})
}
setInterval('refresh_notas()', 2000);