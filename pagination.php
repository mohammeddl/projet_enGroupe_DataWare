<?php
include "connection.php";
include "addqst.php";
include "answerqst.php";
$limit_page = 5;
$page = isset($_POST['page_no']) ? $_POST['page_no'] : 1;

$offset = ($page - 1) * $limit_page;

if($_SESSION['type']==='filterall'){ 
    $fetch_query = mysqli_query($conn, "SELECT * FROM question inner join utilisateur on utilisateur.id = question.id_user  ORDER BY date_qst desc limit $offset, $limit_page");
}else if($_SESSION['type']==='filterd'){
    $id = $_SESSION['idpro'];
    $fetch_query = mysqli_query($conn, "SELECT id_qst, titre_qst, descrp_qst, date_qst,archive_qst,nom,prenom FROM question inner join utilisateur on utilisateur.id = question.id_user where id_pro = $id  ORDER BY date_qst desc limit $offset, $limit_page");
}

             
function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit; 
}

// dd(mysqli_fetch_array($fetch_query));



// dd(mysqli_fetch_all($rw));
$email =$_SESSION['email'];
$role = "SELECT role FROM utilisateur WHERE email = '$email'";
 $email2 = mysqli_query($conn, $role);
$rowScrum = mysqli_fetch_array($email2);

$output = "";
$row = mysqli_num_rows($fetch_query);


