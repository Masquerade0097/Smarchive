<?php
    include("connect.php");
    // echo "Search_init called";
    define("DB_MSG_ERROR", 'Could not connect!<br />Please contact the site\'s administrator.');
    // $conn = mysqli_connect("localhost", "root", NULL) or die(DB_MSG_ERROR);
    // $db = mysqli_select_db($conn,'smarchive') or die(DB_MSG_ERROR);
    $query = mysqli_query($conn,"
        SELECT *
        FROM course
        ORDER BY course_id DESC
        LIMIT 5
    ");
    
    while ($data = mysqli_fetch_array($query)) {
      echo '<div class="col-md-4">
                <div class="card card-blog">
                    <div class="card-image">
                        <a href="project.php?id='.$data['course_id'];
                            echo '"><img class="img rounded" src="../assets/img/bg3.jpg">
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="category text-primary">Course</h6>
                        <h5 class="card-title">';
        echo $data["title"];
        echo '</h5>
                <p class="card-description">';

        echo substr($data["description"],0,150)."...";
                    
        echo '</p>
                <div class="card-footer">
                    <div class="author">
                        
                        <span>';
        echo $data["offeredby"];           
        echo '</span>
                    </div>
                    
                </div>
            </div>
            </div>
        </div>';
    }
    
?>

