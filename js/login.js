$(document).ready (function () 
{
   $("#login").mousedown (function () 
   {
       $("#index_loginForm2").toggle ();
   });
   
   $("#login_placement").load ("login.txt");
});