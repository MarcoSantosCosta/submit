// JavaScript Document
function allowedAccess(){
	setTimeout("window.location='home.php'",0);
}
function accessDenied()
{
	setTimeout("window.location='login.php?$try=1'",0);
}