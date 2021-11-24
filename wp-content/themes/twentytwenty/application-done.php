<?php 
	/*Template Name: application-done*/
	require_once 'student-dashboard/dashboard-header.php';
 ?>
 <style>
    .alert-success{
 		border:none;
 	}
 	.payment_details h2 {
        font-size: 20px;
        font-weight: 700;
    }
 </style>
	<div class="container">
	    <div class="row site_row_one">
	        
	        <div class="col-lg-1 col-md-1 col-sm-0 col-0"></div>
             <div class="col-lg-10 col-md-10 col-sm-12 col-12">
	           <div class="application-done">
	               <?php 
	                    $ng_payment = $wpdb->prefix.'payments';
                        $user_id = get_current_user_id();
                        $payment_data = $wpdb->get_row( "SELECT amount,paymentID FROM $ng_payment
                            WHERE student_id = $user_id order by id DESC" );
	               ?>
               		<h2 class="alert alert-success">Congratulations!</h2>
	              <h2 class="alert alert-success">Payment successful</h2>
	              
	               <div class="payment_details">
	        		<div class="row alert-success mr-0 ml-0">
	        			<div class="col-md-12">
	        				<h2 class="alert alert-success">Payment Details</h2>
	        			</div>
	        			<!-- <div class="col-md-12">
	        				<p><strong>Amount: </strong> <?=  $payment_data->amount ?> TK</p>
	        			</div> -->
	        			<div class="col-md-12">
	        				<p><strong>Payment Id: </strong> <?=  $payment_data->paymentID ?></p>
	        			</div>
	        		</div>

	        	  </div>
	        		<p class="alert alert-success">Document ডাউনলোড করতে <a style="font-weight: bold;" href="<?= home_url() ?>/download-admit">এখানে ক্লিক</a> করুন</p>
	        	</div>
	        </div>
            <div class="col-lg-1 col-md-1 col-sm-0 col-0"></div>
	    </div>
	</div>	
<?php 
	require_once 'student-dashboard/dashboard-footer.php';
 ?>