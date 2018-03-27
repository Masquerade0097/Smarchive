<?php
session_start();
if(!isset($_SESSION['username'])){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
    header('Location:'.$url);
}
$username = $_COOKIE['username'];
if(isset($_GET['username'])){
            $username = $_GET['username'];
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Courses</title>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/favicon/favicon-16x16.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<!-- CSS Files -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your course -->
	<link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="../assets/css/daddy.css" rel="stylesheet" />
    <!-- jquery library -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>

function applicant(count,id,username){
	//console.log("start");
	$.ajax({
		type: "POST",
		url: "applicant.php",
		data: {
			'count':count,
			'id':id,
			'username' : username
		},
		success: function(data){
			//console.log("success"+data);
			//document.getElementById("applicant_tableIC 202").innerHTML=data;
			$("#applicant_table"+count).html(data);
			//$("#applicant_table"+id).toggle(500);
		}
	});
}	
function apply(count,id){
	//console.log("start");
	$.ajax({
		type: "POST",
		url: "apply.php",
		data: {
			'count':count,
			'id' : id
		},
		success: function(data){
			//console.log("success"+data);
			//document.getElementById("applicant_tableIC 202").innerHTML=data;
			$("#apply"+count).html(data);
			//$("#applicant_table"+id).toggle(500);
		}
	});
}	

</script>
</head>
<body class="profile-page sidebar-collapse" >
	<!-- Navbar -->
    <?php $nav_bar = include_once ("nav.php"); echo $nav_bar; ?>
    <!-- End Navbar -->
	 <div class="wrapper">
        <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg4.jpg');">
            </div>
            <div class="container">
                <div class="content-center">
                    <div class="photo-container">
                        <img class="photo-container" src= <?php echo '"../assets/img/user/'.$image.'"'?> alt="Profile Picture">
                    </div>
                    <h1 class="title">
                    	<?php if($profession=='faculty') echo 'Courses Offered by'; if($profession=='student') echo 'Courses Done by'; ?>
                </h1>

                    <h3 class="title"><?php echo ("$firstname $lastname");?></h3>
                    
                    
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <!-- <div class="button-container">

                    <div class="photo-container">
                        <img src="../assets/img/ryan.jpg" alt="">
                    </div>
                </div> -->
				<div class="container tim-container" style="max-width:800px; padding-top:100px">

                   <!-- <h1 class="text-center">My Courses </h1> -->
               </div>	
	<?php
	$dbc = mysqli_connect("localhost", "root", NULL, "smarchive")
or die("Unable to connect to database");

// echo $username;
$query = "SELECT profession FROM userlogin WHERE username = '$username'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$profession = $row['profession'];
if($row['profession']=='student'){
	// echo $profession;
		echo "<div id = \"applicant_table\"></div>";
	echo"<script> applicant('','2','$username');</script>";
	
}
if($row['profession']=='faculty'){
	// echo $profession;
	$query = "SELECT * FROM course where `offeredby`='$username' ";
	$result = mysqli_query($dbc, $query)
	or die('Unable to query mycourse' );
	if(mysqli_num_rows($result)==0)
	echo"<h1>No Course has been offered by you!</h1>";
		//require_once "profile-page.php";
		$count = 0;
	while($row = mysqli_fetch_assoc($result)){
		$count=$count+1;
		$short_desc = substr($row["description"], 0,150)." ....";
		echo " <div class='container tim-container' style='max-width:800px; padding-top:30px'>

		<h1 class='text-center'>$row[title]</h1>

		<!--    Display Current Courses --> 
		<p>$short_desc</p>

		<span >";
		// $query1 = "SELECT tag.tagname from course join coursetag on course.course_id = coursetag.course_id join tag on coursetag.tag_id=tag.tag_id where course.course_id=$row[course_id]" ;
		// $result_tag = mysqli_query($dbc, $query1)
		// or die('Unable to query course' );
		// while($tag = mysqli_fetch_assoc($result_tag)){
		// 	echo    "<span >
		// 	<a href='search.php?id=\"$tag[tagname]\"' class='btn btn-primary btn-round btn-sm' >$tag[tagname]</a>
		// 	</span>";
		// }
		echo
		" </span>
		<!--     end extras --> 
		<div class='col text-center'> 
		 <a href='project.php?id=$row[course_id]'  class='btn btn-primary btn-round btn-lg'>Detail Description</a> ";
		
				echo "<a  onclick='apply($count,\"$row[course_id]\")' class='btn btn-primary btn-round btn-lg'>Enroll</a> 
				<div id = \"apply$count\"></div>	";	
		
		 if($username == $_COOKIE['username']){         

		echo"<script> applicant($count,\"$row[course_id]\",'$username');</script>"; 
		 }
		echo"
		</div>
		<div id = \"applicant_table$count\"></div>
		</div>
		";
	}
}
mysqli_close($dbc);

?>
	<!-- <button type="button" id="myproject" onclick="applicant()" value="My Courses">My course</button> -->

	<!-- <script>applicant("");</script> -->

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
</body>
</html>