<?php
/**
 * Created by PhpStorm.
 * User: jpellegrino
 * Date: 8/30/15
 * Time: 8:39 PM
 */
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "projex";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

else{
    echo "Connected successfully";
    echo "<br/>";
}
?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
     <!-- Required meta tags always come first -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="x-ua-compatible" content="ie=edge">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

     <link rel="stylesheet" href="style.css">
   </head>
   <body>
 <nav class="navbar navbar-light bg-faded">
   <a class="navbar-brand" href="#">Fixed top</a>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
         New Project
     </button>
 </nav>
     <h1>&nbsp</h1>
 <div class="container">
      <div class="container-fluid">
      <div class="row" id="draggable">



<?php



//SQL Query for all projects
$sqlProjects = "SELECT * from projects";
$resultProjects = $conn -> query($sqlProjects);

//SQL Query for inserting new Projects
//$sqlNewProject = "INSERT into "


if ($resultProjects -> num_rows > 0){
    //output each row
    while($rowProjects = $resultProjects -> fetch_assoc()){


        $sqlTasks = "SELECT * from tasks where project_name = '" . $rowProjects["name"] . "'";
        $resultTasks = $conn -> query($sqlTasks);

        echo "     <div class='col-md-4'>";
        echo "<div class='panel panel-default'>";
        echo "<div class='panel-heading'></div>";
        echo "        <div class='panel-body'>Content</div>";
  echo "     <div class='card'>";
  echo "          <img class='card-img-top' data-src='holder.js/100%x180/?text=Image cap' alt='Card image cap'>";
  echo "              <div class='card-block'>";
  echo "          <h4 class='card-title'>" . $rowProjects["name"] .  "</h4>";
        if($resultTasks -> num_rows >0){
            while($rowTasks = $resultTasks -> fetch_assoc()){
                echo "<p class='card-text'>" . $rowTasks["task"] . "</p>";

            }

        }

  echo "          <a href='#' class='btn btn-primary'>Button</a>";
  echo "          </div>";
  echo "      </div>";
        echo "</div>";
        echo "</div>";

    }
}
else{
    echo "You have no projects";
}
$conn -> close();
?>

</div>
</div>
</div>


 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     <span class="sr-only">Close</span>
                 </button>
                 <h4 class="modal-title">New Project</h4>
             </div>
             <div class="modal-body">
                 <form method="post" action="newProject.php">
                     <div class="form-group row">
                         <label for="inputEmail3" class="col-sm-2 form-control-label">Name</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" name="project_name" id="project_name">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="dueDate" class="col-sm-2 form-control-label">Due Date</label>
                         <div class="col-sm-10">
                             <input type="date" class="form-control" name="dueDate" id="dueDate" placeholder="MM/DD/YYYY">
                         </div>
                     </div>

                     <div class="form-group row">
                         <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn btn-secondary" id="newProject">Add Project</button>
                             <input name="newProject" type="submit" id="newProject" value="Add Employee">
                         </div>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->



<!-- jQuery first, then Bootstrap JS. -->
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src='https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js'></script>
</body>
<script type='text/javascript'>
    $(function() {
        $("#draggable" ).sortable();
        $("#draggable").disableSelection();
    });
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

</script>
</html>


