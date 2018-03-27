<?php
include("connect.php");
$username = $_COOKIE['username'];
if(isset($_POST['username'])){
	$username = $_POST['username'];
}
// echo $username;
// $dbc = mysqli_connect("localhost", "root", NULL, "smarchive")
// or die("Unable to connect to database");
$query = "SELECT profession FROM userlogin WHERE username = '$username'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$profession = $row['profession'];

// echo $profession;
if($row['profession']=='faculty' and isset($_POST['id'])){
	$id = $_POST['id'];
	$count = $_POST['count'];
	$query = "SELECT id,course_id,applicant.username,firstname,lastname,email,credential,description,approval FROM `applicant` JOIN `studentinfo` on applicant.username=studentinfo.username where applicant.course_id ='$id'";

	$result = mysqli_query($dbc, $query)
	or die('Unable to query applicant faculty' );

	echo"
	<!--                 collapse -->
	<div id='collapse'>
	<div class='row'>
	<div class='col-md-12'>
	<div id='accordion' role='tablist' aria-multiselectable='true' class='card-collapse'>
	<div class='card card-plain'>
	<div class='card-header' role='tab' id='heading$count'>
	<a data-toggle='collapse' data-parent='#accordion' href='#collapse$count' aria-expanded='true' aria-controls='collapse$id'>
	Applicant Details
	<i class='now-ui-icons arrows-1_minimal-down'></i>
	</a>
	</div>
	<div id='collapse$count' class='collapse ' role='tabpanel' aria-labelledby='heading$count'>
	<div class='card-body'>
	<div class='card card-plain'>
	<div class='card-body'>
	<div class='table-responsive'>
	<table class='table'>
	<thead class=''>
	<th class='text-center'>#</th>
	<th>Name</th>
	<th>email</th>
	<th class='text-center'>Credential</th>
	<th class='text-right'>Description</th>
	<th class='text-right'>Approval</th>

	</thead>
	<tbody>";
	$count=0;
	while($row = mysqli_fetch_assoc($result)){
		$count=$count+1;
		$short_desc = substr($row["description"], 0,150)." ....";
		echo "<tr>
		<td class='text-center'>
		$count
		</td>
		<td>
		<a href = 'profile-page.php?username=$row[username]'>$row[firstname] $row[lastname]</a>
		</td>
		<td>
		$row[email]
		</td>
		<td class='text-center'>
		$row[credential]
		</td>
		<td class='text-right'>
		$row[description]
		</td>
		
		<td class='text-right'>";
		if($row['approval'] == ''){
			echo"
			<span id=idd$row[id]>
		<button type='button' id='id$row[id]' value='$row[id]' rel='tooltip' class='btn btn-info btn-icon btn-sm '>
		<i class='now-ui-icons ui-1_check'></i>
		</button>

		<button type='button' id='i$row[id]' value='$row[id]' rel='tooltip' class='btn btn-info btn-icon btn-sm '>
		<i class='now-ui-icons ui-1_simple-remove'></i>
		</button>
	 </span>

		";
	}
	if($row['approval'] == 'yes'){
			echo"
		<button type='button' rel='tooltip' class=' btn-sm '>
		Approved
		</button>
		";
	}
	if($row['approval'] == 'no'){
			echo"
		<button type='button' rel='tooltip' class=' btn-sm '>
		Rejected
		</button>";
	}
	echo "	</td>
			</tr> 
	<script>
		$(document).ready(function(){
            $(document).on('click','#id$row[id]',function(){
                var pid = $('#id$row[id]').val();
                console.log(pid);
                $.ajax({
                    type : 'POST',
                    url : 'approve.php',
                    data :{
                        'id' : pid,
                        'approve' : 'yes'
                    },
                    success : function(data){
                        $('#idd'+pid).html(data);
                    }
                });
            });
        });
        $(document).ready(function(){
            $(document).on('click','#i$row[id]',function(){
                //var approve = $('#approval').val();
                var pid = $('#id$row[id]').val();
                console.log(pid);
                $.ajax({
                    type : 'POST',
                    url : 'approve.php',
                    data :{
                        'id' : pid,
                        'approve' : 'no'
                    },
                    success : function(data){
                        $('#idd'+pid).html(data);
                    }
                });
            });
        });
	</script>
	";
	}
	echo
	" </tbody>
	</table>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

	<!--  end collapse -->";

}
if($row['profession']=='student'){
	$query = "SELECT id,course.course_id,offeredby,title,description,approval FROM `applicant` JOIN `course` on applicant.course_id=course.course_id 
	where applicant.username ='$username'";
	//  echo $query;
	$result = mysqli_query($dbc, $query)
	or die('Unable to query applicant student' );

	echo "<div class='card card-plain'>
	<div class='card-body'>
	<div class='table-responsive'>
	<table class='table'>
	<thead class=''>
	<th class='text-center'>
							#
	</th><th>Title</th>
	<th>offeredby</th>
	<th class='text-center'>description</th>
	<th class='text-right'>Approved</th>

	</thead>
	<tbody>";
	$count=0;
	while($row = mysqli_fetch_assoc($result)){
		$count=$count+1;
		$short_desc = substr($row["description"], 0,100)." ....";
		echo "<tr>
		<td class='text-center'>
		$count
		</td>
		<td>
		<a href='project.php?id=$row[course_id]'>$row[title]</a>
		</td>
		<td>
		<a href='profile-page.php?username=$row[offeredby]'>$row[offeredby]
		</td>
		<td class='text-center'>
		$short_desc
		</td>
		
		<td class='text-right'>";
			if($row['approval'] == ''){
			echo"
		<button type='button' rel='tooltip' class='btn btn-info btn-icon btn-sm '>
		<i class='now-ui-icons arrows-1_refresh-69'></i>
		</button>
		";
	}
	if($row['approval'] == 'yes'){
			echo"
		<button type='button' rel='tooltip' class=' btn-sm '>
		Approved
		</button>
		";
	}
	if($row['approval'] == 'no'){
			echo"
		<button type='button' rel='tooltip' class=' btn-sm '>
		Rejected
		</button>";
	}	
		echo "</td>
		</tr> ";
	}
	echo
	" </tbody>
	</table>
	</div>
	</div>
	</div>
	";
}   
mysqli_close($dbc);

?>