<?php
include 'master.php';
require_once "db_config.php";
require "classes/dbh.classes.php";
include "classes/secretary.classes.php";
include "classes/secretary-contr.classes.php";

$courseManagement = new SecretaryContr();

// Get all classes available in the system, regardless of semester/year
$allClasses = $courseManagement->getAllClasses();
?>
<div class="jumbotron">
    <h1>Welcome, <?php echo $_SESSION['email']; ?></h1>
</div>
<hr>
<h2>All Classes in the System</h2>

<div class="container">
    <?php if (isset($allClasses['data']) && is_array($allClasses['data'])): ?>
        <table class='table table-bordered table-hover'>
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Course Hours</th>
                    <th>Class Professor</th>
                    <th>Semester</th>
                </tr>
            </thead><tbody>
                <?php foreach ($allClasses['data'] as $class): ?>
                    <tr>
                        <td><?php echo $class['class_id']; ?></td>
                        <td><?php echo $class['course_id']; ?></td>
                        <td><?php echo $class['course_name']; ?></td>
                        <td><?php echo $class['course_hours']; ?></td>
                        <td><?php echo $class['class_professor']; ?></td>
                        <td><?php echo $class['semester_quarter'] . " " . $class['semester_year']; ?></td>

                        <td>
                            <?php if (isset($class['class_id'])): ?>
                                <form method='post' action='includes/enrollclass.inc.php'>
                                    <input type='hidden' name='course_id' value='<?php echo $class['course_id']; ?>'>
                                    <input type='hidden' name='class_id' value='<?php echo $class['class_id']; ?>'>
                                    <button type='submit' name='submit' id='submit'>Enroll</button>
                                </form>
                            <?php else: ?>
                                <p>Class ID not available.</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No classes found.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php';?>