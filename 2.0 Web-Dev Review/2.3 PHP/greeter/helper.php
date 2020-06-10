<?php


function printy(){
  echo 'yeah'; //prints out something
  //doesnt return anything
 return 'something';
}
//$value = printy();
//var_dump($value

/**
 Saves the submitted form data into a cookie
 $new looks like : ['example-name',43,'male'] - array
*/
function saveInCookie($new){

  $cookie = $_COOKIE['greeter'];//Associative array
  /* $_COOKIE
  [
    'greeter' => "["
      "["'example',43,'male'"]"
      ---
    "]"

  ]
  */
  if(isset($cookie)){

    $greeters = getCookieAsArray($cookie);
    //[2,3]
    //array_push([2,3],4)
    //[2,3,4]
    array_push($greeters,$new);

  }else{
    $greeters = array(
      $new
    );
  }

  //convert array into a string -- json (data-exchange)
  $json = json_encode($greeters);

  //save cookie
  setcookie('greeter', $json);

}
/**
  Get the saved cookie as an array
*/
function getCookieAsArray($cookie){

  $cookie = stripslashes($cookie);
  //echo $cookie;
  //var_dump(json_decode($cookie, true));
  #die();
  return json_decode($cookie, true);
}
#saveInCookie(['amos',22,'male']);
#getCookieAsArray($_COOKIE['greeter']);
