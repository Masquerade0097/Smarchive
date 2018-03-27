<?php
session_start();
if(!isset($_SESSION['username'])){
  $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
  header('Location:'.$url);
}
else{
  $username = $_SESSION['username'];
}

if(isset($_POST["id"])){
    $id = ($_POST["id"]);
    $username = $_SESSION['username'];

    require'connect.php';
    $query = "UPDATE `coursedata` SET `likes`=`likes`+1 WHERE `id`=$id";
    mysqli_query($dbc, $query)
    or die('Unable to add coursedata');

    $query = "SELECT likes FROM `coursedata` WHERE `id`=$id";
    $result = mysqli_query($dbc, $query)
    or die('Unable to add coursedata');
    echo mysqli_fetch_array($result)['likes'];
}

?>