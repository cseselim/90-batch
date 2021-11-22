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
                
                $row = $wpdb->get_row( "SELECT * FROM onad_payments WHERE transaction_id = '" . $tran_id . "'", ARRAY_A );

                /*print_r($sql);
                exit();*/
                /*$result = $conn_integration->query($sql);
                $row = $result->fetch_array(MYSQLI_ASSOC);*/

                /*$row = $wpdb->get_row( "SELECT * FROM $onad_order WHERE transaction_id = $tran_id", ARRAY_A );*/

                if ($row['payment_status'] == 'Pending' || $row['payment_status'] == 'Processing') {
                    $validated = $sslc->orderValidate($tran_id, $amount, $currency, $_POST);

                    if ($validated) {

                        $sql = $wpdb->update('onad_payments', array('payment_status'=> 'Processing','val_id'=> $_POST['val_id'],'card_type'=> $_POST['card_type'],'store_amount'=> $_POST['store_amount'],'bank_status'=> $_POST['status'],'tran_date'=> $_POST['tran_date'],'card_brand'=> $_POST['card_brand'],'all_info'=> $all_info,'paymentID'=> $tran_id,'trxID'=> $tran_id,'gateway'=> $_POST['card_brand']), array('transaction_id' => $tran_id ));

                        if ($sql) { ?>
                            <?php
                                global $wpdb; 
                                
                                //$result = $wpdb->update('onad_student_profiles', array('status' => '1'), array('id' => $row['user_id']));

                                /*===============application data insert===============*/
                                
                                $session_table = $wpdb->prefix.'sessions';
                                $applicent_table = $wpdb->prefix.'student_application';
                                $parent_id = $row['student_id']; 
                                $exists_id = $wpdb->get_row( "SELECT parent_id,student_id,institute_id,programe_id,academic_group,version_id,shift,category_id,rank,unit,session_id,student_age FROM $session_table WHERE parent_id = $parent_id", ARRAY_A );

                                $data = array(
                                    'parent_id' => $exists_id['parent_id'],
                                    'student_id' => $exists_id['student_id'],
                                    'institute_id' => $exists_id['institute_id'],
                                    'payment_status' => 1,
                                    'class' => $exists_id['programe_id'],
                                    'academic_group' => $exists_id['academic_group'],
                                    'version_id' => $exists_id['version_id'],
                                    'shift' => $exists_id['shift'],
                                    'category' => $exists_id['category_id'],
                                    'rank' => $exists_id['rank'],
                                    'unit' => $exists_id['unit'],
                                    'session' => $exists_id['session_id'],
                                    'transaction_id' => $tran_id,
                                    'student_age' => $exists_id['student_age'],
                                );

                                    
                                $version_id = $exists_id['version_id'];
                                $student_id = $exists_id['student_id'];
                                $shift = $exists_id['shift'];
                                $programe_id = $exists_id['programe_id'];

                                if ($programe_id == 'nursery' && $version_id == "1" && $shift == 'morning') {
                                $student_roll = $wpdb->get_row( "SELECT max(student_roll) as student_roll FROM $applicent_table WHERE class = '" .$programe_id. "' AND version_id = '" .$version_id. "' AND shift = '".$shift."'", ARRAY_A );
                                $new_student_roll = $student_roll['student_roll'] + 1;
                                
                                if (empty($student_roll['student_roll'])) {
                                  $data['student_roll'] = "1001";
                                  $data['version'] = "Bangla";
                                }else{
                                  $data['student_roll'] = $new_student_roll;
                                  $data['version'] = "Bangla";
                                }
                                
                                }elseif($programe_id == 'nursery' && $version_id == "1" && $shift == 'day'){
                                  $student_roll = $wpdb->get_row( "SELECT max(student_roll) as student_roll FROM $applicent_table WHERE class = '" .$programe_id. "' AND version_id = '" .$version_id. "' AND shift = '".$shift."'", ARRAY_A );
                                  $new_student_roll = $student_roll['student_roll'] + 1;
                                  
                                  if (empty($student_roll['student_roll'])) {
                                    $data['student_roll'] = "10001";
                                    $data['version'] = "Bangla";
                                  }else{
                                    $data['student_roll'] = $new_student_roll;
                                    $data['version'] = "Bangla";
                                  }
                              
                                }elseif($programe_id == 'nursery' && $version_id == "3" && $shift == 'morning'){
                                  $student_roll = $wpdb->get_row( "SELECT max(student_roll) as student_roll FROM $applicent_table WHERE class = '" .$programe_id. "' AND version_id = '" .$version_id. "' AND shift = '".$shift."'", ARRAY_A );
                                  $new_student_roll = $student_roll['student_roll'] + 1;
                                  
                                  if (empty($student_roll['student_roll'])) {
                                    $data['student_roll'] = "5001";
                                    $data['version'] = "English medium";
                                  }else{
                                    $data['student_roll'] = $new_student_roll;
                                    $data['version'] = "English medium";
                                  }
                                }elseif($programe_id == 'nine' && $version_id == "1" && $shift == 'morning'){
                                  $student_roll = $wpdb->get_row( "SELECT max(student_roll) as student_roll FROM $applicent_table WHERE class = '" .$programe_id. "'  AND version_id = '".$version_id."'", ARRAY_A );
                                  $new_student_roll = $student_roll['student_roll'] + 1;
                                  
                                  if (empty($student_roll['student_roll'])) {
                                    $data['student_roll'] = "15001";
                                    $data['version'] = "Bangla";
                                  }else{
                                    $data['student_roll'] = $new_student_roll;
                                    $data['version'] = "Bangla";
                                  }
                                }elseif($programe_id == 'nine' && $version_id == "2" && $shift == 'morning'){
                                  $student_roll = $wpdb->get_row( "SELECT max(student_roll) as student_roll FROM $applicent_table WHERE class = '" .$programe_id. "' AND version_id = '".$version_id."'", ARRAY_A );
                                  $new_student_roll = $student_roll['student_roll'] + 1;
                                  
                                  if (empty($student_roll['student_roll'])) {
                                    $data['student_roll'] = "20001";
                                    $data['version'] = "English";
                                  }else{
                                    $data['student_roll'] = $new_student_roll;
                                    $data['version'] = "English";
                                  }
                                }else{
                                
                //                 $student_roll = $wpdb->get_row( "SELECT max(student_roll) as student_roll FROM $applicent_table WHERE class = '" .$programe_id. "' ", ARRAY_A );
                //                $new_student_roll = $student_roll['student_roll'] + 1;
                //
                //                if (empty($student_roll['student_roll'])) {
                //                  $data['student_roll'] = "40001";
                //                  $data['version'] = "Bangla";
                //                }else{
                //                  $data['student_roll'] = $new_student_roll;
                //                  $data['version'] = "Bangla";
                //                }
                                }

                                $bkashformat = array('%d','%d','%d','%d','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');
                                $result = $wpdb->insert($applicent_table,$data,$bkashformat);

                                if ($result) {
                                    //send_sms_selected_dstudent($row['phone']);
                                    $wpdb->delete( $session_table, array( 'parent_id' => $parent_id), array('%d'));
                                    header("Location: https://admission.classtune.com/sagc/application-done");
                                }else{
                                    $_SESSION["p_msg"] = "Something worng";
                                    header("Location: https://admission.classtune.com/sagc/transaction");
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