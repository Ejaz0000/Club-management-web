<?php

session_start();

include("../login/connection.php");
include("../login/function.php");

$user_data = check_login($con);

$user_name = &$user_data['user_name'];
$user_id = &$user_data['user_id'];

$query = "select * from users where user_id = '$user_id' limit 1";
$result = mysqli_query($con, $query);
$user_data = mysqli_fetch_assoc($result);

$r = "join";
$a = "join";
$e = "join";
$cr = "none";
$ca = "none";
$ce = "none";

if ($user_data['club3'] == "yes") {
    $cr = "robotics";
    $r = "open";
}
if ($user_data['club2'] == "yes") {
    $ca = "app";
    $a = "open";
}
if ($user_data['club1'] == "yes") {
    $ce = "eee";
    $e = "open";
}





if (isset($_POST['update_notice'])) {
    $date = $_POST['date'];
    $notice = $_POST['event_notice'];
    if($user_data['president'] == 'robotics'){
    $club = "Robotics";
    }
    if($user_data['president'] == 'app'){
        $club = "App Forum";
        }
        if($user_data['president'] == 'eee'){
            $club = "EEE";
            }

    $file_name = $_FILES['myfile']['name'];
    $file_temp = $_FILES['myfile']['tmp_name'];
    $pname = rand(100, 1000) . "-" . $file_name;

    $m = "files/" . $file_name;

    move_uploaded_file($file_temp, $m);




    $query = "insert into calendar (date,club_name,event,file) values ('$date','$club','$notice','$m')";

    mysqli_query($con, $query);

    header("Location: calendar.php");
    die;
}


