<?php
#include the helper file
require_once 'helper.php';

#var_dump($_GET); #superglobal(forms) -- update/create

#stops either
#die();
$all_name = $_REQUEST['full-name'];
$age = $_GET['age'];
$gender = $_GET['gender'];

/*Getting the first name if it exists*/
$space_position = strpos($all_name,' ');

if($space_position == false){
  $first_name =  $all_name;
}else{
  $first_name =  substr($all_name,0,$space_position);
}
#save the data in a cookie
saveInCookie([$first_name,$gender]);

#echo $age;
$greeting = $first_name;
if($age <= 12){
  //redirecting you to another page in PHP
  header("Location:index.php?msg=Child, ${greeting}&greet=yes");
}else if($age >= 13 and $age <= 19){
  header("Location:index.php?msg=Teenie, ${greeting}&greet=yes");
}else if($age >= 20 and $age <= 30){
  header("Location:index.php?msg=Yout, ${greeting}&greet=yes");
}else{
  header("Location:index.php?msg=Mzito, ${greeting}&greet=yes");
}
