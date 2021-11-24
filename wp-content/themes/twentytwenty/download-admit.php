<?php 
	/*Template Name: download admit*/

	require_once 'student-dashboard/dashboard-header.php';
 ?>
 <style type="text/css">

/* @font-face {
    font-family : SolaimanLipi;
    src: url('<?php echo get_template_directory_uri(); ?>/inc/assets/SolaimanLipi/SolaimanLipi.ttf');
    src: local('SolaimanLipi'), url('<?php echo get_template_directory_uri(); ?>/inc/assets/SolaimanLipi/SolaimanLipi.ttf') format('truetype');
    font-style: normal;
}*/

/*@font-face {
    font-family: 'kal Purush';
    src: url('<?php echo get_template_directory_uri(); ?>/inc/assets/Kalpurush/Kalpurush.ttf');
    src: local('kal Purush'), url('<?php echo get_template_directory_uri(); ?>/inc/assets/Kalpurush/Kalpurush.ttf') format('truetype');
    font-style: normal;
}

 @font-face {
    font-family: 'Lohit Bengali';
    src: url('<?php echo get_template_directory_uri(); ?>/inc/assets/lohit_bengali/Lohit-Bengali.ttf');
    src: local('Lohit Bengali'), url('<?php echo get_template_directory_uri(); ?>/inc/assets/lohit_bengali/Lohit-Bengali.ttf') format('truetype');
    font-style: normal;
  }*/
.download_admit_all_content{
	position: relative;
}
.ad_down{
	position: absolute;
	top: 34%;
	left: calc(50% - 64px);
}
.ad_down{
	display: none;
}
.admit_row_one{
	border-bottom: 1px solid #ddd;
	padding-bottom: 11px;
	padding-top: 12px;
}
.baner_img img {
    width: 70px;
    height: 70px;
}
.admint_stu_name{
	font-family: 'Roboto', sans-serif;
	font-size: 18px;
	font-weight: 500;
	margin: 0;
}
.admit_card_area{
	width: 0px;
	height: 0px;
	overflow: scroll;
}
.admit_card{
	width: 670px;
}
.admit_logo_area{
	margin-bottom: 20px;
}
.admit_logo img{
	width: 100px;
}
.admit_logo_text h3{
	font-size: 20px;
	font-weight: bold;
	margin: 0;
}
.admit_logo_text p{
	font-family: 'Roboto', sans-serif;
	margin: 0;
	font-size: 14px;
	line-height: 20px;
	color: #000;
	font-weight: 400;
}
.header_table{
    width: 100%;
    border-collapse: collapse;
}
.header_table td{
  border-top: 1px solid #D8D8D8;
  border-left: 1px solid #D8D8D8;
}
.header_table tr:last-child{
	border-bottom: 1px solid #D8D8D8;
}
.header_table tr td:last-child{
	border-right: 1px solid #D8D8D8;
}
.headet_table_title td{
    text-align: center;
    font-size: 22px !important;
    font-weight: 400 !important;
    background: #F2F2F2 !important;
    padding: 4px 0px !important;
}
.header_table tr td{
    padding: 3px 0px 3px 10px;
    font-size: 14px;
    font-weight: 400;
    color: #312e2e;
    font-family: 'Roboto', sans-serif;
}
.table_body{
    margin-top: 20px;
    width: 100%;
    border-collapse: collapse;
}
.table_body tr td {
  border-bottom: 1px solid #D8D8D8;
  border-left: 1px solid #D8D8D8;
}
.table_body tr td{
    font-family: 'Roboto', sans-serif;
    padding: 5px 0px 5px 10px;
    font-size: 14px;
    font-weight: 400;
    color: #312e2e;
}
.table_body tr:first-child{
	border-top: 1px solid #D8D8D8;
}
.table_body tr td:last-child{
	border-right: 1px solid #D8D8D8;
}
.admit_card .admit_student_img img{
    width: 155px;
	height: 155px;
	margin-left: -9px;
}
/*.admission_rules h5{
	font-family: 'Lohit Bengali';
    font-size: 16px;
    margin-top: 20px;
    margin-bottom: 12px;
    color: #312e2e;
}
.admission_rules ul li{
	font-family: 'Lohit Bengali';
    list-style: bengali;
    font-size: 16px;
    line-height: 30px;
    color: #312e2e;
}*/
.admission_rules{
	margin-top: 12px;
	margin-left: -10px;
}

.admit_footer{
    border-top: 2px solid #D8D8D8;
    margin-top: 18px;
    padding-top: 18px;
}
.admit_footer h5{
    font-family: 'Roboto', sans-serif;
	font-size: 16px;
	font-weight: 600;
	color: #312e2e;
}
 </style>
