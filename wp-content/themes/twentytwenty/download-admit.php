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
	        					<h2>Download Admit Card</h2>
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
	            				    SELECT apply_s.student_roll,apply_s.class,apply_s.version,apply_s.session,apply_s.shift,apply_s.category,stu_profile.profile_image,apply_s.academic_group,apply_s.student_age,stu_profile.student_name,stu_profile.father_name,stu_profile.mother_name,stu_profile.birth_date,stu_profile.birth_id,stu_profile.religion_id,stu_profile.religion_id,stu_profile.student_sex,stu_profile.contact_no,stu_profile.height,stu_profile.present_address
	            				    FROM '.$wpdb->prefix.'student_application AS apply_s
	            				    INNER JOIN '. $wpdb->prefix.'student_profiles AS stu_profile
	            				    ON apply_s.student_id  =  stu_profile.id WHERE apply_s.parent_id='.$parent_id.' AND apply_s.status = 0');
	            			if (!empty($student_admit)) {
	                    	foreach ($student_admit as $key => $student_data) {
	                    	 ?>
    				    <div class="row admit_row_one">
	                    	<div class="col-md-1 my my-auto admit_column_content">
		                    	<div class="admit_card_area">
		            	        	<div class="admit_card" id="Index-<?= $student_data->student_roll ?>">
		            	        		<div class="row admit_logo_area">
		            	        			<div class="col-lg-2 col-md-2 col-sm-2 col-2">
		            	        				<div class="admit_logo">
		            	        					<img src="<?php echo get_template_directory_uri(); ?>/image/sagc-min.png">
		            	        				</div>
		            	        			</div>
		            	        			<div class="col-lg-10 col-md-10 col-sm-10 col-10 my-auto">
		            	        				<div class="admit_logo_text">
		            	        					<h3>SHAHEED BIR UTTAM LT. ANWAR GIRLS' COLLEGE</h3>
		            	        					<p>Dhaka Cantonment, Dhaka-1206</p>
		            	        					<p>EIIN :132143, College Code :1000, School Code :1262, Email: sagc1957@gmail.com</p>
		            	        				</div>
		            	        			</div>
		            	        		</div>
		            					<div class="row">
		            						<div class="col-9 pr-0">
		            							<table class="header_table">
		            								<tr class="headet_table_title">
		            									<td colspan="4">Online Admit Card-2022</td>
		            								</tr>
		            								<tr>
		            									<td>Index</td>
		            									<td colspan="3"><?= $student_data->student_roll ?></td>
		            								</tr>
		            								<tr>
		            									<td>Class</td>
		            									<td><?= $student_data->class ?></td>
		            									<td>Version</td>
		            									<td><?= $student_data->version ?></td>
		            								</tr>
		            								<tr>
		            									<td>Session</td>
		            									<td><?= $student_data->session ?></td>
		            									<td>Shift</td>
		            									<td><?= $student_data->shift ?></td>
		            								</tr>
		            								<tr>
		            									<td>Category</td>
		            									<td><?= $student_data->category ?></td>
		            									<td>Group</td>
		            									<td>
		            										<?php 
		            											if ($student_data->academic_group != null) {
		            												echo $student_data->academic_group;
		            											}else{
		            												echo "- -";
		            											}
		            										 ?>
		            									</td>
		            								</tr>
		            							</table>
		            						</div>
		            						<div class="col-3">
		            							<div class="admit_student_img">
		            								<img src="<?= $student_data->profile_image?>">
		            							</div>
		            						</div>
		            					</div>
		            					<div class="row">
		            						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
		            							<table class="table_body">
		            								<tr>
		            									<td>Name</td>
		            									<td colspan="3"><?= $student_data->student_name ?></td>
		            								</tr>
		            								<tr>
		            									<td>Father Name </td>
		            									<td colspan="3"><?= $student_data->father_name ?></td>
		            								</tr>
		            								<tr>
		            									<td>Mother Name </td>
		            									<td colspan="3"><?= $student_data->mother_name ?></td>
		            								</tr>
		            								<tr>
		            									<td>Date of Birth</td>
		            									<td><?= $student_data->birth_date ?></td>   
		            									<td>Age</td>
		            									<td><?= $student_data->student_age ?></td>
		            								</tr>
		            								<tr>	   
		            									<td>Religion</td>
		            									<td><?= $student_data->religion_id ?></td>
		            									<td>Gender</td>
		            									<td><?= $student_data->student_sex ?></td>
		            								</tr>
		            								<tr>
		            									<td>Mobile</td>
		            									<td><?= $student_data->contact_no ?></td>
		            									<td>Birth Registration Number (17 Digits)</td>
		            									<td>
		            										<?php $height = str_replace('\\',"",$student_data->height) ?>
		            										<?= $student_data->birth_id ?>
		            											
		            									</td>
		            								</tr>
		            								<tr>
		            									<td>Address </td>
		            									<td colspan="3"><?= $student_data->present_address ?></td>
		            								</tr>
		            							</table>
		            						</div>
		            					</div>	
		            					<div class="admission_rules">
		            						<?php
		            						if($student_data->class == 'nine'){ ?>
		            						<img src="<?php echo get_template_directory_uri(); ?>/image/notice_nine.png">
		            						<?php }else{ ?>
		            							<img src="<?php echo get_template_directory_uri(); ?>/image/notice_n.png">
		            						<?php } ?>
		            					</div>
		            					<div class="admit_footer">
		            						<h5>Tracking# <?= $student_data->student_roll ?> This is a computer generated document. Powered by https://classtune.com</h5>
		            					</div>
		            				</div>
		                    	</div>
	                    	</div>
	                    	<div class="col-md-3">
	                    		<div class="baner_img">
	                    			<img src="<?= $student_data->profile_image ?>">
	                    		</div>
	                    	</div>
    				    	<div class="col-md-4 my-auto text-center">
    				    		<h5 class="admint_stu_name"><?= $student_data->student_name ?></h5>
    				    	</div>
    				    	<div class="col-md-4 my-auto text-center">
    				    		<button class="btn btn-success" id="download" value="Index-<?= $student_data->student_roll ?>">Download</button>
    				    	</div>
    				    </div>
	            			<?php } }else{ ?>
	            				<div class="alert alert-danger mt-5 text-center ml-5 mr-5" role="alert">
								  Admit card is not available
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