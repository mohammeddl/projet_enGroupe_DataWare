<?php
include "connection.php";
    if (isset($_POST['edit'])) {
        $id = $_POST['id_equipe'];
        $name = $_POST['nom_equipe'];
        $date = $_POST['date_creation'];
        $sql = "UPDATE equipe SET nom_equipe='$name', date_creation='$date' WHERE id_equipe='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result == TRUE) {
            header('Location: dashboards.php');
        }
    }

if (isset($_GET['id_equipe'])) {
    $id = $_GET['id_equipe'];
    $sql = "SELECT * FROM equipe WHERE id_equipe='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_equipe'];
            $name = $row['nom_equipe'];
            $date = $row['date_creation'];
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
                        <input type="hidden" name="id_equipe" value="<?php echo $id; ?>">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nom Equipe</label>
                        <div class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" >
                            <input type="text" name="nom_equipe" value="<?php echo $name; ?>" id="" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
                        </div>
                    </div>
                    <div>
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Date de Création</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="date" name="date_creation" value="<?php echo $date; ?>" id="" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
                        </div>
                    </div>

                        <button type="submit" name="edit" class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">Save changes</button>
                        <div class="">
                        <button type="submit" name="submit" class="block py-2 px-3 text-pink-500 font-bold rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><a href="dashboards.php" class="">Retour</a>
                                </button>
            </div>
                    </form>
            
            </div>

           
        </div>
    </div>
</body>
</html>


    <?php
    } else{
        header('Location: dashboards.php');
    }
}
?>

