<?php
include("connect.php");
session_start();
if(!isset($_SESSION['username'])){
  $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
  header('Location:'.$url);
}
  $username = $_SESSION['username'];

if(isset($_POST["id"])){
    //echo $_POST["id"];
	show_course($_POST["id"]);
}
define('TopCoderHackathon_UPLOADPATH', '../assets/img/');
if(isset($_POST['submit']))
{
  $id = $_POST["p_id"];
  $title = $_POST['title'];
  $desc = $_POST['description'];

//   require'connect.php';
  $image = $_FILES['Image']['name'];
  $query = "INSERT INTO `coursedata`(`course_id`, `url`, `topic`, `description`) VALUES ('$id','$image','$title','$desc') ";
  mysqli_query($dbc, $query)
  or die('Unable to add coursedata');

  $query = "INSERT INTO `coursetopic`(`course_id`, `topic`) VALUES('$id','$title')";
  mysqli_query($dbc, $query)
  or die('Unable to add coursetopic');

  $query = "SELECT course_id FROM `coursedata` WHERE `course_id` = '$id' and `url` = '$image' and `topic`='$title' and `description`='$desc'";
//   echo $query;
  $result = mysqli_query($dbc, $query)
  or die('Unable to retrieve id');
  $row = mysqli_fetch_assoc($result);
  $id = $row['course_id'];

  if(!is_dir(TopCoderHackathon_UPLOADPATH."course/")) {
    mkdir(TopCoderHackathon_UPLOADPATH.'course'); 
  }
  if(!is_dir(TopCoderHackathon_UPLOADPATH."course/".$id.'/')) {
    mkdir(TopCoderHackathon_UPLOADPATH.'course/'.$id); 
  }

//   $query = "INSERT INTO `projectimage`(`project_id`, `imageurl`) VALUES
//   ('$id','$image')";
//   mysqli_query($dbc, $query)
//   or die('Unable to addproject image');
  if($image!=''){
    $target = TopCoderHackathon_UPLOADPATH.'course/'.$id.'/'.$image;
   
        if (file_exists($target)) {
        echo "Sorry, file already exists.";
        }
    move_uploaded_file($_FILES['Image']['tmp_name'], $target);
    }
    //echo 'Update successful!';

    echo '<h1>Added document successfully.</p1><br><h3>You will be automatically redirected to the other page.</h3>';
    $url = "project.php?id=$id";

    header ("Refresh: 3;URL='$url'");
  }

  function show_course($id){
    $username = $_SESSION['username'];
    include("connect.php");
    // $dbc = mysqli_connect("localhost", "root", NULL, "smarchive")
    // or die("Unable to connect to database");
    $query = "SELECT profession FROM userlogin WHERE username = '$username'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
    $profession = $row['profession'];

    $query = "SELECT * FROM `applicant` where username='$username'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query course' );
    $X = mysqli_fetch_assoc($result);

    $query = "SELECT * FROM `course` where course_id='$id'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query course' );

    $query2 = "SELECT MIN(`course_id`),MAX(`course_id`) FROM `course` ";
    $result2 = mysqli_query($dbc, $query2)
    or die('Unable to query next and prev courses' );
    $min_max = mysqli_fetch_assoc($result2);
    $previd = $min_max['MIN(`course_id`)'];
    $nextid = $min_max['MAX(`course_id`)'];

    while($row = mysqli_fetch_assoc($result)){
    echo " 
    <div class='container tim-container' style='max-width:800px; padding-top:10px'>
        <h1 class='text-center'>$row[title] (<small>$id</small>)</h1>
        <h6 class='col text-right'>Offered By - <a href='profile-page.php?username=$row[offeredby]'>$row[offeredby]</a></h6>";
        
        if($X['approval'] == "yes"){
        echo" 
        <!--collapse -->
        <div id='collapse'>
            <div class='row'>
                <div class='col-md-12'>
                    <div id='accordion' role='tablist' aria-multiselectable='true' class='card-collapse'>
                        <div class='card card-plain'>
                            <div class='card-header' role='tab' id='headingOne'>
                                <a data-toggle='collapse' data-parent='#accordion' href='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                                Upload reading material       
                                <i class='now-ui-icons arrows-1_minimal-down'></i>
                                </a>
                            </div>
                        <div id='collapseOne' class='collapse ' role='tabpanel' aria-labelledby='headingOne'>
                            ";

                            echo '
                            <div class="section">
                                <div class="container">
                                    <form enctype="multipart/form-data" method="post" action= "project_page.php" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Topic</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Title" name="title" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input hidden name="p_id" value="'.$id.'"><p><b>Share more Knowledge for good!</b></p>

                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" placeholder="Description" name="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Document/Image</label>
                                                <div class="input-group form-group-no-border input-lg">
                                                    <input type="file" class="form-control" id="Image" name="Image" accept="application/pdf,image/*|.jpg|.png|.jpeg|.gif">
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="media-footer">
                                            <input type="submit" class="btn btn-primary pull-right" value="Save" name="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        }
        echo"
    </div>

     <!--  end collapse -->";

     echo "
     <!--    Display Current courses --> 
     <p>$row[description]</p>

     <span >";
     $query1 = "SELECT * from coursetopic JOIN coursedata on coursetopic.course_id=coursedata.course_id and
      coursetopic.topic=coursedata.topic where coursetopic.course_id='$row[course_id]' GROUP BY coursedata.topic ORDER BY `likes` DESC " ;
    //  echo $query1;
     $result_tag = mysqli_query($dbc, $query1)
     or die('Unable to query coursedata' );
     while($tag = mysqli_fetch_assoc($result_tag)){
      echo    "<span >
      <a class='dropdown-item' href=''><h4>$tag[topic]</h4></a><span>";
      $query3 = "SELECT * from coursedata where coursedata.topic='$tag[topic]' and course_id='$row[course_id]' ORDER BY `likes` DESC" ;
      //echo $query3;
      $result3 = mysqli_query($dbc, $query3)
      or die('Unable to query coursedata' );

      $count=0;
      while($tag3 = mysqli_fetch_assoc($result3)){
          $count = $count+1;
        echo" 
            <a href='../assets/img/course/$id/"."$tag3[url]' class='btn btn-sm btn-round'>
            <i class=''></i> $tag3[url] 
            </a>
            <a onclick='likes($tag3[likes],\"$tag3[id]\")' class='btn btn-sm btn-round'>
            <i class='now-ui-icons ui-2_favourite-28'></i><span id='like$tag3[id]'> $tag3[likes]</span>
            </a><br>
        ";
      }
      echo "</span>";
    }

    $current_id = $row["course_id"];

    $nextquery= "SELECT `course_id` FROM `course` WHERE `course_id` > '$current_id' ORDER BY `course_id` ASC LIMIT 1"; 
    $nextresult = mysqli_query($dbc,$nextquery)
    or die("Unable to get next course_id");
    if(mysqli_num_rows($nextresult) > 0)
    {
      $nextrow = mysqli_fetch_assoc($nextresult);
      $nextid  = $nextrow["course_id"];
    }

    $prevquery= "SELECT `course_id` FROM `course` WHERE `course_id` = (SELECT MAX(`course_id`) FROM `course` WHERE `course_id`< '$current_id')"; 
    $prevresult = mysqli_query($dbc,$prevquery)
    or die("Unable to get prev course_id");
    if(mysqli_num_rows($prevresult) > 0)
    {
      $prevrow = mysqli_fetch_assoc($prevresult);
      if( $prevrow['course_id'] != "") $previd = $prevrow['course_id'];

    }
    echo
    " </span>
    <!--     end extras --> 
    <div class='col text-center'> 
    <a onclick='showPage(\"$previd\")' class='btn btn-primary btn-round btn-lg'>$previd</a> 
    <a onclick='showPage(\"$nextid\")' class='btn btn-primary btn-round btn-lg'>$nextid</a> 
    </div> 
    </div>
    ";
  }
  mysqli_close($dbc);
}
?>