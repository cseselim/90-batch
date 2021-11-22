<?php

class OrderTransaction {

    function getRecordQuery($tran_id)
    {
        $sql = "select * from onad_orders WHERE transaction_id='" . $tran_id . "'";
        /*$sql = $wpdb->get_row( "SELECT * FROM onad_orders WHERE transaction_id = $tran_id", ARRAY_A );*/
        return $sql;
    }

    /*public function saveTransactionQuery($post_data)
    {
        $name = $post_data['cus_name'];
        $email = $post_data['cus_email'];
        $phone = $post_data['cus_phone'];
        $transaction_amount = $post_data['total_amount'];
        $address = $post_data['cus_add1'];
        $transaction_id = $post_data['tran_id'];
        $currency = $post_data['currency'];

        $sql = "INSERT INTO orders (name, email, phone, amount, address, status, transaction_id,currency)
                                    VALUES ('$name', '$email', '$phone','$transaction_amount','$address','Pending', '$transaction_id','$currency')";

        return $sql;
    }*/

    function saveTransactionQuery($post_data)
    {
        global $wpdb;
        $onad_order = $wpdb->prefix.'payments';
        
        $payData = array(
            'student_id' => $post_data['user_id'],
            'name' => $post_data['cus_name'],
            'email' => $post_data['cus_email'],
            'phone' => $post_data['cus_phone'],
            'amount' => $post_data['total_amount'],
            'address' => $post_data['cus_add1'],
            'payment_status' => 'Pending',
            'transaction_id' => $post_data['tran_id'],
            'currency' => $post_data['currency'],
        );
        
        $format = array('%s','%s','%s','%s','%s','%s','%s');
        $sql = $wpdb->insert($onad_order,$payData,$format);
        return $sql;
    }

    function updateTransactionQuery($tran_id, $type = 'Success')
    {
        global $wpdb;
        $onad_order = $wpdb->prefix.'payments';
        $sql = "UPDATE orders SET status='$type' WHERE transaction_id='$tran_id'";

        return $sql;
    }

}

