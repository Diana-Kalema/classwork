<?php
#including the helper.php file (require vs include... require_once vs include_once?)
require_once 'helper.php';
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Greeter</title>
    <style media="screen">
      .toasty-greeter{
        width : 35%;
      }
      .toastify-avatar{
        width: 50% !important;
        height: 50% !important;
        float:right;
      }

    </style>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  </head>

  <body>

    <div class="flex">

      <div class="mx-auto px-4 mx-4 py-6 w-2/3">
        <form action="process.php" method="GET" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <div class="mb-12">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="full-name">
              Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="full-name" name="full-name" type="text" required placeholder="Please enter your full name" pattern="[A-Za-z ]{1,32}" title="Letters,only example {fname lname}">
          </div>

          <div class="mb-12">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
              Age
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="age" name="age" type="number" required placeholder="Please enter your age">
          </div>

          <div class="mb-12">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
              Gender
            </label>
            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="gender" name="gender" required>
                <option value="">Please select</option>
                <option value="f">Female</option>
                <option value="m">Male</option>
            </select>
          </div>

          <div class="flex items-center justify-between">
            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline inline-flex" type="submit">
              <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path class="heroicon-ui" d="M17.62 10H20a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H8.5c-1.2 0-2.3-.72-2.74-1.79l-3.5-7-.03-.06A3 3 0 0 1 5 9h5V4c0-1.1.9-2 2-2h1.62l4 8zM16 11.24L12.38 4H12v7H5a1 1 0 0 0-.93 1.36l3.5 7.02a1 1 0 0 0 .93.62H16v-8.76zm2 .76v8h2v-8h-2z"/>
              </svg>
              <span>Salimia Me</span>
            </button>

          </div>
        </form>
      </div>

      <div class="mx-auto py-6 w-1/3">
        <table class="text-left w-2/3 border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
         <thead>
           <tr>
             <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
             <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Gender</th>
           </tr>
         </thead>

          <tbody>
            <?php
              //var_dump($_COOKIE);
              $greetings = getCookieAsArray($_COOKIE['greeter']);
              //var_dump($greetings[2]);
              //$names = "Nickson,Wiseman,Melody,Myra";
              // # | Name
              // 1 | Nickson
              // 2 | Wiseman
              //$names_array = explode(',',$names);
              //var_dump($names_array);
              //var_dump(implode(',',$names_array));
              //var_dump($greetings);
              //iterative structure..
              //$simpleton = [3,4,5,6];
              foreach($greetings as $row):

            ?>

            <tr class="hover:bg-grey-lighter">
              <td><?=$row[0];?></td>
              <td><?= ($row[1] == 'f') ? 'Female' : 'Male';?></td>
              <!-- <td><?php
                /*if($row[1] == 'm'){
                  echo 'Male';
                }else{
                   echo 'Female';
                 }*/
                ?></td> -->

            </tr>
          <?php endforeach; ?>
          </tbody>
      </div>

    </div>
    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="text/javascript">

    <?php
      if( $_GET['greet'] == "yes"):
     ?>
        //Toasts
        Toastify({
          text: "<?="Hello ".$_GET['msg'];?>",
          duration: 10000,
          destination: "#",
          newWindow: false,
          close: false,
          gravity: "top", // `top` or `bottom`
          position: 'left', // `left`, `center` or `right`
          backgroundColor: "linear-gradient(90deg, rgba(2,0,36,0) 0%, rgba(9,9,121,1) 6%, rgba(255,255,255,1) 50%)",
          stopOnFocus: true, // Prevents dismissing of toast on hover
          avatar: 'greeter2.gif',
          className: 'toasty-greeter',
          onClick: function(){} // Callback after click
        }).showToast();
      <?php endif; ?>

  </script>
  </body>

</html>
