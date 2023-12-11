<?php
include("connection.php");

// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
$req = "SELECT COUNT(id) FROM utilisateur";
$row = mysqli_query($conn, $req);
$data = array();
while ($rowCount = mysqli_fetch_row($row)){
    $data[]= $rowCount;
  }



function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit; 
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
                        <a href="dashboardp.php" class="mr-40 py-2 px-3 text-black rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Product Owner Account</a>
                    </li>

                    <li>
                        <a href="dashboardpStats.php" class="mr-40 py-2 px-3 text-black rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Stats</a>
                    </li>

                    <li>
                        <a href="logout.php" class="block py-2 px-3 text-pink-500 rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Deconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<div class=" md:flex flex-row h-[90vh] w-full bg-white flex justify-around items-center">
    <div class="w-[40%]">
      <img class="w-[150vh] rounded-2xl h-[80vh]" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2850&amp;q=80" alt="Support team">
    </div>
    <div class=" w-[45%] h-[60vh]">
      <div class="max-w-2xl  lg:w-2/2">
        <div>
          <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
            <svg class="h-6 w-6" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
</svg>
          </div>
        </div>
        <h2 class="mt-6 text-3xl font-extrabold text-gray-900 sm:text-4xl">
        Strategic Management
        </h2>
        <p class="mt-6 text-lg text-gray-500">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore nihil ea rerum ipsa. Nostrum consectetur sequi culpa doloribus omnis, molestiae esse placeat, exercitationem magnam quod molestias quia aspernatur deserunt voluptatibus.
        </p>
        <div class="mt-8 overflow-hidden">
          <dl class="-mx-8 -mt-8 flex flex-wrap">
            <div class="flex flex-col px-8 pt-8">
              <dt class="order-2 text-base font-medium text-gray-500">
                Members
              </dt>
              <dd class="order-1 text-2xl font-extrabold text-blue-500 sm:text-3xl">
                    <?php foreach($data as $count){?>
                        <?=$count[0]?>
                    <?php }?>
              </dd>
            </div>
            <div class="flex flex-col px-8 pt-8">
              <dt class="order-2 text-base font-medium text-gray-500">
              Questions
              </dt>
              <dd class="order-1 text-2xl font-extrabold text-blue-500 sm:text-3xl">
            <?php 
            $reqQ = "SELECT COUNT(id_qst) FROM question";
            $resultQ = mysqli_query($conn, $reqQ);
            while ($rowQ = mysqli_fetch_row($resultQ)){?>
                 <?php echo $rowQ[0]?>
            <?php } ?>
              </dd>
            </div>
            <div class="flex flex-col px-8 pt-8">
              <dt class="order-2 text-base font-medium text-gray-500">
              Answers 
              </dt>
              <dd class="order-1 text-2xl font-extrabold text-blue-500 sm:text-3xl">
              <?php 
            $reqR = "SELECT COUNT(id_rep) FROM reponse";
            $resultR = mysqli_query($conn, $reqR);
            while ($rowR = mysqli_fetch_row($resultR)){?>
                 <?php echo $rowR[0]?>
            <?php } ?>
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
</div>


  <div class="relative bg-gray-900 my-20">
    <div class="h-80 w-full absolute bottom-0 xl:inset-0 xl:h-full">
      <div class="h-full w-full xl:grid xl:grid-cols-2">
        <div class="h-full xl:relative xl:col-start-2">
          <img class="h-full w-full object-cover opacity-25 xl:absolute xl:inset-0" src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2830&amp;q=80&amp;sat=-100" alt="People working on laptops">
          <div aria-hidden="true" class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r"></div>
        </div>
      </div>
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-cols-2 xl:grid-flow-col-dense xl:gap-x-8">
      <div class="relative pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">
        <p class="mt-3 text-3xl font-extrabold text-white">Welcome Product Owners</p>
        <p class="mt-5 text-lg text-gray-300">Welcome to your dedicated Product Statistics Display—a centralized hub tailored exclusively for product owners. This streamlined interface offers real-time insights into crucial metrics, empowering you to make data-driven decisions for optimal product management.</p>
        <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
          
            <p>
              <span class="block text-2xl font-bold text-white"><?=$count[0]?></span>
              <span class="mt-1 block text-base text-gray-300"><span class="font-medium text-white">Users
            </p>
          
            <p>
              <span class="block text-2xl font-bold text-white">
                <?php 
            $reqMostProject = "SELECT projet.nom_pro, COUNT(question.id_qst) AS nombre_questions
            FROM projet
            LEFT JOIN question ON projet.id_pro = question.id_pro
            GROUP BY projet.id_pro, projet.nom_pro
            ORDER BY nombre_questions DESC
            LIMIT 1;";
            $resultR = mysqli_query($conn, $reqMostProject);
            while ($rowmost = mysqli_fetch_row($resultR)){?>
                 <?php echo $rowmost[0]?>
            <?php } ?>
        </span>
              <span class="mt-1 block text-base text-gray-300"><span class="font-medium text-white">Projects with the most questions
            </p>
            <p>
              <span class="block text-2xl font-bold text-white">
              <?php 
            $reqLeastAnswers = "SELECT projet.nom_pro, COUNT(reponse.id_rep) AS nombre_reponses
            FROM projet
            LEFT JOIN question ON projet.id_pro = question.id_pro
            LEFT JOIN reponse ON question.id_qst = reponse.id_qst
            GROUP BY projet.id_pro, projet.nom_pro
            ORDER BY nombre_reponses ASC
            LIMIT 1;";
            $resultL = mysqli_query($conn, $reqLeastAnswers);
            while ($rowLeast = mysqli_fetch_row($resultL)){?>
                 <?php echo $rowLeast[0]?>
            <?php } ?>
              </span>
              <span class="mt-1 block text-base text-gray-300"><span class="font-medium text-white">Project with least answers
            </p>
          
            <p>
              <span class="block text-2xl font-bold text-white">
              <?php 
            $reqMostUser = "SELECT utilisateur.nom, utilisateur.prenom, COUNT(reponse.id_rep) AS nombre_reponses
            FROM utilisateur
            LEFT JOIN reponse ON utilisateur.id = reponse.id_user
            GROUP BY utilisateur.id, utilisateur.nom, utilisateur.prenom
            ORDER BY nombre_reponses DESC
            LIMIT 1;";
            $resultUser = mysqli_query($conn, $reqMostUser);
            while ($rowUser = mysqli_fetch_row($resultUser)){?>
                 <?php echo $rowUser[0]?>
            <?php } ?>
              </span>
              <span class="mt-1 block text-base text-gray-300"><span class="font-medium text-white">The user with the most answers
            </p>
          
        </div>
      </div>
      </div>

      
      <h2 class="text-3xl text-center font-extrabold tracking-tight text-white sm:text-4xl">Questions per project</h2>
      <div class=" max-w-7xl mx-auto  px-4 sm:px-6 lg:py-24 lg:px-8">
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mt-4">
        <?php
    $reqProject = "SELECT projet.nom_pro, COUNT(question.id_qst) AS nombre_questions
                FROM projet
                LEFT JOIN question ON projet.id_pro = question.id_pro
                GROUP BY projet.id_pro, projet.nom_pro";
                $resultProject = mysqli_query($conn, $reqProject);
                while ($rowProjectNumber = mysqli_fetch_row($resultProject)){?>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate"><?php echo $rowProjectNumber[0]?></dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-blue-500"><?php echo $rowProjectNumber[1]?></dd>
                </dl>
            </div>
        </div>

<?php
                }
                ?>

    </div>
</div>
      
</body>
</html>