<?php
include("connect.php");
session_start();
if(!isset($_SESSION['username'])){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
    header('Location:'.$url);
}

$user = $_SESSION['username'];
// $dbc = new mysqli('localhost','root',NULL,'smarchive');
// $dbc = mysqli_connect("localhost", "root", NULL, "smarchive")
// or die("Unable to connect to database");
$query = "SELECT profession FROM userlogin WHERE username = '$user'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$profession = $row['profession'];
$var=$profession."info";
$query = "SELECT * FROM $var WHERE username = '$user'";
$result = mysqli_query($dbc, $query)
or die('Unable to query studentinfo' );

$row = mysqli_fetch_array($result);
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$credential = $row['credential'];
$image = $row['image_url'];
$description = $row['description'];
$email = $row['email'];
// mysqli_close($dbc);

function count_project($status){
    // $dbc = mysqli_connect("localhost", "root", NULL, "smarchive")
    // or die("Unable to connect to database");
    
    $query = "SELECT * FROM project WHERE status = '$status'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query project' );
    $current_count = mysqli_num_rows($result);
    
    // mysqli_close($dbc);
    // echo "$status called = $current_count";
    echo $current_count;
    //return $current_count;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Course Page</title> 
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="../assets/css/daddy.css" rel="stylesheet" />
    <!-- jquery library -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        function showHint(str) {
            if (str.length == 0) { 
                document.getElementById("project_overview").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("project_overview").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "display_project.php?q=" + str, true);
                xmlhttp.send();
            }
            // window.history.pushState("object","Title",str);
        }

        // function apply(str,apply_id) {
        //     var a_id = apply_id.slice(5,apply_id.length);
        //     // console.log (`${a_id}`);
        //     if (str.length == 0) { 
        //         document.getElementById(apply_id).innerHTML = "";
        //         return;
        //     } 
        //     else {
        //         var xmlhttp = new XMLHttpRequest();
        //         xmlhttp.onreadystatechange = function() {
        //             if (this.readyState == 4 && this.status == 200) {
        //                 $valid="";
        //                 $apply_form="\
        //                 <form method='POST' id = "+a_id+" action=''><input hidden name='id' value="+a_id+"><p><b>Why are you interested in this project?</b></p><textarea name='interested'></textarea><button type='submit' value='Submit'>Submit</button></form>";
        //                 if(str!="available")$apply_form="<b>Please select from Available projects</b>";
        //                 document.getElementById(apply_id).innerHTML = $apply_form;
        //             }
        //         };
        //         xmlhttp.open("GET", "apply.php?q=" + str, true);
        //         xmlhttp.send();
        //     }
        // }
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#apply_form',function(){
                // console.log('HELLO');
                var interest = $('#interested').val();
                var pid = $('#p_id').val();
                $.ajax({
                    type : 'POST',
                    url : 'apply.php',
                    data :{
                        'id' : pid,
                        'interested' : interest
                    },
                    success : function(data){
                        $('#apply'+pid).html(data);
                    }
                });
            });
        });
    </script>
    <script>
        function change_image(id){
            $.ajax({
                type: "POST",
                url: "image.php",
                data: {
                    'id':id
                },
                success: function(data){
                    $("#_image").html(data);
                }
            });
        }
        function showPage(id) {
            $.ajax({
                type: "POST",
                url: "project_page.php",
                data: {
                    'id':id
                },
                success: function(data){
                    $("#project_overview").html(data);
                    change_image(id);
                }
            });
            // window.history.pushState("object","Title",str);
        }
        function likes(likes,id) {
            $.ajax({
                type: "POST",
                url: "likes.php",
                data: {
                    'id':id
                },
                success: function(data){
                    
                    $("#like"+id).html(data);
                }
            });
            // window.history.pushState("object","Title",str);
        }
        function page_navigate(start,end){
            $.ajax({
                type: "POST",
                url: "display_project.php",
                data: {
                    'start':start,
                    'end' : end,
                    'status' : "all"
                },
                success: function(data){
                    $("#project_overview").html(data);
                }
            });
        }
    </script>
</head>

<body class="profile-page sidebar-collapse">
    <!-- Navbar -->
    <?php $nav_bar = include_once ("nav.php"); echo $nav_bar; ?>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header page-header-small" filter-color="orange">
            <?php $image_url = ""; echo '<span id = "_image"> 
            <div class="page-header-image" data-parallax="true" style="background-image: url('.$image_url.');"></span>
            </div>'; ?>
           
        </div>

        <div class="section">
            <div class="container">
                <div class="button-container">

                    <!-- <div class="photo-container">
                        <img src="../assets/img/ryan.jpg" alt="">
                    </div> -->
                </div>
                
                <div class="container tim-container" style="max-width:800px; padding-top:100px">

                   <!-- <h1 class="text-center">Project/Intern Opportunities </h1> -->
               </div>



               <!-- Display project overview -->

               <?php if(isset($_GET["id"])){
                echo "<script>showPage('$_GET[id]');</script>";}
                // else
                // {echo "<script>showHint(\"all\");</script>";} ?>
                <div id="project_overview"></div>


                <!-- <script>apply_form("2");</script>
                    <div id="apply2"></div> -->
                <!-- <script>page_navigate("0","2");</script>
                    <div id="page_navigate"></div> -->

            </div>
        </div>
        <footer class="footer footer-default">
            <div class="container">

                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, View Code at
                    <a href="https://github.com/Masquerade0097/TopCoderHackathon.git" target="_blank">GitHub</a>
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->

<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#search_bar').keyup(function(e) {
            if(e.which==13){
                var parameter_search=$('#search_bar').val();
                window.open("search.php?id="+parameter_search);

            }
        });
        

    });
    
</script>
</html>