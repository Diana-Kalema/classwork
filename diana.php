<?php
/**
@NB : Do not modify array structure
An users database
*/
/*$users = [
["id"=>1,"name"=>"Mwega Rafiki","email" => "mwega@example.com","admin"=>1,"gender"=>0],
["id"=>2,"name"=>"Martha","email" => "martha@example.com","admin"=>0,"gender"=>1],
["id"=>3,"name"=>"Mary","email" => "mary@example.com","admin"=>0,"gender"=>1],
["id"=>4,"name"=>"Lazarus","email" => "laz@example.com","admin"=>0,"gender"=>0],
["id"=>5,"name"=>"Lasaraleen","email" => "las@example.com","admin"=>0,"gender"=>1],
["id"=>6,"name"=>"Shasta","email" => "shasta@example.com","admin"=>1,"gender"=>0],
["id"=>7,"name"=>"Lucy","email" => "lucy@example.com","admin"=>1,"gender"=>1],
["id"=>8,"name"=>"Tat Hermit","email" => "hermit@example.com","admin"=>0,"gender"=>0],
["id"=>9,"name"=>"Bree","email" => "bree@example.com","admin"=>0,"gender"=>0],
["id"=>10,"name"=>"Kin Loon","email" => "loon@example.com","admin"=>1,"gender"=>0],
["id"=>11,"name"=>"Hwin","email" => "hwin@example.com","admin"=>0,"gender"=>1]
];*/

class Users {

    private $users = [
    ["id"=>1,"name"=>"Mwega Rafiki","email" => "mwega@example.com","admin"=>1,"gender"=>0],
    ["id"=>2,"name"=>"Martha","email" => "martha@example.com","admin"=>0,"gender"=>1],
    ["id"=>3,"name"=>"Mary","email" => "mary@example.com","admin"=>0,"gender"=>1],
    ["id"=>4,"name"=>"Lazarus","email" => "laz@example.com","admin"=>0,"gender"=>0],
    ["id"=>5,"name"=>"Lasaraleen","email" => "las@example.com","admin"=>0,"gender"=>1],
    ["id"=>6,"name"=>"Shasta","email" => "shasta@example.com","admin"=>1,"gender"=>0],
    ["id"=>7,"name"=>"Lucy","email" => "lucy@example.com","admin"=>1,"gender"=>1],
    ["id"=>8,"name"=>"Tat Hermit","email" => "hermit@example.com","admin"=>0,"gender"=>0],
    ["id"=>9,"name"=>"Bree","email" => "bree@example.com","admin"=>0,"gender"=>0],
    ["id"=>10,"name"=>"Kin Loon","email" => "loon@example.com","admin"=>1,"gender"=>0],
    ["id"=>11,"name"=>"Hwin","email" => "hwin@example.com","admin"=>0,"gender"=>1]
    ];
    
    // to get the name and email of the users
    public function get_name_and_email()
    {
    for($i=0 ;$i<count($this->users);$i++){
    
    $data1 = $this->users[$i];
    
      echo "Name-> " .$data1['name']. "&nbsp&nbsp&nbsp&nbsp". "</br>". " Email->   ".$data1['email']."</br>";
    }
    }
    
    
    // class to get the name of all female users
    public function female_users_name()
    {
      for($i=0 ;$i<sizeof($this->users);$i++){
      $data2 = $this->users[$i];
    
      $gender=$data2['gender'];
    
    if($gender==1)
    {
    echo "name: " .$data2['name']. "</br>";
    }
    
    }
    }
    
    
    
    //return users with two names
    public function with_two_names()
    {
      for($i=0 ;$i<count($this->users);$i++){
    
      $data3 = $this->users[$i];
      $name_data =  $data3['name'];
    
      if ($name_data == trim($name_data) && strpos($name_data, ' ') !== false) {
    
            echo 'name : '.$name_data.'</br>';
      }
    }
    }
    
      public function access_users()
      {
         $userext = $this->users;// hold the details of the private variable $users
      for($i=0 ;$i<count($userext);$i++){
    
          $data4 = $userext[$i];
        $admin=$data4['admin'];
    if($admin==1){
      $admin_name=$data4["name"];
      echo "admin:".  $admin_name.'</br>';
      }
    }
    
    }
    
    }
    
    class Admin extends Users
    {
    
    public function Admin_fetch()
    {
    //creating an instance of the class
    $userext = new Users();
    return $userext->access_users();
    }
    }
    
    
    $user_fetch=new Users(); // instantiating the class users
    $admin_fetched = new Admin();
    
    
    
    echo '<h3>Name and Email</h3>';
    $details=$user_fetch->get_name_and_email();
    echo '<br><h3>Female</h3>';
     $details2=$user_fetch->female_users_name();
     echo '<br><h3>Two Names</h3>';
    $details3 =$user_fetch->with_two_names();
    echo '<br><h3>Admin</h3>';
      $details4=$admin_fetched->Admin_fetch();
    
    





























      
/*$dm = new User($users);
echo '<h3> Names</h3>';
echo json_encode($dm->returnTwoNames());
echo '<br><h3>Females</h3>';
echo json_encode($dm->returnFemaleUsers());
echo '<br><h3>Users</h3>';
echo json_encode($dm->returnUsers());
echo '<br><h3>Admin</h3>';
$xd = new Admin($users);



//echo '<br><h3>Admin</h3>';
    //$sample = $user_fetch->access_users();
  


class User{ 
    private $users;

    public function __construct($users)
    {
        $this->users = $users;
    }


    function returnUsers(){
       $t1 = array();
       $t2 = array();
       foreach ($this->users as $key => $value) {
        $t2 = array();
        $t2 = ["name"=>$value['name'], "email"=>$value['email']];
        array_push($t1, $t2);
       } 
       return $t1;
    }

    function returnFemaleUsers(){
        $t1 = array();
        $t2 = array();
        foreach ($this->users as $key => $value) {
         $t2 = array();
         if ($value['gender']==1) {
            $t2 = ["name"=>$value['name']];
         }
         array_push($t1, $t2);
        } 

        return $t1;
    }

    function returnTwoNames(){
        $t1 = array();
        $t2 = array();
        foreach ($this->users as $key => $value) {
         $t2 = array();
         if ($value['name'] == trim($value['name']) && strpos($value['name'], ' ') !== false) {
            $t2 = $value;
        }
         array_push($t1, $t2);
        } 

        return $t1;
    }
}

class Admin {
    private $users;
    function __construct($users){
        $this->users = $users;
    }

    function __destruct(){
        $t3 = array();
        foreach ($this->users as $k => $v) {
            if ($v['admin'] == 1) {
                array_push($t3,$v);
            }
        }
        echo json_encode($t3) ;
    }
}

?>*/









/*$arr_length = count($users);

class User{
    private $id;
    private $name;
    private $email;
    private $admin;
    private $gender;

public function __construct (int $id, string $name, string $email, int $admin, int $gender){
    $this -> id = $id;
    $this-> name = $name;
    $this-> email = $email;
    $this-> admin = $admin;
    $this-> gender = $gender;


}
function User(){
    return array
}
}*/