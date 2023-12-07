<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
        <nav class="flex justify-between px-5 py-3 text-gray-700  items-center rounded-lg bg-gray-50 shadow-lg " aria-label="Breadcrumb">
        <a href="newpage.php"><img src="img/backarrow.svg" class="w-[10%]" alt="back"></a>
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
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
<?php
include 'connection.php';
if (isset($_GET['idqst'])) {
    $id = $_GET['idqst'];
}
error_reporting(0);
$sql = "SELECT titre_qst, descrp_qst, date_qst,nom,prenom FROM question inner join utilisateur on utilisateur.id = question.id_user where id_qst=$id";
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
        }
    }
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