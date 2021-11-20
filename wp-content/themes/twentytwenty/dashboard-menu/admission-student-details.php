<?php 
    if (isset($_GET['id'])) {
        $student_id =  $_GET['id'];
    }
 ?>
<?php
    global $wpdb;
    $student_apply_table = $wpdb->prefix.'student_application';
    $student_profile_table = $wpdb->prefix.'student_profiles';
    $student_details = $wpdb->get_row('
    SELECT stu_profile.user_id,stu_profile.profile_image,stu_profile.index_no,stu_profile.student_name,stu_profile.father_name,stu_profile.father_occupation,stu_profile.mother_name,stu_profile.mother_occupation,stu_profile.present_address,stu_profile.parmanent_address,stu_profile.contact_no,stu_profile.class,stu_profile.shift,stu_profile.last_school_name,stu_profile.birth_date,stu_profile.student_sex,stu_profile.religion_id,stu_profile.approved_status
    FROM '. $wpdb->prefix.'student_profiles AS stu_profile
    WHERE stu_profile.user_id = '.$student_id.'');
 ?>

<div class="container-fluid student_details">
    <div class="row mb-5">
        <div class="col-md-1 col-sm-1 col-12"></div>
        <div class="col-md-3 col-sm-3 col-12 text-right">
            <div class="student_img">
                <img src="<?= $student_details->profile_image ?>" style="width: 200px;height: 200px">
            </div>
        </div>
        <div class="col-md-7 col-sm-7 col-12 my-auto">
            <h1 style="font-size: 40px;color:">Name: <?= $student_details->student_name ?></h1>
            <p style="font-size: 45px;" class="ad_class">Class: <strong style="color: #007bff;"><?= $student_details->class ?></strong></p>
            <p style="font-size: 45px;" class="ad_class">Index No: <strong style="color: #007bff;"><?= $student_details->index_no ?></strong></p>
            <p style="font-size: 40px;" class="ad_class">Father Name: <strong style="color: #007bff;"><?= $student_details->father_name ?></strong></p>
            <p style="font-size: 40px;" class="ad_class">Mother Name: <strong style="color: #007bff;"><?= $student_details->mother_name ?></strong></p>
        </div>
        <div class="col-md-1 col-sm-1 col-12"></div>
    </div>
    <!-- <div class="row">
        <div class="col-md-1 col-sm-1 col-12"></div>
        <div class="col-md-3 col-sm-3 col-12">
            <div class="student_content">
                <p class="ad_label">Class</p>
                <p class="ad_content"><?= $student_details->class ?></p>
            </div>
            <div class="student_content">
                <p class="ad_label">Father name</p>
                <p><?= $student_details->father_name ?></p>
            </div>
            <div class="student_content">
                <p class="ad_label">Father occupation</p>
                <p><?= $student_details->father_occupation ?></p>
            </div>
            <div class="student_content">
                <p class="ad_label">Mother name</p>
                <p><?= $student_details->mother_name ?></p>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-12">
            <div class="student_content">
                <p class="ad_label">Mother ocupation</p>
                <p><?= $student_details->mother_occupation ?></p>
            </div>
            <div class="student_content">
                <p class="ad_label">Present address</p>
                <p><?= $student_details->present_address ?></p>
            </div>
            <div class="student_content">
                <p class="ad_label">Parmanent Address</p>
                <p><?= $student_details->parmanent_address ?></p>
            </div>
            <div class="student_content">
                <p class="ad_label">Contact no</p>
                <p><?= $student_details->contact_no ?></p>
            </div> -->
        	<!-- <div class="student_content">
            	<p class="ad_label">Transcript Image</p>
            	<a download="transcript_image" href="<?= $student_details->transcript_image ?>" title="ImageName">
               	 Download
            	</a>
            </div> -->
        <!-- </div>
        <div class="col-md-3 col-sm-3 col-12">
            <div class="student_content">
                <p class="ad_label">Date of birth</p>
                <p><?= $student_details->birth_date ?></p>
            </div>
            <div class="student_content">
                <p class="ad_label">Student gender</p>
                <p><?= $student_details->student_sex ?></p>
            </div>
            <div class="student_content">
                <p class="ad_label">Religion</p>
                <p><?= $student_details->religion_id ?></p>
            </div>
            <div class="student_content">
                <p class="ad_label">School name</p>
                <p><?= $student_details->last_school_name ?></p>
            </div>
        </div>
        <div class="col-md-1 col-sm-1 col-12"></div>
    </div> -->
    <div class="row student_details_button">
        <div class="col-md-12 col-sm-12 col-12 text-center">
            <?php 
                if ($student_details->approved_status == '0') { ?>
                    <button style="border-radius: 5px;font-size: 20px;font-weight: 700;color: #fff;cursor: pointer;" class="approves" id="<?= $student_details->user_id ?>">Approve</button>
               <?php } ?>
        </div>
        <div class="col-md-12 col-sm-12 col-12 text-center">
            <a href="<?php echo admin_url('admin.php?page=student_list')?>"><button style="background: #007bff;" class="btn btn-dark">Back</button></a>
            <a style="display: block;" href="https://admission.classtune.com/bncd/school-download-form?id=<?= $student_details->user_id ?>" target="_blank" ><button style="background: #007bff;" class="btn btn-dark">Student document</button></a>
            <a style="display: block;" href="https://admission.classtune.com/bncd/download-admit/?id=<?= $student_details->user_id ?>" target="_blank" ><button style="background: #007bff;" class="btn btn-dark">Admit Card</button></a>
        </div>
    </div>
</div>