<!--<link href="<?php bloginfo('template_directory'); ?>/inc/assets/css/kendo.common.min.css" rel="stylesheet" />
<link href="<?php bloginfo('template_directory'); ?>/inc/assets/css/kendo.default.min.css" rel="stylesheet" />-->
 <script src="<?php bloginfo('template_directory'); ?>/inc/assets/js/kendo.all.min.js"></script>
 
	<div class="container">
	    <div class="row site_row_one">
	        <div class="col-lg-1 col-md-1 col-sm-0 col-0"></div>

	        <div class="col-lg-10 col-md-10 col-sm-12 col-12">
	           <div class="applicant_profile">
	           		<div class="row profile_row_one">
	           			<div class="col-md-12 col-sm-12 col-12">
	           				<div class="pro_title">
	        					<h2>Download Document</h2>
	           				</div>
	           			</div>
	           		</div>
    				<div class="download_admit_all_content">
    				    <img class="ad_down" src="<?php echo get_template_directory_uri(); ?>/image/3.gif">
    				    	<?php 
	                    		global $wpdb;
    							if(isset($_GET['id']) == ""){
                                	$parent_id = get_current_user_id(); 
                                }else{
                                	$parent_id = $_GET['id']; ?>
                    				<style> .dashboard_header_c{display:none} </style>
                                <?php } 
	            				
	                    	 ?>
    				    	<?php 
	                    		global $wpdb;
	                    		/*$parent_id = get_current_user_id(); */
	            				$student_admit = $wpdb->get_results(' 
	            				    SELECT *
	            				    FROM '.$wpdb->prefix.'users AS apply_s
	            				    INNER JOIN '. $wpdb->prefix.'user_infos AS stu_profile
	            				    ON apply_s.ID =  stu_profile.user_id WHERE apply_s.status = 3');
	            			if (!empty($student_admit)) {
	                    	foreach ($student_admit as $key => $student_data) {
	                    	 ?>
    				    <div class="row admit_row_one">
	                    	<div class="col-md-1 my my-auto admit_column_content">
		                    	<div class="admit_card_area">
		            	        	<div class="admit_card" id="Index-<?= $student_data->ID ?>">
		            	        		<div class="row admit_logo_area">
		            	        			<div class="col-lg-2 col-md-2 col-sm-2 col-2">
		            	        				<div class="admit_logo">
		            	        					<img src="<?php echo get_template_directory_uri(); ?>/image/sagc-min.png">
		            	        				</div>
		            	        			</div>
		            	        			<!-- <div class="col-lg-10 col-md-10 col-sm-10 col-10 my-auto">
		            	        				<div class="admit_logo_text">
		            	        					<h3>Narayanganj ’90</h3>
		            	        				</div>
		            	        			</div> -->
		            	        		</div>
		            					<div class="row">
		            						<div class="col-9 pr-0">
		            							<table class="header_table">
		            								<tr class="headet_table_title">
		            									<td colspan="4">Narayanganj ’90</td>
		            								</tr>
		            								<tr>
		            									<td>Display Name</td>
		            									<td colspan="3"><?= $student_data->display_name ?></td>
		            								</tr>
		            								<tr>
		            									<td>Email</td>
		            									<td colspan="3"><?= $student_data->user_email ?></td>
		            								</tr>
		            								<tr>
		            									<td>Phone</td>
		            									<td colspan="3"><?= $student_data->phone ?></td>
		            								</tr>
		            								<tr>
		            									<td>School Name</td>
		            									<td colspan="3"><?= $student_data->school_name ?></td>
		            								</tr>
		            							</table>
		            						</div>
		            						<div class="col-3">
		            							<div class="admit_student_img">
		            								<img src="<?= $student_data->image?>">
		            							</div>
		            						</div>
		            					</div>
		            					<div class="row">
		            						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
		            							<table class="table_body">
		            								<tr>
		            									<td>Profession</td>
		            									<td colspan="3">
		            										<?php 
		            											if ($student_data->profession != null) {
		            												echo $student_data->profession;
		            											}else{
		            												echo "- -";
		            											}
		            										 ?>
		            									</td>
		            								</tr>
		            								<tr>
		            									<td>Address</td>
		            									<td colspan="3"><?= $student_data->address ?></td>
		            								</tr>
		            							</table>
		            						</div>
		            					</div>	
		            				</div>
		                    	</div>
	                    	</div>
    				    	<div class="col-md-4 my-auto text-center">
    				    		<h5 class="admint_stu_name"><?= $student_data->display_name ?></h5>
    				    	</div>
    				    	<div class="col-md-4 my-auto text-center">
    				    		<button class="btn btn-success" id="download" value="Index-<?= $student_data->ID ?>">Download</button>
    				    	</div>
    				    </div>
	            			<?php } }else{ ?>
	            				<div class="alert alert-danger mt-5 text-center ml-5 mr-5" role="alert">
								  Document is not available
								</div>
	            		<?php } ?>
    				</div>
	        	</div>
			</div>
			
			<div class="col-lg-1 col-md-1 col-sm-0 col-0"></div>
	    </div>
	</div>

<?php   require_once 'student-dashboard/dashboard-script/kendo-pdf-script.php'; ?>
<?php 
	require_once 'student-dashboard/dashboard-footer.php';
 ?>