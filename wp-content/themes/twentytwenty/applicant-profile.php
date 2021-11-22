<?php 
	/*Template Name: applicant-profiles*/
	require_once 'student-dashboard/dashboard-header.php';
 ?>
<!-- <script id = "myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script> -->
<!-- <script id = "myScript" src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script> -->

	<div class="container">
	    <div class="row site_row_one">
	        <div class="col-lg-1 col-md-1 col-sm-0 col-0"></div>
	        <div class="col-lg-10 col-md-10 col-sm-12 col-12">
            <div class="row profile_row_one">
	           	<div class="col-md-12 col-sm-12 col-12">
	           		  <div class="pro_title">
	        					
	           		  </div>
	           	 </div>
	         </div>
	           <div class="applicant_profile">
	        	</div>

         			<!-- <div class="row site_row_one">
            			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
              				<div class="card text-center">
                  				<div class="card-header">
                      				<strong>Payment amount of <strong>BDT</strong></strong>
                  				</div>
                 				 <div class="card-header">
                     				 bKash
                  				</div>
                  				<div class="card-body">
                      				<img src="<?= bloginfo('template_directory');?>/image/bkash.png" alt="bkash" style="width:75%">
                  				</div>
                  				<div class="card-footer">
                      				<button id="bKash_button" class="btn btn-success w-100">Pay with bKash</button>
                 				 </div>
             				</div> 
            			</div>
       				</div> -->


       				<div class="row site_row_one">
			          <div class="col-lg-12 col-md-12 col-sm-12 col-12">
			              <div class="card text-center">
			                  <div class="card-header">
			                      <strong>Payment amount <strong>BDT <?= $student_data['amount'] ?> for <?= $student_data['student_name'] ?></strong></strong>
			                  </div>
			                <!--  <div class="card-header">
			                     bKash
			                  </div> -->
			                  <div class="card-body">
			                      <img src="<?= bloginfo('template_directory');?>/image/sslecommerz.png" alt="bkash" style="width:75%">
			                  </div>
			                  <div class="card-footer">
			                    <form method="post" action="<?= get_template_directory_uri() ?>/sslecommerse/checkout_hosted.php">

			                      <input type="text" hidden name="user_id" value="7">
			                      <input type="text" hidden name="total_amount" value="30">
			                      <input type="text" hidden name="customer_name" value="def">
			                        <input type="email" hidden name="customer_email" value="test@gmail.com">
			                      <input type="text" hidden name="customer_mobile" value="01301085778">
			                      <input type="text" hidden name="cus_add1" value="dddd">
			                      <!-- <input type="text" hidden name="user_id" value="50">
			                      <input type="text" hidden name="total_amount" value="10">
			                      <input type="text" hidden name="customer_name" value="selim">
			                      <?php if ($student_id['email_address']) { ?>
			                        <input type="email" hidden name="customer_email" value="abc@gmail.com">
			                      <?php } ?>
			                      <input type="text" hidden name="customer_mobile" value="01301085779">
			                      <input type="text" hidden name="cus_add1" value="abc ddd"> -->
			                    <button class="btn btn-success w-100" style="background-color: #00AEEE;font-size: 23px;padding: 18px 0px;">Pay Now</button> 
			                    </form>
			                 </div>
			            </div> 
			          </div>
			      </div>
	        </div>
            
            <div class="col-lg-1 col-md-1 col-sm-0 col-0"></div>
	    </div>
	</div>
	
	
	<?php 
		if (isset($_GET['del'])) {
			$id = trim($_GET['del']);
			global $wpdb;
			$user_id = (int) wp_get_current_user()->ID;
			$student_table = $wpdb->prefix.'student_profiles'; 
			$wpdb->delete( $student_table, array( 'id' => $id, 'user_id' => $user_id), array('%d','%d'));
			echo "<script>location.href = '" . home_url() . "/applicant-profile/';</script>";
		}
	 ?>
<?php 
	// require_once 'student-dashboard/dashboard-footer.php';
 ?>