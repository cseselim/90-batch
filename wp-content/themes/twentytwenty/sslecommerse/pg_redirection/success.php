<?php
######
# THIS FILE IS ONLY AN EXAMPLE. PLEASE MODIFY AS REQUIRED.
# Contributors: 
#       Md. Rakibul Islam <rakibul.islam@sslwireless.com>
#       Prabal Mallick <prabal.mallick@sslwireless.com>
######

error_reporting(0);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>

<head>
    <meta name="author" content="SSLCommerz">
    <title>Successful Transaction - SSLCommerz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-8 offset-md-2">

                <?php
                require_once(__DIR__ . "/../lib/SslCommerzNotification.php");
                /*include_once(__DIR__ . "/../db_connection.php");*/
                include_once(__DIR__ . "/../OrderTransaction.php");
                include "../../../../../wp-blog-header.php";

                use SslCommerz\SslCommerzNotification;

                $sslc = new SslCommerzNotification();
                $tran_id = $_POST['tran_id'];
                $amount =  $_POST['amount'];
                $currency =  $_POST['currency'];

                $all_info =  json_encode($_POST);

                $ot = new OrderTransaction();
                /*$sql = $ot->getRecordQuery($tran_id);*/
                
                $row = $wpdb->get_row( "SELECT * FROM ng_payments WHERE transaction_id = '" . $tran_id . "'", ARRAY_A );

                // print_r($row);
                // exit();
                /*$result = $conn_integration->query($sql);
                $row = $result->fetch_array(MYSQLI_ASSOC);*/

                /*$row = $wpdb->get_row( "SELECT * FROM $onad_order WHERE transaction_id = $tran_id", ARRAY_A );*/

                if ($row['payment_status'] == 'Pending' || $row['payment_status'] == 'Processing') {
                    $validated = $sslc->orderValidate($tran_id, $amount, $currency, $_POST);

                    if ($validated) {

                        $sql = $wpdb->update('ng_payments', array('payment_status'=> 'done','val_id'=> $_POST['val_id'],'card_type'=> $_POST['card_type'],'store_amount'=> $_POST['store_amount'],'bank_status'=> $_POST['status'],'tran_date'=> $_POST['tran_date'],'card_brand'=> $_POST['card_brand'],'all_info'=> $all_info,'paymentID'=> $tran_id,'trxID'=> $tran_id,'gateway'=> $_POST['card_brand']), array('transaction_id' => $tran_id ));

                        if ($sql) { ?>
                            <?php
                                global $wpdb; 
                                
                                $result = $wpdb->update('ng_users', array('status' => '2'), array('ID' => $row['student_id']));

                                if ($result) {
                                    //send_sms_selected_dstudent($row['phone']);
                                    header("Location: http://localhost/abc/application-done");
                                }else{
                                    $_SESSION["p_msg"] = "Something worng";
                                    header("Location: http://localhost/abc/payment");
                                }
                             ?>
                            <!-- <h2 class="text-center text-success">Congratulations! Your Transaction is Successful.</h2>
                            <br>
                            <table border="1" class="table table-striped">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th colspan="2">Payment Details</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td class="text-right">Transaction ID</td>
                                    <td><?= $_POST['tran_id'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Transaction Time</td>
                                    <td><?= $_POST['tran_date'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Payment Method</td>
                                    <td><?= $_POST['card_issuer'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Bank Transaction ID</td>
                                    <td><?= $_POST['bank_tran_id'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Amount</td>
                                    <td><?= $_POST['amount'] . ' ' . $_POST['currency'] ?></td>
                                </tr>
                            </table> -->

                        <?php

                        } else { // update query returned error

                            echo '<h2 class="text-center text-danger">Error updating record: </h2>';

                        } // update query successful or not 

                    } else { // $validated is false

                        $conn_integration->query($ot->updateTransactionQuery($tran_id, 'Failed'));
                        echo '<h2 class="text-center text-danger">Payment was not valid. Please contact with the merchant.</h2>';

                    } // check if validated or not

                } else { // status is something else

                    echo '<h2 class="text-center text-danger">Invalid Information.</h2>';

                } // status is 'Pending' or already 'Processing'
                ?>

                <?php 
                function send_sms_selected_dstudent($sms_number){
    
                // $text = Urlencode("অগ্রনী স্কুল এন্ড কলেজে আপনার ভর্তি আবেদন ফি ২২০ টাকা জমা হয়েছে |");
                // $url = "https://classtune.powersms.net.bd/httpapi/sendsms?userId=spsc&password=spsc@4321&smsText=" .$text. "&commaSeperatedReceiverNumbers=" .$sms_number. "";

                //         $crl = curl_init();
                //         curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
                //         curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
                //         curl_setopt($crl, CURLOPT_URL, $url);
                //         curl_setopt($crl, CURLOPT_HEADER, 0);
                //         curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
                //         $response = curl_exec($crl);
                //         curl_close($crl);
                }
                 ?>
            </div>
        </div>
    </div>
</body>