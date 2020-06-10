<?php
/**
  Counties in the Republic of Kenya,Governors and their Political Parties.
*/

$county_data = "1. Mombasa. – Hassan Ali Joho – ODM,
2. Kwale. – Salim Mvurya – Jubilee,
3. Kilifi. – Amason Jeffah Kingi – ODM,
4. Tana River. – Dhadho Godhana – ODM,
5. Lamu. – Fahim Yasin Twaha – Jubilee,
6. Taita-Taveta. – Granton Samboja – WDM K,
7. Garissa. – Ali Bunow Korane – Jubilee,
8. Wajir. – Mohamed Abdi Mohamud – Jubilee,
9. Mandera. – Ali Ibrahim Roba - Jubilee,
10. Marsabit – Mohamud Mohamed Ali – Jubilee,
11. Isiolo – Mohamed Abdi Kuti – Independent,
12. Meru – Kiraitu Murungi – Jubilee,
13. Tharaka Nithi – Onesmus Muthomi Njuki – Jubilee,
14. Embu – Martin Nyaga Wambora – Jubilee,
15. Kitui – Charitu Ngilu – Narc Kenya,
16. Machakos – Alfred Mutua – CCM,
17. Makueni – Kivutha Kibwana – WDM K.,
18. Nyandarua – Francis Kimemia – Jubilee,
19. Nyeri – Mutahi Kahiga – Jubilee,
20. Kirinyaga. – Ann Waiguru – Jubilee,
21. Murang’a – Mwangi wa iria – Jubilee,
22. Kiambu. – Ferdinand Waititu Babayao – Jubilee,
23. Turkana. – Josphat Nanok – ODM,
24. West Pokot. – John Krop Lonyang’apuo. – KANU,
25. Samburu. – Moses Kasainie Lenolkulal – Jubilee,
26. Trans-Nzoia. – Patrick Khaemba – FORD Kenya,
27. Uasin gishu. – Jackson Mandago – Jubilee,
28. Elgeyo Marakwet. – Alex Tanui Tolgas – Jubilee,
29. Nandi. – Stephen Sang – Jubilee,
30. Baringo – Stanley K Kipris. – Jubilee,
31. Laikipia – Ndiritu Muriithi – Independent,
32. Nakuru. – Lee Kinyanjui – Jubilee,
33. Narok – Samuel Kuntai Ole Tunai – Jubilee,
34. Kajiado. – Joseph Ole Lenku – Jubilee,
35. Kericho. – Prof.Paul Chepkwony Kiprono – Jubilee,
36. Bomet. – Hillary Barchok – Jubilee,
37. Kakamega. – Wyclife Oparanya – ODM,
38. Vihiga. – Wilber Ottichilo – ODM,
39. Bungoma. – Wyclife Wafula Wangamiti – ODM,
40. Busia. – Sospeter Ojaamong – ODM,
41. Siaya. – Cornel Rasanga. – ODM,
42. Kisumu. – Peter Anyang Nyong’o. – ODM,
43. Homabay. – Cyprian Awiti – ODM,
44. Migori. – Zachary Okoth Obado – ODM,
45. Kisii. – James Ongware – ODM,
46. Nyamira. – John Nyangarama Obiena - ODM,
47. Nairobi. – Mike Sonko Mbuvi Kioko – Jubilee";

/**
 You should not modify anything above this line
*/

// @TODO : Your code starts here
/**
* Recipe

1. split strings into rows
2. cell data from the rows.
3. how do we incorporate this into a table.

*/
//function to come up with
/**
1. Returns a url from the name (mombasa) http://mombasa.go.ke
2. Splits the string into a 2d array (rows,cells)
3. Prints out the table
4. Political party distribution
5. returns a nice name from the county name
*/

/**
[
  [47,..]
  [46...]
]

{ [47] [Nairobi] [Mike Sonko Mbuvi Kioko] [http://nairobi.go.ke] [Jubilee]}
{ [46] [Nyamira] [John Nyangarama Obiena] [http://nyamira.go.ke] [ODM]}

* It returns a 2d array of the county data.
*/
function splitter($county_string){
  $counties_array = explode(",",$county_string);
  /**
    [
      "44. Migori. – Zachary Okoth Obado – ODM",
      "45. Kisii. – James Ongware – ODM"
    ]
  */

  array_walk($counties_array,'update_string');

  return $counties_array;
}
/**
Returns the link to a county website
*/
function getWebsite($county_name){
  //regular expressions
  //preg_replace()

  $county_name = str_replace("’","",
                  str_replace("-","",
                    str_replace(" ","",$county_name)
                  )
                );

  return "<a href='http://$county_name.go.ke'>"."http://$county_name.go.ke</a>";
}

function update_string(&$str,$key){
  $str = explode("–",$str);

  $county_name = $str[0];
  $county_number_and_name = explode('.',$county_name);

  $governor_name = $str[1];
  $political_party = str_replace(".","",$str[2]);

  //take care of Mandera and Nyamira
  if(strpos($governor_name,'-')){
    //do something
    $governor_name_party = explode('-',$governor_name);
    $governor_name = $governor_name_party[0];
    $political_party = $governor_name_party[1];
  }
  $political_party = strtolower(str_replace(" ","",$political_party));
  $img_path = "images/$political_party.png";

  if(file_exists($img_path)){
    $img_party = "<img style='width:8%;' src='$img_path' />";
    $governor_name = $governor_name .$img_party;
  }

  //Number of the county
  $str[0] = $county_number_and_name[0];

  //Name of the county
  $str[1] = $county_number_and_name[1];

  //Name of the governor
  $str[2] = $governor_name;

  //Website of the county
  $str[3] = getWebsite($county_number_and_name[1]);

  //Name of the political party
  $str[4] = $political_party;
}


/*
$kenya = "Kenya";

function changeName(&$country){
  $country = "Republic of $country";
  return $country;
}

echo changeName($kenya);
echo '<br/>';
echo $kenya;
*/

function printTable($array_2d,$ppDistribution){

  echo "<table border='1'>";

    echo "<thead><tr>";
      echo "<th>#</th>";
      echo "<th>Name</th>";
      echo "<th>Governor</th>";
      echo "<th>Website</th>";
    echo "</tr></thead>";

    echo "<tbody>";

    foreach($array_2d as $row):
      echo "<tr>";
      #print_r($row);
        foreach ($row as $key => $cell):
          /*if($key < 4){
            echo "<td>".$cell.'</td>';
          }*/
          echo ($key < 4) ? "<td>".$cell.'</td>' : "";
        endforeach;
      echo "</tr>";

    endforeach;

    echo "</tbody>";
    echo "<tfoot><tr><td colspan='4'>";

      foreach($ppDistribution as $key => $value):
        echo "<p>$key : $value</p>";
      endforeach;
    echo "</td></tr></tfoot>";
  echo "</table>";


}

function getPartyDistribution($array_2d){
  $political_parties = array_column($array_2d,4);
  return array_count_values($political_parties);
}

$our_array = splitter($county_data);
$ppD = getPartyDistribution($our_array);

printTable($our_array,$ppD);



?>
