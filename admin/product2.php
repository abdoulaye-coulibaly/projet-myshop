<?php
include("../config.php");
  if (isset($_POST['valider'])) {
   $name= $_POST['name'];
   $price= $_POST['price'];    
   $descrip= $_POST['descrip'];
   $image=$_FILES['image']['name'];
   $image_temp_name=$_FILES['image']['tmp_name'];
   $image_temp_folder="Downloads/".$image;
      
   if (empty($name)||empty($price)||empty($descrip)||empty($image)) {
     $message[]="please complete all case";
   }else {
    $sam= new product_information();
    $sam-> new_product($image,$name,$price,$descrip);
    if ($sam) {
        move_uploaded_file( $image_temp_name,  $image_temp_folder);
    }else {
        $message[]="problem to add";
    }

   }   
   
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>my_shop</title>
    <script src="https://kit.fontawesome.com/538942b924.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="">
<?php if (isset($message)) {
       foreach($message as $message){
        echo '<span>'.$message.'</span>';
       }
    }?>

<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;1,600&display=swap" rel="stylesheet" />
<style>

</style>

<div class="bg-slate-200 flex h-screen">
  <aside class="fixed z-50 md:relative">
    <!-- Sidebar -->
    <input type="checkbox" class="peer hidden" id="sidebar-open" />
    <label class="peer-checked:rounded-full peer-checked:p-2 peer-checked:right-6 peer-checked:bg-gray-600 peer-checked:text-white absolute top-8 z-20 mx-4 cursor-pointer md:hidden" for="sidebar-open">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </label>
    <nav aria-label="Sidebar Navigation" class="peer-checked:w-64 left-0 z-10 flex h-screen w-0 flex-col overflow-hidden bg-gray-700 text-white transition-all md:h-screen md:w-64 lg:w-72">
      <div class="bg-slate-800 mt-5 py-2 pl-10 md:mt-10">
        <img src="/image/logo.png" alt="img" class="h-[100px]">
      </div>
      <ul class="mt-8 space-y-3 md:mt-20">
          <svg class="text-slate-200 absolute -right-1 -top-1/2 z-10 hidden h-32 w-8 md:block" xmlns="http://www.w3.org/2000/svg" viewBox="399.349 57.696 100.163 402.081" width="1em" height="4em">
            <path fill="currentColor" d="M 499.289 57.696 C 499.289 171.989 399.349 196.304 399.349 257.333 C 399.349 322.485 499.512 354.485 499.512 458.767 C 499.512 483.155 499.289 57.696 499.289 57.696 Z" />
          </svg>
        </li>
        <li class="relative">
          <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
            <span>
            <i class="fas fa-shopping-bag"></i>
            </span>
              <span class="">Produits</span>
          </button>
        </li>
        <li class="relative">
          <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
            <span class="text-2xl"
              ><i class="fab fa-elementor"></i></span
            ><span class="">Categories</span>
          </button>
        </li>
        <li class="relative">
          <a href="profile2.php">
          <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
            <span
              ><i class="fas fa-user-circle"></span></i><span class="">Profile</span>
          </button>
          </a>
        </li>
      </ul>

    </nav>
  </aside>
  <!-- /Sidebar -->

  <div class="flex h-full w-full flex-col">
    <!-- Navbar -->
    <header class="relative flex flex-col items-center bg-white px-4 py-4 shadow sm:flex-row md:h-20">
        <div class="flex w-full flex-col justify-between overflow-hidden transition-all sm:max-h-full sm:flex-row sm:items-center">
            <div class="relative ml-10 flex items-center justify-between rounded-md sm:ml-auto">
            <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" class=""></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
            </svg>
            <input type="name" name="search" class="h-12 w-full rounded-md border border-gray-100 bg-gray-100 py-4 pr-4 pl-12 shadow-sm outline-none focus:border-blue-500" placeholder="Rechercher" />
            </div>

            <ul class="mx-auto mt-4 flex space-x-6 sm:mx-5 sm:mt-0">
            <a  href="../index2.php"class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">Home</a> 
            <a  href="../log_out.php"class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">Deconnexion</a> 
            </ul>
        </div>
        </header>
    
        <!-- /Navbar -->



    <!-- Main -->
    <div class="h-full overflow-hidden pl-2">
        <main id="dashboard-main" class="h-[calc(100vh-10rem)] overflow-auto px-4 py-10">

            <div class="w-full flex justify-between border rounded-lg border-gray-300 bg-gray-50 items-center mb-3 mt-1 pl-3">

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8 p-2">
                    <div class="">
                      <button class="bg-green-700 text-white rounded-md px-4 py-2 hover:bg-green-700 transition" onclick="openModal('modelConfirm')">
                          Ajouter
                        </button>

                        <!-- MODAL POUR AJOUTER UN PRODUIT -->

                        <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

                                <div class="flex justify-end p-2">
                                    <button onclick="closeModal('modelConfirm')" type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>

                                <form action="" method="POST" enctype="multipart/form-data">
                                  <div class="p-6 pt-0 ">
                                    <div class="w-full mb-3">
                                      <input type="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nom du produit" required />
                                    </div>

                                    <div class="w-full mb-3">
                                      <input type="number" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="$" required />
                                    </div>


                                    <div class="w-full mb-3">
                                      <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                      <textarea id="message" rows="4" name="descrip" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description du produit "></textarea>
                                    </div>

                                    <div class="w-full">
                                      <fieldset class="w-full space-y-1 dark:text-gray-800">
                                        <div class="flex w-full">
                                          <input type="file" name="image" class="px-8 py-12 border-2 border-dashed rounded-md dark:border-gray-300 dark:text-gray-600 dark:bg-gray-100 w-full" accept="imgage/png,image/jpeg,image/jpg">
                                        </div>
                                        </fieldset>
                                      </div>
                                      <div class="text-center">
                                        <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Êtes-vous sure d'ajouter ce produit ?</h3>
                                        <a href="product2.php"  onclick="closeModal('modelConfirm')"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                            Annuler
                                        </a>
                                        <a href="product2.php" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                        <input type="submit"name="valider" value="Envoyer" onclick="closeModal('modelConfirm') class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                          data-modal-toggle="delete-user-modal">
                                          </a>
                                      </div>
                                  </div>
                                </form>

                            </div>
                        </div>

                        <!-- FIN MODAL POUR AJOUTER UN PRODUIT -->

                    </div>
                    <div class=""></div>
                </div>
            </div>
           
            <!-- DEBUT DU TABLEAU  -->
      <?php   
        $conn= new product_information();
        $row=$conn->show_product();
      ?>
        <div class="flex flex-col">
        <div class=" overflow-x-auto pb-4">
            <div class="block">
                <div class="overflow-x-auto w-full  border rounded-lg border-gray-300">
                    <table class="w-full rounded-xl">
                        <thead>
                            <tr class="bg-gray-50">
                                <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Photo </th>
                                <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Noms </th>
                                <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize min-w-[150px]"> Descriptions </th>
                                <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Prix </th>
                                <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Actions </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 ">
                        <?php  
                              
                          foreach($row as $row)
                          echo "
                          <tr class='bg-white transition-all duration-500 hover:bg-gray-50'>
                            <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 '> 
                              <img src= Downloads/".$row['img_blob']." alt='Product image' class='w-16 h-16 object-cover rounded' />
                            </td>
                            <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>".$row['product_nom']."</td>
                            <td class='w-48 px-5 py-3'>
                                <div class='flex items-center gap-3'>
                              <p class='font-normal text-xs leading-5 text-gray-900'>".$row['img_desc']." </p>
                              </div>
                          </td>
                          <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                              <div>
                                  <span>".$row['img_price']." $</span>
                              </div>
                          </td>
                          <td class='flex p-5 items-center gap-0.5'>
                          <td class='flex p-5 items-center gap-0.5'>
                          <a href='updateproduct.php?id=$row[id]'><i class='m-2 text-green-500 text-xl fa-solid fa-pen-to-square'></i> </a>
                          <a href='deleteproduct.php?id=$row[id]'><i class='m-2 text-red-500 text-xl fa-solid fa-trash'></i> </a>
                          </td>
                        </td>
                        </tr>
                        ";?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
    <!-- /Main -->
  </div>
</div>


<script src="script/modal.js"></script>
</body>
</html>
