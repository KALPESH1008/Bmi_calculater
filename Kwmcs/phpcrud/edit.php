<!DOCTYPE html>
<html lang="en">


<?php
       
       include('connection.php');
       include('header.php');
       
        ?>  
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CRUD Using PHP/MySQL</a>
            </div>
     
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           PHP CRUD <small>Create, Read, Update and Delete</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
<?php 
$query = 'SELECT * FROM bmi_data
              WHERE
              id ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['id'];
                $i= $row['name'];
                $a=$row['age'];
                $b=$row['height'];
                $c=$row['weight'];
                $d=$row['bmi'];
                $e=$row['timestamp'];
             
              }
              
              $id = $_GET['id'];
         
?>

             <div class="col-lg-12">
                  <h2>Edit Records</h2>
                      <div class="col-lg-6">

                        <form role="form" method="post" action="edit1.php">
                            
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder=" Name" name="name" value="<?php echo $i; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Age" name="age" value="<?php echo $a; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Height" name="height" value="<?php echo $b; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Weight" name="weight" value="<?php echo $c; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="BMI" name="bmi" value="<?php echo $d; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Timestamp" name="timestamp" value="<?php echo $d; ?>">
                            </div> 
                             
                            <button type="submit" class="btn btn-default">Update Record</button>
                         


                      </form>  
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
 
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  
</body>

</html>

