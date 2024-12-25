<?php 
  session_start();

  if($_POST)
    {
        $name=verify_name($_POST["name"]);
        $email=verify_email($_POST["email"]);
        $password=verify_password($_POST["password"],$_POST["password_confirmation"]);
        $_SESSION['name']=$_POST["name"];

        if($name!=null && $email!=null && $password!=null){
            $new_user=new users_informatioin();
            $new_user->sign_up($name,$email,$password);
            header('Location: profile.php');
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
    <title>my_shop</title>
    <script src="https://kit.fontawesome.com/538942b924.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="">

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
            <li class="relative">
            <a href="index.php">
            <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                <span
                ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg></span
                ><span class="">Dashboard</span>
            </button>
            </a>
            </li>
            <li class="relative">
                <a href="user.php">
                <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                <span><i class="fa-regular fa-user"></i></span>
                <span class="">Utilisateurs</span>
            </button>
                </a>
            </li>
            <li class="relative">
            <a href="product.php">
            <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                <span>
                <i class="fas fa-shopping-bag"></i>
                </span>
                <span class="">Produits</span>
            </button>
            </a>
            </li>
            <li class="relative">
            <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
                <span class="text-2xl"
                ><i class="fab fa-elementor"></i></span
                ><span class="">Categories</span>
            </button>
            </li>
            <li class="relative">
            <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
                <span
                ><i class="fas fa-user-circle"></span></i><span class="">Profile</span>
            </button>
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
            <li class="">
            <a  href="../index2.php"class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">Home</a> 
            <a  href="../log_out.php"class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">Deconnexion</a> 
            </li>
            </ul>
        </div>
        </header>
        <!-- /Navbar -->

        <!-- Main -->
        <div class="h-full overflow-hidden pl-2">
        <main id="dashboard-main" class="h-[calc(100vh-10rem)] overflow-auto px-4 py-10">

        <!-- DEBUT DE DESIGNE DU PROFILE  -->

        <div class="flex w-full flex-col bg-white">
            <div class="flex justify-center pt-12 md:justify-start md:pl-12">
            </div>
            <div class="my-auto flex flex-col justify-center px-6 md:pl-12 pt-8 sm:pt-0 md:justify-start">
            <p class="text-center text-3xl font-bold md:text-left">Bienvenue sur votre profile, vous avez la possibilité de modifier vos informations</p>

            <form class="flex flex-col items-stretch pt-3 pb-8 md:pt-8">
                <div class="grid gap-x-4 gap-y-3 sm:grid-cols-2">
                    <label class="block" for="name">
                        <p class="mb-1 mt-2 text-sm text-gray-600">Name</p>
                        <input class="w-full rounded-md border bg-white py-2 px-2 outline-none ring-green-500 focus:ring-2" type="name" name="name" placeholder="Entrer votre name"  value="<?php if(isset($name)){echo $name;}?>"/>
                    </label>
                    <label class="block" for="phone">
                        <p class="mb-1 mt-2 text-sm text-gray-600">Email</p>
                        <input class="w-full rounded-md border bg-white py-2 px-2 outline-none ring-green-500 focus:ring-2" type="email" name="email" placeholder="Entrer votre Email"value="<?php if(isset($email)){echo $name;}?>" />
                    </label>
                    <label class="block" for="name">
                    <p class="mb-1 mt-2 text-sm text-gray-600">New Password</p>
                    <input class="w-full rounded-md border bg-white py-2 px-2 outline-none ring-green-500 focus:ring-2" type="Password" name="Password" placeholder="Entrer votre Password" />
                </label>
                <label class="block" for="phone">
                    <p class="mb-1 mt-2 text-sm text-gray-600">Password confirmation</p>
                    <input class="w-full rounded-md border bg-white py-2 px-2 outline-none ring-green-500 focus:ring-2" type="Password" name="Password_confimation" placeholder="Confirmer votre Password" />
                </label>

                </div>
                <button type="submit" class="mt-6 rounded-full bg-green-400 px-4 py-2 text-center text-white text-base font-semibold font- shadow-md outline-none ring-green-500 ring-offset-2 transition hover:bg-green-400 focus:ring-2 md:w-40">Valider</button>
            </form>
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