$query = "select * from calendar order by date desc";
$result = mysqli_query($con, $query);
$event_data = mysqli_fetch_all($result, MYSQLI_ASSOC);




    $c1 = "select count(*) as total from club_1";
	$c2 = "select count(*) as total from club_2";
	$c3 = "select count(*) as total from club_3";
	$r1 = mysqli_query($con, $c1);
	$r2 = mysqli_query($con, $c2);
	$r3 = mysqli_query($con, $c3);
	$r1 = mysqli_fetch_assoc($r1);
	$r2 = mysqli_fetch_assoc($r2);
	$r3 = mysqli_fetch_assoc($r3);
	
	$p1 = "select user_name from users where president='robotics'";
	$p2 = "select user_name from users where president='app'";
	$p3 = "select user_name from users where president='eee'";
	$g1 = mysqli_query($con, $p1);
	$g2 = mysqli_query($con, $p2);
	$g3 = mysqli_query($con, $p3);
	$g1 = mysqli_fetch_assoc($g1);
	$g2 = mysqli_fetch_assoc($g2);
	$g3 = mysqli_fetch_assoc($g3);


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>


    <div class="main">
        <div class="header">

            <img src="logoCMS.jpeg" class="logo" alt="">
            <div class="nav">
                <a href="../user/userview.php">Home</a>
                <a href="../login/uiuLogin.php">Login</a>
                <a href="#">Contact</a>
                <a href="#">Notice</a>
                <div class="dropdown">
                    <button class="dropbtn" onclick="myFunction()">President
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content" id="myDropdown">
                        <a href="#" class="rtr">Create Event</a>
                        <a href="../president/request.php">Requests</a>

                    </div>
                </div>
            </div>
            <div class="search">
                <form method="get" action = "search.php">
                <input type="text" name="search" placeholder=" Search...">
                </form>
            </div>
            <div class="calendar">
                <a href="../user/calendar.php"><img src="calender.png" alt="calender"></a>
            </div>
        </div>
        <div class="content">



            <div class="c1 card-container">
                <div class="c1_text">
                    <h2 class="head">Robotics Club</h2>
                    <p class="p_name1">President Name</p>
                    <p class="number1">Total members</p>
                    <p class="about1">About </p>
                </div>
                <div class="btn">
                    <input type="button" value="<?php echo $r ?>" id="btn" class="<?php echo $cr ?>">
                </div>
            </div>

            <div class="c2 card2-container">
                <div class="c2_text">
                    <h2 class="head">App Forum</h2>
                    <p class="p_name2">President Name</p>
                    <p class="number2">Total members</p>
                    <p class="about2">About </p>
                </div>
                <div class="btn">
                    <input type="button" value="<?php echo $a ?>" id="btn" class="<?php echo $ca ?>">
                </div>

            </div>

            <div class="c3 card3-container">
                <div class="c3_text">
                    <h2 class="head">EEE Club</h2>
                    <p class="p_name3">President Name</p>
                    <p class="number3">Total members</p>
                    <p class="about3">About </p>
                </div>
                <div class="btn">
                    <input type="button" value="<?php echo $e ?>" id="btn" class="<?php echo $ce ?>">
                </div>



            </div>

            <div class="user"><?php echo $user_name ?></div>

            <div class="n1" id="n2">
                <h2 class="head">Notice</h2>


                <?php foreach ($event_data as $data) { ?>

                    <p><?php echo $data['event']; ?></p>


                <?php } ?>



            </div>


        </div>

        <div class="container">

            <form action="" method="post" enctype="multipart/form-data">
                <span class="icon-close"><ion-icon name="close"></ion-icon></span>

                <div class="title">Club panel</div>
                <div class="subtitle">Enter notices here for the club</div>
                <div class="date_div">
                    <span>Event Date:</span>
                    <input type="date" name="date">
                </div>
                <div class="notice">
                    <span>Event Notice:</span>
                    <textarea name="event_notice" id=""></textarea>
                </div>
                <div class="file">
                    <span>Select a file:</span>
                    <input type="file" id="myfile" name="myfile">
                </div>
                <input type="submit" value="Post notice" name="update_notice">
            </form>

        </div>

        <div class="join-container">
            <span class="icon-close" id="jclose"><ion-icon name="close"></ion-icon></span>
            <div class="title2">Join Club</div>
            <div class="instruction">Joining fee for the club is 300tk. Enter your phone number and the amount of the fee here.</div>
             <div class="ins_info">Enter Phone No. :<input type="text" name="phn_num" id="number"></div>
             <div class="ins_info">Enter Amount  :<input type="text" name="amount" id="amount"></div>
            <button class="pay">Payment</button>
        </div>
        <div class="confirm">
            <div class="instruction">The payment has been done. The transaction code is Trans ID : <span class="trans"></span></div>
            <button class="done">Done</button>
        </div>

        <div class="footer">
            <h2 style="text-decoration: underline;">UIU Web site</h2>
            <h2>Quest for Excellence</h2>
            <img src="5.jpg" alt="logo">
        </div>

    </div>



    <script>
        var president = "<?php echo $user_data['president'] ?>";

        var dropdown = document.querySelector(".dropdown");

        if (president == "robotics" || president == "app" || president == "eee") {


            dropdown.style.display = "block";

        }



        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(e) {
            if (!e.target.matches('.dropbtn')) {
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
            }
        }


        let firstLink = document.querySelector(".rtr");
        let container = document.querySelector(".container");


        firstLink.addEventListener("click", function() {
            container.style.display = "flex";

        });

        let iconClose = document.querySelector('.icon-close');
        iconClose.addEventListener("click", function() {
            container.style.display = "none";

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {







            var jcontainer = document.querySelector(".join-container");

            $(".c1 .none").on("click", function(e) {

                e.preventDefault();
                $(".title2").html("Join Robotics Club");
                jcontainer.style.display = "block";


                $(".pay").on("click", function(e) {

                    var club = "robotics";
                    $.ajax({

                        url: "club-join.php",
                        type: "POST",
                        data: {
                            club_name: club
                        },
                        success: function(data) {

                            jcontainer.style.display = "none";
                            $(".confirm").show();
                            $(".trans").html(data);

                        }
                    });
                });


            });


            $(".c1 .robotics").on("click", function(e) {

                e.preventDefault();
                location.href = '../club/club_page.php';




            });

            $(".c2 .none").on("click", function(e) {

                e.preventDefault();
                $(".title2").html("Join App Forum");
                jcontainer.style.display = "block";


                $(".pay").on("click", function(e) {

                    var club = "app_forum";
                    $.ajax({

                        url: "club-join.php",
                        type: "POST",
                        data: {
                            club_name: club
                        },
                        success: function(data) {

                            jcontainer.style.display = "none";
                            $(".confirm").show();
                            $(".trans").html(data);

                        }
                    });
                });



            });

            $(".c2 .app").on("click", function(e) {

                e.preventDefault();
                location.href = '../club/club_page2.php';




            });

            $(".c3 .none").on("click", function(e) {

                e.preventDefault();
                $(".title2").html("Join EEE Club");
                jcontainer.style.display = "block";

                $(".pay").on("click", function(e) {

                    var club = "eee";
                    $.ajax({

                        url: "club-join.php",
                        type: "POST",
                        data: {
                            club_name: club
                        },
                        success: function(data) {

                            jcontainer.style.display = "none";
                            $(".confirm").show();
                            $(".trans").html(data);

                        }
                    });
                });



            });

            $(".c3 .eee").on("click", function(e) {

                e.preventDefault();
                location.href = '../club/club_page3.php';




            });



            let iconClose = document.querySelector("#jclose");
            iconClose.addEventListener("click", function() {
                jcontainer.style.display = "none";

            });

            $(".done").on("click", function(e) {
                e.preventDefault();
                $(".confirm").hide();

                

            });

            let p1 = '<?php echo $g3['user_name'];?>';
            let p2 = '<?php echo $g2['user_name'];?>';
            let p3 = '<?php echo $g1['user_name'];?>';
            let r1 = '<?php echo $r1['total'];?>';
            let r2 = '<?php echo $r2['total'];?>';
            let r3 = '<?php echo $r3['total'];?>';


            
            $(".p_name1").on("mouseover", function() {
                
                $(".p_name1").html(p3);

            });
            $(".p_name1").on("mouseout", function() {
                
                $(".p_name1").html("President Name ");

            });
            $(".p_name2").on("mouseover", function() {
                
                $(".p_name2").html(p2);

            });
            $(".p_name2").on("mouseout", function() {
                
                $(".p_name2").html("President Name ");

            });
            $(".p_name3").on("mouseover", function() {
                
                $(".p_name3").html(p1);

            });
            $(".p_name3").on("mouseout", function() {
                
                $(".p_name3").html("President Name: ");

            });
            $(".number1").on("mouseover", function() {
                
                $(".number1").html(r3);

            });
            $(".number1").on("mouseout", function() {
                
                $(".number1").html("total number ");

            });
            $(".number2").on("mouseover", function() {
                
                $(".number2").html(r2);

            });
            $(".number2").on("mouseout", function() {
                
                $(".number2").html("total number ");

            });
            $(".number3").on("mouseover", function() {
                
                $(".number3").html(r1);

            });
            $(".number3").on("mouseout", function() {
                
                $(".number3").html("total number ");

            });
            $(".about1").on("mouseover", function() {

                $(".about1").css({"position": "absolute", "font-size": "14px", "font-weight": "lighter", "opacity": "1", "padding-left": "10px"});
                
                $(".about1").html(" Any student can join the robotics club by paying the joining fee through onine payment and after getting approvment from the president you will become member of the club and will be able to use the facilities of the club.");

            });
            $(".about1").on("mouseout", function() {
                $(".about1").css({"position": "static", "font-size": "16px", "font-weight": "bold", "opacity": "0.8", "padding-left": "70px"});
                $(".about1").html("About");

            });
            $(".about2").on("mouseover", function() {
                
                $(".about2").css({"position": "absolute", "font-size": "14px", "font-weight": "lighter", "opacity": "1", "padding-left": "10px"});
                
                $(".about2").html(" Any student can join the app forum by paying the joining fee through onine payment and after getting approvment from the president you will become member of the club and will be able to use the facilities of the club.");

            });
            $(".about2").on("mouseout", function() {
                
                $(".about2").css({"position": "static", "font-size": "16px", "font-weight": "bold", "opacity": "0.8", "padding-left": "70px"});
                $(".about2").html("About");

            });
            $(".about3").on("mouseover", function() {
                
                $(".about3").css({"position": "absolute", "font-size": "14px", "font-weight": "lighter", "opacity": "1", "padding-left": "10px"});
                
                $(".about3").html(" Any student can join the eee club by paying the joining fee through onine payment and after getting approvment from the president you will become member of the club and will be able to use the facilities of the club.");

            });
            $(".about3").on("mouseout", function() {
                
                $(".about3").css({"position": "static", "font-size": "16px", "font-weight": "bold", "opacity": "0.8", "padding-left": "70px"});
                $(".about3").html("About");

            });





        });
    </script>



</body>

</html>