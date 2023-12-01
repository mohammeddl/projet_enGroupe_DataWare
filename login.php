<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>DataWare</title>
</head>

<body class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% ...">
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight flex justify-center tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Connexion
                    </h1>
                    <?php
                    require('connection.php');
                    $message = '';

                    if (isset($_POST['email']) && isset($_POST['pass'])) {
                        $email = $_POST['email'];
                        $password = $_POST['pass'];

                        $query = "SELECT * FROM `utilisateur` WHERE email='$email' AND pass='$password'";

                        $result = mysqli_query($conn, $query);

                        if ($result !== false) {
                            $userData = mysqli_fetch_assoc($result);

                            if ($userData) {
                                session_start();
                                $_SESSION['id'] = $userData['id'];
                                $role = $userData['role'];

                                switch ($role) {
                                    case 'membre':
                                        $_SESSION['email'] = $email;
                                        header("Location: dashboardm.php");
                                        exit();
                                    case 'ProductOwner':
                                        $_SESSION['email'] = $email;
                                        header("Location: dashboardp.php");
                                        exit();
                                    case 'ScrumMaster':
                                        $_SESSION['email'] = $email;
                                        header("Location: dashboards.php");
                                        exit();
                                }
                            } else {
                                $message = "L'email ou le mot de passe est incorrect.";
                            }
                        } else {
                            $message = "Erreur de requête SQL : " . mysqli_error($conn);
                        }
                    }
                    ?>
                    <form class="space-y-4 md:space-y-6" action="" method="post" name="login">
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="exemple@gmail.com" required="">
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                            <input type="password" name="pass" id="" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Se souvenir de moi</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-sky-600 hover:underline dark:text-primary-500">Mot de passe oublié?</a>
                        </div>
                        <button type="submit" name="submit" class="w-full text-white bg-sky-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Se Connecter</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Vous n'avez pas un compte? <a href="register.php" class="font-medium text-sky-600  hover:underline dark:text-primary-500">Créer un compte</a>
                        </p>
                        <?php if (!empty($message)) { ?>
                            <p class="errorMessage"><?php echo $message; ?></p>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>