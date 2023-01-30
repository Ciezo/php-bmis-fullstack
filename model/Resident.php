<!-- 
    Filename: Resident.php
    Description: A Model (template) for Resident objects
 -->

 
<?php
    class Resident {
        public $username;
        public $password;
        public $full_name;
        public $contact_num;

        function __construct($username, $password, $full_name, $contact_num) {
            $this->username = $username;
            $this->password = $password;
            $this->full_name = $full_name;
            $this->contact_num = $contact_num;
        }

        function getFullName() {
            return $this->full_name; 
        }

        function getContactNum() {
            return $this->contact_num;
        }

        function getUserName() {
            return $this->username; 
        }

        function getPassword() {
            return $this->password;
        }
    }
?>