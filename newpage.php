<?php
include('addqst.php');
// Initialiser la session
session_start();
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

</head>

<body class="body bg-gradient-to-t from-gray-100 to-gray-100">
    <div class="fixed w-full z-30 flex bg-sky-400 p-2 items-center justify-center h-16 px-10 shadow-lg">
        <a href="" class="ml-8 flex items-center space-x-3 rtl:space-x-reverse">
            <img src="img/logodw.png" class="h-10" alt="" />
        </a>
        <!-- SPACER -->
        <div class="grow h-full flex items-center justify-center"></div>
        <div class="flex-none h-full text-center flex items-center justify-center">
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <li>
                        <a href="dashboardm.php" class="mr-40 py-2 px-3 text-black rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Accueil</a>
                    </li>
                    <li>
                        <a href="newpage.php" class="mr-40 py-2 px-3 text-black rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Commmunity</a>
                    </li>

                </ul>
            </div>


            <div class="flex space-x-3 items-center px-3">
                <a href="logout.php" class="text-red rounded-full hover:before:bg-red relative h-[50px] w-40 overflow-hidden border-none  bg-[#1E293B] px-3 py-3 text-red-500 shadow-2xl transition-all before:absolute before:bottom-0 before:left-0 before:top-0 before:z-0 before:h-full before:w-0 before:bg-red-500 before:transition-all before:duration-500 hover:text-white hover:shadow-red-500 hover:before:left-0 hover:before:w-full"><span class="relative z-10 text-white font-bold">Deconnexion</span></a>
            </div>

        </div>
    </div>
    <aside class="w-60 -translate-x-48 fixed transition transform ease-in-out duration-1000 z-50 flex h-screen bg-sky-400 shadow-xl mt-16">
        <!-- open sidebar button -->
        <div class="max-toolbar translate-x-24 scale-x-0  -right-6 transition transform ease-in duration-300 flex items-center justify-between bg-grey-100 shadow-lg  absolute top-2 rounded-full h-12">

            <div class="flex pl-2 items-center space-x-2 ">

            </div>
            <div class="flex items-center space-x-3 group bg-gradient-to-r dark:from-blue-700 dark:to-sky-500 from-indigo-500  pl-10 pr-2 py-1 rounded-full text-white  ">
                <div class="transform ease-in-out duration-300 mr-12">
                    Data-Ware
                </div>
            </div>
        </div>
        <div onclick="openNav()" class="-right-6 transition transform ease-in-out duration-500 flex border-4 border-white bg-sky-500 dark:hover:bg-blue-500 absolute top-2 p-3 rounded-full text-white hover:rotate-45">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3} stroke="currentColor" class="w-4 h-4">
                <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
        </div>
        <!-- MAX SIDEBAR-->
        <div class="max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
            <div class="hover:ml-4 w-full text-white  dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-4 h-4">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <div>
                    Home
                </div>
            </div>
            <div class="hover:ml-4 w-full text-white dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
                <div>
                    Table
                </div>
            </div>
            <div class="hover:ml-4 w-full text-white  dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                </svg>
                <div>
                    Graph
                </div>
            </div>
            <div class="hover:ml-4 w-full text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
                <button>
                    filter by date
                </button>
            </div>
            <div class="hover:ml-4 w-full text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
                <button>
                    filter by Projects
                </button>
            </div>
            <div>
                <form action="newpage.php" method="post">
                    <?php
                    $stmt = mysqli_prepare($conn, "SELECT id_pro, nom_pro FROM projet");
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $id, $projetnom);
                    ?>
                    <?php
                    echo "<button type='submit' name='filterall'  class='flex bg-[#1E293B] w-[80%] hover:ml-4 text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300' filterpro>All</button>";
                    while (mysqli_stmt_fetch($stmt)) {
                        echo "<div class='flex items-center space-x-3'>
                      <button type='submit' name='filterproj' value='$id' class='flex bg-[#1E293B] w-[80%] hover:ml-4 text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300' filterpro>$projetnom</button>
                  </div>";
                    }
                    ?>
                </form>

                <?php
                $filter = false;
                if (isset($_POST['filterproj'])) {
                    $idpro = $_POST['filterproj'];
                    $filter = true;
                } elseif (isset($_POST['filterall'])) {
                    $filter = false;
                }
                ?>


            </div>


            <!-- MINI SIDEBAR-->
            <div class="mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
                <div class="hover:ml-4 justify-end pr-5 text-white  hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-4 h-4">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </div>
                <div class="hover:ml-4 justify-end pr-5 text-white dark:hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                </div>
                <div class="hover:ml-4 justify-end pr-5 text-white dark:hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                    </svg>
                </div>
            </div>

    </aside>
    <!-- CONTENT -->
    <div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
        <nav class="flex justify-between px-5 py-3 text-gray-700  rounded-lg bg-gray-50 shadow-lg " aria-label="Breadcrumb">
            <ol class=" inline-flex items-center  space-x-1 md:space-x-3">
                <li>
                    <form action="config.php" class="relative mx-auto w-max" id="mysearch">
                        <input type="search" id="search" class="peer cursor-pointer relative z-10 h-10 w-10 rounded-full border bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-grey-500 focus:pl-50 focus:pr-4" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-8 w-12  border-grey-100 stroke-gray-500 px-3.5 peer-focus:border-gey-500 peer-focus:stroke-grey-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </form>

                </li>
            </ol>





            <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown header <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div>Bonnie Green</div>
                    <div class="font-medium truncate">name@flowbite.com</div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                    </li>
                </ul>
                <div class="py-2">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                </div>
            </div>


        </nav>
        <div class="h-[20vh]  mb-10 flex flex-col " id="searchdiv">

        </div>
        <script>
            const form = document.getElementById('mysearch');
            const searchbar = document.getElementById('search');
            const secondform = document.getElementById('myresult');
            var output = document.getElementById('searchdiv');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
            });
            searchbar.addEventListener('keydown', search);

            function search() {
                var titre = searchbar.value;
                const xhr = new XMLHttpRequest();
                xhr.open("GET", "config.php?search=" + titre, true);
                xhr.onload = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.response);
                        output.innerHTML = xhr.response;
                    } else if (titre == '') {
                        output.innerHTML = '';
                    }

                }
                xhr.send();
            }
        </script>
        <br>
        <section class="flex flex-col justify-center items-center w-full">
            <button id="addqst" type="button" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium mb-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ask Question</button>
            <div id="qstTrigger" class="hidden"></div>
            <div id="qstModal" class="hidden">
                <div>
                    <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" method="post" action="">
                        <div class="flex flex-col flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">what is your question ?</h2>
                            <div class="relative mt-2 rounded-md">
                                <input type="text" name="titre_qst" id="" class="block rounded-md border border-gray-400 w-full text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="be specific in ur question">
                            </div>
                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                Enter a description of your question
                                <textarea class=" rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-400 focus:outline-none focus:bg-white" name="descrp_qst" placeholder='give a description of your question'></textarea>
                            </div>
                            <div class="w-full md:w-full flex items-center justify-center md:w-full p-4">
                                <div class="-mr-1">
                                    <input type='submit' name="askqst" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='send'>
                                </div>
                            </div>
                    </form>
                </div>
            </div>

            <div class="">
                <button type="submit" class="block py-2 px-3 text-pink-500 font-bold rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><a href="newpage.php" class="">cancel</a>
                </button>
            </div>

        </section>








        <!-- --------------------------------------------------------------- -->


        <br>
        <section>


            <div class="w-full md:w-2/3 mx-auto p-5 bg-white rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div class="w-2/3">
                        <h2 class="section-heading text-bold">
                            Questions and Answers
                        </h2>
                    </div>


                </div>

                <div class="mt-8 space-y-8">
                    <div>
                        <?php
                        if (isset($filter)) {
                            $filt = $filter;
                        }
                        if ($filt) {
                            $sql = "SELECT titre_qst, descrp_qst, date_qst,nom,prenom FROM question inner join utilisateur on utilisateur.id = question.id_user where id_pro = $idpro";
                        } elseif (!$filt) {
                            $sql = "SELECT titre_qst, descrp_qst, date_qst,nom,prenom FROM question inner join utilisateur on utilisateur.id = question.id_user";
                        }


                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="flex justify-between ">
                                    <div class="flex">
                                        <span class="inline-flex justify-center items-center w-6 h-6 rounded bg-green-500 text-white font-medium text-sm">
                                            Q
                                        </span>

                                        <p class="ml-4 md:ml-6 text-bold">
                                            <?php
                                            echo $row["titre_qst"];
                                            ?>
                                        </p>
                                    </div>

                                    <div class="flex gap-5">
                                        <svg class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                        </svg>

                                        <svg class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                        </svg>
                                    </div>

                                </div>
                                <div class="flex items-start mt-3">
                                    <div>
                                        <span class="inline-flex justify-center items-center w-6 h-6 rounded text-gray-800 font-medium text-sm">

                                        </span>
                                    </div>

                                    <p class="ml-4 md:ml-6 text-bold">
                                        <?php
                                        echo $row["descrp_qst"];
                                        ?> </p>
                                </div>
                                <div class="grid grid-cols-2 gap-4 md:flex md:items-center mt-4 mb-10 md:ml-12">
                                    <div class="flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group">
                                        <svg class="mr-2 fill-current text-primary-black group-hover:text-primary" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z"></path>
                                        </svg>

                                        <span class="text-sm text-gray-800">
                                            10 likes
                                        </span>
                                    </div>

                                    <div class="flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group">
                                        <svg class="mr-2 fill-current text-primary-black group-hover:text-primary" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g transform="rotate(180 9 9)">
                                                <path d="M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z"></path>
                                            </g>
                                        </svg>

                                        <span class="text-sm text-gray-800">
                                            5 dislikes
                                        </span>
                                    </div>

                                    <div class="flex items-center md:ml-8">
                                        <div class="mr-2 w-6 h-6 overflow-hidden shadow rounded-full border-gray-500">
                                            <div class="w-full h-full bg-gray-200"></div>
                                        </div>

                                        <span class="text-sm text-gray-800">
                                            <?php
                                            echo $row["nom"] . " " . $row["prenom"];
                                            ?>
                                            <span class="hidden md:inline-block">
                                                <p class="ml-4 md:ml-6 text-bold">
                                                    <?php
                                                    echo $row["date_qst"];
                                                    ?> </p>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <!-- answer  -->
                                <div class="flex justify-between ">

                                    <div class="flex items-start mt-3">
                                        <div>
                                            <span class="inline-flex justify-center items-center w-6 h-6 rounded bg-gray-200 text-gray-800 font-medium text-sm">
                                                A
                                            </span>
                                        </div>

                                        <p class="ml-4 md:ml-6 text-gray-800">
                                            Yes you can get extra parking space but you have to pay extra monthly.
                                        </p>
                                    </div>

                                    <div class="flex gap-5">
                                        <svg class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                        </svg>

                                        <svg class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 md:flex md:items-center mt-4 mb-10 md:ml-12">
                                    <div class="flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group">
                                        <svg class="mr-2 fill-current text-primary-black group-hover:text-primary" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z"></path>
                                        </svg>

                                        <span class="text-sm text-gray-800">
                                            10 likes
                                        </span>
                                    </div>

                                    <div class="flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group">
                                        <svg class="mr-2 fill-current text-primary-black group-hover:text-primary" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g transform="rotate(180 9 9)">
                                                <path d="M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z"></path>
                                            </g>
                                        </svg>

                                        <span class="text-sm text-gray-800">
                                            5 dislikes
                                        </span>
                                    </div>

                                    <div class="flex items-center md:ml-8">
                                        <div class="mr-2 w-6 h-6 overflow-hidden shadow rounded-full border-gray-500">
                                            <div class="w-full h-full bg-gray-200"></div>
                                        </div>

                                        <span class="text-sm text-gray-800">
                                            <?php
                                            echo $row["nom"] . " " . $row["prenom"];
                                            ?>
                                            <span class="hidden md:inline-block">
                                                <p class="ml-4 md:ml-6 text-bold">
                                                    <?php
                                                    echo $row["date_qst"];
                                                    ?> </p>
                                            </span>
                                        </span>
                                    </div>

                                </div>
                                <!-- end answer  -->
                                <!-- answer  -->
                                <div class="flex justify-between ">

                                    <div class="flex items-start mt-3">
                                        <div>
                                            <span class="inline-flex justify-center items-center w-6 h-6 rounded bg-gray-200 text-gray-800 font-medium text-sm">
                                                A
                                            </span>
                                        </div>

                                        <p class="ml-4 md:ml-6 text-gray-800">
                                            Yes you can get extra parking space but you have to pay extra monthly.
                                        </p>
                                    </div>

                                    <div class="flex gap-5">
                                        <svg class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                        </svg>

                                        <svg class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 md:flex md:items-center mt-4 mb-10 md:ml-12">
                                    <div class="flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group">
                                        <svg class="mr-2 fill-current text-primary-black group-hover:text-primary" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z"></path>
                                        </svg>

                                        <span class="text-sm text-gray-800">
                                            10 likes
                                        </span>
                                    </div>

                                    <div class="flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group">
                                        <svg class="mr-2 fill-current text-primary-black group-hover:text-primary" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g transform="rotate(180 9 9)">
                                                <path d="M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z"></path>
                                            </g>
                                        </svg>

                                        <span class="text-sm text-gray-800">
                                            5 dislikes
                                        </span>
                                    </div>

                                    <div class="flex items-center md:ml-8">
                                        <div class="mr-2 w-6 h-6 overflow-hidden shadow rounded-full border-gray-500">
                                            <div class="w-full h-full bg-gray-200"></div>
                                        </div>

                                        <span class="text-sm text-gray-800">
                                            <?php
                                            echo $row["nom"] . " " . $row["prenom"];
                                            ?>
                                            <span class="hidden md:inline-block">
                                                <p class="ml-4 md:ml-6 text-bold">
                                                    <?php
                                                    echo $row["date_qst"];
                                                    ?> </p>
                                            </span>
                                        </span>
                                    </div>

                                </div>
                                <!-- end answer -->

                        <?php
                            }
                            mysqli_free_result($result);
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

        <script>
            const sidebar = document.querySelector("aside");
            const maxSidebar = document.querySelector(".max")
            const miniSidebar = document.querySelector(".mini")
            const roundout = document.querySelector(".roundout")
            const maxToolbar = document.querySelector(".max-toolbar")
            const logo = document.querySelector('.logo')
            const content = document.querySelector('.content')
            const moon = document.querySelector(".moon")
            const sun = document.querySelector(".sun")

            function setDark(val) {
                if (val === "dark") {
                    document.documentElement.classList.add('dark')
                    moon.classList.add("hidden")
                    sun.classList.remove("hidden")
                } else {
                    document.documentElement.classList.remove('dark')
                    sun.classList.add("hidden")
                    moon.classList.remove("hidden")
                }
            }

            function openNav() {
                if (sidebar.classList.contains('-translate-x-48')) {
                    // max sidebar 
                    sidebar.classList.remove("-translate-x-48")
                    sidebar.classList.add("translate-x-none")
                    maxSidebar.classList.remove("hidden")
                    maxSidebar.classList.add("flex")
                    miniSidebar.classList.remove("flex")
                    miniSidebar.classList.add("hidden")
                    maxToolbar.classList.add("translate-x-0")
                    maxToolbar.classList.remove("translate-x-24", "scale-x-0")
                    logo.classList.remove("ml-12")
                    content.classList.remove("ml-12")
                    content.classList.add("ml-12", "md:ml-60")
                } else {
                    // mini sidebar
                    sidebar.classList.add("-translate-x-48")
                    sidebar.classList.remove("translate-x-none")
                    maxSidebar.classList.add("hidden")
                    maxSidebar.classList.remove("flex")
                    miniSidebar.classList.add("flex")
                    miniSidebar.classList.remove("hidden")
                    maxToolbar.classList.add("translate-x-24", "scale-x-0")
                    maxToolbar.classList.remove("translate-x-0")
                    logo.classList.add('ml-12')
                    content.classList.remove("ml-12", "md:ml-60")
                    content.classList.add("ml-12")

                }

            }

            document.getElementById('addqst').addEventListener('click', function() {
                document.getElementById('qstTrigger').classList.remove("hidden");
                document.getElementById('qstModal').classList.remove("hidden");
            });
        </script>


</body>

</html>