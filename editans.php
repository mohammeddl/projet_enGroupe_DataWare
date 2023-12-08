<?php
include "connection.php";
if (isset($_POST['editans'])) {
    $ida = $_POST['id_rep'];
    $de = $_POST['descrp_rep'];
    $dateM = $_POST['date_rep'];
    $sql = "UPDATE reponse SET descrp_rep='$de', date_rep = NOW() WHERE id_rep='$ida'";
    $result = mysqli_query($conn, $sql);
    if ($result == TRUE) {
        header('Location: newM2.php');
    }
}

if (isset($_GET['id_rep'])) {
    $idq = $_GET['id_rep'];
    $sql = "SELECT * FROM reponse WHERE id_rep='$idq'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ida = $row['id_rep'];
            $de = $row['descrp_rep'];
            $dateM = $row['date_rep'];
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
                                <input type="hidden" name="id_rep" value="<?php echo $ida; ?>">                               
                            </div>
                            <div>
                                <label for="" class="block text-sm font-medium leading-6 text-gray-900">answer</label>

                                <div class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
                                    <input type="text" name="descrp_rep" value="<?php echo $de; ?>" id="" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
                                </div>
                            </div>

                            <button type="submit" name="editans" class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">Save changes</button>
                            <div class="">
                                <button type="submit" name="submit" class="block py-2 px-3 text-pink-500 font-bold rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><a href="newM2.php" class="">Retour</a>
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
        header('Location: newM2.php');
    }
}
?>