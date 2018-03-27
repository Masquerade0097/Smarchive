<?php
  session_start();
  include("connect.php");
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    
    $user = $_SESSION['username'];
    //$dbc = mysqli_connect("localhost", "root", NULL, "smarchive")
    //or die("Unable to connect to database");
    $query = "SELECT profession FROM userlogin WHERE username = '$user'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
    $profession = $row['profession'];
if (isset($_POST['id']) and $profession == 'student') {
    $m = $_POST['id'];
    // echo $m;
    // $user = $_SESSION['username'];
    //$dbc = mysqli_connect("localhost", "root", NULL, "smarchive")
    //or die("Unable to connect to database");
    
    $duplicate = "SELECT count(`id`) FROM `applicant` WHERE `username`='$user' and `course_id` = '$m'";
    // echo $duplicate;
    $check = mysqli_query($dbc,$duplicate)
      or die('Unable to check duplicate entry enroll course');

    $row =  mysqli_fetch_assoc($check);
    if(!$row['count(`id`)']){
        $query = "INSERT INTO `applicant`(`username`, `course_id`) VALUES ('$user','$m')";
        $result = mysqli_query($dbc, $query)
          or die('Unable to insert applicant');
        echo "<i><b>Successfully enrolled for the course</i></b>";
    }
    else{
        echo "<i><b>Already enrolled for this course</i></b>";
    }
}
?>