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
       				<?php
       					$user_id = get_current_user_id();
				        $user_table = $wpdb->prefix.'users';
				        $user_info = $wpdb->prefix.'user_infos';
				        $user_data = $wpdb->get_row( "SELECT user.display_name,user.user_email,user_info.amount,user_info.address FROM $user_table AS user
				            INNER JOIN $user_info AS user_info  ON user.ID = user_info.user_id
				            WHERE user.ID = $user_id" );
				        print_r($user_data);
       				?>
       				<div class="row site_row_one">
			          <div class="col-lg-12 col-md-12 col-sm-12 col-12">
			              <div class="card text-center">
			                  <div class="card-header">
			                      <strong>Payment amount <strong>BDT <?= $user_data->amount ?> for <?= $user_data->display_name ?></strong></strong>
			                  </div>
			                <!--  <div class="card-header">
			                     bKash
			                  </div> -->
			                  <div class="card-body">
			                      <img src="<?= bloginfo('template_directory');?>/image/sslecommerz.png" alt="bkash" style="width:75%">
			                  </div>
			                  <div class="card-footer">
			                    <form method="post" action="<?= get_template_directory_uri() ?>/sslecommerse/checkout_hosted.php">

			                      <input type="text" hidden name="user_id" value="<?= $user_id ?>">
			                      <input type="text" hidden name="total_amount" value="<?= $user_data->amount ?>">
			                      <input type="text" hidden name="customer_name" value="<?= $user_data->display_name ?>">

			                      <input type="text" hidden name="customer_mobile" value="<?= $user_data->user_email ?>">
			                      <input type="text" hidden name="cus_add1" value="<?= $user_data->address ?>">

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