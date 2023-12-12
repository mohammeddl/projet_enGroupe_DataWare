<?php
include("connection.php");
include("add.php");
include("addmemtoeqp.php");
include("eqptopro.php");
include("deletemeqp.php");
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>DataWare</title>
</head>

<body>

    <!-- navbar  -->


    <nav class="bg-sky-400">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="img/logodw.png" class="h-10" alt="" />
                <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span> -->
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                <li>
                        <a href="#" class="mr-40 py-2 px-3 text-black rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Scrum Master Account</a>
                    </li>
                    <li>
                        <a href="newpage.php" class="mr-40 py-2 px-3 text-black rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Commmunity</a>
                    </li>
                    <li>
                        <a href="logout.php" class="block py-2 px-3 text-pink-500 rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Deconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="equipe">
        <div class="bg-gray-100 py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <h1 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Affichage des equipes</h1>
                        <!-- <a href="add.php"> -->
                        <button id="addequipe" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 mb-6 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ajouter une Equipe</button>
                        <div id="equipeTrigger" class="hidden"></div>
                        <div id="equipeModal" class="hidden">
                            <div class="">

                                <form action="" method="post">
                                    <div>
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Nom Equipe</label>
                                        <div class="relative mt-2 rounded-md">
                                            <input type="text" name="nom_equipe" id="" class="block rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Date de Création</label>
                                        <div class="relative mt-2 rounded-md">
                                            <input type="date" name="date_creation" id="" class="block rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class=" mt-4 ml-14 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter</button>

                                </form>
                            </div>

                            <div class="">
                                <button type="submit" name="submit" class="block py-2 px-3 text-pink-500 font-bold rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><a href="dashboards.php" class="">Retour</a>
                                </button>


                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Id Equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Date de Creation</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Modifier</span>
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Supprimer</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">

                                        <tr>

                                            <?php
                                            $sql = "SELECT * FROM equipe  where nom_equipe <> 'none'";
                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                                        <?php
                                                        echo $row["id_equipe"];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row["nom_equipe"];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row["date_creation"];
                                                        ?>
                                                    </td>
                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <a href="edit.php?id_equipe=<?php echo $row['id_equipe']; ?>" class="text-indigo-600 hover:text-indigo-900">Modifier<span class="sr-only"></span></a>
                                                    </td>
                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <a href="delete.php?id_equipe=<?php echo $row['id_equipe']; ?>" class="text-indigo-600 hover:text-indigo-900">Supprimer<span class="sr-only"></span></a>
                                                    </td>
                                        </tr>
                                <?php
                                                }
                                                mysqli_free_result($result);
                                            } else {
                                                echo "Error: " . mysqli_error($conn);
                                            }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="eqpro">
        <div class="bg-gray-100 py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <h1 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Affecter projet à une equipe</h1>
                        <button id="addeqp" type="button" class="inline-flex items-center justify-center rounded-md mb-4 border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Assigner une equipe</button>
                        <div id="eqpTrigger" class="hidden"></div>
                        <div id="eqpModal" class="hidden">
                            <div class="">

                                <form action="" method="post">

                                    <div>
                                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Equipe</label>
                                        <div class="relative mt-2 rounded-md">
                                            <select name="id_equipe" id="" class="block rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                                <?php
                                                $query = "SELECT id_equipe,nom_equipe FROM equipe where nom_equipe <>'none'";
                                                $result = mysqli_query($conn, $query);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['id_equipe'] . "'>" . $row['nom_equipe'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Projet</label>
                                        <div class="relative mt-2 rounded-md">
                                            <select name="id_pro" id="" class="block rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                                <?php
                                                $query = "SELECT id_pro,nom_pro FROM projet  where nom_pro <> 'none'";
                                                $result = mysqli_query($conn, $query);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['id_pro'] . "'>" . $row['nom_pro'] . "</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>


                                    <button type="submit" name="sbmt" class=" mt-4 ml-14 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter</button>
                                </form>
                            </div>

                            <div class="">
                            <button type="submit" name="submit" class="block py-2 px-3 text-pink-500 font-bold rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><a href="dashboards.php" class="">Retour</a>
                                </button>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">id Equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Projet</th>

                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Supprimer</span>
                                            </th>
                                        </tr>
                                    </thead>


                                    <tbody class="divide-y divide-gray-200 bg-white">

                                        <tr>
                                            <?php
                                            $sql = "SELECT * FROM equipe inner join  projet  on equipe.id_pro = projet.id_pro  where nom_pro <> 'none'";
                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>

                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                                        <?php
                                                        echo $row["id_equipe"];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row["nom_equipe"];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row["nom_pro"];
                                                        ?>
                                                    </td>


                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <a href="deleteqp.php?id_equipe=<?php echo $row['id_equipe']; ?>" class="text-indigo-600 hover:text-indigo-900">Supprimer<span class="sr-only"></span></a>
                                                    </td>
                                        </tr>
                                <?php
                                                }
                                                mysqli_free_result($result);
                                            } else {
                                                echo "Error: " . mysqli_error($conn);
                                            }
                                ?>
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="membre">
        <div class="bg-gray-100 py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex justify-between sm:items-center">
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <h1 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Gérer les membres des equipes </h1>
                        <!-- <a href="add.php"> -->

                        <button id="addmembre" type="button" class="inline-flex items-center justify-center rounded-md mb-4 border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ajouter membre à une equipe</button>

                        <div id="membreTrigger" class="hidden"></div>
                        <div id="membreModal" class="hidden">
                            <div class="">

                                <form action="" method="post">

                                    <div>
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Membre</label>
                                        <div class="relative mt-2 rounded-md">
                                            <select name="id" id="" class="block rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                                <?php
                                                require('connection.php');

                                                $query = "SELECT id,email FROM utilisateur where utilisateur.role = 'membre' ";
                                                $result = mysqli_query($conn, $query);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['email'] . "</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Equipe</label>
                                        <div class="relative mt-2 rounded-md">
                                            <select name="equipe" id="" class="block rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                                <?php
                                                require('connection.php');

                                                $query = "SELECT id_equipe,nom_equipe FROM equipe where nom_equipe <> 'none'";
                                                $result = mysqli_query($conn, $query);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['id_equipe'] . "'>" . $row['nom_equipe'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" name="send" class=" mt-4 ml-14 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter</button>
                                </form>
                            </div>

                            <div class="">
                            <button type="submit" name="submit" class="block py-2 px-3 text-pink-500 font-bold rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><a href="dashboards.php" class="">Retour</a>
                                </button>
                            </div>
                        </div>
                        </a>
                    </div>

                    <form action="" method="post">
                        <div class="flex justify-between gap-4">
                            <div class="flex flex-col gap-2">

                                <label class="flex justify-center text-lg font-medium leading-6 text-gray-900">Filtrer par Equipe</label>

                                <select name="equipe" id="" class="block rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                    <?php
                                    require('connection.php');

                                    $query = "SELECT * FROM equipe where nom_equipe <> 'none'";
                                    $result = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['id_equipe'] . "'>" . $row['nom_equipe'] . "</option>";
                                    }

                                    ?>

                                </select>
                                <button name="filtrer" type="submit" class="items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Filtrer</button>
                            </div>

                            <div class=" flex flex-end">
                                <button name="all" type="submit" class="items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Tout</button>
                            </div>

                        </div>
                    </form>


                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Id Membre</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Complet</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Supprimer</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <?php
                                        if (isset($_POST['filtrer'])) {
                                            $selectedTeamId = $_POST['equipe'];

                                            $sql = "SELECT * FROM utilisateur 
                                                        INNER JOIN equipe ON utilisateur.equipe = equipe.id_equipe 
                                                        WHERE utilisateur.role = 'membre' AND equipe.id_equipe = $selectedTeamId";

                                        } else {
                                            $sql = "SELECT * FROM utilisateur 
                                                        INNER JOIN equipe ON utilisateur.equipe = equipe.id_equipe 
                                                        WHERE utilisateur.role = 'membre' and nom_equipe <> 'none'";
                                            // echo "Generated SQL: $sql<br>";

                                        }
                                        $result = mysqli_query($conn, $sql);

                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                                        <?php
                                                        echo $row["id"];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row["nom"] . ' ' . $row["prenom"];
                                                        ?>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row["nom_equipe"];
                                                        ?>
                                                    </td>

                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <a href="deletemeqp.php?id=<?php echo $row['id']; ?>" class="text-indigo-600 hover:text-indigo-900">Supprimer<span class="sr-only"></span></a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                            mysqli_free_result($result);
                                        } else {
                                            echo "Error: " . mysqli_error($conn);
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('addequipe').addEventListener('click', function() {
            document.getElementById('equipeTrigger').classList.remove("hidden");
            document.getElementById('equipeModal').classList.remove("hidden");
        });

        
        document.getElementById('addmembre').addEventListener('click', function() {
            document.getElementById('membreTrigger').classList.remove("hidden");
            document.getElementById('membreModal').classList.remove("hidden");
        });
        document.getElementById('addeqp').addEventListener('click', function() {
            document.getElementById('eqpTrigger').classList.remove("hidden");
            document.getElementById('eqpModal').classList.remove("hidden");
        });
    </script>
</body>

</html>