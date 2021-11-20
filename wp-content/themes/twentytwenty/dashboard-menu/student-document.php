<?php
    global $wpdb; 

    $student_apply_table = $wpdb->prefix.'memories';
    $numRows = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE status='0'");

 ?>



<div class="container-fluid">
    <div class="admission_table">
        <h2>All Memories</h2>
        <div class="row admission_row_one">
            <div class="col-12">
                <div class="all_applicant">
                    <h3><?= $numRows; ?></h3>
                    <h4>Total Memories</h4>
                </div>
            </div>
        </div>
       <!--  <div class="row admission_row_two">
            <div class="col-3">
                <div class="form-group">
                    <select class="form-control student_class" id="class" name="class">
                        <option value="">Select Class</option>
                        <option value="Two">Two</option>
                        <option value="Three">Three</option>
                        <option value="Four">Four</option>
                        <option value="Five">Five</option>
                        <option value="Six">Six</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <select class="form-control" id="version" name="version">
                        <option value="">Medium</option>
                        <option value="english">English</option>
                    </select>
                </div>
            </div>
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
                <button id="student_list_search" class="btn btn-success">Search</button>
            </div>
        </div> -->


        <table id="all_approve_memories" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Srl</th>
                    <th>Name</th>
                    <th>School Name</th>
                    <th>Memories Text</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Srl</th>
                    <th>Name</th>
                    <th>School Name</th>
                    <th>Memories Text</th>
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
    <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        <form style="margin-left: 2%;" method="post" action="<?= get_template_directory_uri() ?>/dashboard-menu/student-excel-file.php">
            <input type="submit" name="export" class="btn btn-success" value="Student data for school" />
        </form>
    </div> -->
</div>