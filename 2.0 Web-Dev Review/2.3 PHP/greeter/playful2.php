<?php
#square bracket notation
$my_students = ["Marvin",110785,"Nicholas","Wisdom"];
#print_r( $my_students); #elements
$name = "Saruni";
#using the array()
$my_students = array(104414,$name);


#var_dump($my_students);
echo "<br>";
echo "<br>";
#associative array - explicitly define the keys
$student_list = [
  113641 => "Ian",
  110486 => 'Wachira',
  11649  => "Oyaro",
];

#Accessing - indexes (integers-automatically defined) (varied (key)types-ints,string-explicitly defined)
#echo $my_students[1];
$full_name = "Saruni Muthui";

$my_students[1] = $full_name;

#echo $my_students[1];

//remove
unset($my_students[1]);

#var_dump($my_students);

#unset($student_list[11649]);

#var_dump($student_list);

$array1  = [];
$array2 = ['one'];

var_dump(isset($student_list[116498]));
echo '<br>';
var_dump(isset($array3));

#one-d, n-d
/* -- table
  1. index-1 Don
  2. index-2 Mark
  3. index-3 Joan
*/

$student_list_kcse = [
  [1,'index-1','Don'],
  [2,'index-2','Mark'],
  [3,'index-3','Joan']
];

$d_3 = [
  ["Stephen",[1,4]],
  ["Thiarara",[1,5]],
];
echo $student_list_kcse[2][2];
echo $student_list_kcse[1][2];

echo $d_3[1][1][1];
#accessing the second one
echo $d_3[1][1][0];
