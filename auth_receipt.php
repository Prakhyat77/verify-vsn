<?php
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: admin/index.php" );
    }
    include 'dbcon/conn.php';
    $vsn=$_SESSION['vsn'];
    $verify_query = "SELECT * FROM verify WHERE vsn='$vsn'";
    $verify_data= mysqli_query($con,$verify_query);
    $verify_fetch_data = mysqli_fetch_array($verify_data);
    
    $company=$verify_fetch_data[5];
    $product=$verify_fetch_data[6];
    $batch=$verify_fetch_data[3];
    $mfg=$verify_fetch_data[4];
    $vsn=$verify_fetch_data[1];


        $html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        
        <head></head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        
        <style type="text/css">
            table,
            td {
                color: #000000;
            }
            
            a {
                color: #01499d;
                text-decoration: underline;
            }
            
            @media (max-width: 480px) {
                #u_content_image_2 .v-src-width {
                    width: 100% !important;
                }
                #u_content_image_2 .v-src-max-width {
                    max-width: 100% !important;
                }
                #u_content_heading_1 .v-container-padding-padding {
                    padding: 20px !important;
                }
                #u_content_heading_1 .v-font-size {
                    font-size: 23px !important;
                }
                #u_content_text_2 .v-container-padding-padding {
                    padding: 40px 30px 50px 15px !important;
                }
                #u_content_image_3 .v-container-padding-padding {
                    padding: 30px 0px 25px !important;
                }
                #u_content_image_3 .v-src-width {
                    width: auto !important;
                }
                #u_content_image_3 .v-src-max-width {
                    max-width: 38% !important;
                }
                #u_content_heading_2 .v-container-padding-padding {
                    padding: 10px 10px 0px 0px !important;
                }
                #u_content_heading_2 .v-font-size {
                    font-size: 25px !important;
                }
                #u_content_heading_2 .v-text-align {
                    text-align: center !important;
                }
                #u_content_text_3 .v-text-align {
                    text-align: center !important;
                }
                #u_content_text_5 .v-text-align {
                    text-align: center !important;
                }
            }
            
            @media only screen and (min-width: 620px) {
                .u-row {
                    width: 600px !important;
                }
                .u-row .u-col {
                    vertical-align: top;
                }
                .u-row .u-col-37p16 {
                    width: 222.95999999999995px !important;
                }
                .u-row .u-col-62p84 {
                    width: 377.04px !important;
                }
                .u-row .u-col-100 {
                    width: 600px !important;
                }
            }
            
            @media (max-width: 620px) {
                .u-row-container {
                    max-width: 100% !important;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                }
                .u-row .u-col {
                    min-width: 320px !important;
                    max-width: 100% !important;
                    display: block !important;
                }
                .u-row {
                    width: calc(100% - 40px) !important;
                }
                .u-col {
                    width: 100% !important;
                }
                .u-col>div {
                    margin: 0 auto;
                }
            }
            
            body {
                margin: 0;
                padding: 0;
            }
            
            table,
            tr,
            td {
                vertical-align: top;
                border-collapse: collapse;
            }
            
            p {
                margin: 0;
            }
            
            .ie-container table,
            .mso-container table {
                table-layout: fixed;
            }
            
            * {
                line-height: inherit;
            }
            
            a[x-apple-data-detectors="true"] {
                color: inherit !important;
                text-decoration: none !important;
            }
        </style>
        
        
        
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap" rel="stylesheet" type="text/css">
        
        
        </head>
        
        <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #e7e7e7;color: #000000">
        
            <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #e7e7e7;width:100%" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr style="vertical-align: top">
                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
        
        
        
                            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #1a2e35;">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
        
                                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                            <div style="width: 100% !important;">
                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
        
                                                    <table style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <div class="v-text-align" style="color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word;">
                                                                        <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 32px; line-height: 44.8px;"><strong><span style="font-family: arial, helvetica, sans-serif; line-height: 44.8px; font-size: 32px;">Verify VSN</span></strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
        
        
        
                            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
        
                                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                            <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
        
        
                                                    <table style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:0px 0px 10px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 4px solid #037bfe;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                        <tbody>
                                                                            <tr style="vertical-align: top">
                                                                                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                                    <span>&#160;</span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                    <table id="u_content_image_2" style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:25px 0px 30px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                        <tr>
                                                                            <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
        
                                                                                <img align="center" border="0" src="https://cdn.templates.unlayer.com/assets/1636780637744-sdsds.png" alt="Hero Image" title="Hero Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 88%;max-width: 528px;"
                                                                                    width="528" class="v-src-width v-src-max-width" />
        
                                                                            </td>
                                                                        </tr>
                                                                    </table>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
        
        
        
                            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #01499d;">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
        
                                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                            <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                <!--[if (!mso)&(!IE)]><!-->
                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                    <!--<![endif]-->
        
                                                    <table id="u_content_heading_1" style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:20px 25px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <h1 class="v-text-align v-font-size" style="margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: "Raleway",sans-serif; font-size: 27px;">
                                                                        Your have a genuine product
                                                                    </h1>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
        
        
        
                            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f5f5f5;">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
        
                                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                            <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
        
                                                <div style="padding: 0px;border-top: 1px solid #CCC;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 1px solid #CCC;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
        
        
                                                    <table id="u_content_text_2" style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:40px 50px 50px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <div class="v-text-align" style="color: #252525; line-height: 170%; text-align: left; word-wrap: break-word;">
                                                                        <p style="font-size: 14px; line-height: 170%; text-align: left;"><span style="font-size: 16px; line-height: 27.2px;"><strong>Company Name : <span style="font-size: 24px; line-height: 40.8px;">'.$company.'</span></strong>
                                                                            </span>
                                                                        </p>
                                                                        <p style="font-size: 14px; line-height: 170%; text-align: left;"><span style="font-size: 16px; line-height: 27.2px;"><strong>Product Name :&nbsp; <span style="font-size: 24px; line-height: 40.8px;">&nbsp;'.$product.'</span></strong>
                                                                            </span>
                                                                        </p>
                                                                        <p style="font-size: 14px; line-height: 170%; text-align: left;"><strong style="font-size: 16px;">Batch No. :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-size: 24px; line-height: 40.8px;"> '.$batch.'</span></strong></p>
                                                                        <p style="font-size: 14px; line-height: 170%; text-align: left;"><span style="font-size: 16px; line-height: 27.2px;"><strong>MFG Date :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="font-size: 24px; line-height: 40.8px;">'.$mfg.'</span></strong>
                                                                            </span>
                                                                        </p>
                                                                        <p style="font-size: 14px; line-height: 170%; text-align: left;"><span style="font-size: 16px; line-height: 27.2px;"><strong>VSN Code :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-size: 24px; line-height: 40.8px;">'.$vsn.'</span></strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
        
        
        
                            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
        
                                        <div class="u-col u-col-37p16" style="max-width: 320px;min-width: 223px;display: table-cell;vertical-align: top;">
                                            <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
        
                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
        
                                                    <table id="u_content_image_3" style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:45px 0px 25px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                        <tr>
                                                                            <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
        
                                                                                <img align="center" border="0" src="https://cdn.templates.unlayer.com/assets/1636782090056-preview.png" alt="Icon" title="Icon" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 48%;max-width: 107.04px;"
                                                                                    width="107.04" class="v-src-width v-src-max-width" />
        
                                                                            </td>
                                                                        </tr>
                                                                    </table>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="u-col u-col-62p84" style="max-width: 320px;min-width: 377px;display: table-cell;vertical-align: top;">
                                            <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
        
                                                    <table id="u_content_heading_2" style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:40px 10px 0px 0px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <h1 class="v-text-align v-font-size" style="margin: 0px; color: #1b2e35; line-height: 140%; text-align: left; word-wrap: break-word; font-weight: normal; font-family: "Raleway",sans-serif; font-size: 24px;">
                                                                        <strong>Feel Free To Contact Us.</strong>
                                                                    </h1>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                    <table id="u_content_text_3" style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 9px 1px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <div class="v-text-align" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                                                        <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 20px; line-height: 28px;"><a rel="noopener" href="mailto:jha.prakhyat@gmail.com?subject=&body=Got%20Reference%20from%20your%20" target="_blank">jha.prakhyat@gmail.com</a></span></p>
                                                                    </div>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                    <table id="u_content_text_5" style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 50px 0px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <div class="v-text-align" style="color: #1b2e35; line-height: 140%; text-align: left; word-wrap: break-word;">
                                                                        <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 20px; line-height: 28px;">7024093220</span></p>
                                                                    </div>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
        
        
        
                            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
        
                                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                            <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
        
                                                    <table style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                        <tr>
                                                                            <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
        
                                                                                <img align="center" border="0" src="https://cdn.templates.unlayer.com/assets/1636783607482-dfdfdf.png" alt="curve border" title="curve border" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 600px;"
                                                                                    width="600" class="v-src-width v-src-max-width" />
        
                                                                            </td>
                                                                        </tr>
                                                                    </table>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
        
        
                            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #1a2e35;">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
        
                                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                            <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
        
                                                    <table style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:24px 10px 20px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <div align="center">
                                                                        <div style="display: table; max-width:89px;">
        
                                                                            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 13px">
                                                                                <tbody>
                                                                                    <tr style="vertical-align: top">
                                                                                        <td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                                                            <a href="https://www.facebook.com/proteinplanet/" title="Facebook" target="_blank">
                                                                                                <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
        
                                                                            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 0px">
                                                                                <tbody>
                                                                                    <tr style="vertical-align: top">
                                                                                        <td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                                                            <a href="https://www.instagram.com/protein_planet/" title="Instagram" target="_blank">
                                                                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1024px-Instagram_icon.png" alt="Instagram" title="Instagram" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
        
                                                                        </div>
                                                                    </div>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                    <table style="font-family:"Rubik",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 44px 35px;font-family:"Rubik",sans-serif;" align="left">
        
                                                                    <div class="v-text-align" style="color: #ecf0f1; line-height: 180%; text-align: center; word-wrap: break-word;">
                                                                        <p style="font-size: 14px; line-height: 180%;">@ Vuiron LLP. All rights are reserved. You received this email because you have authenticate a product from our app. If you did not do so, please ignore.</p>
                                                                    </div>
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
        
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
        
        </html>';
    unset($_SESSION['vsn']);
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $file=time().'.pdf' ;
    $mpdf->output($file,'D');   

?>