<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ../admin.php" );
}

include '../dbcon/conn.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

if(isset($_POST['export_btn'])){
    $ext = $_POST['export_file_type'];
    $fileName = "verify-VSN-".time();

    $export_query = "SELECT * FROM verify";
    $export_query_result = mysqli_query($con,$export_query);

    if(mysqli_num_rows($export_query_result)>0)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'VSN Code');
        $sheet->setCellValue('B1', 'Sr. No.');
        $sheet->setCellValue('C1', 'Batch No.');
        $sheet->setCellValue('D1', 'MFG Date');
        $sheet->setCellValue('E1', 'Company Name');
        $sheet->setCellValue('F1', 'Product Name');
        $sheet->setCellValue('G1', 'Verify Date');
        $sheet->setCellValue('H1', 'Verify Details');

        $rowcount = 2;

        foreach($export_query_result as $ex_data){
            $sheet->setCellValue('A' . $rowcount, $ex_data['vsn']);
            $sheet->setCellValue('B' . $rowcount, $ex_data['serials']);
            $sheet->setCellValue('C' . $rowcount, $ex_data['batch']);
            $sheet->setCellValue('D' . $rowcount, date("d-m-Y", strtotime($ex_data['mfg'])));
            $sheet->setCellValue('E' . $rowcount, $ex_data['company']);
            $sheet->setCellValue('F' . $rowcount, $ex_data['product']);
            $sheet->setCellValue('G' . $rowcount, $ex_data['date']);
            $sheet->setCellValue('H' . $rowcount, $ex_data['verify_details']);
            $rowcount++;
        }

        if($ext == 'xlsx')
        {
            $writer = new Xlsx($spreadsheet);
            $final_fileName = $fileName.'.xlsx';
        }
        elseif($ext == 'xls')
        {
            $writer = new Xls($spreadsheet);
            $final_fileName = $fileName.'.xls';
        }
        elseif($ext == 'csv')
        {
            $writer = new Csv($spreadsheet);
            $final_fileName = $fileName.'.csv';
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.urlencode($final_fileName).'"');
        $writer->save('php://output');
    }
    else{
        $_SESSION['err'] = "No Record Found To Export";
        header("Location: index.php");
    }
}

if(isset($_POST['import_file_btn']))
{
    $allowed_ext = ['xls','csv','xlsx'];

    $fileName = $_FILES['import_file']['name'];
    $checking = explode(".",$fileName);
    $file_ext = end($checking);

    if(in_array($file_ext,$allowed_ext))
    {
        
        $targetPath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
        $data = $spreadsheet -> getActiveSheet() -> toArray();

        if($data[0][0]=="VSN Code" and $data[0][1]=="Sr. No.")
        {

        

        for($row=1;$row<sizeof($data);$row++)
        {
            $vsn = $data[$row][0];
            $serials = $data[$row][1];
            $batch = $data[$row][2];
            $date = $data[$row][3];
            $company = $data[$row][4];
            $product = $data[$row][5];
            //Change Date Format from dd-mm-yyyy to yyyy-mm-dd
            $mfg = date("Y-m-d", strtotime($date));  
            // if($vsn=''){
            //     $_SESSION['err'] = "VSN Code field is empty";
            //     header("Location: index.php"); 
            // }else{

            $check_query = "SELECT * FROM verify WHERE vsn='$vsn'";
            $check_result = mysqli_query($con,$check_query);
    
            if(mysqli_num_rows($check_result)>0){
                //Already Exists
                $up_query = "UPDATE verify SET vsn='$vsn',serials='$serials',batch='$batch',mfg='$mfg',company='$company',product='$product' WHERE vsn ='$vsn' ";
                $up_result = mysqli_query($con,$up_query);
                $msg=1;
            }
            else{
                //New Data
                if($vsn){
                    $in_query = "INSERT INTO verify(vsn,serials,batch,mfg,company,product) VALUES('$vsn','$serials','$batch','$mfg','$company','$product')";
                    $in_result = mysqli_query($con,$in_query);
                    $msg=1;
                }
            }
        // }
        }

        if($msg)
        {
            $_SESSION['status'] = "File Imported Successfully";
            header("Location: index.php");
        }
        else
        {
            $_SESSION['err'] = "File Failed To Import";
            header("Location: index.php"); 
        }
    }
    else{
            $_SESSION['err'] = "Wrong Format Excel File Is Imported";
            header("Location: index.php"); 
        }
}
else
{
        $_SESSION['err'] = "Invalid File";
        header("Location: index.php");
        exit(0);
    }
}


?>