if ($row > 0    ) {
    while ($res = mysqli_fetch_array($fetch_query)) {
        if($res['archive_qst']==0 ){
            $idqst = $res['id_qst'];
           
        $output .= " 
        <div>

        
        <div class='flex justify-between '>
                            <div class='flex'>
                                <span class='inline-flex justify-center items-center w-6 h-6 rounded bg-green-500 text-white font-medium text-sm'>
                                    Q
                                </span>";
                                
                                $output .= "<input type='hidden' name='id_qst' value='$idqst'>";
                                "<p class='ml-4 md:ml-6 text-bold'>";

        $output .= $res['titre_qst'];
        $output .= "</p>
                            </div>

                            <form class='flex gap-5' action='' method='get'>";
                            $output .= "<input type='hidden' name='id_qst' value='$idqst'>";
                            
                            



if($rowScrum['role'] == "ScrumMaster"){
        $output .="<a href='archiveScrum.php?id_qst=$idqst'><svg class='h-5 w-5 text-blue-600' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20' />
        <button type='submit' name=''></svg></button></a>";
                        }    
                        $output .= "</form>

                        </div>
                        <div class='flex items-start mt-3'>
                            <div>
                                <span class='inline-flex justify-center items-center w-6 h-6 rounded text-gray-800 font-medium text-sm'>

                                </span>
                            </div>
                            <div class='w-[80%]'>
                                <p class='ml-4 md:ml-6 text-bold'>";
        $output .= $res['descrp_qst'];
        $output .= "</p>
                            </div>
                        </div>
                        <div class='grid grid-cols-2 gap-4 md:flex md:items-center mt-4 mb-10 md:ml-12'>
                            <div class='flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group'>
                                <svg class='mr-2 fill-current text-primary-black group-hover:text-primary' width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path d='M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z'></path>
                                </svg>

                                <span class='text-sm text-gray-800'>
                                    10 likes
                                </span>
                            </div>

                            <div class='flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group'>
                                <svg class='mr-2 fill-current text-primary-black group-hover:text-primary' width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <g transform='rotate(180 9 9)'>
                                        <path d='M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z'></path>
                                    </g>
                                </svg>

                                <span class='text-sm text-gray-800'>
                                    5 dislikes
                                </span>
                            </div>

                            <div class='flex items-center md:ml-8'>
                                <div class='mr-2 w-6 h-6 overflow-hidden shadow rounded-full border-gray-500'>
                                    <div class='w-full h-full bg-gray-200'></div>
                                </div>

                                <span class='text-sm text-gray-800'>
                                    <p>";
        $output .= $res['nom'] . ' ' . $res['prenom'];
        $output .= "</p> 
        </span>
                                    <span class='hidden md:inline-block'>
                                        <p class='ml-4 md:ml-6 text-bold'>";
        $output .= $res['date_qst'];
        $output .= "</p>
                                </span>
                            </div>
                        </div>

        
                        <section>

                        <form action='' method='post'>
                            <div class=flex items-start mt-3 ml-14'>

                                <div>
                                    <span class='inline-flex justify-center items-center w-6 h-6 rounded bg-gray-200 text-gray-800 font-medium text-sm'>
                                        A
                                    </span>
                                     <input type='hidden' name='id_qst' value='$idqst'>
                                </div>

                                <div class='ml-4 md:ml-6 text-bold'>
                                    <textarea type='text' name='descrp_rep' id='' cols='80' rows='1' class='rounded-md border border-gray-400 w-full text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-y' placeholder='write your answer here'></textarea>
                                </div>
                                <div class='ml-10'>
                                    <input type='submit' name='answerqst' class='bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100' value='send'>
                                </div>
                            </div>
                        </form>
                    </section>
                
                     <section>
                                    <div>";
                                   
       
           
                            $reponse_query = mysqli_query($conn, "SELECT * FROM reponse where id_qst = $idqst ORDER BY date_rep desc limit $offset, $limit_page");
                            while($roww = mysqli_fetch_assoc($reponse_query)){
                if($roww['archive_rep'] == 0 ){
                    

            
                $output .= "<div class='flex justify-between '>
                                                    <div class='flex items-start mt-3 ml-14'>
                                                        <div>
                                                            <span class='inline-flex justify-center items-center w-6 h-6 rounded bg-gray-200 text-gray-800 font-medium text-sm'>
                                                                A
                                                            </span>
                                                        </div>";
                                                        
                                                        "<p class='ml-4 md:ml-6 text-bold'>";

                $output .= $roww['descrp_rep'];

                $output .= "</p>
                                                    </div>

                                                    <form class='flex gap-5' action='' method='get'>";
                                                    $output .= "<input type='hidden' name='id_rep' value='{$roww['id_rep']}'>";
                                                    
                                                    


                                if($rowScrum['role']== "ScrumMaster"){
                                    $output .="    <a href='archive.php?id_rep={$roww['id_rep']}'><svg class='h-5 w-5 text-red-700' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20' />
                                <button type='submit' name='submitArchiv'></svg></button></a>";
                                }

                                $output .="
                                                    
                                                </form>
                                            
                                                </div>

                                                <div class='flex ml-24 gap-4 md:flex md:items-center mt-4 mb-10 md:ml-12'>
                                                    <div class='flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group'>
                                                        <svg class='mr-2 fill-current text-primary-black group-hover:text-primary' width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                            <path d='M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z'></path>
                                                        </svg>

                                                        <span class='text-sm text-gray-800'>
                                                            10 likes
                                                        </span>
                                                    </div>

                                                    <div class='flex md:items-center bg-gray-100 hover:bg-gray-200 rounded-lg px-3 py-2 cursor-pointer group'>
                                                        <svg class='mr-2 fill-current text-primary-black group-hover:text-primary' width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                            <g transform='rotate(180 9 9)'>
                                                                <path d='M17.4606 10.0435C17.8096 9.59094 18 9 18 8.27817C18 6.9537 16.8724 5.72685 15.4432 5.72685H12.977C13.2835 5.11625 13.7045 4.35888 13.7045 3.27234C13.7046 1.21894 12.8854 0 10.7898 0C9.73529 0 9.34397 1.33305 9.14347 2.36348C9.02369 2.97911 8.91053 3.56063 8.56252 3.90864C7.73388 4.7373 6.46875 6.75 5.70874 7.15869C5.63179 7.19111 5.53345 7.21663 5.42637 7.23684C5.22341 6.9428 4.88429 6.75 4.5 6.75H1.125C0.503684 6.75 0 7.25368 0 7.875V16.875C0 17.4963 0.503684 18 1.125 18H4.5C5.12132 18 5.625 17.4963 5.625 16.875V16.5677C6.7674 16.5677 9.16478 18.0002 11.8637 17.9995C12.0572 17.9996 13.1873 18.0006 13.3055 17.9995C15.3896 18 16.5489 16.7379 16.4814 14.8427C17.0132 14.2195 17.2737 13.3192 17.1221 12.4836C17.56 11.7971 17.6539 10.8288 17.4606 10.0435ZM1.125 16.875V7.875H4.5V16.875H1.125ZM16.0318 9.7155C16.5938 10.125 16.5938 11.8125 15.8347 12.1998C16.3101 13 15.8823 14.0707 15.3069 14.3794C15.5984 16.2265 14.6403 16.8616 13.2955 16.8745C13.1791 16.8756 11.986 16.8745 11.8637 16.8745C9.29978 16.8745 7.12666 15.4427 5.62504 15.4427V8.28369C6.95071 8.28369 8.16701 5.89521 9.35803 4.70415C10.4319 3.6303 10.0739 1.84054 10.7898 1.12465C12.5796 1.12465 12.5796 2.37329 12.5796 3.27238C12.5796 4.75559 11.5058 5.42007 11.5058 6.85188H15.4432C16.2423 6.85188 16.8715 7.5678 16.875 8.28369C16.8785 8.99958 16.5938 9.5625 16.0318 9.7155ZM3.65625 15.1875C3.65625 15.6535 3.2785 16.0312 2.8125 16.0312C2.3465 16.0312 1.96875 15.6535 1.96875 15.1875C1.96875 14.7215 2.3465 14.3438 2.8125 14.3438C3.2785 14.3438 3.65625 14.7215 3.65625 15.1875Z'></path>
                                                            </g>
                                                        </svg>

                                                        <span class='text-sm text-gray-800'>
                                                            5 dislikes
                                                        </span>
                                                    </div>

                                                    <div class='flex items-center md:ml-8'>
                                                        <div class='mr-2 w-6 h-6 overflow-hidden shadow rounded-full border-gray-500'>
                                                            <div class='w-full h-full bg-gray-200'></div>
                                                        </div>

                                                        <span class='text-sm text-gray-800'>
                                                        <p>";
                $output .= $res['nom'] . ' ' . $res['prenom'];
                $output .= "</p> 
                </span>
                                                            <span class='hidden md:inline-block'>
                                                                <p class='ml-4 md:ml-6 text-bold'>";
                $output .= $roww['date_rep'];
                $output .= "</p>
                                                        </span>
                                                    </div>

                                                   </div>";
                                                }

?>
                <!-- end answer  -->
                <?php
                                }
    }}
                                    ?>

        </div>

        </section>
<?php
    
}
?>





<?php
$fetch_query_all = mysqli_query($conn, "select * from question");
$total_page = ceil(mysqli_num_rows($fetch_query_all) / $limit_page);

$output .= '<ul class="pagination flex justify-center mt-6 gap-9 ">';
for ($i = 1; $i <= $total_page; $i++) {
    $active = ($i == $page) ? "active" : "";
    $output .= "<li class='{$active}'><a id='{$i}' class='rounded-full flex m-auto border-sky-500 px-3 py-2 border-2 text-black bg-white shadow-lg hover:bg-sky-500 hover:text-white'>{$i}</a></li>";
}
$output .= '</ul>';

echo $output;

?>