<?php  session_start(); 
    if(!isset($_SESSION['username'])){
        header("Location: ../admin.php" );
    }
    include '../dbcon/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify VSN Admin Panel</title>
    <link rel="icon" type="image/png" href="../public/images/icons/favicon.ico" />
    <?php include '../links.php'; ?>
    <style>
        body{
            margin-bottom: 50px;
        }
        .scrollable{
            height: 700px;
            overflow-y: scroll;
        }
        .heading{
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        .show{
            margin-top:20px;
            display:flex;
            align-items:center;
            justify-content:space-around;
        }

        @media(max-width:560px){
            .heading{
                flex-direction: column;
            }
            .show{
                flex-direction: column;
            }
            .show_number{
                margin-bottom:20px;
            }
        }
       
    </style>
</head>
<body>
 <!-- upload data -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="heading">
                        <h5 class="mb-3">Welcome To Verify VSN Admin Panel</h5>
                        <a href="logout.php" class="btn btn-dark">Logout</a>
                </div>   
                <hr>
                <?php
                if(isset($_SESSION['status']))
                {
                    echo "<h5 style='color:green'>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }
                if(isset($_SESSION['err']))
                {
                    echo "<h5 style='color:red'>".$_SESSION['err']."</h5>";
                    unset($_SESSION['err']);
                }
                ?>
                <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="card card-body shadow">
                        <div class="row">
                            <div class="col-md-2 my-auto">
                                <h5>Select File</h5>
                            </div>
                            
                            <div class="col-md-4">
                                <input type="file" accept=".csv ,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="import_file" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="import_file_btn" class="btn btn-primary" value="Upload File">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Show number of verify -->
    <div class="container show">
        <div class="card show_number" style="width: 18rem;">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Total No. of Verification Codes</h6>    
                <h4 class="card-title">
                    <?php
                        // include '../conn.php';
                        $total_query = "SELECT * FROM verify";
                        $total_res = mysqli_query($con,$total_query);
                        echo mysqli_num_rows($total_res);
                    ?>
                </h4>
            </div>
        </div>
        <div class="card show_number" style="width: 18rem;">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">No. of Verified Profile(s)</h6>    
                <h4 class="card-title">
                <?php
                        $total_ver_query = "SELECT * FROM verify WHERE verify_details is not NULL ";
                        $total_ver_res = mysqli_query($con,$total_ver_query);
                        echo mysqli_num_rows($total_ver_res);
                    ?>
                </h4>
            </div>
        </div>
    </div>
    <!-- Contact Data -->
    <div class="container">
    <div class="col-md-12 mt-4">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <a href="contact.php"><button class="btn btn-primary">Contact Data</button></a>
       
                    </div>
             
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="col-md-12 mt-4">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Verify VSN Data</h5>
                        <?php
                            if(isset($_SESSION['up_status']))
                            {
                                echo "<h5 style='color:green'>".$_SESSION['up_status']."</h5>";
                                unset($_SESSION['up_status']);
                            }
                            if(isset($_SESSION['up_err']))
                            {
                                echo "<h5 style='color:red'>".$_SESSION['up_err']."</h5>";
                                unset($_SESSION['up_err']);
                            }
                ?>
                    </div>
                    <div class="col-md-6">
                                <form action="code.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="export_file_type" required class="form-control">
                                                <option value="">--Select Any One--</option>
                                                <option value="xlsx">xlsx</option>
                                                <option value="xls">xls</option>
                                                <option value="csv">csv</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" name="export_btn" class="btn btn-primary">Export</button>
                                        </div>
                                    </div>
                                </form>
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
                <th scope="col">VSN Code</th>
                <th scope="col">Sr. No.</th>
                <th scope="col">Batch No.</th>
                <th scope="col">MFG Date</th>
                <th scope="col">Company Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Verify Date</th>
                <th scope="col">Verify Details</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // include '../conn.php';
            $verify_query = "SELECT * FROM verify";
            $verify_result = mysqli_query($con,$verify_query);
            if(mysqli_num_rows($verify_result)>0)
            {
                foreach($verify_result as $row)
                {
                    ?>

            
            <tr>
                <th><?= $row['vsn']; ?></th>
                <th><?= $row['serials']; ?></th>
                <th><?= $row['batch']; ?></th>
                <th><?= $row['mfg']; ?></th>
                <th><?= $row['company']; ?></th>
                <th><?= $row['product']; ?></th>
                <th><?= $row['date']; ?></th>
                <th><?= $row['verify_details']; ?></th>
                <th><button class="btn btn-primary"><a style="text-decoration:none; color:white;" href="update.php?id=<?php echo $row['id'];?>">Update</a></button></th>
                <th><button class="btn btn-danger"><a style="text-decoration:none; color:white;" href="delete.php?id=<?php echo $row['id'];?>">Delete</a></button></th>
            </tr>
            <?php
                }
            }else{?>
                    <tr>
        <td colspan="10" style="text-align: center; font-weight: bold">
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