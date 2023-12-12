<?php
include('addqst.php');
include('answerqst.php');
include('addtag.php');
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

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
            <div class="hover:ml-4 w-full text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
                <button>
                    filter by Projects
                </button>
            </div>
            <div>
            <form action="newpage.php" method="get">
                    <?php
                    $stmt = mysqli_prepare($conn, "SELECT id_pro, nom_pro FROM projet");
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $id, $projetnom);
                    ?>
                    <?php
                    echo "<button type='submit' name='filterall'  class='flex bg-[#1E293B] w-[80%] hover:m-2 text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300' filterpro>All</button>";
                    $i=0;
                    while (mysqli_stmt_fetch($stmt)) {
                        echo "<div class='flex items-center space-x-3'>
                        <input type='text' value='$id' name='filpro$i' class='hidden' >
                      <button type='submit' name='filterproj' value='$i'  class=' hover:m-2 flex bg-[#1E293B] w-[80%] my-[4px] text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300' >$projetnom</button>
                  </div>";
                  $i++;
                    }
                    
                    ?>
                </form>
                <?php
                $_SESSION['type']='filterall';
                if (isset($_GET['filterproj'])) {
                    $i = $_GET['filterproj'];
                    $_SESSION['idpro']=$_GET['filpro'.$i];
                    $_SESSION['type']='filterd';
                } elseif (isset($_GET['filterall'])) {
                    $_SESSION['type']='filterall';
                }
                ?>
            </div>
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
        </nav>
        <div class="h-[20vh]  mb-10 flex flex-col " id="searchdiv">

        </div>
        <br>
        <section class="flex flex-col justify-center items-center w-full">
            <button id="addqst" type="button" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium mb-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ask Question</button>
            <!-- <div id="qstTrigger" class="hidden"></div> -->
            <div id="qstModal" class="hidden">
                <div>
                <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" method="get" action="addqst.php">
                        <div class="flex flex-col flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">what is your question ?</h2>
                            <div class="relative mt-2 rounded-md">
                                <input type="text" name="titre_qst" id="titre_qst" class="block rounded-md border border-gray-400 w-full text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="be specific in ur question">
                            </div>
                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                Enter a description of your question
                                <textarea id="textarea" class=" rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-400 focus:outline-none focus:bg-white" name="descrp_qst" placeholder='give a description of your question'></textarea>
                            </div>
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add Tags</h2>
                            <div class="flex flex-row items-center relative mt-2 rounded-md">
                                <span class="flex flex-wrap py-5" id="tagdiv"></span><img class="w-[8%]" src="img/plus.svg" alt="add tag" id="addtag">
                            </div>
                            <div class="w-full md:w-full flex items-center justify-center md:w-full p-4">
                            <input type="text" class="hidden" value="" name="idhna" id="idhna">
                            </div>
                    </form>
                    <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" method="get" action="">
                    <div class="-mr-1">
                    <input type="submit" value="Add Question" id="sendbtn" name="askqst" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">
                    </div>
                </form>
                </div>
            </div>

            <div class="">
                <button type="submit" class="block py-2 px-3 text-pink-500 font-bold rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><a href="newpage.php" class="">cancel</a>
                </button>
            </div>

        </section>
        <script>
            //hadi dyal recherche
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

            //add question form wa fhm
            const addtags = document.getElementById('addtag');
            const tagdiv = document.getElementById('tagdiv');
            const textarea = document.getElementById('textarea');
            const idhna = document.getElementById('idhna');
            addtags.addEventListener("click", add);
            let x = 1;
            function add(e) {
                let tag = ` <input type="text" name="tag" id="taginput" class="block rounded-md border border-gray-400 w-[20%] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 taginput" placeholder="add tag">`
                tagdiv.innerHTML += tag;
                const titre_qst = document.getElementById('titre_qst');
                var qsttitle = titre_qst.value;
                var qstdesc = textarea.value;
                if (x === 1&&qsttitle.trim() !== "") {
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", "addqst.php?title=" + qsttitle + "&desc=" + qstdesc, true);
                    xhr.onload = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            idhna.value = xhr.response;
                            console.log(xhr.response);
                        }
                    }
                    xhr.send();
                    x++;
                }
                else{
                    e.preventDefault();
                }
            }
           //hna kansift  wa fhm
           const sendbtn = document.getElementById('sendbtn');
            sendbtn.addEventListener('click', addtag);
            function addtag() {
               
                const qsttitre=document.getElementById('titre_qst').value;
                let qstid = document.getElementById('idhna').value;
                let arrayofvalues = [];
                const taginput = document.querySelectorAll('.taginput');
                for (let i = 0; i < taginput.length; i++) {
                    arrayofvalues.push(taginput[i].value); 
                }
                const xhr = new XMLHttpRequest();
                const tagsString = JSON.stringify(arrayofvalues);
                xhr.open("GET", "addtag.php?id=" + qstid + "&tags=" + tagsString + "&titre="+qsttitre , true);
                xhr.onload = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.response);
                    }
                }

                xhr.send();
            }
        </script>
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
                    <div>
                        <a href="newM.php" class="text-pink-500"> view all my questions</a>

                    </div>
                    <div>
                        <a href="newM2.php" class="text-pink-500"> view all my answers</a>

                    </div>
                </div>

                <div class="mt-8 space-y-8">
                    <div id="result">

                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function() {
                showdata();
            });

            function showdata(page) {
                $.ajax({
                    url: 'pagination.php',
                    method: 'post',
                    data: {
                        page_no: page
                    },
                    success: function(result) {
                        $("#result").html(result);
                    }
                });
            }
            $(document).on("click", ".pagination a", function() {
                var page = $(this).attr('id');
                showdata(page);
            });
        </script>

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
                // document.getElementById('qstTrigger').classList.remove("hidden");
                document.getElementById('qstModal').classList.toggle("hidden");
            });
        </script>


</body>

</html>