<?php
   /* cargamos configuración de moodle ayuda.php*/
   require_once(dirname(__FILE__).'/../config.php');
   if (!isloggedin())
{
  $user =$_GET["identifier"];
  require_once('formulario2.php');

}
else{

  require_login();
  require_once('formulario1.php');
}

/*
Hi {$a->firstname}, Someone (probably you) has requested a new password for your account '{$a->username}' on '{$a->sitename}'. To change your password, please go to the following web address: {$a->link} In most mail programs, this should appear as a blue link which you can just click on. If that doesn't work, then cut and paste the address into the address line at the top of your web browser window. If you need help, please contact the site administrator, {$a->admin}*/