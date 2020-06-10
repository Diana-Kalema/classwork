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
//recipe
//1. split strings into rows
//2. cell data from the rows.
//3. how do we incorporate this into a table.

//get the rows
$county_data_as_array = explode(',',$county_data);

#var_dump($county_data_as_array);
?>

<table border='1'>
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Governor</th>
      <th>Website</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $counter = 1;
    $parties_array = [];
    foreach($county_data_as_array as $row): ?>
      <tr>

        <?php

          $row_array = explode("–",$row);

          for($i = 0;$i < count(row_array); $i++):
        ?>
          <td><?=$counter;?></td>
          <!-- <td><?php //echo explode(".",$row_array[0])[1]; ?></td> -->
          <td><?php
            //$county_name = str_replace(" ","",

            //  substr($row_array[0],strpos($row_array[0]," "),(strpos($row_array[0],".",2) - 2))

            //);

            $county_name =   str_replace(".","",

                                str_replace("’","",
                                  str_replace(" ","",substr($row_array[0],strpos($row_array[0]," "),-1)
                                  )
                                )
                            );


            //$county_name = str_replace(" ","", explode(".",$row_array[0])[1]);

            echo $county_name;
            ?></td>
          <td>

            <?php
              $governor_name = $row_array[1];
              $party_name= $row_array[2];
              array_push($parties_array,$party_name);
              $governor_array = explode('-',$governor_name);
              //this is the Nyamira and Mandera
              if( count($governor_array) == 2):
                echo $governor_array[0];
                $party_name = $governor_array[1];
              else:
                echo $governor_name;
              endif;

             $party_img = str_replace(' ','',strtolower($party_name));
             $party_image_path = "images/$party_img.png";
            ?>
            <?php if(file_exists($party_image_path)): ?>
              <img style="width:8%;" src="<?=$party_image_path;?>" alt="<?=$party_img;?>"/>
            <?php endif; ?>

          </td>
          <td><a target="_blank" href="<?="http://".strtolower($county_name).'.go.ke' ?>" ><?="http://".strtolower($county_name).'.go.ke' ?> </a></td>

        <?php

          endfor;
        ?>
      </tr>
    <?php
      $counter++;
    endforeach; ?>

  </tbody>
  <tfoot>
    <?php
    //count all the occurences of jubilee,odm etc..
    var_dump($parties_array);?>
  </tfoot>
</table>
