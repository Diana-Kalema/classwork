<?php
# making a choice randomly :)
$options = ["Tailwind","Bulma","uikit","foundation","MaterialDesign"];

#more randomnness... who is the shyest person in BBIT 3 a,b,c..?

$name = "Antony Mwala";

$name_length = strlen($name);

#array_rand() n times(where n is the number of letters in that persons name)

# :) Anthony, Sandra and Nicole

$final_int_pos = 0;
while($name_length <= 0){
  $final_int_pos = array_rand($options,1);
  $name_length = $name_length - 1;
}
//framework
//echo $options[$final_int_pos];

$str_one = "a string";
$str_two = 'a string';
//printing out..
$str_one;
//print($str_two);

#inbuilt functions..standard library

$dirty_string="Douglas%20Bitok";

#takes a none or number of arguments
#does something
#returns an output(echo '' or return '33
#parameter vs argument
#function str_upper($string){
#  return ucwords(strtolower($string));
#}

#str_upper($dirty_string);

$dirty_string = str_replace("%20","<br>",$dirty_string);

$dirty_string;

$unique_name = 'He said, \'Hi\'';
$unique_name_2 = "He said, 'Hi'";

#substituting variables into strings
$age = 24;
$name = "Davie";

$sentence = "My name is ".$name.' and i am'.$age.' years old.';

$sentence_1 = "My name is ${name} and i am ${age} years old";

$sentence_1;

$name = "John Kuria";//100
$other_name = "Januaris Musyoki";

$space_position = strpos($name,' ');
$first_name =  substr($name,0,$space_position);

$salutation = "Dear ${first_name}";

echo $salutation;
