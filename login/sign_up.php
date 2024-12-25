<?php 

session_start();
include("../config.php");

if (isset($_SESSION['password'])){
    header('Location: ../index2.php'); 
    exit;

}
if(($_POST))
    {
        $name=verify_name($_POST["name"]);
        $email=verify_email($_POST["email"]);
        $password=verify_password($_POST["password"],$_POST["password_confirmation"]);
        $_SESSION['name']=$_POST["name"];

        if($name!=null && $email!=null && $password!=null){
            $new_user=new users_informatioin();
            $verif=$new_user->verify_user($email);
            // var_dump($new_user);
            if($verif==true){
                $user_exist="Email déja existant";
            }
            elseif($verif==false){
                $new_user->sign_up($name,$email,$password);
                header('Location: sign_in.php');
            }
        }
        else{
            if($name==null){
                $erreur1="Nom invalid";
            }
            if($email==null){
                $erreur2="mail invalid";
            }
            if($password==null){
                $erreur3="password invalid";
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
    <title>MY SHOP</title>
</head>
<body class="">



<div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12 ">
            <div class="flex justify-center">
                <img src="/image/logo.png"
                    class="w-mx-auto h-24" />
            </div>
                <h1 class="text-xl font-bold leading-tight tracking-tight mt-4 text-center text-gray-900 md:text-2xl dark:text-white">
                   INSCRIPTION
                </h1>

                <form class="mt-12 flex flex-col items-center" action="" method="POST">
                    <div class="w-full flex-1 mt-8">
                        <div class="mx-auto max-w-xs">
                            
                            <div class="mb-5">
                                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom et prenom</label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                    </svg>
                                    </span>
                                    <input type="text" id="website-admin" name="name" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Anne marie"value="<?php if(isset($name)){echo $name;}?>">
                                
                                    <div>
                                        <?php
                                            if (isset($erreur1)) {
                                                echo $erreur1;
                                            }       
                                        ?>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="mb-5">
                                <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                                    </svg>
                                    </div>
                                    <input type="mail" id="email-address-icon" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Exemple@gmail.com" value="<?php if(isset($email)){echo $email;}?>">
                                    <div>
                                        <?php
                                            if (isset($erreur2)) {
                                                echo $erreur2;
                                            }       
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                                <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="*****" required />
                                <div>
                                    <?php
                                        if (isset($erreur3)) {
                                            echo $erreur3;
                                        }       
                                    ?>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmation de Mot de passe</label>
                                <input type="password" id="repeat-password" name="password_confirmation" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="*****" required />
                            </div>

                            <button
                                class="mt-5 tracking-wide font-semibold bg-green-400 text-white-500 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M20 8v6M23 11h-6" />
                                </svg>
                                <span class="ml-">
                                    S'inscrire
                                </span>
                            </button>
                            <p class="mt-6 text-xs text-gray-600 text-center">
                                Avez-vous déja un compte? <a href="sign_in.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Se connecter</a>
                            </p>

                            <div>
                                <?php
                                    if (isset($user_exist)) {
                                        echo $user_exist;
                                    }       
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
                

        </div>
        <div class="flex-1 bg-green-100 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                style="background-image: url('image/connexion.png');">
            </div>
        </div>
    </div>
</div>




</body>
</html>
