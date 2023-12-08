<?php
include "connection.php";
$limit_page = 5;
$page = isset($_POST['page_no']) ? $_POST['page_no'] : 1;
$offset = ($page - 1) * $limit_page;

session_start();
$id = $_SESSION['id'];

$fetch_query = mysqli_query($conn, "SELECT Distinct question.id_qst ,question.titre_qst ,question.descrp_qst ,question.date_qst, nom,prenom,date_qst FROM  question join reponse on  question.id_qst = reponse.id_qst  join utilisateur on utilisateur.id = question.id_user where reponse.id_user = $id ORDER BY date_qst desc limit $offset, $limit_page");
$output = "";
$row = mysqli_num_rows($fetch_query);

if ($row > 0) {
    while ($res = mysqli_fetch_array($fetch_query)) {
        $output .= "<div class='flex justify-between '>
                            <div class='flex gap-4'>
                                <span class='inline-flex justify-center items-center w-6 h-6 rounded bg-green-500 text-white font-medium text-sm'>
                                    Q
                                </span>";
                                
                                $output .= "<input type='hidden' name='id_qst' value='{$res['id_qst']}'>";
                                "<p class='ml-4 md:ml-6 text-bold'>";

        $output .= $res['titre_qst'];
        $output .= "</p>
                            </div>

                            

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
                                    <div>";
                                    $idqst = $res['id_qst'];

            $s ="SELECT * FROM reponse inner join utilisateur on utilisateur.id = reponse.id_user where reponse.id_qst = $idqst and reponse.id_user = $id ORDER BY date_rep desc";
        $rw = mysqli_query($conn, $s);

        if ($rw) {
            while ($r = mysqli_fetch_assoc($rw)) {
                $output .= "<div class='flex justify-between '>
                                                    <div class='flex items-start mt-3 ml-14 gap-4'>
                                                        <div>
                                                            <span class='inline-flex justify-center items-center w-6 h-6 rounded bg-gray-200 text-gray-800 font-medium text-sm'>
                                                                A
                                                            </span>
                                                        </div>";
                            $output .= "<input type='hidden' name='id_rep' value='{$r['id_rep']}'>";
                                                        
                            $output .= "<p class='ml-4 md:ml-6 text-bold'>";

                                                        $output .= $r['descrp_rep'];

                                                        $output .= "</p>
                                                    </div>

                                                    <div class='flex gap-5'>";
                                                    $output .= "<a href='editans.php?id_rep={$r['id_rep']}'>
                            <svg class='h-5 w-5 text-black' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' />
                            </svg>
                        </a>";
                        $output .= "<a href = 'deleteans.php?id_rep={$r['id_rep']}'>
                        <svg class='h-5 w-5 text-black' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                                    <polyline points='3 6 5 6 21 6' />
                                    <path d='M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2' />
                                    <line x1='10' y1='11' x2='10' y2='17' />
                                    <line x1='14' y1='11' x2='14' y2='17' />
                                </svg>
                    </a>
                                                       
                                                    </div>
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
                $output .= $r['nom'] . ' ' . $r['prenom'];
                $output .= "</p> 
                </span>
                                                            <span class='hidden md:inline-block'>
                                                                <p class='ml-4 md:ml-6 text-bold'>";
                $output .= $r['date_rep'];
                $output .= "</p>
                                                        </span>
                                                    </div>

                                                   </div>";

?>
                <!-- end answer  -->
                <?php
                                }
                            }
                                    ?>

        </div>

        </section>
                     
                     
<?php
    }
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