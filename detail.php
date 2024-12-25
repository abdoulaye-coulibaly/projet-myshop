<?php
include ('config.php');
$id=$_GET['id'];
$del=new product_information();
$read=$del->read_product($id);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/538942b924.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>my_shop</title>
</head>
<body >

    <header class="shadow mb-2">
        <div class="relative flex max-w-screen-xl flex-col overflow-hidden px-4 py-4 md:mx-auto md:flex-row md:items-center">
        <a href="#" class="flex items-center whitespace-nowrap text-xl font-black">
            <img src="image/logo.png" alt="logo" class="h-[80px]">
        </a>
        <input type="checkbox" class="peer hidden" id="navbar-open" />
        <label class="absolute top-5 right-7 cursor-pointer md:hidden" for="navbar-open">
            <span class="sr-only">Toggle Navigation</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </label>
        <nav aria-label="Header Navigation" class="peer-checked:mt-8 peer-checked:max-h-56 flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all md:ml-24 md:max-h-full md:flex-row md:items-start">
            <ul class="flex flex-col items-center space-y-2 md:ml-auto md:flex-row md:space-y-0">
            <li class="text-gray-600 md:mr-12 hover:text-green-600"><a href="index.php">Home</a></li>
            <li class="text-gray-600 md:mr-12 hover:text-green-600">
                <a href="login/sign_up.php"><button class="rounded-full border-2 border-green-600 px-6 py-1 font-medium text-green-600 transition-colors hover:bg-green-600 hover:text-white">Sign up</button></a>
                <a href="login/sign_in.php"><button class="rounded-full border-2 border-green-600 px-6 py-1 font-medium text-green-600 transition-colors hover:bg-green-600 hover:text-white">Sigin in</button></a>
            </li>
            
            </ul>
        </nav>
        </div>
    </header>

    <section class="relative p-5">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mx-auto max-md:px-2 ">
                <div class="img">
                    <div class="img-box h-full max-lg:mx-auto ">
                        <img  src="/admin/Downloads/<?= $read['img_blob']; ?>" alt='Product image'
                            class="max-lg:mx-auto lg:ml-auto h-[500px] object-cover">
                    </div>
                </div>
                <div
                    class="data w-full lg:pr-8 pr-0 xl:justify-start justify-center flex items-center max-lg:pb-10 xl:my-2 lg:my-5 my-0">
                    <div class="data w-full max-w-xl">
                        
                        <h2 class="font-manrope font-bold text-3xl leading-10 text-gray-900 mb-2 capitalize"><?php echo $read['product_nom']?></h2>
                        
                        <h6 class="font-manrope font-semibold text-2xl leading-9 text-gray-900 pr-5 mr-5"> <?php echo $read['img_price'].'$';?></h6>

                        <p class="text-gray-500 text-base font-black mb-5"><?php echo $read['img_desc']?></p>
                        <ul class="grid gap-y-4 mb-8">
                            <li class="flex items-center gap-3">
                                <span><i class="fa-regular fa-square-check"></i></span>
                                <span class="font-normal text-base text-gray-900 ">100% Qualité</span>
                            </li>

                            <li class="flex items-center gap-3">
                                <span><i class="fa-regular fa-square-check"></i></span>
                                <span class="font-normal text-base text-gray-900 ">100% garantis</span>
                            </li>
                        </ul>


                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-8">
                            <div class="flex sm:items-center sm:justify-center w-full">
                                <button
                                    class="group py-4 px-6 border border-gray-400 rounded-l-full bg-white transition-all duration-300 hover:bg-gray-50 hover:shadow-sm hover:shadow-gray-300">
                                    <svg class="stroke-gray-900 group-hover:stroke-black" width="22" height="22"
                                        viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                                        <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                                            stroke-linecap="round" />
                                        <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                                            stroke-linecap="round" />
                                    </svg>
                                </button>
                                <input type="text"
                                    class="font-semibold text-gray-900 cursor-pointer text-lg py-[13px] px-6 w-full sm:max-w-[118px] outline-0 border-y border-gray-400 bg-transparent placeholder:text-gray-900 text-center hover:bg-gray-50"
                                    placeholder="1">
                                <button
                                    class="group py-4 px-6 border border-gray-400 rounded-r-full bg-white transition-all duration-300 hover:bg-gray-50 hover:shadow-sm hover:shadow-gray-300">
                                    <svg class="stroke-gray-900 group-hover:stroke-black" width="22" height="22"
                                        viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="#9CA3AF" stroke-width="1.6"
                                            stroke-linecap="round" />
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="black" stroke-opacity="0.2"
                                            stroke-width="1.6" stroke-linecap="round" />
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="black" stroke-opacity="0.2"
                                            stroke-width="1.6" stroke-linecap="round" />
                                    </svg>
                                </button>
                            </div>
                            <button
                                class="text-center w-full px-5 py-4 rounded-[100px] bg-green-600 flex items-center justify-center font-semibold text-lg text-white shadow-sm transition-all duration-500 hover:bg-green-700 hover:shadow-green-400">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="relative mt-20 bg-gray-900 px-4 pt-20">
        <div class="absolute -top-10 left-1/2 h-16 w-16 -translate-x-1/2 rounded-xl border-4 border-green-500 bg-white p-2"><img class="h-full object-contain" src="/image/logo.png" alt="" /></div>
        <nav aria-label="Footer Navigation" class="mx-auto mb-10 flex max-w-lg flex-col gap-10 text-center sm:flex-row sm:text-left">
            <a href="#" class="font-medium text-white">Shop</a>
            <a href="#" class="font-medium text-white">Shopping</a>
            <a href="#" class="font-medium text-white">Online</a>
            <a href="#" class="font-medium text-white">Termes et Conditions</a>
        </nav>
        <p class="py-10 text-center text-gray-300">© 2024 My shop online | Tous droits reserver </p>
    </footer>
                                            

</body>
</html>
