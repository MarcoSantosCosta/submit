// JavaScript Document
$(document).ready(function()
{
		$.ajax({
			type: 'SESSION',
			dataType: 'html',
			url: 'result.php',
			success: function(msg)
                {
                    var data = msg;
                    $('#result').html(data).fadeIn();              
                }
		});
});