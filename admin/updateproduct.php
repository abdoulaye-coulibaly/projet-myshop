<?php
include ('../config.php');
$id=$_GET['id'];

// $read =$conn -> read_product($id);
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
     $conn = new product_information();
     $add=$conn -> update_product($id,$name,$price,$descrip,$image);
 
     if ($add) {
         move_uploaded_file( $image_temp_name,  $image_temp_folder);
         header("location:product2.php");
       
     }else {
         $message[]="problem to add";
     }
 
    }   
    
   };
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<?php   
        
      ?>
        <div class="fixed z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

            <form enctype="multipart/form-data" method="post">
                <div class="p-6 pt-4 ">
                <div class="w-full mb-3">
                    <input type="name" name="name" value="<?= $row['product_name'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nom du produit" required />
                </div>

                <div class="w-full mb-3">
                    <input type="number" name="price" value="<?= $row['product_price'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="$" required />
                </div>


                <div class="w-full mb-3">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="message" rows="4" name="descrip" value="<?=$row['product_description'];?>" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description du produit "></textarea>
                </div>

                <div class="w-full">
                    <fieldset class="w-full space-y-1 dark:text-gray-800">
                    <div class="flex w-full">
                        <input type="file" name="image" value="<?= $row['product_price'];?>" class="px-8 py-12 border-2 border-dashed rounded-md dark:border-gray-300 dark:text-gray-600 dark:bg-gray-100 w-full" accept="imgage/png,image/jpeg,image/jpg">
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
                    <input type="submit" name="valider" value="Envoyer" onclick="closeModal('modelConfirm') class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                        data-modal-toggle="delete-user-modal">

                     </a>
                    </div>
                </div>
            </form>
            </div>
        </div>
 
</body>
</html>