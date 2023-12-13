<?php 

class SecretaryContr extends Secretary {
    public function enrollUserInCourse($userId, $classId) {
        try {
            // Check if the class exists
            if ($this->doesClassExist($classId)) {
                if (!$this->isUserEnrolled($userId, $classId)) {
                    parent::addUserToCourse($userId, $classId);
                    echo "User enrolled in the course successfully.";
                } else {
                    echo "User is already enrolled in the course.";
                }
            } else {
                echo "Class does not exist.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function dropUserFromCourse($userId, $classId) {
        try {
            // Check if the class exists
            if ($this->doesClassExist($classId)) {
                if ($this->isUserEnrolled($userId, $classId)) {
                    parent::dropUserFromCourse($userId, $classId);
                    echo "User dropped from the course successfully.";
                } else {
                    echo "User is not enrolled in the course.";
                }
            } else {
                echo "Class does not exist.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

        // Helper function to check if a class exists
        private function doesClassExist($classId) {
            $sql = "SELECT COUNT(*) AS count FROM class WHERE class_id = :class_id";
            $params = array(':class_id' => $classId);
            $result = $this->executeQuery($sql, $params);
    
            return isset($result['data'][0]['count']) && $result['data'][0]['count'] > 0;
        }
}