<?php
include "connection.php";
if (isset($_POST['editproject'])) {
    $id = $_POST['id_pro'];
    $name = $_POST['nom_pro'];
    $desc = $_POST['descrp_pro'];
    $sql = "UPDATE projet SET nom_pro='$name', descrp_pro='$desc' WHERE id_pro='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result == TRUE) {
        header('Location: dashboardp.php');
    }
}

if (isset($_GET['id_pro'])) {
    $id = $_GET['id_pro'];
    $sql = "SELECT * FROM projet WHERE id_pro='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_pro'];
            $name = $row['nom_pro'];
            $desc = $row['descrp_pro'];
        }
?>


        <!doctype html>
        <html lang="eng">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.tailwindcss.com"></script>
            <title>DataWare</title>
        </head>

        <body>
            <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">

                <div class="mx-auto max-w-lg">

                    <div>

                        <form action="" method="post" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                            <div>
                                <input type="hidden" name="id_pro" value="<?php echo $id; ?>">
                                <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nom projet</label>
                                <div class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
                                    <input type="text" name="nom_pro" value="<?php echo $name; ?>" id="" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
                                </div>
                            </div>
                            <div>
                                <label for="" class="block text-sm font-medium leading-6 text-gray-900">Description du projet</label>
                                <div class="relative mt-2 rounded-md shadow-sm">
                                <textarea name="descrp_pro" id="" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"><?php echo $desc; ?></textarea>

                                </div>
                            </div>

                            <button type="submit" name="editproject" class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">Save changes</button>
                            <div class="">
                                <button type="submit" name="submit" class="block py-2 px-3 text-pink-500 font-bold rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><a href="dashboardp.php" class="">Retour</a>
                                </button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </body>

        </html>


<?php
    } else {
        header('Location: dashboardp.php');
    }
}
?>