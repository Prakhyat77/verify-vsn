<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../admin.php" );
    }
    include '../dbcon/conn.php';
    include '../links.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify VSN Admin Panel</title>
    <link rel="icon" type="image/png" href="../public/images/icons/favicon.ico" />
    
</head>
<body>
 <!-- Show/Download Data -->
 <div class="container">
    <div class="col-md-12 mt-4">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Contact Data</h5>
                        
                    </div>
                    <div class="col-md-6">
                    <a href="index.php"><button class="btn btn-primary">Dashboard</button></a>
                        
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="card-body table-responsive scrollable"> -->
    <div class="card-body table-responsive ">
    <table class="table table-fixed table-condensed table-striped table-bordered table-fluid" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $contact_query = "SELECT * FROM contact";
            $contact_result = mysqli_query($con,$contact_query);
            if(mysqli_num_rows($contact_result)>0)
            {
                foreach($contact_result as $row)
                {
                    ?>

            
            <tr>
                <th><?= $row['name']; ?></th>
                <th><?= $row['email']; ?></th>
                <th><?= $row['message']; ?></th>
                <th><?= $row['contact_date']; ?></th>
                <th><button class="btn btn-danger"><a style="text-decoration:none; color:white;" href="contactdelete.php?id=<?php echo $row['c_id'];?>">Delete</a></button></th>
            </tr>
            <?php
                }
            }else{?>
                    <tr>
        <td colspan="5" style="text-align: center; font-weight: bold">
            No Record Found
        </td>
        </tr>
            <?php
            }
            ?>
        </tbody>

</table>
    </div>
    </div>

    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    </body>
    </html>