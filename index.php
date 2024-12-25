<?php 

session_start();
include("config.php");

  if(($_GET)){
    $classInstance = new users_informatioin();
    $classInstance->searchName($_GET['search']);
    
  }

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>MY SHOP</title>
    <link rel="shortcut icon" href="/image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>

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
 
    <section class="relative h-64 sm:h-[600px] flex flex-col items-center justify-center text-center text-white ">
        <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden">
            <video class="min-w-full min-h-full absolute object-cover"
                src="pub.mp4"
                type="video/mp4" autoplay muted loop></video>
        </div>
        <div class="video-content space-y-2 z-10">
            <h1 class="font-light text:text-2xl sm:text-6xl">Bienvenue sur notre site</h1>
            <h3 class="font-light text:text-2xl sm:text-3xl">My Shop Online</h3>
        </div>
    </section>

    <section class="mx-auto m-2 lg:mt-5 w-screen max-w-screen-md py-10 lg:py-20 leading-6"> 
      <form class="relative mx-auto flex w-full max-w-2xl items-center justify-between rounded-md border shadow-lg" action="searchResult.php" method="GET"> 
        <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8" class=""></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
        </svg>
        <input name="search" type="name" class="h-14 w-full rounded-md py-4 pr-40 pl-12 outline-none focus:ring-2" placeholder="Rechercher" />
        <input type="submit" value="Search" class="absolute right-0 mr-1 inline-flex h-12 items-center justify-center rounded-lg bg-gray-900 px-10 font-medium text-white focus:ring-4 hover:bg-gray-700"/>
      </form>
    </section>

  <section>
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-2">
        <div class="lg:p-5">
          <div class="rounded-lg m-3">
                <div class="space-y-2">
                    <details class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition">
                        <span class="text-sm font-medium"> Categories </span>

                        <span class="transition group-open:-rotate-180">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-4"
                            >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                        </summary>

                        <div class="border-t border-gray-200 bg-white">
                        <header class="flex items-center justify-between p-4">
                            <span class="text-sm text-gray-700"> 0 Selected </span>

                            <button type="button" class="text-sm text-gray-900 underline underline-offset-4">
                            Reset
                            </button>
                        </header>

                        <ul class="space-y-1 border-t border-gray-200 p-4">
                            <li>
                            <label for="FilterInStock" class="inline-flex items-center gap-2">
                                <input type="checkbox" id="FilterInStock" class="size-5 rounded border-gray-300" />

                                <span class="text-sm font-medium text-gray-700"> In Stock (5+) </span>
                            </label>
                            </li>

                            <li>
                            <label for="FilterPreOrder" class="inline-flex items-center gap-2">
                                <input type="checkbox" id="FilterPreOrder" class="size-5 rounded border-gray-300" />

                                <span class="text-sm font-medium text-gray-700"> Pre Order (3+) </span>
                            </label>
                            </li>

                            <li>
                            <label for="FilterOutOfStock" class="inline-flex items-center gap-2">
                                <input type="checkbox" id="FilterOutOfStock" class="size-5 rounded border-gray-300" />

                                <span class="text-sm font-medium text-gray-700"> Out of Stock (10+) </span>
                            </label>
                            </li>
                        </ul>
                        </div>
                    </details> 
                </div>
            </div>

            <div class="rounded-lg m-3">
                <details class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition">
                        <span class="text-sm font-medium"> Price </span>

                        <span class="transition group-open:-rotate-180">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-4"
                            >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                        </summary>

                        <div class="border-t border-gray-200 bg-white">
                        <header class="flex items-center justify-between p-4">
                            <span class="text-sm text-gray-700"> The highest price is $600 </span>

                            <button type="button" class="text-sm text-gray-900 underline underline-offset-4">
                            Reset
                            </button>
                        </header>

                        <div class="border-t border-gray-200 p-4">
                            <div class="flex justify-between gap-4">
                            <label for="FilterPriceFrom" class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">$</span>

                                <input
                                type="number"
                                id="FilterPriceFrom"
                                placeholder="From"
                                class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
                                />
                            </label>

                            <label for="FilterPriceTo" class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">$</span>

                                <input
                                type="number"
                                id="FilterPriceTo"
                                placeholder="To"
                                class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
                                />
                            </label>
                            </div>
                        </div>
                        </div>
                    </details>
            </div>

            <div class="rounded-lg m-3">
                <details class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition">
                        <span class="text-sm font-medium"> Price </span>

                        <span class="transition group-open:-rotate-180">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-4"
                            >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                        </summary>

                        <div class="border-t border-gray-200 bg-white px-4 py-2">
                          <select id="SortBy" class="h-10 bg-white text-sm w-full">
                            <option>Trier par</option>
                            <option value="Title, DESC">Title, DESC</option>
                            <option value="Title, ASC">Title, ASC</option>
                            <option value="Price, DESC">Price, DESC</option>
                            <option value="Price, ASC">Price, ASC</option>
                          </select>

              </div>
                    </details>
            </div>
      
            <?php   
        $conn= new product_information();
        $row=$conn->show_product();
      ?>
            


      </div>
      <div class="p-5 col-span-3">
      <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8">
            <?php   
              
              foreach($row as $row)
               {
                
            ?> 
                <a href="detail.php?id=<?php echo $row['id'];?>"
                    class="relative bg-cover group rounded-3xl bg-center overflow-hidden mx-auto sm:mr-0 xl:mx-auto cursor-pointer">
                    <img class="rounded-2xl h-80 w-80 object-cover" src="/admin/Downloads/<?= $row['img_blob']; ?>" alt='Product image' class='w-16 h-16 object-cover rounded' />
                    <div
                        class="absolute z-10 bottom-3 left-0 mx-3 p-3 bg-white w-[calc(100%-24px)] rounded-xl shadow-sm shadow-transparent transition-all duration-500 group-hover:shadow-green-200 group-hover:bg-green-50">
                        <div class="flex items-center justify-between mb-2">
                            <h6 class="font-semibold text-base leading-7 text-black "><?php echo $row['product_nom']?></h6>
                            <h6 class="font-semibold text-base leading-7 text-green-600 text-right">$<?php echo $row['img_price']?> </h6>
                        </div>
                        <p class="text-xs leading-5 text-gray-500"><?php echo $row['img_desc']?></p>
                    </div>
                </a>
                <?php } ?>   
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

