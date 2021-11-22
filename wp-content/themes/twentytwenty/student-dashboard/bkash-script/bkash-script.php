<script type="text/javascript">
 
    var accessToken='';
    $(document).ready(function(){
        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>?action=get_token",
            type: 'POST',
            contentType: 'application/json',
            success: function (data) {
                /*console.log('got data from token  ..');*/
                /*console.log(JSON.stringify(data));
                
                accessToken=JSON.stringify(data);*/
            },
            error: function(){
                console.log('error');
                        
            }
        });

        var paymentConfig={
            createCheckoutURL:"<?php echo admin_url('admin-ajax.php'); ?>?action=create",
            executeCheckoutURL:"<?php echo admin_url('admin-ajax.php'); ?>?action=execute",
        };

        
        var paymentRequest;
        paymentRequest = { amount:'<?= $student_id['amount'] ?>',intent:'sale'};
        /*console.log(JSON.stringify(paymentRequest));*/

        bKash.init({
            paymentMode: 'checkout',
            paymentRequest: paymentRequest,
            createRequest: function(request){
                /*console.log('=> createRequest (request) :: ');
                console.log(request);*/
                
                $.ajax({
                    url: paymentConfig.createCheckoutURL+"&amount="+paymentRequest.amount,
                    type:'GET',
                    contentType: 'application/json',
                    success: function(data) {
                        /*console.log('got data from create  ..');
                        console.log('data ::=>');
                        console.log(JSON.stringify(data));*/
                        
                        var obj = JSON.parse(data);
                        
                        if(data && obj.paymentID != null){
                            paymentID = obj.paymentID;
                            bKash.create().onSuccess(obj);
                        }
                        else {
                            console.log('error');
                            bKash.create().onError();
                        }
                    },
                    error: function(){
                        console.log('error');
                        bKash.create().onError();
                    }
                });
            },
            
            executeRequestOnAuthorization: function(){
                /*console.log('=> executeRequestOnAuthorization');*/
                $.ajax({
                    url: paymentConfig.executeCheckoutURL+"&paymentID="+paymentID,
                    type: 'GET',
                    contentType:'application/json',
                    success: function(data){
                        /*console.log('got data from execute  ..');
                        console.log('data ::=>');
                        console.log(JSON.stringify(data));*/
                        
                        data = JSON.parse(data);
                        if(data && data.paymentID != null){
                            var amount  = data.amount;
                            var payment_id  = data.paymentID;
                            var merchantInvoiceNumber  = data.merchantInvoiceNumber;
                            var trxID  = data.trxID;
                            
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo admin_url('admin-ajax.php'); ?>?action=student_apply',
                                data: { amount: amount,payment_id: payment_id,invoice_number: merchantInvoiceNumber,trxID: trxID},
                                success: function (data) {
                                   window.location.href = '<?= home_url() ?>/?page_id=52';
                                },
                                error: function(){
                                    alert("Some is wrong. Please try again.")
                                    window.location.href = '<?= home_url() ?>?page_id=50';
                                            
                                }
                            });
                        }
                        else {
                            bKash.execute().onError();
                            console.log("error1");
                            alert("Some is wrong. Please try again.")
                            window.location.href = '<?= home_url() ?>?page_id=50';
                        }
                    },
                    error: function(){
                        bKash.execute().onError();
                        console.log("error2");
                    }
                });
            },
            onClose: function () {
                window.location.href = '<?= home_url() ?>/applicant-profile/';
            }
        });
        
    /*console.log("Right after init ");*/
    function callReconfigure(val){
        bKash.reconfigure(val);
    }

    function clickPayButton(){
        $("#bKash_button").trigger('click');
    }
        
    });

</script>