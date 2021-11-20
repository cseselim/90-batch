<?php
    global $wpdb; 

    $student_apply_table = $wpdb->prefix.'student_profiles';
    $numRows = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE  status='1' AND class='One'");
    $today = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE date(created_at) = CURDATE() AND status='1'");
    $one = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE class='one' AND status='1' AND approved_status='0' ");

 ?>



<div class="container-fluid">
    <div class="admission_table">
        <h2>Applied Students List</h2>
        <div class="row admission_row_one">
            <div class="col">
                <div class="all_applicant">
                    <h3><?= $numRows; ?></h3>
                    <h4>All Applicant's</h4>
                </div>
            </div>
            <div class="col">
                <div class="all_applicant tody_a">
                    <h3><?= $today ?></h3>
                    <h4>Today's Applicant's</h4>
                </div>
            </div>
            <div class="col">
                <div class="all_applicant bangla">
                    <h3><?= $one ?></h3>
                    <h4>Class One</h4>
                </div>
            </div>
        </div>
        <div class="row admission_row_two">
            <div class="col-3">
                <div class="form-group">
                    <select class="form-control" id="class" name="class">
                        <option value="">Select Class</option>
                        <option value="one">One</option>
                    </select>
                </div>
            </div>
            <!--<div class="col-3">
                <div class="form-group">
                    <select class="form-control" id="version" name="version">
                        <option value="">Medium</option>
                        <option value="english">English</option>
                    </select>
                </div>
            </div>-->
            <div class="col-2">
                <div class="form-group">
                    <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input type="text" class="form-control" id="end_date" placeholder="End Date">
                </div>
            </div>
            <div class="col-2 my-auto">
                <button id="search_by_date" class="btn btn-success">Search</button>
            </div>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Srl</th>
                    <th>Index No</th>
                    <th>Name</th>
                    <!-- <th>Father Name</th>-->
                    <th>Category</th>
                    <!--<th>Mother Name</th>
                    <th>Phone</th>
                    <th>Class</th>
                    <th>Shift</th> -->
                    <!-- <th>Category</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Srl</th>
                    <th>Index No</th>
                    <th>Name</th>
                    <!-- <th>Father Name</th> -->
                    <th>Category</th>
                    <!--<th>Mother Name</th>
                    <th>Phone</th>
                    <th>Class</th>
                    <th>Shift</th> -->
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="row" style="width: 100%">
    <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        <form style="margin-left: 2%;" method="post" action="<?= get_template_directory_uri() ?>/dashboard-menu/students-csv-file.php">
            <input type="submit" name="export" class="btn btn-success" value="Students data for classtune" />
        </form>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        <form style="margin-left: 2%;" method="post" action="<?= get_template_directory_uri() ?>/dashboard-menu/parents-csv-file.php">
            <input type="submit" name="export" class="btn btn-success" value="Parents data for classtune" />
        </form>
    </div> -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        <form style="margin-left: 2%;" method="post" action="<?= get_template_directory_uri() ?>/dashboard-menu/student-excel-file.php">
            <input type="submit" name="export" class="btn btn-success" value="Student data for school" />
        </form>
    </div>
</div>