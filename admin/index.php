<?php 
  session_start();

  if (!isset($_SESSION['is_admin'])) {
    header('location: /login/sign_in.php');
  }

 
 
  include ('../config.php');

  




 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>MY SHOP</title>
    <script src="https://kit.fontawesome.com/538942b924.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
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
          <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg></span
            ><span class="">Dashboard</span>
          </button>
        </li>
        <li class="relative">
          <a href="user.php">
          <button class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 text-gray-300 focus:outline-none">
            <span
              ><i class="fa-regular fa-user"></i> </span
            ><span class="">Utilisateurs</span>
          </button>
          <svg class="text-slate-200 absolute -right-1 -top-1/2 z-10 hidden h-32 w-8 md:block" xmlns="http://www.w3.org/2000/svg" viewBox="399.349 57.696 100.163 402.081" width="1em" height="4em">
            <path fill="currentColor" d="M 499.289 57.696 C 499.289 171.989 399.349 196.304 399.349 257.333 C 399.349 322.485 499.512 354.485 499.512 458.767 C 499.512 483.155 499.289 57.696 499.289 57.696 Z" />
          </svg>
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
          <a href="profile.php">
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
            <li class="">
            <a  href="../index2.php"class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">Home</a> 
            <a  href="../log_out.php"class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">Deconnexion</a> 
                            

                <div id="deconnexionmodal" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                    <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

                        <div class="flex justify-end p-2">
                          
                        </div>

                    </div>
                </div>
            </li>
            </ul>
        </div>
        </header>
    <!-- /Navbar -->

    <!-- Main -->
    <div class="h-full overflow-hidden pl-2">
      <main id="dashboard-main" class="h-[calc(100vh-10rem)] overflow-auto px-4 py-10">
        <!-- Put your content inside of the <main/> tag -->
      <h1 class="text-2xl font-black text-gray-800">Hello goat !</h1>
        <p class="mb-6 text-gray-600">Bienvenue sur votre tableau de bord, vous pouvez commencer vos actions.</p>
        <div class="flex flex-wrap gap-x-4 gap-y-8">

          <a href="user.php">
            <div class="h-56 w-72 rounded-xl bg-white p-10 shadow-md ">
            <div class="flex">
              <div class="mr-3">
              <span class="bg-green-400 rounded-full p-4"><i class="text-white font-black text-xl fa-regular fa-user "></i></span>
              </div>
              <span class="font-black text-xl ">Utilisateurs</span>
            </div>
              <div class="mt-8 flex justify-between">
              <span class="font-black text-xl">Total</span><h1 class="text-green-400 font-black text-2xl">
              <?php 
                count_users();
                ?>
              </h1>
              </div>
            </div>
          </a>
          <a href="product.php">
            <div class="h-56 w-72 rounded-xl bg-white p-10 shadow-md ">
              <div class="flex">
                <div class="mr-3">
                  <span class="bg-green-400 rounded-full p-4"><i class="text-white font-black text-xl fas fa-shopping-bag"></i></span>
                </div>
                  <span class="font-black text-xl ">Produits</span>
              </div>
              <div class="mt-8 flex justify-between">
              <span class="font-black text-xl">Total</span><h1 class="text-green-400 font-black text-2xl"> <?php 
                count_product();
                ?></h1>
              </div>
            </div>
          </a>

          <a href="profile.php">
            <div class="h-56 w-72 rounded-xl bg-white p-10 shadow-md ">
              <div class="flex">
                <div class="mr-3">
                  <span class="bg-green-400 rounded-full p-4"><i class="text-white font-black text-xl fas fa-user-circle"></i></span>
                </div>
                <span class="font-black text-xl">Profile</span>
              </div>
              <div class="mt-8">
                <h1 class="font-black ">Voir vos informations personnel et modifier vos informations si vous voulez</h1>
              </div>
            </div>
          </a>
        </div>
      </main>
    </div>
    <!-- /Main -->
  </div>
</div>

</body>
</html>