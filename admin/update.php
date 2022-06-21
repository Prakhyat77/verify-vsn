<?php
    session_start();
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
</head>

<body>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">


                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <span class="anchor" id="formLogin"></span>


                        <!-- form user info -->
                        <div class="card card-outline-secondary">
                            <div class="card-header">
                                <h3 class="mb-0">Update Data</h3>
                            </div>
                            <div class="card-body">
                                <form autocomplete="off" action="" method="POST" class="form" role="form">
                                    <?php 
                                        
                                        
                                        $id = $_GET['id'];
                                        $form_query = "SELECT * FROM verify WHERE id=$id";
                                        $form_data = mysqli_query($con,$form_query);
                                        $form_fetch = mysqli_fetch_array($form_data);

                                        if(isset($_POST['update_btn']))
                                        {
                                            $idupdate = $_GET['id'];
                                            $batch = $_POST['batch'];
                                            $mfg = $_POST['mfg'];
                                            $company = $_POST['company'];
                                            $product = $_POST['product'];
                                            
                                            $up_query="UPDATE verify SET batch='$batch',mfg='$mfg',company='$company',product='$product' WHERE id =$idupdate ";
                                            echo $up_query;
                                            $up_result = mysqli_query($con,$up_query);
                                            if($up_result){
                                                $_SESSION['up_status'] = "Data Updated Successfully";
                                                header("Location: index.php");
                                            }
                                            else{
                                                $_SESSION['up_err'] = "Fail To Update Data";
                                                header("Location: index.php");
                                                exit(0);
                                            }
                                            
                                        }

                                    ?>



                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label">VSN Code</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="<?= $form_fetch['vsn']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label">Serial Number</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="serials"
                                                value="<?= $form_fetch['serials']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label">Batch Number</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="batch"
                                                value="<?= $form_fetch['batch']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label">MFG Date</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="date" name="mfg"
                                                value="<?= $form_fetch['mfg'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="company"
                                                value="<?= $form_fetch['company']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label">Product Name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="product"
                                                value="<?= $form_fetch['product']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input class="btn btn-secondary" type="reset" value="Cancel">
                                            <input class="btn btn-primary" type="submit" name="update_btn" value="Save Changes">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /form user info -->
                    </div>
                </div>
            </div>
            <!--/card-->
        </div>
    </div>
    <!--/row-->
    </div>
    <!--/col-->
    </div>
    <!--/row-->
    </div>
    <!--/container-->


</body>

</html>