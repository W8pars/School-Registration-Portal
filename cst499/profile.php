<?php
include 'master.php'; // Include your master template or header
require_once "db_config.php";
require "classes/dbh.classes.php";
include "classes/secretary.classes.php";
include "classes/secretary-contr.classes.php";

// Retrieve and display enrolled courses
$courseManagement = new SecretaryContr();
$result = $courseManagement->getEnrolledClasses($_SESSION['userid']);
?>
<div class="jumbotron">
    <h1>Welcome, <?php echo $_SESSION['email']; ?></h1>
</div>
<hr>
<h2>Enrolled Courses</h2>
<hr>
<div class='container'>
    <div>
        <form method='post' action='includes/dropclass.inc.php'>
            <?php if (isset($result['data']) && is_array($result['data']) && count($result)): ?>
                <table class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Course Hours</th>
                            <th>Class Number</th>
                            <th>Class Professor</th>
                            <th>Semester</th>
                            <th>Quarter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result['data'] as $row): ?>
                            <tr>
                                <?php foreach ($row as $columnName => $value): ?>
                                    <td><?php echo $value; ?></td>
                                <?php endforeach; ?>
                                <input type='hidden' name='course_id' value='<?php echo $row['course_id']; ?>'>
                                <input type='hidden' name='class_id' value='<?php echo intval($row['class_id']); ?>'>
                                <td><button type='submit' name='submit' id='submit' aria-label='Drop Course'>Drop Course</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No courses are enrolled. <a href='courseListings.php'>Enroll in a course</a>.</p>
            <?php endif; ?>
        </form>
    </div>
</div>



<?php include 'footer.php';?>