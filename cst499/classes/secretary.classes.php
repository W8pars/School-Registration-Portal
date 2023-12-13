<?php

class Secretary extends Dbmgr {

    
    public function isUserEnrolled($userId, $classId) {
        try {
            $sql = "SELECT COUNT(*) AS count FROM roster WHERE user_id = :user_id AND class_id = :class_id";
            $params = array(':user_id' => $userId, ':class_id' => $classId);
            $result = $this->executeQuery($sql, $params);

            return isset($result['data'][0]['count']) && $result['data'][0]['count'] > 0;;
        } catch (Exception $e) {
            throw new Exception("Error checking user enrollment: " . $e->getMessage());
        }
    } 

    public function addUserToCourse($userId, $classId) {
        try {
            $sql = "INSERT INTO roster (user_id, class_id) VALUES (:user_id, :class_id)";
            $params = array(':user_id' => $userId, ':class_id' => $classId);
            $this->executeQuery($sql, $params);
        } catch (Exception $e) {
            throw new Exception("Error adding course to user: " . $e->getMessage());
        }
    }

    public function dropUserFromCourse($userId, $classId) {
        try {
            $sql = "DELETE FROM roster WHERE user_id = :user_id AND class_id = :class_id";
            $params = array(':user_id' => $userId, ':class_id' => $classId);
            $this->executeQuery($sql, $params);
            echo "User dropped from the course successfully.";
        } catch (Exception $e) {
            echo "Error dropping user from course: " . $e->getMessage();
        }
    }

    public function getAllClasses() {
        try {
            $sql = "SELECT course.*, class.class_id, class.class_professor, 
            semester.semester_year, semester.semester_quarter
            FROM course
            JOIN class ON course.course_id = class.course_id
            JOIN semester ON class.semester_id = semester.semester_id";

            $result = $this->executeQuery($sql);

            if (isset($result['data']) && is_array($result['data'])) {
                return $result;
            } else {
                return array('data' => null);
            }
        } catch (PDOException $e) {
            error_log("Error getting all classes: " . $e->getMessage());
            throw $e; 
        }
    }

    public function getEnrolledClasses($userId) {
        try {
            $sql = 'SELECT course.*, 
            class.class_id, class.class_professor,
            semester.semester_year, semester.semester_quarter 
            FROM course 
            JOIN class ON course.course_id = class.course_id 
            JOIN semester ON class.semester_id = semester.semester_id
            JOIN roster ON class.class_id = roster.class_id 
            WHERE roster.user_id = :user_id';

            $params = array('user_id' => $userId);

            $result = $this->executeQuery($sql, $params);

            if (isset($result['data']) && is_array($result['data'])) {
                return $result;
            } else {
                return array('data' => null);
            }
        } catch (PDOException $e) {
            error_log("Error getting all classes: " . $e->getMessage());
            throw $e; 
        }
    }
}